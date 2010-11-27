<?php
$basetitle = 'MIT TechFair 2011';
$routes = array(
	'home' => array(
		'title' => $basetitle,
		'content' => 'home.php',
		'name' => 'Home'
	),
	'contact' => array(
		'title' => 'Contact Us / '.$basetitle,
		'content' => 'contact.php',
		//use show => false to hide from nav
		'show' => false
	),
	'events' => array(
		'name' => 'Events',
		'' => array(
			'title' => 'Events / '.$basetitle,
			'content' => 'events/fair.php',
		),
		'hackathon' => array(
			'title' => 'Hack-a-Thon / '.$basetitle,
			'content' => 'events/hackathon.php',
			'name' => '<img src="/img/fb.png" alt="fb" style="vertical-align:top"/>&nbsp;<span>Hack-a-Thon</span>'
		),
		'banquet' => array(
			'title' => 'Banquet / '.$basetitle,
			'content' => 'events/banquet.php',
			'name' => 'Banquet'
		),
		'afterparty' => array(
			'title' => 'Afterparty / '.$basetitle,
			'content' => 'events/party.php',
			'name' => '<img src="/img/db.png" alt="db" style="vertical-align:top"/>&nbsp;<span>Afterparty</span>'
		),
		'venue' => array(
			'title' => 'Venue / '.$basetitle,
			'content' => 'events/venue.php',
			'name' => 'Venue'
		),
	),
	//exhibit is a folder, has a name property
	'exhibit' => array(
		'name' => 'Exhibit',
		//'' is the root, has same name as folder
		'' => array(
			'title' => 'Why TechFair / '.$basetitle,
			'content' => 'exhibit/why.php',
		),
		'packages' => array(
			'title' => 'Sponsorship / '.$basetitle,
			'content' => 'exhibit/packages.php',
			'name' => 'Sponsorship Packages'
		),
		'apply' => array(
			'title' => 'Apply to the Fair / '.$basetitle,
			'content' => 'exhibit/apply.php',
			'name' => 'Apply to the Fair'
		),
		'portal' => array(
			'title' => 'Company Portal / '.$basetitle,
			'external' => 'http://www.mittechfair.org/portal/index.php',
			'name' => 'Company Portal'
		),
	),
	'resume' => array(
		'title' => 'R&#233;sum&#233; Drop / '.$basetitle,
		'content' => 'resume.php',
		'name' => 'R&#233;sum&#233; Drop',
		//process specifies if you want form information processed before any output
		'process' => 'resume_action.php'
	),
	'team' => array(
		'title' => 'Team / '.$basetitle,
		'content' => 'team.php',
		'name' => 'Team'
	),
	'history' => array(
		'title' => 'History / '.$basetitle,
		'content' => 'history.php',
		'name' => 'History'
	),
);
$error404 = array(
	'title' => '404 Not Found',
	'content' => '404.php'
);
if (! isset($_GET['page']) || $_GET['page'] == '')
{
	$d = $routes['home'];
}
else
{
	$page = $_GET['page'];
	//get rid of slashes
	if (substr($page,0,1) == '/') $page = substr($page,1);
	if (substr($page,strlen($page)-1) == '/') $page = substr($page,0,strlen($page)-1);
	//explode section/page
	$parts = explode('/',$page);
	$sectionName = $parts[0];
	$subSectionName = $parts[1];
	if (isset($parts[1])) $page = $parts[1];
	else $page = "";
	
	//if its in a section
	if (isset($routes[$sectionName][$page]))
	{
		$d = $routes[$sectionName][$page];
	}
	//if its a stand-alone page
	elseif (isset($routes[$sectionName]) && $page=='')
	{
		$d = $routes[$sectionName];
	}
	//if its not a real page
	else
	{
		header("Status: 404 Not Found");
		$d = $error404;
	}
}
?>