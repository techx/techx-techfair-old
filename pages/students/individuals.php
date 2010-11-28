<h1>Individual Exhibitors</h1>
<p>
Have an amazing project you want to showcase to thousands of people? Are you planning to build something cool during IAP? Want an opportunity to demo your project to both students and companies? Apply for a free booth to display your tech at MIT TechFair on January 31st, 2011.
<br><br>
Preferred application deadline is <u>December 20 with rolling applications afterward</u>. Your project must be prepared and ready to present for interviews by the first week of January. 
</p>

<?php
if ($_POST["name"] != "" and $_POST["email"] != "") {
	echo '<h1>Thanks for your application, '.$_POST["name"].'! We will be in touch soon.</h1>';
	$to = 'TechFair Task Force <techfair-tf@mit.edu>, '.$_POST["email"];
	$subject = "TechFair Individual Exhibitor Application";
	$message = 'Name: '.$_POST["name"].
	'<br><br>Email: '.$_POST["email"].
	'<br><br>Phone: '.$_POST["phone"].
	'<br><br>Year: '.$_POST["year"].
	'<br><br>What is your project?: '.$_POST["q1"].
	'<br><br>How long have you been working on the project?: '.$_POST["q2"].
	'<br><br>How developed is your project?: '.$_POST["q3"].
	'<br><br>How would you plan on demonstrating your product to passersbys?: '.$_POST["q4"];
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
			<th><label>What is your project? </label></th> 
		</tr>
		<tr>
			<td><textarea name="q1" rows="5" cols="55"></textarea> </td> 
		</tr> 
		<tr> 
			<th><label>How long have you been working on the project? </label></th> 
		</tr>
		<tr>
			<td><textarea name="q2" rows="5" cols="55"></textarea> </td> 
		</tr> 
		<tr> 
			<th><label>How developed is your project?</label></th> 
		</tr>
		<tr>
			<td><textarea name="q3" rows="5" cols="55"></textarea> </td> 
		</tr> 
		<tr> 
			<th><label>How would you plan on demonstrating your product to passersbys?</label></th> 
		</tr>
		<tr>
			<td><textarea name="q4" rows="5" cols="55"></textarea> </td> 
		</tr>
		<tr>
			<td>
				<input type="submit" name="submit" value="Submit"/>
			</td>
		</tr>
		</form>	
</table>
</div>
