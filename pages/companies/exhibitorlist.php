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
			echo "<td><a href=".$value.">".$key." <img src='/img/external.png'></a></td>";
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
	<p>Techfair 2012 is looking to be the biggest Techfair yet!</p>
	<p>See the full schedule <a href="/events/">here</a>.</p>
</div>
<div class="column-left">
	<h2>Platinum Sponsor</h2>
	<div class="sponsor-logos">
	    <a href="http://www.facebook.com/"><img title="Facebook" alt="Facebook" src="/img/logos/facebook_larger.png" /></a>
	    <p>(<a href="/events/hackathon/">Hack-a-thon Sponsor</a>)</p>
	</div>
	<h2>Gold Sponsors</h2>
	<div class="sponsor-logos full-width">
		<div class="column-left-half">
	   	 	<a href="http://www.dropbox.com/"><img title="Dropbox" alt="Dropbox" src="/img/logos/dropbox.png" /></a><br />
		    <a href="http://www.microsoft.com/"><img title="Microsoft" alt="Microsoft" src="/img/logos/microsoft.png" /></a> <a style="display:block; margin-top:-15px; font-size: 10px" href="/events/afterparty">(Afterparty Sponsor)</a>
	    	 <a href="http://www.oracle.com/"><img title="Oracle" alt="Oracle" src="/img/logos/oracle_small.png" /></a><br />
		</div>
		<div class="column-right-half">
	 	    <a href="http://www.palantir.com/"><img title="Palantir" alt="Palantir" src="/img/logos/palantir.png" /></a><br />
		     <a href="http://www.slb.com/"><img title="Schlumberger" alt="Schlumberger" src="/img/logos/slb.png" /></a><br />
		     <a href="http://www.sequoiacap.com/"><img title="Sequoia" alt="Sequoia" src="/img/logos/sequoia.png" /></a><br />
		</div>
		<div class="column-bottom"></div>
	</div>
	<h2>Silver Sponsors</h2>
	<table class="sponsor-table">
		<?php
			//Add Silver sponsors & their websites to this list. They DON'T have to be in alphabetical order; the function will sort them.
			$silver = array(
				'10gen (mongoDB)'					=> '#',
				'Adobe' 							=> 'http://www.adobe.com/',
				'Bazaar Voice' 						=> '#',
				'Corning' 							=> '#',
				'Dassault Systemes (Solidworks)' 	=> '#',
				'General Electric' 					=> '#',
				'GrubHub' 							=> '#',
				'MathWorks' 						=> '#',
				'Merck' 							=> '#',
				'Mozilla'							=> '#',
				'Oblong' 							=> '#',
				'Sony (SCEA)' 						=> '#',
				'Thomson Reuters' 					=> '#',
				'Twitter' 							=> '#' 
			);
			
			populateSponsorTable($silver);
			
		?>
	</table>
	<!--	<tr>
			<td>10gen (mongoDB)</td>
			<td>Adobe <a href="http://www.adobe.com/"><img src="/img/external.png"></a></td>
			<td>Bazaar Voice</td>
		</tr>
		<tr>
			<td>Corning</td>
			<td>Dassault Systemes (Solidworks)</td>
			<td>General Electric</td>
		</tr>
		<tr>
			<td>GrubHub</td>
			<td>MathWorks</td>
			<td>Merck</td>
		</tr>
		<tr>
			<td>Mozilla</td>
			<td>Oblong</td>
			<td>Sony (SCEA)</td>
		</tr>
		<tr>
			<td>Thomson Reuters</td>
			<td>Twitter</td>
			<td></td>
		</tr>
	</table>-->
	<h2>Bronze Sponsors</h2>
	<table class="sponsor-table">
		<?php
			//Add Bronze sponsors & their websites to this list. They DON'T have to be in alphabetical order; the function will sort them.
			$bronze = array(
				'3LM' => '#',
				'AisleBuyer' => '#',
				'Akamai' => '#',
				'Akiban Technologies' => '#',
				'AT&T' => '#',
				'Autodesk' => '#',
				'Bose' => '#',
				'CEO in a box' => '#',
				'Citrix Online' => '#',
				'Crittercism' => '#',
				'eBay' => '#',
				'Fusion-io' => '#',
				'Google' => '#',
				'Kiva' => '#',
				'Knome' => '#',
				'Lincoln Lab' => '#',
				'Maxim Integrated Products' => '#',
				'MDS Lavastorm Analytics' => '#',
				'Medtronic' => '#',
				'Philips' => '#',
				'Quixey' => '#',
				'Smule' => '#',
				'Square' => '#',
				'Synaptics' => '#',
				'TI' => '#',
				'Under Armour' => '#',
				'VMWare' => '#',
				'Zanbato' => '#'
			);
			
			populateSponsorTable($bronze);
		?>
		<!--<tr>
			<td>3LM</td>
			<td>AisleBuyer</td>
			<td>Akamai</td>
		</tr>
		<tr>
			<td>Akiban Technologies</td>
			<td>AT&T</td>
			<td>Autodesk</td>
		</tr>
		<tr>
			<td>Bose</td>
			<td>CEO in a box</td>
			<td>Citrix Online</td>
		</tr>
		<tr>
			<td>Crittercism</td>
			<td>eBay</td>
			<td>Fusion-io</td>
		</tr>
		<tr>
			<td>Google</td>
			<td>Kiva</td>
			<td>Knome</td>
		</tr>
		<tr>
			<td>Lincoln Lab</td>
			<td>Maxim Integrated Products</td>
			<td>MDS Lavastorm Analytics</td>
		</tr>
		<tr>
			<td>Medtronic</td>
			<td>Philips</td>
			<td>Quixey</td>
		</tr>
		<tr>
			<td>Smule</td>
			<td>Square</td>
			<td>Synaptics</td>
		</tr>
		<tr>
			<td>TI</td>
			<td>Under Armour</td>
			<td>VMWare</td>
		</tr>
		<tr>
			<td>Zanbato</td>
			<td></td>
			<td></td>
		</tr>
	</table>
	<h2>Startup Sponsors</h2>
	<table class="sponsor-table">
		<tr>
			<td>Aurora Flight Sciences</td>
			<td>Locu</td>
			<td>Lytro</td>
		</tr>
		<tr>
			<td>Nyx Devices</td>
			<td>Yottaa</td>
			<td></td>
		</tr>-->
	</table>
	<h2>Other Companies</h2>
	<p><a href="http://www.apple.com/"><img title="Apple" alt="Apple" src="/img/logos/apple.png" /></a></p>
	<!--<ul>
	<li>10gen (mongoDB)</li>
	<li>Adobe</li>
	<li>Bazaar Voice</li>
	<li>Corning</li>
	<li>Dassault Systemes (Solidworks)</li>
	<li>General Electric</li>
	<li>GrubHub</li>
	<li>MathWorks</li>
	<li>Merck</li>
	<li>Mozilla</li>
	<li>Oblong</li>
	<li>Sony (SCEA)</li>
	<li>Thomson Reuters</li>
	<li>Twitter</li>
	</ul>-->
</div>
<div class="column-right">
	<h2>MIT Student Startups</h2>
	<p>To be announced!</p>
	<h2>MIT Student Exhibitors</h2>
	<p>To be announced!</p>
	
	<!--<h2>Bronze Sponsors</h2>
	<ul>
	<li>3LM</li>
	<li>AisleBuyer</li>
	<li>Akamai</li>
	<li>Akiban Technologies</li>
	<li>AT&T</li>
	<li>Autodesk</li>
	<li>Bose</li>
	<li>CEO in a box</li>
	<li>Citrix Online</li>
	<li>Crittercism</li>
	<li>eBay</li>
	<li>Fusion-io</li>
	<li>Google</li>
	<li>Kiva</li>
	<li>Knome</li>
	<li>Lincoln Lab</li>
	<li>Maxim Integrated Products</li>
	<li>MDS Lavastorm Analytics</li>
	<li>Medtronic</li>
	<li>Philips</li>
	<li>Quixey</li>
	<li>Smule</li>
	<li>Square</li>
	<li>Synaptics</li>
	<li>TI</li>
	<li>Under Armour</li>
	<li>VMWare</li>
	<li>Zanbato</li>
	</ul>-->
	<h2>Startup Sponsors</h2>
	<ul>
	<li>Aurora Flight Sciences</li>
	<li>Locu</li>
	<li>Lytro</li>
	<li>Nyx Devices</li>
	<li>Yottaa</li>
	</ul>
</div>
<div class="column-bottom"></div>
