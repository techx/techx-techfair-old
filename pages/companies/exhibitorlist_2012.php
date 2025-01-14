<link rel="stylesheet" href="/css/video-js.min.css" />
<script src="/js/video.min.js"></script>
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
	<h1>2012 List of Exhibitors</h1>
	<p>With over 60 companies and 30 student exhibitors, this year's Techfair is the biggest yet!</p>
	<p>See the full schedule <a href="/events/">here</a>.</p>
	<p>Download all of our events into your calendar!
    <br/>
    - via <a href="http://www.google.com/calendar/render?cid=https%3A%2F%2Fwww.google.com%2Fcalendar%2Ffeeds%2Fgh1nmqduakfgor623cr7smmc54%2540group.calendar.google.com%2Fpublic%2Fbasic">Google Calendar</a>
    <br/>
    - via <a href="/Techfair2012.ics">iCal</a>
    	<p><strong>Check out these <a href="/companies/demos/">cool demos</a> from both our sponsors and the MIT Exhibitors!</strong>
  </p>
</div>
<div class="column-left">
	<h2>Platinum Sponsor</h2>
	<div class="sponsor-logos">
	    <a href="http://www.facebook.com/"><img title="Facebook" alt="Facebook" src="/img/logos/facebook_larger.png" /></a>
	    <p><a href="/events/hackathon/">Hackathon Sponsor</a></p>
	</div>
	<h2>Gold Sponsors</h2>
	<div class="sponsor-logos full-width">
		<div class="column-left-half">
	   	 	<a href="http://www.dropbox.com/"><img title="Dropbox" alt="Dropbox" src="/img/logos/0Dropbox.png" /></a><br />
		    <a href="http://www.microsoft.com/"><img title="Microsoft" alt="Microsoft" src="/img/logos/0Microsoft.png" /></a> <a style="display:block; margin-top:-15px; font-size: 11px; text-decoration: none;" href="/events/afterparty">Afterparty Sponsor</a>
	    	 <a href="http://www.oracle.com/"><img title="Oracle" alt="Oracle" src="/img/logos/0Oracle.png" /></a><br />
		</div>
		<div class="column-right-half">
	 	    <a href="http://www.palantir.com/"><img title="Palantir" alt="Palantir" src="/img/logos/0Palantir.png" /></a><br />
		     <a href="http://www.slb.com/"><img title="Schlumberger" alt="Schlumberger" src="/img/logos/0Schlumberger.png" /></a><br />
		     <a href="http://www.sequoiacap.com/"><img title="Sequoia" alt="Sequoia" src="/img/logos/0Sequoia.png" /></a><br />
		</div>
		<div class="column-bottom"></div>
	</div>
	<h2>Silver Sponsors</h2>
	<table class="sponsor-table">
		<?php
			//Add Silver sponsors & their websites to this list. They DON'T have to be in alphabetical order; the function will sort them.
			$silver = array(
				'10gen (mongoDB)'					=> 'http://www.10gen.com/',
				'Adobe' 							=> 'http://www.adobe.com/',
				'Bazaar Voice' 						=> 'http://www.bazaarvoice.com/',
				'Corning' 							=> 'http://www.corning.com/',
				'Solidworks' 						=> 'http://www.solidworks.com/',
				'General Electric' 					=> 'http://ge.com/',
				'GrubHub <br> <img style="margin-top: -5px" src="/img/miticon.png">' 							=> 'http://www.grubhub.com/',
				'MathWorks' 						=> 'http://www.mathworks.com/',
				'Mozilla<br /><a href="#" class="video-link" id="video-link-mozilla">VIDEO</a>'							=> 'http://mozilla.com/',
				'Oblong' 							=> 'http://oblong.com/',
				'Sony (SCEA)' 						=> 'http://us.playstation.com/',
				'Synthetic Genomics'      => 'http://syntheticgenomics.com/',
				'Thomson Reuters' 					=> 'http://thomsonreuters.com/',
				'Twitter' 							=> 'http://twitter.com/' 
			);
			
			populateSponsorTable($silver);
			
		?>
	</table>
	<h2>Bronze Sponsors</h2>
	<table class="sponsor-table">
		<?php
			//Add Bronze sponsors & their websites to this list. They DON'T have to be in alphabetical order; the function will sort them.
			$bronze = array(
				'3LM <br> <img style="margin-top: -5px" src="/img/miticon.png">' 								=> 'http://www.3lm.com/',
				'Addepar' 								=> 'http://www.addepar.com/',
				'AisleBuyer' 						=> 'http://www.aislebuyer.com/',
				'Akamai <br> <img style="margin-top: -5px" src="/img/miticon.png">'							=> 'http://www.akamai.com/',
				'Akiban Technologies' 				=> 'http://www.akiban.com/',
				'AT&T' 								=> 'http://www.att.com/',
				'Autodesk' 							=> 'http://usa.autodesk.com/',
				'Bose <br> <img style="margin-top: -5px" src="/img/miticon.png">' 								=> 'http://www.bose.com/',
				'CEO in a Box' 						=> 'http://www.beerdropper.com/',
				'Crittercism <br> <img style="margin-top: -5px" src="/img/miticon.png">' 						=> 'http://www.crittercism.com/',
				'eBay' 								=> 'http://www.ebay.com/',
				'Fitbit' 								=> 'http://www.fitbit.com/',
				'Fusion-io' 						=> 'http://www.fusionio.com/',
				'Google' 							=> 'http://www.google.com/',
				'Kiva Systems <br> <img style="margin-top: -5px" src="/img/miticon.png">'						=> 'http://www.kivasystems.com/',
				'Knome<br> <img style="margin-top: -5px" src="/img/miticon.png">'								=> 'http://www.knome.com/',
				'MIT Lincoln Laboratory <br> <img style="margin-top: -5px" src="/img/miticon.png">' 						=> 'http://www.ll.mit.edu/',
				'Lockheed Martin' 						=> 'http://www.lockheedmartin.com',
				'Sandia National Labs' 						=> 'http://www.sandia.gov',
				'Maxim Integrated Products' 		=> 'http://www.maxim-ic.com/',
				'MDS Lavastorm Analytics' 			=> 'http://www.martindawessystems.com/',
        'MDS Lavastorm Analytics'       => 'http://www.lavastorm.com/',
				'Motion Math' 			=> 'http://www.motionmathgames.com/',
				'Medtronic' 						=> 'http://www.medtronic.com/',
				'Philips' 							=> 'http://www.usa.philips.com/',
				'Quixey' 							=> 'http://www.quixey.com/',
				'Quora' 							=> 'http://www.quora.com/',
				'Smule' 							=> 'http://www.smule.com/',
				'Square' 							=> 'http://www.squareup.com/',
				'Synaptics' 						=> 'http://www.synaptics.com/',
				'TI' 								=> 'http://www.ti.com/',
				'Under Armour' 						=> 'http://www.underarmour.com/',
				'Venture for America'				=> 'http://ventureforamerica.org/',
				'VMWare' 							=> 'http://www.vmware.com/',
				'Zanbato' 							=> 'http://www.zanbatogroup.com/',
			);
			
			populateSponsorTable($bronze);
		?>
		  
  </table>
	<div class="full-width" style="display:block; height: 200px;">
	  <div class="column-left-half">
			<h2>Startup Sponsors</h2>
			<ul>
			<li><a href="http://aurora.aero/">Aurora Flight Sciences</a></li>
			<li><a href="http://locu.com/">Locu</a> <img src="/img/miticon.png"></li>
			<li><a href="http://www.lytro.com/">Lytro</a></li>
			<li><a href="http://nest.com/">Nest</a></li>
			<li><a href="http://nyxdevices.com/">Nyx Devices</a> <img src="/img/miticon.png"></li>
			<li><a href="http://www.yottaa.com/">Yottaa</a></li>
			</ul>
		</div>
		<div class="column-right-half">
			<h2>Other Companies</h2>
			<ul>
			<li><a href="http://www.apple.com/">Apple</a></li>
			</ul>
		</div>
  </div>
  <div style="display: block;">
  <p><img src="/img/miticon.png"> Founded by MIT Alumni or Professors</p>
  </div>
</div>
<div class="column-right" id="sr-descriptions">
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
</div>
<div id="video-overlay" style="display:none">
    <video id="video-mozilla" class="video-js vjs-default-skin" controls preload="none" width="800" height="450"
        poster="/img/video_mozilla.png"
        data-setup="{}">
        <source src="http://s3.amazonaws.com/techfair/Mozilla-HR-event.mov" type='video/mp4' />
    </video>
</div>

<!--</div>-->
<script>
    $('#video-link-mozilla').click(function() {
        $('#video-overlay').show();
        return false;
    });
    $('.video-js').live('click', function(e) {
        return false;
    });
    $('#video-overlay').live('click', function() {
        $('#video-overlay').hide();
        _V_("#video-mozilla").ready(function(){
            var myPlayer = this;
            myPlayer.pause();
            myPlayer.currentTime(0);
        });
    });
</script>
<style>
    #video-overlay {
        position: fixed;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
        background: rgba(0,0,0,0.5);
    }
    #video-overlay .video-js {
        margin-left: -400px;
        margin-top: -250px;
        left: 50%;
        top: 50%;
        position: absolute;
    }
    #content .video-link {
        font-size: 12px;
        background: #4078D6;
        color: white;
        display: inline-block;
        padding: 0 5px;
    }
    #content .video-link:hover {
        color: white;
        text-decoration: none;
        background: #888;
    }
</style>
<div class="column-bottom"></div>
