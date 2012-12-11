<!DOCTYPE html>
<html lang=en>
<head>
<title>techfair Finance</title>
<style>@import 'main.css';</style>
<script type="text/javascript">
function submitEnter(myField, e) {
	var keyCode;
	if (window.event) {
		keyCode = window.event.keyCode;
	} else if (e) {
		keyCode = e.which;
	} else {
		return true;
	}
	if (keyCode == 13) {
		myField.form.submit();
		return false;
	} else {
		return true;
	}
}
</script>
<script type="text/javascript" src="http://www.kryogenix.org/code/browser/sorttable/sorttable.js"></script>
<? /*
	<!--[if IE]>
	<style type="text.css">
		.clearfix {
			zoom: 1;
		}
	</style>
	<![endif]-->
	<!--<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js"></script>-->
	<script type="text/javascript" src="../js/jquery-1.4.2.min.js"></script>
	<script type="text/javascript" src="../js/jquery-ui-1.8.6.custom.min.js"></script>
	<script type="text/javascript" src="../js/cufon-yui.js"></script>
	<script type="text/javascript" src="../js/Helvetica.font.js"></script>
	<script type="text/javascript">
		Cufon.replace('body');
	</script>
	<script type="text/javascript" src="../js/script.js"></script> 


  <!-- tipsy tooltips -->
  <link rel="stylesheet" href="../css/tipsy.css" type="text/css" />
  <script type="text/javascript" src="../css/jquery.tipsy.js"></script>

*/?>
</head>
<body>
<?
$_email = $_SERVER['SSL_CLIENT_S_DN_Email']; // email
$USER = substr($_email, 0, strrpos($_email, "@"));

$__SHOW_ONLY_INCOMPLETE = false;

include 'constants.php';
$dbname = 'techfair+fin';
$con = mysql_connect('mysql.mit.edu', 'techfair', '02139techfair');
if (!mysql_select_db($dbname)) {
	echo error("Database not found!");
	die();
}

if (valid($_POST)) {
	if (isset($_POST["edit"])) {
		$status = $_POST["stat"] == '' ? 0 : 1;
		// $query = sprintf("UPDATE exp13 SET Description = '%s', Status = %s, Notes = '%s' WHERE Date = %s AND Recipient = '%s' AND Project = '%s' AND `Subtotal excl tax` = %s AND Tax = %s AND Reimburser = '%s' AND `RFP #` = %s",
                $query = sprintf("UPDATE exp13 SET Description = '%s', Status = %s, Notes = '%s', Date = '%s', Recipient = '%s', Project = '%s', Tax = %s, Reimburser = '%s' WHERE `Subtotal excl tax` = %s AND `RFP #` = %s",
			mysql_real_escape_string($_POST["desc"]),
			$status,
			mysql_real_escape_string($_POST["note"]),
			$_POST["date"],
			$_POST["recp"],
			$_POST["proj"],
			$_POST["tax"],
			$_POST["rmbr"],
			$_POST["subt"],
			$_POST["rfp"]
		);
    //echo $query;
		if (!($result = mysql_query($query))) {
			echo error("editing failed!<br />");
			echo "Your query was: $query<br />";
		} else {
			if ($status && !sendEmail($_POST)) {
				echo error("failed to send email!<br />");
			}
		}
	} else if (isset($_POST["delete"])) {
		$query = sprintf("DELETE FROM exp13 WHERE Date = %s AND Recipient = '%s' AND Project = '%s' AND `Subtotal excl tax` = %s AND Tax = %s AND Description = '%s' AND Reimburser = '%s' AND `RFP #` = %s",
			$_POST["date"],
			$_POST["recp"],
			$_POST["proj"],
			$_POST["subt"],
			$_POST["tax"],
			mysql_real_escape_string($_POST["desc"]),
			$_POST["rmbr"],
			$_POST["rfp"]
		);
		if (!($result = mysql_query($query))) {
			echo error("removing you from your mother failed!<br />");
			echo "Your query was: $query<br />";
		}
	} else { // add might not be set if we submit by hitting enter in the form
		$query = sprintf("INSERT INTO exp13 VALUES (%s, '%s', '%s', %s, %s, '%s', %s, '%s', %s, '%s')", 
			$_POST["date"], 
			$_POST["recp"], 
			$_POST["proj"], 
			$_POST["subt"], 
			$_POST["tax"], 
			mysql_real_escape_string($_POST["desc"]), 
			$_POST["stat"], 
			$_POST["rmbr"], 
			$_POST["rfp"], 
			mysql_real_escape_string($_POST["note"])
		);
		if (!($result = mysql_query($query))) {
			echo error("insertion into your mother failed!<br />");
			echo "Your query was: $query<br />";
		}
	} 
}
if (isset($_GET["i"])) {
	$__SHOW_ONLY_INCOMPLETE = true;
}
$result = mysql_query('SELECT * FROM exp13');
if (!$result) {
	echo error("bad query!");
}

mkhdr($USER);

echo "</tbody></table>";
if (in_array($USER, $finczars)) {
	echo "<h2>Receipt Entry</h2>\n";
	echo "<form name=\"addTransaction\" action=\"$PHP_SELF\" method=post>";
	echo "<table border=1>";
	for ($i = 0; $i < count($tbl_hdrs); $i++) {
		echo "<tr><th>$tbl_hdrs[$i]</th>";
		if ($i == 1) { // recipient
			echo "<td><select name=\"".$tbl_submit_names[$i]."\">";
			foreach ($people as $person) {
				if ($person != $USER) {
					echo "<option value=\"$person\">$person</option>";
				}
			}
			echo "</select></td>";
		} else if ($i == 2) { // project
			echo "<td><select name=\"".$tbl_submit_names[$i]."\">";
			foreach ($projects as $project => $budget) {
				echo "<option value=\"$project\">$project</option>";
			}
			echo "</select></td>";
		} else if ($i == 6) { // status
			echo "<td><input type=hidden name=\"".$tbl_submit_names[$i]."\" value=0 />Unsubmitted</td>";
		} else if ($i == 7) { // reimburser
			echo "<td><input type=hidden name=\"".$tbl_submit_names[$i]."\" value=$USER />$USER</td>";
		} else {
			echo "<td><input type=text name=\"".$tbl_submit_names[$i]."\" size=\"".$tbl_input_widths[$i]."\" ";
			if ($i == count($tbl_hdrs) - 1) {
				echo "onKeyPress=\"return submitEnter(this, event)\" ";
			} else if ($i == 4) {
				echo "value=0 ";
			} else if ($i == 0) {
				echo "placeholder=YYMMDD ";
			}
			echo "/></td>";
		}
		echo "</tr>";
	}
	echo "<tr><th>&nbsp;</th><td><input type=submit name=add value=Add /></td></tr>\n";
	echo "</table></form>\n";
}

?>
<h1>Transactions</h1>
<?
if ($__SHOW_ONLY_INCOMPLETE) {
	echo "<h3>Note: only <em class=processing>incomplete</em> reimbursements are shown.</h3>";
}
?>
<table border=1 class=sortable>
<?
echo "<thead><tr>";
for ($i = 0; $i < count($tbl_hdrs); $i++) {
	echo "<th>" . $tbl_hdrs[$i] . "</th>";
}
if (in_array($USER, $finczars)) {
	echo "<th>&nbsp;</th>";
}
echo "</tr></thead>\n";
echo "<tbody>";
while ($row = mysql_fetch_assoc($result)) {
	if ($row["Status"] == "1" && $__SHOW_ONLY_INCOMPLETE) {
		continue;
	}
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
	if (in_array($USER, $finczars)) {
		echo "<td><form name=\"editTransaction\" action=\"transaction.php\" method=post>";
		$j = 0;
		foreach ($row as $val) {
			echo "<input type=hidden name=\"$tbl_submit_names[$j]\" value=\"$val\" />";
			$j++;
		}
		echo "<input type=\"submit\" value=\"Edit\" />";
		echo "</form></td>";
	}
	echo "</tr>\n";
}

?>
<h3>Tips</h3>
<ul>
<li>Click the table headers to sort the corresponding column.</li>
<?if (in_array($USER, $finczars)) {?>
<li>Link to <a href="http://web.mit.edu/sapweb/">SAO's website, SAPWeb</a>; email <a href="mailto:sao-desk@mit.edu">sao-desk@mit.edu</a> for any problems.</li>
<li>Send RFPs whose value is less than $100 to <?echo applyBold("Katrina Hill");?> and RFPs whose value is greater than $100 to <?echo applyBold("Catherine Hursh");?>.</li>
<li>ECommerce site: <a href=https://ebc.cybersource.com/ebc/login/LoginProcess.do>Click me</a>; Merchant ID is MIT_SAO_Techfair</li>
<?}?>
</ul>
</body>
</html>

