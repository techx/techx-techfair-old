<?php
error_reporting(E_ALL ^ E_NOTICE);
//relationships between URLs and files
require('parts/routing.php');
//elements in <head>
require('parts/head.php');
//header of site, top banner and nav
require('parts/header.php');
//footer of site
require('parts/footer.php');

//pick the right template
if ($sectionName=='') {
	require('templates/home.php');
} else {
	require('templates/default.php');
}
?>