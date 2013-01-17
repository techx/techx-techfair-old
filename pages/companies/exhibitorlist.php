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
<p>Stay tuned! We'll have a complete list of student presenters and projects shortly.</p>
<?php
/*
  <h2>MIT Labs</h2>
  <ul> 
    <li><a href="http://projects.csail.mit.edu/spatial/Main_Page">Natural Human-Robot Interfaces - MIT CSAIL</a>
		 <div class="mit-description">
			Enabling a person to give a robot command as if they were talking to another person.
	        <span class="mit-name">Stefanie Tellex, Ph.D, Thomas Kollar, Ph.D, Prof. Seth Teller, Prof. Nicholas Roy </span> 
		</div>
	</li>
  </ul>
  <h2>MIT Student Groups</h2>
  <ul>
    <li><a href="http://www.icaruslabs.org/	">Icarus Labs</a> 
		<div class="mit-description">
         A team of eleven MIT engineers with specialties including aerospace, control systems, and artificial intelligence.
      	</div>
	</li>
      
    <li><a href="http://miters.mit.edu/">MITERS</a>
		<div class="mit-description">
		  MIT Electronics Research Society, a student-run shop and community of people who like to make things.
		   <span class="mit-name">Nancy Ouyang '13</span>
		</div>
	</li>
      
    <li>MIT Hobby Shop
		<div class="mit-description">
		  The place for learning how to design and build things. 
		  
		  <span class="mit-name"> Brian Chan, Ph.D '09, Ken Stone '72, Director, MIT Hobby Shop, Hayami Arakawa, Instructor</span>
	 	</div>
	</li>
      
    <li><a href="http://web.mit.edu/rocketteam/">MIT Rocket Team</a>
		<div class="mit-description">
	    An independent student group focused on rocket-related projects.
	    <span class="mit-name">Christian Valledor '12, Andrew Wimmer '12, Julian Lemus'13, Leonard I Tampkins '13</span>
	 	</div>
	</li>
      
    <li><a href="http://mitsolar.com">MIT Solar Electric Vehicle Team</a>
		<div class="mit-description">
	    A student-run group that designs, builds, and races solar-powered cars.
		</div>
	</li>
  </ul>
	<h2>MIT Individual Projects</h2>
	<ul>
		<li>Angry Birdbot *
			<div class="mit-description">
				A remote controlled Angry Bird plush
		        <span class="mit-name">Princess Len Carlos '13 </span>
		 	</div>
		</li>
		
		<li><a href="http://www.stephanboyer.com/p/self-balancing-electric-unicycle.html">Bullet - Self-Balancing Electric Unicycle </a>
			<div class="mit-description">
				An Electric Unicycle crafted from scrap metal and electric scooter parts.
		        <span class="mit-name">Stephan Boyer ‘13 </span>
		 	</div>
		</li>       
    
		<li>DDR Tetris *
			 <div class="mit-description">
				A two player competitive Tetris game controlled by DDR mats
		        <span class="mit-name"> Andrew Carlson '12, Russell Cohen '13, Leah Alpert '13</span>
		 	</div>
		</li>
     
		<li><a href="http://orangenarwhals.blogspot.com/">DIY Vending Machine</a> *
			<div class="mit-description">
				A compact vending machine suitable for vending small items
		        <span class="mit-name">Nancy Ouyang '13 </span>
		 	</div>
		</li>
      
		<li><a href="http://candacedesign.wordpress.com/category/electric-violin-01/">Electric Instruments</a> *
			<div class="mit-description">
				Two electric violins and an electric ukulele, all hand made 
		        <span class="mit-name">Candace chen '14 </span>
		 	</div>
		</li>
      
  	<li>Hydrophotonophone *
		 <div class="mit-description">
			A musical instrument played by creating waves in a pool of water
	        <span class="mit-name"> Robert Arlt Jr. '12, Jennifer Hope '12, Mark Feldmeier, Research Affiliate</span> </div>
	</li>
     
		<li>Musical Fabrics	
			 <div class="mit-description">
				Fabrics integrated with electronic create interfaces for musical expression
		        <span class="mit-name"> Yang Yang '11, David Welch, Brandeis University</span> </div>
		</li>
     
		<li>Science Launch! *
			<div class="mit-description">
				 Interactive simulations provide opportunities to learn about STEM fields
		        <span class="mit-name"> Bridger Maxwell '13, Hanne Paine, Stony Brook University '14</span> </div>
		</li>
      
		<li>Servo Subwoofer *
			<div class="mit-description">
				A top-notch subwoofer, comparable to much more expensive speakers
		        <span class="mit-name">Benjamin Shaya '14</span> </div>
		</li>
      
		<li><a href="http://web.mit.edu/chosetec/www/">Stark Industries</a>
			<div class="mit-description">
			Just like in Iron Man
	        <span class="mit-name">Brian Chan, Ph.D</span> </div>
		</li>
      
		<li>Takachar *
			<div class="mit-description">
				An improved, low-cost, scalable charcoal production method
		        <span class="mit-name">Kevin Kung, Jacob Young '13, Marie Burkland '13, Sisi Ni, D-Lab, University of Nairobi </span> </div>
		</li>
      	<li>WiiBook
			<div class="mit-description">
				A Nintendo Wii that has been made portable
				<span class="mit-name">Charles Franklin ‘14</span>
			</div>
		</li>
		<li>Wimshurst Machine *
			<div class="mit-description">
				A 7-foot-tall electrostatic generator
		        <span class="mit-name">Timothy Yang '15 </span> </div>
		</li>
      
	</ul>
	<p style="font-size: 16px;">* Techfair project funding recipient. More information <a href="/students/funding/">here</a>.</p>
	<h2>MIT Startups</h2>
	<ul>
	  <li><a href="http://getbustle.com">Bustle</a> &#8314;
		<div class="mit-description">
		  Developing a platform for any community to create an online marketplace. 
	        <span class="mit-name">Ian Cinnamon '14, Gordon Wintrob '12</span> </div>
	</li>
      
	  <li>ForgePond
		<div class="mit-description">
		  Enables companies to securely enable the use of personal mobile devices for enterprise use.
	        <span class="mit-name">Eric Marion '11 </span> </div>
	</li>
      
	  <li>HelmetHub (2.009)    
		 <div class="mit-description">
		   Offering a solution to the lack of availability of helmets for bikeshare users.  
	        <span class="mit-name">Breanna Berry '12, Arni Lehto '12, Danielle Hicks '12,           Chris Mills '12
          </span> </div>
	</li>
     
	<li><a href="http://www.kangacruise.com">KangaCruise</a> &#8314;
		<div class="mit-description">
			Modernizing the cruise industry with web and mobile applications.
			<span class="mit-name">Colin Sidoti ‘14, Max Kanter’15, Louis Sobel ’14</span>
		</div>
	</li>
	  <li>Metrify &#8314;
		<div class="mit-description">
		    Metrify allows you capture and visualize the data in your everyday life. 
	        <span class="mit-name">Nancy Ouyang '13, Mark Spatz '14, Diyang Tang '13,  Cathy Wu '12</span> </div>
	</li>
      
	  <li><a href="http://ministryofsupply.com">Ministry of Supply, Inc.</a>
		 <div class="mit-description">
		   It's MIT meets Calvin Klein meets Zappos. The Ministry of Supply: fashion meets technology.
	        <span class="mit-name">Kevin Rustagi '11, Eric Khatchadourian '07,           Eddie Obropta '13, Gihan Amarasiriwardena '11, Kit Hickey (Sloan) '13, Aman Advani (Sloan) '13</span> </div>
	</li>
     
	  <li>MUSE Analytical &#8314;
		<div class="mit-description">
		  Portable chemical analysis with a hand-held tool. 
	        <span class="mit-name">Cristina Fernandez, Stephen Guerrera, Ph.D '14 </span> </div>
	</li>
      
	  <li><a href="http://www.phil-labs.com/	">Phil</a> (2.009) &#8314;
		<div class="mit-description">
		  Phil is a sophisticated faucet attachment that automatically fills sinks to a customizable, pre-set level.
	        <span class="mit-name">2.009 Team: Brent Boswell, Richard Dahan, Jared Darby, Nick Dou, Danny Guillen, Jess Iacobucci, Bryan Macomber, David Parell, Nydia Ruleman, Bennett Wilson</span> </div>
	</li>
	<li><a href="http://www.startlabs.org/">StartLabs</a>
		<div class="mit-description">
			Creating the next generation of technical entrepreneurs.
			<span class="mit-name"></span>
		</div>
	</li>
	  <li><a href="http://supermechanical.com">Supermechanical</a>
		<div class="mit-description">
		  Building <a href="http://www.kickstarter.com/projects/supermechanical/twine-listen-to-your-world-talk-to-the-internet">Twine</a>, a WiFi-connected sensor square that get the objects in your life texting, tweeting or emailing. 
	        <span class="mit-name">John Kestner (Media Lab)	'10, David Carr (Media Lab) '11</span> </div>
	 </li>
      
	<li><a href="http://swyp.us">Swÿp - MIT Media Lab</a>
		 <div class="mit-description">
			 Transfer any file from any app to any app on any device with a Swÿp
	        <span class="mit-name">Alexander List '15, Natan Linder (Media Lab Fluid Interfaces Group), Ethan Sherbondy '14 </span>
	     </div>
	</li>
		
	  <li><a href="http://www.thethingdom.com/	">The Thingdom</a> &#8314;
		<div class="mit-description">
		  Share the things you have and want with your friends. We want to do for things what Foursquare has done for places. What's in your Thingdom?
	        <span class="mit-name"> Aseem Kishore '08, Jeremy Smith '09, M.Eng. '10</span> </div>
	</li>
      
	</ul>
	<p style="font-size: 16px;">
	&#8314; Part of the StartLabs <a href="http://startlabs.org/c2c">Concept to Company program</a></p>
*/ ?>
</div>
<div id="video-overlay" style="display:none">
    <video id="video-mozilla" class="video-js vjs-default-skin" controls preload="none" width="800" height="450"
        poster="/img/video_mozilla.png"
        data-setup="{}">
        <source src="http://s3.amazonaws.com/techfair/Mozilla-HR-event.mov" type='video/mp4' />
    </video>
</div>

<div class="column-bottom"></div>
