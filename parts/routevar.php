<?php
$basetitle = 'MIT TechFair 2011';
$routes = array(
	'home' => array(
		'title' => $basetitle,
		'content' => 'pages/home.php',
		'name' => 'Home'
	),
	'contact' => array(
		'title' => 'Contact Us / '.$basetitle,
		'content' => 'pages/contact.php',
		//use show => false to hide from nav
		'show' => false
	),
	'events' => array(
		'name' => 'Events',
		'' => array(
			'title' => 'Events / '.$basetitle,
			'content' => 'pages/events/fair.php'
		),
		'hackathon' => array(
			'title' => 'Hack-a-thon / '.$basetitle,
			'content' => 'pages/events/hackathon.php',
			'name' => 'Hack-a-thon'
		),
		'venue' => array(
			'title' => 'The Fair / '.$basetitle,
			'content' => 'pages/events/venue.php',
			'name' => 'The Fair'
		),
		'banquet' => array(
			'title' => 'Banquet / '.$basetitle,
			'content' => 'pages/events/banquet.php',
			'name' => 'Banquet'
		),
		'afterparty' => array(
			'title' => 'Afterparty / '.$basetitle,
			'content' => 'pages/events/party.php',
			'name' => 'Afterparty'
		),
	),
	//exhibit is a folder, has a name property
	'exhibit' => array(
		'name' => 'Exhibit',
		//'' is the root, has same name as folder
		'' => array(
			'title' => 'Why TechFair / '.$basetitle,
			'content' => 'pages/exhibit/why.php'
		),
		'packages' => array(
			'title' => 'Sponsorship / '.$basetitle,
			'content' => 'pages/exhibit/packages.php',
			'name' => 'Sponsorship Packages'
		),
		'apply' => array(
			'title' => 'Apply to the Fair / '.$basetitle,
			'content' => 'pages/exhibit/apply.php',
			'name' => 'Apply to the Fair'
		),
		'portal' => array(
			'title' => 'Company Portal / '.$basetitle,
			'external' => 'http://www.mittechfair.org/portal/index.php',
			'name' => 'Company Portal'
		),
	),
	'about' => array(
		'name' => 'About Us',
		'' => array(
			'title' => 'About Us / '.$basetitle,
			'content' => 'pages/about/us.php'
		),
		'team' => array(
			'title' => 'Team / '.$basetitle,
			'content' => 'pages/about/team.php',
			'name' => 'Exec Team'
		),
		'past-sponsors' => array(
			'title' => 'Past Sponsors / '.$basetitle,
			'content' => 'pages/about/pastsponsors.php',
			'name' => 'Past Sponsors'
		),
	),
	'drop' => array(
		'external' => '/drop/',
		'name' => 'R&#233;sum&#233; Drop'
	)
);
?>