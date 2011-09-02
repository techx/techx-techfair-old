<?php
$rel_root = "..";
require_once("{$rel_root}/php/template.php");

skin::title("Registration");

function content(){
global $web_root, $doc_root;
$text = <<<EOT
<link href="$web_root/media/css/form.css" type="text/css" rel="stylesheet"/>
<h2>MIT Techfair Application</h2>
<h3>Apply to be a part of the TechFair team!</h3>
<p class="important">Required fields marked with an asterisk (*)</p>

<form enctype="multipart/form-data" action="registerscript.php" method="post" name="Contact" onSubmit="return formCheck(this);">
<fieldset> 
<!--<legend>Your Information</legend>-->

<table border=0 width="100%" cellspacing=10>
<tr><td width=140>Name*</td><td>
  <input name="name" type="text" id="name" size="30"></td></tr>
<tr><td>Year*</td><td>
<input name="year" type="text" id="year" size="30"></td></tr>
<tr><td>Email*</td><td>
<input name="email" type="text" id="email" size="30"></td></tr>
<tr><td>Phone Number*</td><td>
<input name="phone" type="text" id="phone" size="30"></td></tr>
<tr><td>Course*</td><td>
<input name="course" type="text" id="course" size="30"></td></tr>
<tr><td>Dorm or Living Group*</td><td>
<input name="dorm" type="text" id="dorm" size="30"></td></tr>

<tr><td>

Please rank the top three committees<br/>
you are most interested in:<br/><br/>
</td><td>

1) <select name="first_com">
<option>Corporate Relations</option>
<option>Logistics</option>
<option>Marketing</option>
<option>THINK</option>
<option>Human Resources</option>
<option>Information Technology</option>
<option>Finance</option>
</select><br/>
2) <select name="second_com">
<option>Corporate Relations</option>
<option>Logistics</option>
<option>Marketing</option>
<option>THINK</option>
<option>Human Resources</option>
<option>Information Technology</option>
<option>Human Resources</option>
</select><br/>
3) <select name="third_com">
<option>Corporate Relations</option>
<option>Logistics</option>
<option>Marketing</option>
<option>THINK</option>
<option>Human Resources</option>
<option>Information Technology</option>
<option>Human Resources</option>
</select><br/>
</td></tr>

</td></tr>

EOT;

/*<p>Resume*<br>
<input type="file" name="resume">
<br>
</p>*/
/*
<p>Interview Time*<br>
<select name="interview">
<?php
$timefile = fopen("interviewtimes.txt", 'r');

while(!feof($timefile))
{
	$time = fgets($timefile);
	echo "<option value=\"$time\">$time</option>";
}

fclose($timefile);
?>
</select>
</p>
*/
$text .= <<<EOT

<tr><td>
What is your strongest attribute on a team? </td><td>
<textarea name="aboutteam" rows="3" cols="30"></textarea> </td></tr>


<tr><td>
<p>When you think of a "technology fair/expo" what do you think of? (be creative)</td><td>
<textarea name="tfcreative" rows="3" cols="30"></textarea></td></tr>


<tr><td>
<p>What's your favorite tech brand or startup and why? </td><td>
<textarea name="favbrand" rows="3" cols="30"></textarea></td></tr>


<tr><td>
<p>How did you hear about Techfair? </td><td>
<textarea name="abouttechfair" rows="3" cols="30"></textarea></td></tr>

</fieldset>

</table>

<!--<legend></legend>-->
<center>
<p>
<input type="submit" name="submit" value="Send"> 
<input type="reset" name="reset" value="Reset">
</p>
</center>													
</form>										
EOT;
return $text;
}

template::render();