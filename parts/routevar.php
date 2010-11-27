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
			'content' => 'pages/events/fair.php',
		),
		'hackathon' => array(
			'title' => 'Hack-a-thon / '.$basetitle,
			'content' => 'pages/events/hackathon.php',
			'name' => '<img src="/img/fb.png" alt="fb" style="vertical-align:top"/>&nbsp;<span>Hack-a-thon</span>'
		),
		'banquet' => array(
			'title' => 'Banquet / '.$basetitle,
			'content' => 'pages/events/banquet.php',
			'name' => 'Banquet'
		),
		'afterparty' => array(
			'title' => 'Afterparty / '.$basetitle,
			'content' => 'pages/events/party.php',
			'name' => '<img src="/img/db.png" alt="db" style="vertical-align:top"/>&nbsp;<span>Afterparty</span>'
		),
		'venue' => array(
			'title' => 'Venue / '.$basetitle,
			'content' => 'pages/events/venue.php',
			'name' => 'Venue'
		),
	),
	//exhibit is a folder, has a name property
	'exhibit' => array(
		'name' => 'Exhibit',
		//'' is the root, has same name as folder
		'' => array(
			'title' => 'Why TechFair / '.$basetitle,
			'content' => 'pages/exhibit/why.php',
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
	'drop' => array(
		'external' => '/drop/',
		'name' => 'R&#233;sum&#233; Drop',
	),
	'team' => array(
		'title' => 'Team / '.$basetitle,
		'content' => 'pages/team.php',
		'name' => 'Team'
	),
	'history' => array(
		'title' => 'History / '.$basetitle,
		'content' => 'pages/history.php',
		'name' => 'History'
	),
);
?>