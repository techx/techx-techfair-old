<?php
//separate the $route variable into its own file so resume drop can access it
require('routevar.php');
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
	if (isset($parts[1])) $subSectionName = $parts[1];
	else $subSectionName = "";
	
	//if its in a section
	if (isset($routes[$sectionName][$subSectionName]))
	{
		$d = $routes[$sectionName][$subSectionName];
	}
	//if its a stand-alone page
	elseif (isset($routes[$sectionName]) && $subSectionName=='')
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