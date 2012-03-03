<script type="text/javascript" src="/js/lightbox/prototype.js"></script>
<script type="text/javascript" src="/js/lightbox/scriptaculous.js?load=effects,builder"></script>
<script type="text/javascript" src="/js/lightbox/lightbox.js"></script>

<?php
$sample = array(
    '/img/photos/1-1' => 'MIT students hard at work during the Facebook Hackathon.',
	'/img/photos/1-2' => 'Students from travelled from Brown and Harvard to MIT to participate in the Facebook Hackathon.',
    '/img/photos/1-3' => 'Halfway through a night of non-stop coding and the participants are still going strong.',
	'/img/photos/1-4' => 'The Facebook MicroKitchen provided requisite energy drinks and snacks.',
	'/img/photos/1-5' => 'Students creating and refining their ideas through the course of the night.',
	'/img/photos/1-6' => 'The coders worked in teams.',
	'/img/photos/1-7' => 'Snacks and coding all night long--what more could you want?.',
	'/img/photos/2-1' => 'What better way to celebrate Fair day than with cake?',
	'/img/photos/2-2' => 'Students enjoyed Smule\'s fantastic <a href=glee.smule.com>Glee Karaoke System</a>.',
	'/img/photos/2-3' => 'Stark Industries, a student organization, demos their high-tech prostheses along with the Iron Man exoskeleton and ARC reactor.',
	'/img/photos/2-4' => 'Nest demos their iPad-controllable thermostat.',
	'/img/photos/2-5' => 'The MIT Hobby Shop exhibits various student projects.',
	'/img/photos/2-6' => 'Students take a brief break from the rush of activities.',
	'/img/photos/2-7' => 'Bose exhibits their Energy Efficient Series.',
	'/img/photos/2-8' => 'The MIT Solar Vehicle team designs a solar vehicle [each year] for a race in Australia.',
	'/img/photos/2-9' => 'A student-built automated unicycle.',
	'/img/photos/2-10' => 'General Electric displaying energy-efficient wind turbines.',
	'/img/photos/2-11' => 'Candace Chen, \'14, shows off her handmade electric instrument creations.',
	'/img/photos/2-12' => 'Life-size tetris played on a DDR board.',
	'/img/photos/2-13' => 'The Facebook coffee station.',
	'/img/photos/2-14' => 'MIT Electronic Research Society (MITERS) displayed a variety of student projects.',
	'/img/photos/2-15' => '',
	'/img/photos/2-16' => 'A minature Tesla coil programmed to play music.',
	'/img/photos/2-17' => 'Adobe demonstrates their newest products.',
	'/img/photos/2-19' => 'Students bring their own projects and constructions to TechFair.',
	'/img/photos/2-20' => 'Locu, an MIT sponsored startup.',
	'/img/photos/2-21' => 'Helmet Hub displays the bicycle-helmet dispenser system.',
	'/img/photos/2-22' => 'The Lincoln Laboratory of MIT works on research and development for national security.',
	'/img/photos/2-23' => 'WiiBook, an MIT project where a Nintendo Wii has been made portable.',
	'/img/photos/2-24' => 'Students and exhibits on fair day.',
	'/img/photos/2-25' => 'Microsoft demos the as yet-unreleased version of Windows 8.',
	'/img/photos/2-26' => 'The General Electric representatives talking to students.',
	'/img/photos/2-27' => 'Autodesk displays their newest tablet technology.',
	'/img/photos/2-28' => 'The fair in full swing as students explore, experiment and experience each exhibit.',
	'/img/photos/2-29' => 'Under Armour with a variety of sporting gear and clothing.',
	'/img/photos/2-30' => 'Corning shows off their newest smartphone display technology.',
	'/img/photos/2-31' => 'The MIT Electronic Research Society hard at work during the fair.',
	'/img/photos/2-32' => 'Students test out the Human Tetris exhibit.',
	'/img/photos/2-33' => 'Microsoft demos their new tablet technologies.',
	'/img/photos/2-34' => 'Knome demos their multi-genome comparative analysis system.',
	'/img/photos/2-35' => 'VMWare displays their virtual machines to eager students.',
	'/img/photos/2-36' => 'Sandia National Laboratories shows off their latest projects.',
	'/img/photos/2-37' => 'Oracle exhibits their newest computer system.',
	'/img/photos/2-38' => 'MIT students prove that innovative and fun go hand in hand.',
	'/img/photos/2-39' => 'A student-built model plane is displayed.',
	'/img/photos/3-1' => 'Students in line for the TechFair Afterparty.',
	'/img/photos/3-2' => 'Glowstick wristbands and flashing lights.',
	'/img/photos/3-3' => 'The MIT Media Lab Skylounge offers the partygoers a panoramic view of Boston.',
	'/img/photos/3-4' => 'Students enjoying the Microsoft Kinect.',
	'/img/photos/3-5' => 'The Boston skyline, as seen from inside the MIT Media Lab during the Techfair Afterparty.',
	'/img/photos/3-6' => 'The TechFair Afterparty in full swing, complete with dancing, food, and music.',
	'/img/photos/3-7' => 'Students coming straight from the Techfair banquet (as well as all over MIT) to the Afterparty.',
	'/img/photos/4-1' => 'Ed Boyden, an MIT professor, gives a talk on engineering the brain.',
	'/img/photos/4-2' => 'Brian Kalma, former director of user experience at Zappos.com speaking on technology and ecommerce.',
	'/img/photos/4-3' => 'Kwindla Kramer, CEO of Oblog Industries, speaking on multi-user interfaces.',
	'/img/photos/4-4' => 'Audience questions were entertained after each talk.',
);
?>

<h1>Techfair 2012 Photos</h1>
<p>Below you'll find just an excerpt of all the great photos from Techfair 2012. We had a blast - see you at Techfair 2013!</p>
<?php
foreach($sample as $filename=>$caption) {
    echo '<a href="'.$filename.'.jpg" rel="lightbox[tf]" title="'.$caption.'"><img src="'.$filename.'-thumb.jpg" style="padding-left: 2px; padding-right: 2px;"></a>';
}
?>
