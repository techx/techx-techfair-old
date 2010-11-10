<?php
$routes = array(
	'home' => array(
		'title' => 'MIT TechFair',
		'content' => 'home.php'
		),
	'404' => array(
		'title' => 'MIT TechFair / 404 Not Found',
		'content' => '404.php'
		),
	'events' => array(
		'title' => 'MIT TechFair / Events',
		'content' => 'events/fair.php'
		),
	'events/banquet' => array(
		'title' => 'MIT TechFair / Banquet',
		'content' => 'events/banquet.php'
		),
);
if (! isset($_GET['page']) || $_GET['page'] == '')
{
	$d = $routes['home'];
}
else
{
	$page = $_GET['page'];
	if (substr($page,0,1) == '/') $page = substr($page,1);
	if (substr($page,strlen($page)-1) == '/') $page = substr($page,0,strlen($page)-1);
	if (isset($routes[$page]))
	{
		$d = $routes[$page];
	}
	else
	{
		header("Status: 404 Not Found");
		$d = $routes['404'];
	}
}
?>