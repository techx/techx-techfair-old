<?php
//separate the $route variable into its own file so resume drop can access it
require('routevar.php');
$error404 = array(
	'title' => '404 Not Found',
	'content' => 'pages/404.php'
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
	
	/*
	 * SHORTCUTS
	 */	
	if ($sectionName=='av') {
		$redirect = true;
		header('Location: http://studentlife.mit.edu/sites/default/files/MITAV~2011~Dec2010PriceList_0.pdf');
	} elseif ($sectionName=='exhibitors') {
		$redirect = true;
		header('Location: /companies/exhibitorlist/');
	} elseif ($sectionName=='resume') {
		$redirect = true;
		header('Location: /drop/');
	} elseif ($sectionName=='hack') {
		$redirect = true;
		header('Location: /events/hackathon/');
	} elseif ($sectionName=='signmeup') {
		$redirect = true;
		header('Location: https://spreadsheets.google.com/viewform?formkey=dFRaLXB4dzdjNGxNUElDbkJLMU1EU1E6MQ');
	} elseif ($sectionName=='workflowy') {
		$redirect = true;
		header('Location: http://workflowy.com/shared/761e8590-0ab1-3df1-fde1-d439aa975fa6/');
	} elseif ($sectionName=='getabooth') {
		$redirect = true;
		header('Location: /individual/');
	} elseif ($sectionName=='mitprojects') {
		$redirect = true;
		header('Location: /individual/');
	} elseif ($sectionName=='mitstartup' || $sectionName=='startups') {
		$redirect = true;
		header('Location: /mitstartups/');
	} elseif ($sectionName=='drop') {
		$redirect = true;
		header('Location: http://umeqo.com/techfair');
	} elseif ($sectionName=='think') {
		$redirect = true;
		header('Location: http://mitthink.mit.edu');
	} else {
		$redirect = false;
	}
	
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
	elseif ($redirect==false)
	{
		//header("Status: 404 Not Found");
		$d = $error404;
	}
}
?>
