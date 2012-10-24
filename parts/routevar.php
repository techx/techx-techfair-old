<?php
$basetitle = 'MIT Techfair 2012';
$routes = array(
	'home' => array(
		'title' => $basetitle,
		'content' => 'pages/home.php',
		'name' => 'Home'
	),
	'b' => array(
	   'title' => 'Banquet View',
	   'content' => 'pages/banquetview.php',
	   'show' => false
	),
	'rsvps' => array(
	   'title' => 'Banquet RSVPs',
	   'content' => 'pages/rsvps.php',
	   'show' => false
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
		'photos' => array(
		    'title' => '2012 Photos / '.$basetitle,
		    'content' => 'pages/events/photos.php',
		    'name' => '2012 Photos'
		),
		'' => array(
			'title' => 'Events / '.$basetitle,
			'content' => 'pages/events/schedule.php'
		),
		'hackathon' => array(
			'title' => 'Hackathon / '.$basetitle,
			'content' => 'pages/events/hackathon.php',
			'name' => 'Hackathon',
			'process' => 'pages/events/hackathon_process.php'
		),
		'fair' => array(
			'title' => 'The Fair / '.$basetitle,
			'content' => 'pages/events/fair.php',
			'name' => 'The Fair'
		),
		'talks' => array(
		    'title' => 'Techtalks / '.$basetitle,
		    'content' => 'pages/events/talks.php',
		    'name' => 'Techtalks'
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
		'exhibitorlist' => array(
		    'title' => 'Exhibitors / '.$basetitle,
		    'content' => 'pages/companies/exhibitorlist.php',
		    'name' => '2012 List of Exhibitors'
		),
		'packages' => array(
			'title' => 'Sponsorship / '.$basetitle,
			'content' => 'pages/companies/packages.php',
			'name' => '2013 Sponsorship Packages'
		),
		'past-sponsors' => array(
			'title' => 'Past Sponsors / '.$basetitle,
			'content' => 'pages/about/pastsponsors.php',
			'name' => 'Past Sponsors'
		),
		'demos' => array(
			'title' => 'Demos / '.$basetitle,
			'content' => 'pages/companies/demos.php',
			'name' => 'Demos'
		),
		//'register' => array(
		//	'title' => 'Register / '.$basetitle,
		//	'content' => 'pages/companies/register.php',
		//	'name' => 'Register'
		//),
	),
	'students' => array(
		'name' => 'For Students',
		'' => array(
			'title' => 'For Students / '.$basetitle,
			'content' => 'pages/students/forstudents.php',
		),
		/*'resume' => array(
		  'external' => 'http://umeqo.com/events/35/techfair-2012/?drop=true',
			'name' => '2012 Resume Drop'
		),*/
		'exhibitors' => array(
			'external' => '/companies/exhibitorlist/',
			'name' => '2012 List of Exhibitors'
		),
		'startups' => array(
			'external' => '/mitstartups',
			'name' => 'Student Startups FAQ'
		),
  	'projects' => array(
  		'external' => '/getabooth',
  		'name' => 'Student Projects FAQ'
  	),

		'funding' => array(
			'content' => 'pages/students/funding.php',
			'name' => '2013 Project Funding'
		),


/*
		'resume-drop' => array(
			'external' => '/drop/',
			'name' => 'R&#233;sum&#233; Drop'
		),*/
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
	),
	'think' => array(
		'name' => '<span>THINK</span>',
		'external' => 'http://mitthink.mit.edu/'
	),
	'wiki' => array(
		'name' => '<span>Wiki</span>',
		'external' => 'http://techfair.mit.edu/wiki/',
		'show' => false
	),
	'individual' => array(
		'title' => 'Individual Students / '.$basetitle,
		'content' => 'pages/students/individuals.php',
		'process' => 'pages/students/individuals_process.php',
		'show' => false
	),
	'mitstartups' => array(
		'title' => 'Student Startups / '.$basetitle,
		'content' => 'pages/students/startups.php',
		'process' => 'pages/students/startups_process.php',
		'show' => false
	),
	'midway' => array(
		'title' => 'Midway / '.$basetitle,
		'content' => 'pages/students/midway.php',
		'process' => 'pages/students/midway_process.php',
		'show' => false
	),
	'join' => array(
		'title' => 'Join us / '.$basetitle,
		'content' => 'join/midway.php',
		'name' => 'Join us',
		'process' => 'pages/midway_process.php',
		'show' => false
	),
	'finance' => array(
		'title' => 'Finance / '.$basetitle,
		'content' => 'finance/index.php',
		'name' => 'TF Finance',
		'show' => false
	),

	'2011checklist' => array(
		'title' => '2011 Student Checklist / '.$basetitle,
		'content' => 'pages/2011checklist.php',
		'name' => 'Checklist',
		'show'=>'false'
	),
	'drop' => array(
    'external' => 'http://umeqo.com/events/35/techfair-2012/?drop=true',
		'name' => 'Resume',
		'show' => false
	),
	'finaldisplayform' => array(
			'external' => 'http://docs.google.com/spreadsheet/viewform?hl=en_US&formkey=dEJ0SXlPbnpSS1hjWjA1SWUyYTZLMVE6MQ#gid=0',
			'name'=>'Final Display',
			'show'=>false
	),
);
?>
