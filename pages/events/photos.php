<script type="text/javascript" src="/js/lightbox/prototype.js"></script>
<script type="text/javascript" src="/js/lightbox/scriptaculous.js?load=effects,builder"></script>
<script type="text/javascript" src="/js/lightbox/lightbox.js"></script>

<?php
$sample = array(
    '/img/photos/1-1.jpg' => 'MIT students hard at work during the Facebook Hackathon.',
	'/img/photos/1-2.jpg' => 'Students from travelled from Brown and Harvard to MIT to participate in the Facebook Hackathon.',
    '/img/photos/1-3.jpg' => 'Halfway through a night of non-stop coding and the participants are still going strong.',
	'/img/photos/1-4.jpg' => 'The Facebook MicroKitchen was stocked with snacks and drinks.',
	'/img/photos/1-5.jpg' => 'Students creating and refining their ideas through the course of the night.',
	'/img/photos/1-6.jpg' => 'Snacks and coding all night long--what more could you want?',
	'/img/photos/1-7.jpg' => 'A particularly intent coder.',
	'/img/photos/2-1.jpg' => 'Cake.',
	'/img/photos/2-2.jpg' => 'Smule demonstrates their [].',
	'/img/photos/2-3.jpg' => 'Stark Industries, a student organization, exhibits their [].',
	'/img/photos/2-4.jpg' => 'Motion Math?',
	'/img/photos/2-5.jpg' => 'The MIT Hobby Shop exhibits various student projects.',
	'/img/photos/2-6.jpg' => '.',
	'/img/photos/2-7.jpg' => 'Bose exhibits their [].',
	'/img/photos/2-8.jpg' => 'The MIT Solar Vehicle team designs a solar vehicle [each year] for a race in Australia.',
	'/img/photos/2-9.jpg' => 'A student-built automated cycle.',
	'/img/photos/2-10.jpg' => 'General Electric displaying wind turbines.',
	'/img/photos/2-11.jpg' => 'Musical Fabrics?.',
	'/img/photos/2-12.jpg' => 'Life-size tetris played on a DDR board.',
	'/img/photos/2-13.jpg' => 'The Facebook coffee station.',
	'/img/photos/2-14.jpg' => 'MIT Electronic Research Society (MITERS) with a variety of projects.',
	'/img/photos/2-15.jpg' => '.',
	'/img/photos/2-16.jpg' => 'A minature Tesla coil plays the theme song to [].',
	'/img/photos/2-17.jpg' => 'Adobe demonstrates their newest products.',
	'/img/photos/2-19.jpg' => '.',
	'/img/photos/2-20.jpg' => 'Locu, an MIT sponsored startup.',
	'/img/photos/2-21.jpg' => 'Helmet Hub displays the bicycle-helmet dispenser system.',
	'/img/photos/2-22.jpg' => 'Lincoln Lab.',
	'/img/photos/2-23.jpg' => 'WiiBook, an MIT project where a Nintendo Wii has been made portable.',
	'/img/photos/2-24.jpg' => 'Students and exhibits on fair day.',
	'/img/photos/2-25.jpg' => '.',
	'/img/photos/2-26.jpg' => '??.',
	'/img/photos/2-27.jpg' => 'Autodesk displays their tablet technology.',
	'/img/photos/2-28.jpg' => 'The fair in full swing.',
	'/img/photos/2-29.jpg' => 'Under Armour with a variety of sporting gear and clothing.',
	'/img/photos/2-30.jpg' => 'Corning .',
	'/img/photos/2-31.jpg' => 'The MIT Electronic Research Society hard at work during the fair.',
	'/img/photos/2-32.jpg' => 'Students test out the Human Tetris exhibit.',
	'/img/photos/2-33.jpg' => 'Microsoft demos their new [tablet].',
	'/img/photos/2-34.jpg' => 'Knome.',
	'/img/photos/2-35.jpg' => 'VM Ware.',
	'/img/photos/2-36.jpg' => 'Sandia National Laboratories.',
	'/img/photos/2-37.jpg' => 'Oracle.',
	'/img/photos/2-38.jpg' => '??.',
	'/img/photos/2-39.jpg' => 'A student-built model plane is displayed.',
	'/img/photos/3-1.jpg' => 'Students in line for the TechFair Afterparty.',
	'/img/photos/3-2.jpg' => 'Glowstick wristbands and flashing lights.',
	'/img/photos/3-3.jpg' => 'The MIT Media Lab Skylounge offers the partygoers a panoramic view of Boston.',
	'/img/photos/3-4.jpg' => 'Students enjoying the Microsoft Kinect.',
	'/img/photos/3-5.jpg' => 'The Boston skyline.',
	'/img/photos/3-6.jpg' => '.',
	'/img/photos/3-7.jpg' => 'Students come from the Techfair banquet to the Afterparty.',
	'/img/photos/4-1.jpg' => 'Ed Boyden, an MIT professor, gives a Talk on engineering the brain.',
	'/img/photos/4-2.jpg' => 'Brian Kalma, former director of user experience at Zappos.com speaking on technology and ecommerce.',
	'/img/photos/4-3.jpg' => 'Kwindla Kramer, CEO of Oblog Industries, speaking on multi-user interfaces.',
	'/img/photos/4-4.jpg' => 'Audience questions were entertained after each talk.',
);
foreach($sample as $filename=>$caption) {
    echo '<a href="',$filename,'" rel="lightbox" title="',$caption,'"><img src="',$filename,'" style="height: 100px; width: 150px;"></a>';
}
?>

<h1>Techfair 2012 Photos</h1>
