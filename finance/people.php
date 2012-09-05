<!DOCTYPE html>
<html lang=en>
<head>
<title>techfair Finance : People</title>
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

if (isset($_GET["person"]) && in_array($_GET["person"], $people)) {
	echo "<h1>Transactions : ".$_GET['person']."</h1>";
	echo "<table class=sortable>";
	echo "<thead><tr>";
	for ($i = 0; $i < count($tbl_hdrs); $i++) {
		echo "<th>" . $tbl_hdrs[$i] . "</th>";
	}
	echo "</tr></thead><tbody>";
	while ($row = mysql_fetch_assoc($result)) {
		if (!strcmp($_GET["person"], $row["Recipient"])) {
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
<h1>People</h1>
<table border=1 class=sortable>
<tr><th>Name</th><th>Untaxed Total</th><th>Tax</th></tr>
<?
$ppl = array();
while ($row = mysql_fetch_assoc($result)) {
	$recp = $row["Recipient"];
	if (!in_array($recp, $people)) {
		$ppl[$recp] = array(0, 0);
	}
	if (strcmp($row["Project"], "(2012) Tax Refunds") == 0) {
		$ppl[$recp][1] -= (float)($row["Subtotal excl tax"]);
	} else {
		$ppl[$recp][0] += (float)($row["Subtotal excl tax"]);
		$ppl[$recp][1] += (float)($row["Tax"]);
	}
}
foreach ($ppl as $person => $a) {
	echo "<tr><td><a href=people.php?person=$person>" . styleMe($person, $USER, applyBold) . "</a></td><td>".format_currency($a[0])."</td><td>".format_currency($a[1])."</td></tr>";
}
?>
</table>
<?} // close from parameter switch?>
</body>
</html>

