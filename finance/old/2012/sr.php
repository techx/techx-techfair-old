<!DOCTYPE HTML>
<html lang=en>
<head>
<title>techfair Finance</title>
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
?>
<h1>Welcome, <? echo $USER; ?>.</h1>
<p>Here are your transactions:</p>
<table border=1 class=sortable>
<?
while ($row = mysql_fetch_assoc($result)) {
	if (strcmp($row["Recipient"], $USER) == 0) {
		echo "<tr>";
		echo "</tr>";
	}
}
?>
</table>
</body>
</html>

