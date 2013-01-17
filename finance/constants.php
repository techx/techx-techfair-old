<?
$finczars = array(
	"ddz",
	"shewu",
	"hujj",
	"rswang",
	"leonz",
	"mkolysh",
	"joshma"
);
$people = array(

"vchiu",
"yuetang",
"jtywang",
"emzhang",
"anvishap",
"jodiec",
"alyxdaly",
"skao",
"davidhou",
"cjessica",
"etio",
"aanojima",
"tweilu",
"vicli",
"disanto",
"rswang",
"rzni",
"amruthv",
"ddkang",
"ksiegel",
"sebastian",
"yuqingz",
"yen",
"jjthomas",
"hkannan",
"moyukhc",
"evaten",
"ysul",
"ramya",
"tliu892",
"vvachh",
"jahnavik",
"jhaip",
"vchak",
"ishabir",
"lxiong",
"tdoan",
"leonz",
"jlui",
"aezhou",
"davidke",
"bvasquez",
"yinam",
"ddz",
"hujj",
"leonz",
"rswang",
"mkolysh",
"ankush",
"bfrank",
"ddoucet",
"holliman",
"mmou",
"joshma",
"(other)"
);

$projects = array(
	"Committee food (Marketing)" => 650,
	"Committee food (SR)" => 350,
	"Committee food (DevOps)" => 350,
	"Committee food (logistics)" => 450,
	"Committee food (THINK)" => 400,
	"Committee food (CR)" => 600,
	"Committee food (finance)" => 200,
	"Committee food (exec)" => 400,
	"Committee food (techtalks)" => 250,
	"Committee food (Events)" => 350,
	"GBM Food" => 800,
	"Recruiting" => 380,
	"Exec Retreat" => 2300,
	"Retreat" => 4000,
	"Retreat Shirts" => 1000,
	"Staff Shirts" => 1000,
	"Hoodies" => 2000,
	"Raffle" => 2000,
	"CR" => 100,
	"DevOps" => 2000,
	"Events" => 3500,
	"Marketing" => 9000,
	"SR" => 4000,
	"Techtalks" => 9000,
	"THINK" => 10000,
	"Logistics (Day Of)" => 50000,
	"Afterparty" => 5000,
	"After-afterparty" => 2000,
	"Last dinner" => 1000,
);

$tbl_hdrs = array(
	"Date",
	"Recipient",
	"Project",
	"Subtotal excl tax",
	"Tax",
	"Description",
	"Status",
	"Reimburser",
	"RFP #",
	"Notes"
);

$tbl_submit_names = array(
	"date",
	"recp",
	"proj",
	"subt",
	"tax",
	"desc",
	"stat",
	"rmbr",
	"rfp",
	"note"
);

$tbl_input_widths = array(
	6, 10, 20, 7, 4, 20, 10, 10, 10, 20
);

function mkhdr($USER) {
	echo "<nav><a href=/finance/>Home</a> - <a href=people.php>People</a> - <a href=project.php>Projects</a> - <a href=leaderboard.php>Leaderboard</a><sup><em>New!</em></sup> || Welcome, $USER. See my <a href='people.php?person=$USER'>transactions</a>.</nav>\n";
}

function error($str) {
	return "<span style=\"color:red;\"><strong>ERROR</strong>: $str</span>";
}

function applyBold($str) {
	return "<span style=\"font-weight: bolder\">$str</span>";
}

function styleMe($str, $me, $fun) {
	if (!strcmp($str, $me)) {
		return $fun($str);
	} else {
		return $str;
	}
}

// inclusive in range tester
function inRange($num, $start, $end) {
	return $start <= $num && $num <= $end;
}

function validateDate($date) {
	$d = (int)$date;
	return strlen($date) == 6 && inRange($d % 100, 1, 31) && inRange(($d / 100) % 100, 1, 12);
}

function validatizeDate($date) {
	if (validateDate($date)) {
		return $date;
	} else {
		return (int)date('ymd');
	}
}

function displayDate($date) {
	$monthNames = array(
		"",
		"Jan",
		"Feb",
		"Mar",
		"Apr",
		"May",
		"Jun",
		"Jul",
		"Aug",
		"Sep",
		"Oct",
		"Nov",
		"Dec"
	);

	$dateAsInt = (int)$date;
	$day = $dateAsInt % 100;
	$mon = ($dateAsInt / 100) % 100;
	return sprintf("%s %02d", $monthNames[$mon], $day);
}

function validateRecp($recp) {
	return strlen($recp) > 0 && strlen($recp) <= 8;
}

function validateProj($proj) {
	return strlen($proj) > 0;
}

function validateSubt($subt) {
	return (float)$subt > 0;
}

function validateTax($tax) {
	return (float)$tax >= 0;
}

function validateDesc($desc) {
	return strlen($desc) > 0;
}

function validateRmbr($rmbr) {
	return 8 >= strlen($rmbr) && strlen($rmbr) > 0;
}

function validateRFP($rfp) {
	return (int)$rfp > 0;
}

function valid($in) {
	return validateDate($in["date"]) && validateRecp($in["recp"])
		&& validateProj($in["proj"]) && validateSubt($in["subt"]) 
		&& validateDesc($in["desc"]) && validateRmbr($in["rmbr"])
		&& validateRFP($in["rfp"]) && validateTax($in["tax"]);
}

function format_currency($a) {
	return sprintf("%.2f", $a);
}

function sendEmail($data) {
	if ($data["recp"] == "(other)") {
		return TRUE;
	}
	$message = wordwrap("Good morning ".$data["recp"]."!\n\nYour reimbursement for ".$data["subt"]." for ".$data["desc"]." (".$data["proj"].") on ".displayDate($data["date"])." has been processed (N.B. tax is not reimbursed). The money will either be mailed to you as a check or direct-deposited into your account, depending on your preference saved at SAO.\n\nAs always, you may check the statuses of your reimbursements at\n\nhttp://tf.mit.edu/finance/people.php?person=".$data["recp"]."\n\nand your committee's spending at\n\n http://techfair.mit.edu/finance/\n\nIf you have any questions, feel free to email techfair-finance@mit.edu.\n\n~The Techfair Finance team~");
	$headers = 'From: techfair-finance@mit.edu'."\r\n".'Cc: techfair-finance@mit.edu'."\r\n".'X-Mailer: PHP/'.phpversion();
	return mail($data["recp"]."@mit.edu", "[TF] You got reimbursed!", $message, $headers);
}
?>

