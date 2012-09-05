<?
include 'constants.php';

$_email = $_SERVER['SSL_CLIENT_S_DN_Email']; // email
$USER = substr($_email, 0, strrpos($_email, "@"));
if (!in_array($USER, $finczars)) {
	header('Location: http://techfair.mit.edu');
} else {
?>
<!DOCTYPE html>
<html lang=en>
<head>
<title>techfair Finance : edit</title>
<style>@import 'main.css';</style>
</head>
<body>
<?
mkhdr($USER);
echo "<h1>Edit Transaction</h1>";

if (valid($_POST)) {
	echo "<form name=\"editTransaction\" action=\"index.php\" method=post>";
	echo "<table border=1>";
	for ($i = 0; $i < count($tbl_hdrs); $i++) {
		echo "<tr><th>$tbl_hdrs[$i]</th>";
		if ($i == 0) {
			$a = $_POST[$tbl_submit_names[$i]];
			echo "<td><input type=hidden value=\"$a\" name=$tbl_submit_names[$i] />".displayDate($a)."</td>";
		} else if ($i == 5) { // description
			echo "<td><input type=text value=\"".$_POST["desc"]."\" name=$tbl_submit_names[$i] /></td>";
		} else if ($i == 6) { // status
			echo "<td><input type=checkbox value=1 name=$tbl_submit_names[$i] /> Complete</td>";
		} else if ($i == 9) { // notes
			echo "<td><input type=text value=\"".$_POST["notes"]."\" name=$tbl_submit_names[$i] /></td>";
		} else {
			$a = $_POST[$tbl_submit_names[$i]];
			echo "<td><input type=hidden value=\"$a\" name=$tbl_submit_names[$i] />$a</td>";
		}
		echo "</tr>";
	}
	echo "<tr><th>&nbsp;</th><td><input type=submit name=edit value=Save /> <input type=submit name=delete value=Delete /></td></tr>\n";
	echo "</table></form>\n";
} else {
	echo "<div class=processing>Error</div>\n";
}
?>
</body>
</html>
<?}?>

