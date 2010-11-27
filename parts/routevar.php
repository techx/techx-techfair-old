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
		'venue' => array(
			'title' => 'The Fair / '.$basetitle,
			'content' => 'pages/events/venue.php',
			'name' => '<img src="/img/mit.png" alt="mit" style="vertical-align:top"/>&nbsp;The Fair'
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
		'history' => array(
			'title' => 'History / '.$basetitle,
			'content' => 'pages/about/history.php',
			'name' => 'History'
		),
	),
	'drop' => array(
		'external' => '/drop/',
		'name' => 'R&#233;sum&#233; Drop'
	)
);
?>