<!DOCTYPE html>
<html lang=en>
<head>
<title>techfair Finance: All</title>
<style>@import 'main.css';</style>
<script type="text/javascript" src="http://www.kryogenix.org/code/browser/sorttable/sorttable.js"></script>
<script type="text/javascript" src="https://www.google.com/jsapi"></script>
</head>
<body>
<?
$_email = $_SERVER['SSL_CLIENT_S_DN_Email']; // email
$USER = substr($_email, 0, strrpos($_email, "@"));

include 'constants.php';

$dbname = 'techfair+fin';
$con = mysql_connect('mysql.mit.edu', 'techfair', '02139techfair');
if (!mysql_select_db($dbname)) {
	echo error("Database not found!");
	die();
}

$result = mysql_query('SELECT * FROM exp12');
if (!$result) {
	echo error("bad query!");
}
// visitors not wanted
//if (!in_array($_GET["person"], $people)) {
//	die("get the fuck out");
//}

mkhdr($USER);

// accumulate all transactions
$byProject = array();
$byPerson = array();
$byTime = array();
while ($row = mysql_fetch_assoc($result)) {
	if (!array_key_exists($row["Project"], $byProject)) {
		$byProject[$row["Project"]] = array();
	}
	$byProject[$row["Project"]][] = $row;

	if (!array_key_exists($row["Recipient"], $byPerson)) {
		$byPerson[$row["Recipient"]] = array();
	}
	$byPerson[$row["Recipient"]][] = $row;

	$month = ($row["Date"] / 100) % 100;
	if (!array_key_exists($month, $byTime)) {
		$byTime[$month] = array();
	}
	$byTime[$month][] = $row;
}

ksort($byProject);
ksort($byPerson);

function printTOC($arr) {
	foreach ($arr as $key => $p) {
		echo "<li><a href=\"#$key\">$key</a></li>";
	}
}
?>

<p>
Table of contents
<ul>
<li><a href="#project">By Project</a>
	<ul>
	<? printTOC($byProject); ?>
	</ul>
</li>
<li><a href="#person">By Person</a>
	<ul>
	<? printTOC($byPerson); ?>
	</ul>
</li>
<li><a href="#time">By Time</a>
	<ul>
	<? printTOC($byTime); ?>
	</ul>
</li>
</ul>
</p>

<?
function printArray($arr, $flag) {
	global $tbl_hdrs;

	foreach ($arr as $key => $p) {
		$subt = 0;
		$tax = 0;
		echo "<h2 id='$key'>$key</h2>";
		echo "<table class=sortable><thead><tr>";
		for ($i = 0; $i < count($tbl_hdrs); $i++) {
			echo "<th>" . $tbl_hdrs[$i] . "</th>";
		}
		echo "</tr></thead><tbody>";
		foreach ($p as $exp) {
			echo "<tr>";
			foreach ($exp as $k => $val) {
				if (strcmp($k, "Date") == 0) {
					echo "<td>" . displayDate($val) . "</td>";
				} else if (strcmp($k, "Status") == 0) {
					if ($val == "0") {
						echo "<td class=processing>Processing</td>";
					} else if ($val == "1") {
						echo "<td class=complete>Complete</td>";
					}
				} else {
					echo "<td>" . $val . "</td>";
					if (strcmp($k, "Subtotal excl tax") == 0) {
						$subt += $val;
					} else if (strcmp($k, "Tax") == 0) {
						$tax += $val;
					}
				}
			}
			echo "</tr>";
		}
		echo "</tbody></table>";

		// generate me some stats
		echo "<h3>Stats</h3>";
		echo "<ul>";
		echo "<li>Number transactions: " . count($p) . "</li>";
		echo "<li>Subtotal before tax: $$subt</li>";
		echo "<li>Tax: $$tax</li>";
		echo "<li>Total: $" . ($subt + $tax) . "</li>";
		global $projects;
		if ($flag == 0) {
			$budget = $projects[$key];
			echo "<li>Budget : $" . $budget . "</li>";
			$over = $subt + $tax - $budget;
			if ($over > 0) {
				echo "<li><span class=budgetOver>You went over budget by $$over!</span></li>";
			}
		}
		echo "</ul>";
	}

	// TODO google charts
	//echo "<h2>Summary</h2>";
	//echo "<script type=text/javascript>";
	//echo "google.load('visualization', '1.0', {'packages':['corechart']});";
	//echo "google.setOnLoadCallBack(function() {\
	//	var data = new google.visualization.DataTable();\
	//	data.addColumn('string', 'Category');\
	//	data.addColumn('number', 'Count');\
	//});";
	//echo "var chart = new google.visualization.PieChart(document.getElementById(''));";
	//echo "</script>";
}

// by project
echo "<h1 id=project>By Project</h1>";
printArray($byProject, 0);

// by person
echo "<h1 id=person>By Person</h1>";
printArray($byPerson, 1);

// by time (month)
echo "<h1 id=time>By Time</h1>";
printArray($byTime, 2);
?>
</body>
</html>

