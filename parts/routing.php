<?php
$basetitle = 'MIT TechFair';
$routes = array(
	'home' => array(
		'title' => $basetitle,
		'content' => 'home.php',
		'name' => 'Home'
		),
	'events' => array(
		'name' => 'Events',
		'' => array(
			'title' => $basetitle.' / Events',
			'content' => 'events/fair.php',
			'name' => 'Events'
		),
		'banquet' => array(
			'title' => $basetitle.' / Banquet',
			'content' => 'events/banquet.php',
			'name' => 'Banquet'
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
	
	if (isset($routes[$sectionName][$page]))
	{
		$d = $routes[$sectionName][$page];
	}
	else
	{
		header("Status: 404 Not Found");
		$d = $error404;
	}
}
?>