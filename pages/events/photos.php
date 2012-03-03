<script type="text/javascript" src="/js/lightbox/prototype.js"></script>
<script type="text/javascript" src="/js/lightbox/scriptaculous.js?load=effects,builder"></script>
<script type="text/javascript" src="/js/lightbox/lightbox.js"></script>

<?php
$sample = array(
  '/img/photos/1-1' => 'MIT students hard at work during the Facebook Hackathon.',
	'/img/photos/1-2' => 'Students from travelled from Brown and Harvard to MIT to participate in the Facebook Hackathon.',
  '/img/photos/1-3' => 'Halfway through a night of non-stop coding and the participants are still going strong.',
	'/img/photos/1-4' => 'The Facebook MicroKitchen was stocked with snacks and drinks.',
	'/img/photos/1-5' => 'Students creating and refining their ideas through the course of the night.',
	'/img/photos/1-6' => 'Snacks and coding all night long--what more could you want?',
	'/img/photos/1-7' => 'A particularly intent coder.',
	'/img/photos/2-1' => 'Cake.',
	'/img/photos/2-2' => 'Smule demonstrates their [].',
	'/img/photos/2-3' => 'Stark Industries, a student organization, exhibits their [].',
	'/img/photos/2-4' => 'Motion Math?',
	'/img/photos/2-5' => 'The MIT Hobby Shop exhibits various student projects.',
	'/img/photos/2-6' => '.',
	'/img/photos/2-7' => 'Bose exhibits their [].',
	'/img/photos/2-8' => 'The MIT Solar Vehicle team designs a solar vehicle [each year] for a race in Australia.',
	'/img/photos/2-9' => 'A student-built automated cycle.',
	'/img/photos/2-10' => 'General Electric displaying wind turbines.',
	'/img/photos/2-11' => 'Musical Fabrics?.',
	'/img/photos/2-12' => 'Life-size tetris played on a DDR board.',
	'/img/photos/2-13' => 'The Facebook coffee station.',
	'/img/photos/2-14' => 'MIT Electronic Research Society (MITERS) with a variety of projects.',
	'/img/photos/2-15' => '.',
	'/img/photos/2-16' => 'A minature Tesla coil plays the theme song to [].',
	'/img/photos/2-17' => 'Adobe demonstrates their newest products.',
	'/img/photos/2-19' => '.',
	'/img/photos/2-20' => 'Locu, an MIT sponsored startup.',
	'/img/photos/2-21' => 'Helmet Hub displays the bicycle-helmet dispenser system.',
	'/img/photos/2-22' => 'Lincoln Lab.',
	'/img/photos/2-23' => 'WiiBook, an MIT project where a Nintendo Wii has been made portable.',
	'/img/photos/2-24' => 'Students and exhibits on fair day.',
	'/img/photos/2-25' => '.',
	'/img/photos/2-26' => '??.',
	'/img/photos/2-27' => 'Autodesk displays their tablet technology.',
	'/img/photos/2-28' => 'The fair in full swing.',
	'/img/photos/2-29' => 'Under Armour with a variety of sporting gear and clothing.',
	'/img/photos/2-30' => 'Corning .',
	'/img/photos/2-31' => 'The MIT Electronic Research Society hard at work during the fair.',
	'/img/photos/2-32' => 'Students test out the Human Tetris exhibit.',
	'/img/photos/2-33' => 'Microsoft demos their new [tablet].',
	'/img/photos/2-34' => 'Knome.',
	'/img/photos/2-35' => 'VM Ware.',
	'/img/photos/2-36' => 'Sandia National Laboratories.',
	'/img/photos/2-37' => 'Oracle.',
	'/img/photos/2-38' => '??.',
	'/img/photos/2-39' => 'A student-built model plane is displayed.',
	'/img/photos/3-1' => 'Students in line for the TechFair Afterparty.',
	'/img/photos/3-2' => 'Glowstick wristbands and flashing lights.',
	'/img/photos/3-3' => 'The MIT Media Lab Skylounge offers the partygoers a panoramic view of Boston.',
	'/img/photos/3-4' => 'Students enjoying the Microsoft Kinect.',
	'/img/photos/3-5' => 'The Boston skyline.',
	'/img/photos/3-6' => '.',
	'/img/photos/3-7' => 'Students come from the Techfair banquet to the Afterparty.',
	'/img/photos/4-1' => 'Ed Boyden, an MIT professor, gives a Talk on engineering the brain.',
	'/img/photos/4-2' => 'Brian Kalma, former director of user experience at Zappos.com speaking on technology and ecommerce.',
	'/img/photos/4-3' => 'Kwindla Kramer, CEO of Oblog Industries, speaking on multi-user interfaces.',
	'/img/photos/4-4' => 'Audience questions were entertained after each talk.',
);
?>

<h1>Techfair 2012 Photos</h1>
<p>Below you'll find just an excerpt of all the great photos from Techfair 2012. We had a blast - see you at Techfair 2013!</p>
<?php
foreach($sample as $filename=>$caption) {
    echo '<a href="',$filename.jpg,'" rel="lightbox[tf]" title="',$caption,'"><img src="',$filename-thumb.jpg,'" style="padding-left: 2px; padding-right: 2px;"></a>';
}
?>
