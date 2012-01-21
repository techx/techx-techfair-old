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

	natksort($sponsorList);
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
	<p>With over 50 companies and 30 student exhibitors, this year's Techfair is the biggest yet!</p>
	<p>See the full schedule <a href="/events/">here</a>.</p>
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
				'GrubHub' 							=> 'http://www.grubhub.com/',
				'MathWorks' 						=> 'http://www.mathworks.com/',
				'Merck' 							=> 'http://www.merck.com/',
				'Mozilla'							=> 'http://mozilla.com/',
				'Oblong' 							=> 'http://oblong.com/',
				'Sony (SCEA)' 						=> 'http://us.playstation.com/',
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
				'3LM' 								=> 'http://www.3lm.com/',
				'Addepar' 								=> 'http://www.addepar.com/',
				'AisleBuyer' 						=> 'http://www.aislebuyer.com/',
				'Akamai'							=> 'http://www.akamai.com/',
				'Akiban Technologies' 				=> 'http://www.akiban.com/',
				'AT&T' 								=> 'http://www.att.com/',
				'Autodesk' 							=> 'http://usa.autodesk.com/',
				'Bose' 								=> 'http://www.bose.com/',
				'CEO in a Box' 						=> 'http://www.beerdropper.com/',
				'Citrix Online' 					=> 'http://www.citrix.com/',
				'Crittercism' 						=> 'http://www.crittercism.com/',
				'Cypress Semiconductors' 						=> 'http://www.cypress.com/',
				'eBay' 								=> 'http://www.ebay.com/',
				'Fitbit' 								=> 'http://www.fitbit.com/',
				'Fusion-io' 						=> 'http://www.fusionio.com/',
				'Google' 							=> 'http://www.google.com/',
				'Kiva Systems'						=> 'http://www.kivasystems.com/',
				'Knome'								=> 'http://www.knome.com/',
				'Lincoln Lab' 						=> 'http://www.ll.mit.edu/',
				'Lockheed Martin' 						=> 'http://www.lockheedmartin.com',
				'Sandia National Labs' 						=> 'http://www.sandia.gov',
				'Maxim Integrated Products' 		=> 'http://www.maxim-ic.com/',
				'MDS Lavastorm Analytics' 			=> 'http://www.martindawessystems.com/',
				'Motion Math' 			=> 'http://www.motionmathgames.com/',
				'Medtronic' 						=> 'http://www.medtronic.com/',
				'Philips' 							=> 'http://www.usa.philips.com/',
				'Quixey' 							=> 'http://www.quixey.com/',
				'Smule' 							=> 'http://www.smule.com/',
				'Square' 							=> 'http://www.squareup.com/',
				'Synaptics' 						=> 'http://www.synaptics.com/',
				'TI' 								=> 'http://www.ti.com/',
				'Under Armour' 						=> 'http://www.underarmour.com/',
				'VMWare' 							=> 'http://www.vmware.com/',
				'Zanbato' 							=> 'http://www.zanbatogroup.com/'
			);
			
			populateSponsorTable($bronze);
		?>
  </table>
</div>
<div class="column-right">
  <h2>MIT Labs</h2>
  <ul>
    <li>Hatsopoulos Microfluids Labratory</li>
    <li>Swÿp</li>
    <li>Understanding Natural Language Commands Given to Robots (Lab)</li>
  </ul>
  <h2>MIT Student Groups</h2>
  <ul>
    <li><a href="http://miters.mit.edu/">MITERS</a></li>
    <li>MIT Hobby Shop</li>
    <li>MIT Rocket Team</li>
    <li><a href="http://solar-cars.scripts.mit.edu/">MIT Solar Electric Vehicle Team</a></li>
  </ul>
	<h2>MIT Individual Projects</h2>
	<ul>
		<li>Angry Birdbot (Techfair Funding Recipient)</li>
		<li>DDR Tetris (Techfair Funding Recipient)	</li>
		<li>DIY Vending Machine (Techfair Funding Recipient)</li>
		<li>Electric Instruments	(Project Funding Recipient)</li>
  	<li>Hydrophotonophone (Techfair Funding Recipient)</li>
		<li>Musical Fabrics	</li>
		<li>Science Launch! (Techfair Funding Recipient)</li>
		<li>Servo Subwoofer (Techfair Funding Recipient)</li>
		<li>Stark Industries</li>
		<li>Takachar - (Project Funding Recipient)</li>
		<li>Wimshurst Machine (Techfair Funding Recipient)</li>
	</ul>
	<h2>MIT Startups</h2>
	<ul>
	  <li>Bustle (Part of Startlabs C2C)</li>
	  <li>ForgePond</li>
	  <li>HelmetHub (2.009)    </li>
	  <li>Metrify (Part of Startlabs C2C)</li>
	  <li>Ministry of Supply, Inc.</li>
	  <li>MUSE Analytical (Part of Startlabs C2C)</li>
	  <li>Phil (Part of Startlabs C2C, 2.009)</li>
	  <li>Supermechanical </li>
	  <li>The Thingdom (Part of Startlabs C2C)</li>
	</ul>
</div>
<div class="column-bottom"></div>
