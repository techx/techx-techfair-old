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
	'engage' => array(
		'title' => 'Student Interest Form / '.$basetitle,
		'content' => 'pages/students/interest.php',
		'show' => false
	),
	'mysqli' => array(
		'title' => 'Mysqli / '.$basetitle,
		'content' => 'pages/mysqli.php',
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
			'name' => 'Hack-a-thon',
			'process' => 'pages/events/hackathon_process.php'
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
		'exhibitorlist' => array(
		    'title' => 'Events / '.$basetitle,
		    'content' => 'pages/events/exhibitorlist.php',
		    'name' => 'List of Exhibitors'
		),
		/*
		'afterparty' => array(
			'title' => 'Afterparty / '.$basetitle,
			'content' => 'pages/events/party.php',
			'name' => 'Afterparty'
		),
		*/
	),
	//companies is a folder, has a name property
	'companies' => array(
		'name' => 'For Companies',
		//'' is the root, has same name as folder
		'' => array(
			'title' => 'For Companies / '.$basetitle,
			'content' => 'pages/companies/why.php'
		),
		'packages' => array(
			'title' => 'Sponsorship / '.$basetitle,
			'content' => 'pages/companies/packages.php',
			'name' => 'Sponsorship Packages & Registration'
		),
		//'register' => array(
		//	'title' => 'Register / '.$basetitle,
		//	'content' => 'pages/companies/register.php',
		//	'name' => 'Register'
		//),
		'portal' => array(
			'external' => 'http://www.mittechfair.org/portal/index.php',
			'name' => 'Company Portal'
		),
	),
	'students' => array(
		'name' => 'For Students',
		'' => array(
			'title' => 'For Students / '.$basetitle,
			'content' => 'pages/students/exhibit.php',
		),
		'individual' => array(
			'title' => 'Individual Students / '.$basetitle,
			'content' => 'pages/students/individuals.php',
			'name' => 'Individual Exhibitors',
			'process' => 'pages/students/individuals_process.php'
		),
		'startups' => array(
			'title' => 'Student Startups / '.$basetitle,
			'content' => 'pages/students/startups.php',
			'name' => 'Student Startups',
			'process' => 'pages/students/startups_process.php'
		),
		'resume-drop' => array(
			'external' => '/drop/',
			'name' => 'R&#233;sum&#233; Drop'
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
	'think' => array(
		'name' => '<span>THINK</span>',
		'external' => 'http://mittechfair.org/think/'
	),
	'wiki' => array(
		'name' => '<span>Wiki</span>',
		'external' => 'http://techfair.mit.edu/wiki/',
		'show' => false
	),
);
?>
