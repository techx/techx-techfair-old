<?php if($_GET['msg']=='success'):?>
<div class="success">Your email has been saved. Thank you for your interest in MIT TechFair!</div>
<?php endif;?>
<h1>Individual Exhibitors</h1>
<p>Have an amazing project you want to showcase to thousands of people? Are you planning to build something cool during IAP? Want an opportunity to demo your project to both students and companies? Apply for a free booth to display your tech at MIT TechFair on January 31st, 2011.</p>
<p>Preferred application deadline is <u>December 20 with rolling applications afterward</u>. Your project must be prepared and ready to present for interviews by the first week of January.</p>
<?php
/*
<h2>Interested but don't have your application ready yet?</h2>
<div id="normal" class="interest">
	<p>Enter your MIT email for reminders and more information:</p>
	<?php if (isset($error['email'])) echo '<div class="error">',$error['email'],'</div>';?>
	<form action="" method="post">
		<input type="hidden" name="action" value="hackathon" />
		<input type="text" name="email" />
		<button type="submit">Submit</button>
	</form>
</div>
*/?>
<?php
if ($_POST["name"] != "" and $_POST["email"] != ""):
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
	if (mail($to,$subject,$message,$headers))
	{
		echo '<div class="success">Thanks for your application, ',$_POST["name"],'! We will be in touch soon.</div>';
	} else {
		echo '<div class="error">Our apologies, your application could not be submitted. Please send us an email at <a href="mailto:techfair-tf@mit.edu">techfair-tf@mit.edu</a>.</div>';
	}
else:
?>
<h1>Application</h1>
<?php
/*
<form action="" method="POST">
	<table>
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
		<tr> 
			<th></th>
			<td><label>What is your project? </label></td> 
		</tr>
		<tr>
			<th></th>
			<td><textarea name="q1" rows="5" cols="55"></textarea></td> 
		</tr> 
		<tr>
			<th></th>
			<td><label>How long have you been working on the project?</label></td> 
		</tr>
		<tr>
			<th></th>
			<td><textarea name="q2" rows="5" cols="55"></textarea></td> 
		</tr> 
		<tr>
			<th></th>
			<td><label>How developed is your project?</label></td> 
		</tr>
		<tr>
			<th></th>
			<td><textarea name="q3" rows="5" cols="55"></textarea> </td> 
		</tr> 
		<tr>
			<th></th>
			<td><label>How would you plan on demonstrating your product to passersbys?</label></td> 
		</tr>
		<tr>
			<th></th>
			<td><textarea name="q4" rows="5" cols="55"></textarea> </td> 
		</tr>
		<tr>
			<th></th>
			<td><button type="submit" name="submit">Submit</button></td>
		</tr>	
	</table>
</form>
*/?>
<p>We are no longer accepting applications for TechFair 2011. Come back next year!</p>
</div>
<?php endif;?>