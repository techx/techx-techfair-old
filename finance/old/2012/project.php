<!DOCTYPE html>
<html lang=en>
<head>
<title>techfair Finance : Projects</title>
<style>@import 'main.css';</style>
<script type="text/javascript" src="http://www.kryogenix.org/code/browser/sorttable/sorttable.js"></script>
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
mkhdr($USER);

if (isset($_GET["project"]) && in_array($_GET["project"], $projects)) {
	echo "<h1>Transactions : ".$_GET['project']."</h1>";
	echo "<table class=sortable>";
	echo "<thead><tr>";
	for ($i = 0; $i < count($tbl_hdrs); $i++) {
		echo "<th>" . $tbl_hdrs[$i] . "</th>";
	}
	echo "</tr></thead><tbody>";
	while ($row = mysql_fetch_assoc($result)) {
		if (!strcmp($_GET["project"], $row["Project"])) {
			echo "<tr>";
			$i = 0;
			foreach ($row as $val) {
				if ($i == 0) {
					echo "<td sorttable_customkey=$val>".displayDate($val)."</td>";
				} else if ($i == 1) {
					echo "<td>";
					if ($val == "(other)") {
						echo $val;
					} else {
						echo "<a href=\"mailto:$val@mit.edu\">$val</a>";
					}
					echo "</td>";
				} else if ($i == 6) {
					if ($val == "0") {
						echo "<td class=processing>Processing</td>";
					} else if ($val == "1") {
						echo "<td class=complete>Complete</td>";
					}
				} else if ($i == 7) {
					echo "<td><a href=\"mailto:$val@mit.edu\">$val</a></td>";
				} else {
					echo "<td>".$val."</td>";
				}
				$i++;
			}
			echo "</tr>\n";
		}
	}
	echo "</tbody></table>";
} else {
?>
<h1>Projects</h1>
<table border=1 class=sortable>
<tr><th>Project</th><th>Subtotal</th><th>Budget</th></tr>
<?
$total = 0;
$tbudget = 0;
$proj = array();
while ($row = mysql_fetch_assoc($result)) {
	$title = $row["Project"];
	$proj[$title] += (float)$row["Subtotal excl tax"] + (float)$row["Tax"];
}
foreach ($projects as $project => $budget) {
	echo "<tr><td><a href='project.php?project=$project'>$project</a></td>";
	if ($proj[$project] > $budget) {
		echo "<td class=\"budgetOver\">";
	} else if ($proj[$project] >= 0.9 * $budget && $budget > 0) {
		echo "<td class=\"budgetApproaching\">";
	} else {
		echo "<td>";
	}
	echo format_currency($proj[$project])."</td><td>$budget</td></tr>";
	$total += $proj[$project];
	$tbudget += $budget;
}
?>
</table>
<p>Total: <?php echo applyBold($total);?> / <?php echo $tbudget;?></p>
<p>Notes:</p>
<ul>
<li>Subtotals include tax</li>
</ul>
<?} // close from parameter switch?>
</body>
</html>

