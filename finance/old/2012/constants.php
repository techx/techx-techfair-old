<?
$finczars = array(
	"ddz",
	"shewu",
	"cyrillan"
);

$people = array(
	"jbatscha",
	"moyukhc",
	"paigef",
	"sannar3",
	"rzni",
	"nashah",
	"ysul",
	"evaten",
	"amruthv",
	"ddz",
	"goodsont",
	"skao",
	"cjessica",
	"kereeke",
	"vchiu",
	"dengd",
	"zier",
	"bvasquez",
	"lxiong",
	"alyxdaly",
	"disanto",
	"npatki",
	"yuetang",
	"etio",
	"emzhang",
	"walterdx",
	"nchornay",
	"bjain",
	"lihaoyi",
	"ramya",
	"gargp",
	"kanter",
	"mkolysh",
	"anvishap",
	"susiefu",
	"rannaz",
	"carolynz",
	"jgoot",
	"joshma",
	"dluciano",
	"shewu",
	"jewang",
	"jtywang",
	"rcharan",
	"ndou",
	"das",
	"qnl",
	"(other)"
);

$projects = array(
	"(2012) Tax Refunds" => 0,
	"(2012) Committee food (Marketing)" => 200,
	"(2012) Committee food (SR)" => 150,
	"(2012) Committee food (IT)" => 150,
	"(2012) Committee food (IR)" => 180,
	"(2012) Committee food (logistics)" => 150,
	"(2012) Committee food (THINK)" => 250,
	"(2012) Committee food (CR)" => 500,
	"(2012) Committee food (finance)" => 100,
	"(2012) Committee food (exec)" => 240,
	"(2012) Committee food (techtalks)" => 200,
	"(2012) Committee food (fall events)" => 100,
	"(2012) GBM" => 700,
	"(2012) Retreat" => 2000,
	"(2012) Retreat Shirts" => 750,
	"(2012) Recruiting" => 600,
	"(2012) Fun events" => 2000,
	"(2012) Last dinner" => 1500,
	"(2012) Afterafterparty" => 2000,
	"(2012) TechTalks" => 4000,
	"(2012) Hackathon" => 7000,
	"(2012) Raffle" => 2000,
	"(2012) Afterparty" => 4500,
	"(2012) CR" => 0,
	"(2012) Marketing" => 7500,
	"(2012) SR" => 5000,
	"(2012) THINK" => 3400,
	"(2012) Spring Events" => 3000,
	"(2012) IT/Website" => 100,
	"(2012) Exec" => 2000,
	"(2012) Car rentals" => 500,
	"(Day of) Company extras" => 3000,
	"(Day of) Facilities (DAME)" => 8000,
	"(Day of) AV" => 3000,
	"(Day of) Shipping" => 400,
	"(Day of) Hotel" => 6000,
	"(Day of) Banquet" => 15100,
	"(Day of) Shuttles" => 450,
	"(Day of) Costco/Supplies" => 300,
	"(Day of) Rockwell" => 4500,
	"(Day of) Food" => 4000,
	"(Day of) Shirts" => 800
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

