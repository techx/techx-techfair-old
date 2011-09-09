<?php
error_reporting(E_ALL ^ E_NOTICE);
//custom replacement for routing:
$sectionName = 'students';
$subSectionName = 'join';

$d = array(
	'title' => 'Join TechFair / '.$basetitle,
	'content' => '../join/join.php',
	'name' => 'Join TechFair',
);


if(isset($_POST['action']))
{
	require('join_action.php');
}

require('../parts/routevar.php');
//elements in <head>
require('../parts/head.php');
//header of site, top banner and nav
require('../parts/header.php');
//footer of site
require('../parts/footer.php');

//pick the right template
require('../parts/templates/default.php');
?>