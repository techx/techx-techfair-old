<?php 
function natksort($array) 
{ 
    $original_keys_arr = array(); 
    $original_values_arr = array(); 
    $clean_keys_arr = array(); 

    $i = 0; 
    foreach ($array AS $key => $value) 
    { 
        $original_keys_arr[$i] = $key; 
        $original_values_arr[$i] = $value; 
        $clean_keys_arr[$i] = strtr($key, "ÄÖÜäöüÉÈÀËëéèàç", "AOUaouEEAEeeeac"); 
        $i++; 
    } 

    natcasesort($clean_keys_arr); 

    $result_arr = array(); 

    foreach ($clean_keys_arr AS $key => $value) 
    { 
        $original_key = $original_keys_arr[$key]; 
        $original_value = $original_values_arr[$key]; 
        $result_arr[$original_key] = $original_value; 
    } 

    return $result_arr; 
} 
?>

<?php
function populateSponsorTable($sponsorList){

	$sponsorList = natksort($sponsorList);
	for($i=0; $i<sizeof($sponsorList)%3; $i++){
		array_push($sponsorList, 'null');
	}

	$count = 1;
	if($count%3==0){
		echo "<tr>";
	}
	foreach($sponsorList as $key => $value){
		if($value != 'null'){
			echo "<td><a href=".$value.">".$key."</a></td>";
		}else{
			echo "<td></td>";
		}
		if($count%3==0){
			echo "</tr>";
			echo "<tr>";
		}
		$count++;
	}
	if(($count-1)%3!=0){
		echo "</tr>";
	}
}

?>

<div class="column-top">
<h1>2013 List of Exhibitors</h1>
<p>With over 60 companies and 30 student exhibitors, Techfair 2013 has a full
house. While we physically can't fit any more booths, we're always pushing for
the best displays that companies can manage. Come check us out; we think you'll
like it.</p>
<div class="column-left">
	<h2>Platinum Sponsor</h2>
	<div class="sponsor-logos">
	    <a href="http://www.palantir.com/"><img title="Palantir" alt="Palantir" src="/img/logos/palantir_larger.png" /></a>
	    <p class="sponsorship-title"><a href="/events/hackathon/">Hackathon Sponsor</a></p>
	</div>
	<h2>Gold Sponsors</h2>
	<div class="gold-logos sponsor-logos full-width">
		<div class="column-left-half">
	   	 	<a class="sponsor-dropbox" href="http://www.dropbox.com/"><img title="Dropbox" alt="Dropbox" src="/img/logos/0Dropbox.png" /></a><br />
	   	 	<a class="sponsor-facebook" href="http://www.facebook.com/"><img title="Facebook" alt="Facebook" src="/img/logos/0Facebook.jpeg" /></a><br />		    
		    <a class="sponsor-microsoft" href="http://www.microsoft.com/"><img title="Microsoft" alt="Microsoft" src="/img/logos/0Microsoft.jpeg" /></a>
        <p class="sponsorship-title"><a href="/events/afterparty">Afterparty Sponsor</a></p>
		    <a class="sponsor-novus" href="http://www.novus.com/"><img title="Novus Partners" alt="Novus Partners" src="/img/logos/0Novus.png" /></a>
		</div>
		<div class="column-right-half">
			  <a class="sponsor-oracle" href="http://www.oracle.com/"><img title="Oracle" alt="Oracle" src="/img/logos/0Oracle.png" /></a><br />
		    <a class="sponsor-slb" href="http://www.slb.com/"><img title="Schlumberger" alt="Schlumberger" src="/img/logos/0Schlumberger.png" /></a><br />
		    <a class="sponsor-sequoia" href="http://www.sequoiacap.com/"><img title="Sequoia" alt="Sequoia" src="/img/logos/0Sequoia.jpeg" /></a><br />
	    	<a class="sponsor-yahoo" href="http://www.yahoo.com/"><img title="Yahoo" alt="Yahoo" src="/img/logos/0Yahoo.png" /></a><br />
		</div>
		<div class="column-bottom"></div>
	</div>
	<h2>Silver Sponsors</h2>
	<table class="sponsor-table">
		<?php
			//Add Silver sponsors & their websites to this list. They DON'T have to be in alphabetical order; the function will sort them.
			$silver = array(
				'DE Shaw Research'					=> 'http://www.deshawresearch.com/',
				'Uber' 								=> 'https://www.uber.com/',
				'General Electric' 					=> 'http://ge.com/',
				'State Farm' 						=> 'http://www.statefarm.com/',
				'Twilio' 							=> 'http://www.twilio.com/',
				'Intuit' 							=> 'http://www.intuit.com/',
				'Corning' 							=> 'http://www.corning.com/',
				'Venmo' 							=> 'http://venmo.com/',
				'Apple'								=> 'http://apple.com/',
				'HGST' 								=> 'http://hgst.com/',
				'Square'	 						=> 'http://square.com/',
				'Meraki'      						=> 'http://www.meraki.com/',
				'Jane Street' 						=> 'http://www.janestreet.com/'
			);
			
			populateSponsorTable($silver);
			
		?>
	</table>
	<h2>Bronze Sponsors</h2>
	<table class="sponsor-table">
		<?php
			//Add Bronze sponsors & their websites to this list. They DON'T have to be in alphabetical order; the function will sort them.
			$bronze = array(
				'Potion Design' 					=> 'http://www.potiondesign.com/',
				'Twitter' 							=> 'http://www.twitter.com/',
				'CIA' 								=> 'http://www.cia.gov/',
				'Counsyl'							=> 'http://www.counsyl.com/',
				'Google'			 				=> 'http://www.google.com/',
				'MIT Lincoln Laboratory' 			=> 'http://www.ll.mit.edu/',
				'Bloomberg' 						=> 'http://bloomberg.com/',
				'eBay' 								=> 'http://www.ebay.com/',
				'Netsuite'	 						=> 'http://www.netsuite.com/',
				'Synaptics' 						=> 'http://www.synaptics.com/',
				'VMWare' 							=> 'http://www.vmware.com/',
				'Cisco' 							=> 'http://www.cisco.com/',
				'Kayak' 							=> 'http://www.kayak.com/',
				'imo.im' 							=> 'http://www.imo.im/',
				'Maxim Integrated Products'			=> 'http://www.maxim-ic.com/',
				'Memsql'							=> 'http://www.memsql.com/',
				'AppDirect' 						=> 'http://www.appdirect.com/',
				'Codecademy' 						=> 'http://www.codecademy.com',
				'EditShare' 						=> 'http://www.editshare.com',
				'Mathworks' 						=> 'http://www.mathworks.com/',
				'SanDisk'				 			=> 'http://www.sandisk.com/',
        		'AppNexus'					        => 'http://www.appnexus.com/',
				'Bose' 								=> 'http://www.bose.com/',
				'Sifteo' 							=> 'http://www.sifteo.com/',
				'TI'				 				=> 'http://www.ti.com/',
				'Aurora Flight Sciences' 			=> 'http://www.aurora.aero/',
				'Digital Science' 					=> 'http://www.labtiva.com/',
				'Fitbit' 							=> 'http://www.fitbit.com/',
				'Medtronic' 						=> 'http://www.medtronic.com/',
				'Akamai' 							=> 'http://www.akamai.com/',
				'Hulu' 								=> 'http://www.hulu.com/',
				'Jaybridge' 						=> 'http://www.jaybridge.com/',
				'Mozilla'							=> 'http://mozilla.org/',
				'Boston Power' 						=> 'http://www.boston-power.com/',
				'Sandia National Laboratories' 		=> 'http://www.sandia.gov/',
				'B Line'					 		=> 'http://www.blinemedical.com/',
				'Knewton'					 		=> 'http://www.knewton.com/'
			);
			
			populateSponsorTable($bronze);
		?>
		  
  </table>
	<div class="full-width" style="display:block; height: 200px;">
	  <div class="column-left-half">
			<h2>Startup Sponsors</h2>
			<ul class="startup-sponsors">
			  <li><a href="http://formlabs.com/">Formlabs</a></li>
			  <li><a href="http://nest.com/">Nest</a></li>
			  <li><a href="http://peddl.com/">Peddl</a></li>
			  <li><a href="http://www.restdevices.com/">Rest Devices</a></li>
			  <li><a href="http://www.unmannedinnovation.com/">Unmanned Innovation</a></li>
			</ul>
		</div>

  </div>
  <!--<div style="display: block;">
  <p><img src="/img/miticon.png"> Founded by MIT Alumni or Professors</p>
  </div>-->
</div>
<div class="column-right" id="sr-descriptions">
<h2>Student Groups and Projects</h2>

  <ul> 

		<li>
			Immersion
			<div class="mit-description">
				A website that turns your computer into a virtual window using google street view.
				<span class="mit-name">Hisham Bedri</span>
			</div>
		</li>

		<li>
			Motorized Orbit Wheels
			<div class="mit-description">
				Self-propelled roller blades that go sideways rather than straight
				<span class="mit-name">Jaguar Kristeller</span>
			</div>
		</li>

		<li>
			SEVT
			<div class="mit-description">
				A student-run club that designs, builds, and races solar powered vehicles in competitive international races.
				<span class="mit-name">Julia Hsu, Dillon McConnon, George Hansel</span>
			</div>
		</li>

		<li>
			Automated Network 3D Printer
			<div class="mit-description">
				Automating and networking current models of desktop 3D printers
				<span class="mit-name">Alfonso Perez, Forrest Pieper, Chris Haid, Mateo Pena-Doll</span>
			</div>
		</li>

		<li>
			Pocket Motorcycle Squad
			<div class="mit-description">
				Modified electric pocket bikes
				<span class="mit-name">Candace Chen</span>
			</div>
		</li>

		<li>
			Hybrid Regenerative Electric Bicycle
			<div class="mit-description">
				A 100% emission-free, powered bicycle with regenerative braking and pedal-to-charge
				<span class="mit-name">Ryan Fish</span>
			</div>
		</li>

		<li>
			Voyager
			<div class="mit-description">
				A website that makes planning an itinerary simple, fun and a lot more social
				<span class="mit-name">Emily Calandrelli, Luwen Huang</span>
			</div>
		</li>

		<li>
			KawaiiKart
			<div class="mit-description">	
				A novel gas-electric miniature go kart that hopes to bring the hybrid powertrain to the DIY world.
				<span class="mit-name">Sherry Wu</span>
			</div>
		</li>

		<li>
			SmartCart
			<div class="mit-description">
				An intelligent shopping cart which eliminates the current problems of shopping.
				<span class="mit-name">Keren Gu, Karen Su, Kwadwo Nyarko</span>
			</div>
		</li>

		<li>
			DigiMynd
			<div class="mit-description">
				A series of two-player cooperative and competitive games controlled by raw EEG signals.
				<span class="mit-name">Jonathan Mei, Kameron Oser</span>
			</div>
		</li>

		<li>
			The Sun v2.0
			<div class="mit-description">
				A better version of the sun that rises on command and can be custom tailored to any night-shifted MIT student's schedule
				<span class="mit-name">Micaela Wiseman, Cathy Wu</span>
			</div>
		</li>

		<li>
			Climbable Tensegrity
			<div class="mit-description">
				A tensegrity is a rigid structure constructed out of bars and cables
				<span class="mit-name">Kate Rudolph, Duncan Townsend, Lauren St. Hilaire</span>
			</div>
		</li>

		<li>	
			SnowKart
			<div class="mit-description">
				A go-kart fused with a snow-mobile powered by two brushless motors and a 40 volt lithium ion battery pack
				<span class="mit-name">Victor Rodriguez</span>
			</div>
		</li>

		<li>
			Barbot
			<div class="mit-description">
				A drink mixing machine that can build a custom mixed drink with robotic efficiency and precision
				<span class="mit-name">Skyler Adams, Ben Shaya</span>
			</div>
		</li>

		<li>
			Tara Ebsworth
			<div class="mit-description">
				Lamps inspired by Islamic screens used to create intricate patterns in the dark
				<span class="mit-name">Tara Ebsworth</span>
			</div>
		</li>

		<li>
			Project CAKE
			<div class="mit-description">
				Cabinet for Arcade and Karaoke Emulation
				<span class="mit-name">Steve Sullivan, Taylor Farnham, Brian Sennett</span>
			</div>
		</li>

		<li>
			Sir-Rolls-a-Lot 36er Mountain Bike
			<div class="mit-description">
				A hand-built and welded 36"-wheeled monster of a mountain bike
				<span class="mit-name">Luke Plummer, Ben Eck, Carlos Kubler Pietri</span>
			</div>
		</li>

		<li>
			Open KB
			<div class="mit-description">
				A device designed to trivialize getting digital input and output into a computer
				<span class="mit-name">Alex Willisson</span>
			</div>
		</li>

		<li>
			DeltaBot
			<div class="mit-description">
				An ARM based control board for 3D printers
				<span class="mit-name">Pranjal Vachaspati</span>
			</div>
		</li>

		<li>
			MIT EVT
			<div class="mit-description">
				A long range bicycle trailer system that can go from Cambridge to NYC in one single charge
				<span class="mit-name">Roberto Melendez, Victor Rodriguez, David Orozco</span>
			</div>
		</li>

		<li>
			MelonChopper
			<div class="mit-description">	
				MelonChopper is a high-powered three-wheeled ("tadpole" style) electric gokart.
				<span class="mit-name">Bayley Wang, Daniel Gonzalez</span>
			</div>
		</li>

		<li>
			Acoustic-Electric Violin
			<div class="mit-description">
				An acoustic-electric violin that is designed to glow when played in the dark.
				<span class="mit-name">Charles Hsu</span>
			</div>
		</li>

		<li>
			International Genetically Engineered Machines (iGEM)
			<div class="mit-description">
				The MIT team’s 2012 project on an RNA-based biochemical "computer" in living cells
				<span class="mit-name">Kristjan Eerik Kaseniit, Lealia Xiong</span>
			</div>
		</li>

		<li>
			Self-balancing Longboard
			<div class="mit-description">
				An electric longboard whose speed is controlled by leaning forward and backward.
				<span class="mit-name">Andrew Mikofalvy</span>
			</div>
		</li>

		<li>
			Tesla Coil
			<div class="mit-description">
				Tesla coil demonstrations including a MIDI-controlled singing Tesla coil
				<span class="mit-name">Daniel Kramnik</span>
			</div>
		</li>

		<li>
			Muumba
			<div class="mit-description">
				A social entrepreneurship venture that aims to foster innovation throughout Sub-Saharan Africa.
				<span class="mit-name">Netia McCrae</span>
			</div>
		</li>
	</ul>
 
	<!--<p style="font-size: 16px;">* Techfair project funding recipient. More information <a href="/students/funding/">here</a>.</p>

	<p style="font-size: 16px;">
	&#8314; Part of the StartLabs <a href="http://startlabs.org/c2c">Concept to Company program</a></p>-->
 
</div>
<div id="video-overlay" style="display:none">
    <video id="video-mozilla" class="video-js vjs-default-skin" controls preload="none" width="800" height="450"
        poster="/img/video_mozilla.png"
        data-setup="{}">
        <source src="http://s3.amazonaws.com/techfair/Mozilla-HR-event.mov" type='video/mp4' />
    </video>
</div>

<div class="column-bottom"></div>
