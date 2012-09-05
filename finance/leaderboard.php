<!DOCTYPE html>
<html lang=en>
<head>
<title>techfair Finance : Leaderboard</title>
<style>@import 'main.css';</style>
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

$moneyhungry = array();
$moneybags = array();
$troublemakers = array();
$uncontrollableprojs = array();

while ($row = mysql_fetch_assoc($result)) {
	$projtitle = $row["Project"];
	$recp = $row["Recipient"];

	$moneyhungry[$projtitle] += (float)$row["Subtotal excl tax"] + (float)$row["Tax"];
	$moneybags[$recp] += (float)$row["Subtotal excl tax"] + (float)$row["Tax"];
	$troublemakers[$recp] += (float)$row["Tax"];
	$uncontrollableprojs[$projtitle] = $moneyhungry[$projtitle];
}
?>
<h1>Most Money-Hungry Projects</h1>
<table>
<tr><th>Project</th><th>Spent</th></tr>
<?
arsort($moneyhungry);
$i = 0;
foreach ($moneyhungry as $project => $budget) {
	echo "<tr><td>$project</td><td>".format_currency($budget)."</td></tr>";
	if (++$i == 5) {
		break;
	}
}
?>
</table>
<h1>Biggest Moneybags</h1>
<table>
<tr><th>Person</th><th>Spent</th></tr>
<?
arsort($moneybags);
$i = 0;
foreach ($moneybags as $moneybag => $spent) {
	echo "<tr><td>$moneybag</td><td>".format_currency($spent)."</td></tr>";
	if (++$i == 5) {
		break;
	}
}
?>
</table>
<h1>Biggest Misers</h1>
<table>
<tr><th>Person</th><th>Spent</th></tr>
<?
asort($moneybags);
$i = 0;
foreach ($moneybags as $miser => $spent) {
	echo "<tr><td>$miser</td><td>".format_currency($spent)."</td></tr>";
	if (++$i == 5) {
		break;
	}
}
?>
</table>
<h1>Biggest Troublemakers</h1>
<table>
<tr><th>Person</th><th>Tax</th></tr>
<?
arsort($troublemakers);
$i = 0;
foreach ($troublemakers as $troublemaker => $taxed) {
	echo "<tr><td>$troublemaker</td><td>".format_currency($taxed)."</td></tr>";
	if (++$i == 5) {
		break;
	}
}
?>
</table>
<h1>Most Uncontrollable Projects</h1>
<table>
<tr><th>Project</th><th>Overspent</th></tr>
<?
foreach ($projects as $project => $budget) {
	$uncontrollableprojs[$project] -= $budget;
}
arsort($uncontrollableprojs);
$i = 0;
foreach ($uncontrollableprojs as $p => $overspent) {
	echo "<tr><td>$p</td><td>".format_currency($overspent)."</td></tr>";
	if (++$i == 5) {
		break;
	}
}
?>
</table>
</body>
</html>

