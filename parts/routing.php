<?php
$basetitle = 'MIT TechFair';
$routes = array(
	'home' => array(
		'title' => $basetitle,
		'content' => 'home.php',
		'name' => 'Home'
	),
	'contact' => array(
		'title' => $basetitle.' / Contact Us',
		'content' => 'contact.php',
		//use show => false to hide from nav
		'show' => false
	),
	'history' => array(
		'title' => $basetitle.' / History',
		'content' => 'history.php',
		'name' => 'History'
	),
	'team' => array(
		'title' => $basetitle.' / Team',
		'content' => 'team.php',
		'name' => 'Team'
	),
	'events' => array(
		'name' => 'Events',
		'' => array(
			'title' => $basetitle.' / Events',
			'content' => 'events/fair.php',
		),
		'venue' => array(
			'title' => $basetitle.' / Venue',
			'content' => 'events/venue.php',
			'name' => 'Venue'
		),
		'banquet' => array(
			'title' => $basetitle.' / Banquet',
			'content' => 'events/banquet.php',
			'name' => 'Banquet'
		),
	),
	//exhibit is a folder, has a name property
	'exhibit' => array(
		'name' => 'Exhibit',
		//'' is the root, has same name as folder
		'' => array(
			'title' => $basetitle.' / Why TechFair',
			'content' => 'exhibit/why.php',
		),
		'packages' => array(
			'title' => $basetitle.' / Sponsorship Packages',
			'content' => 'exhibit/packages.php',
			'name' => 'Sponsorship Packages'
		),
		'apply' => array(
			'title' => $basetitle.' / Apply to the Fair',
			'content' => 'exhibit/apply.php',
			'name' => 'Apply to the Fair'
		),
		'portal' => array(
			'title' => $basetitle.' / Company Portal',
			'external' => 'http://www.mittechfair.org/portal/index.php',
			'name' => 'Company Portal'
		),
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