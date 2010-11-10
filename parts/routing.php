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
);
if (! isset($_GET['page'])) $d = $routes['home'];
else if (isset($page[$_GET['page']])) $d = $routes[$_GET['page']];
else
{
	header("HTTP/1.0 404 Not Found");
	$d = $routes['404'];
}
?>