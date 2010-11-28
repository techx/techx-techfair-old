<h1>Student Startups</h1>
<p>
Show off your startup to other students and companies the annual MIT TechFair technology expo! We are looking for technology oriented startups initiated by MIT students. The fair is on January 31st, 2011. 
</p>
<p>
Why apply?
<br>-You'll get a booth at TechFair, at no cost!
<br>-Promote your startup to thousands of fellow students
<br>-Make long lasting connections with companies
<br>-Get inspired by other startups
</p>
<p>
Note that startups must be majority composed of current MIT students. If you do not meet this criteria, we encourage you to learn more about coming to TechFair as <a href="/companies/">a company</a>.
</p>
<p>
Preferred application (see below) deadline is <u>December 20 with rolling applications afterward</u>. Your startup must be prepared for interviews by the first week of January. 
</p>

<?php
if ($_POST["name"] != "" and $_POST["email"] != "") {
	echo '<h1>Thanks for your application, '.$_POST["name"].'! We will be in touch soon.</h1>';
	$to = 'TechFair Task Force <techfair-tf@mit.edu>, '.$_POST["email"];
	$subject = "TechFair Student Startup Application";
	$message = 'Name: '.$_POST["name"].
	'<br><br>Email: '.$_POST["email"].
	'<br><br>Phone: '.$_POST["phone"].
	'<br><br>Year: '.$_POST["year"].
	'<br><br>What does your startup do: '.$_POST["q1"].
	'<br><br>Startup name: '.$_POST["q2"].
	'<br><br>Project demo: '.$_POST["q3"];
	$headers = 'From: '.$_POST["name"].' <'.$_POST["email"].">\r\nContent-type: text/html\r\n".'X-Mailer: PHP/' . phpversion();
	mail($to,$subject,$message,$headers);
	$none = 'none';
} else {
	echo '<br><br><h1>Application</h1>';	
}
?>

<div style="display: <?php echo $none?>">
	<table> 
		<form action="#" method="POST">
		<tr> 
			<th><label>Name</label></th> 
			<td><input type="text" name="name" size="40" /></td> 
		</tr> 
		<tr> 
			<th><label>MIT Email</label></th> 
			<td><input type="text" name="email" size="40" /></td> 
		</tr> 
		<tr> 
			<th><label>Phone Number</label></th> 
			<td><input type="text" name="phone" size="40" /></td> 
		</tr> 
		<tr> 
			<th><label>Year</label></th> 
			<td>
			<select name="year"> 
			<option value="" selected="selected"></option>
			<option value="1" >1</option>
			<option value="2" >2</option>
			<option value="3" >3</option>
			<option value="4" >4</option>
			<option value="5" >Grad</option>
			</select>
			</td> 
		</tr> 
		</table>
		<table>
		<tr> 
			<th><label>What does your startup do? </label></th> 
		</tr>
		<tr>
			<td><textarea name="q1" rows="5" cols="55"></textarea> </td> 
		</tr> 
		<tr> 
			<th><label>What is your startup's name? </label></th> 
		</tr>
		<tr>
			<td><textarea name="q2" rows="5" cols="55"></textarea> </td> 
		</tr> 
		<tr> 
			<th><label>How will you demonstrate your project, and will it be demo-able by the end of IAP?</label></th> 
		</tr>
		<tr>
			<td><textarea name="q3" rows="5" cols="55"></textarea> </td> 
		</tr> 
		<tr>
			<td>
				<input type="submit" name="submit" value="Submit"/>
			</td>
		</tr>
		</form>	
</table>
</div>
