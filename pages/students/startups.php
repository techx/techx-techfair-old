<?php if($_GET['msg']=='success'):?>

<div class="success">Your email has been saved. Thank you for your interest in MIT Techfair!</div>
<?php endif;?>
<h1>Student Startups</h1>
<p>Show off your startup to other students and companies the annual Techfair technology expo! All MIT students with their own tech startups are welcome to apply for a booth. The fair is on February 6, 2012.</p>
<h2>Why apply?</h2>
<ul>
	<li>You'll get a booth at Techfair, at no cost!</li>
	<li>Promote your startup to thousands of fellow students</li>
	<li>Make long lasting connections with companies</li>
	<li>Get inspired by other startups</li>
</ul>
<p>Note that startups must be mainly composed of current MIT students. If you do not meet this criteria, we encourage you to learn more about coming to Techfair as <a href="/companies/">a company sponsor</a>.</p>
<p>
  <!--
<p>Preferred application (see below) deadline is <u>December 20 with rolling applications afterward</u>. Your startup must be prepared for interviews by the first week of January.</p>-->
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
	$to = 'Techfair Task Force <techfair-tf@mit.edu>, '.$_POST["email"];
	$subject = "Techfair Student Startup Application";
	$message = 'Name: '.$_POST["name"].
	'<br><br>Email: '.$_POST["email"].
	'<br><br>Phone: '.$_POST["phone"].
	'<br><br>Year: '.$_POST["year"].
	'<br><br>What does your startup do: '.$_POST["q1"].
	'<br><br>Startup name: '.$_POST["q2"].
	'<br><br>Project demo: '.$_POST["q3"];
	$headers = 'From: '.$_POST["name"].' <'.$_POST["email"].">\r\nContent-type: text/html\r\n".'X-Mailer: PHP/' . phpversion();
	if (mail($to,$subject,$message,$headers))
	{
		echo '<div class="success">Thanks for your application, ',$_POST["name"],'! We will be in touch soon.</div>';
	} else {
		echo '<div class="error">Our apologies, your application could not be submitted. Please send us an email at <a href="mailto:techfair-tf@mit.edu">techfair-tf@mit.edu</a>.</div>';
	}
else:
?>
</p>
<h1>Application</h1>
<p><strong>The application deadline has passed for 2012. Email <a href="mailto:techfair-sr@mit.edu">techfair-sr@mit.edu</a> to be placed on our mailing list for Techfair 2013.</strong></p>

<div style="background-color: #ff8000; padding:10px;">
  <p style="color:#fff; ">Mark that you are applying as a <strong>MIT Startup</strong>.</p>
  <p style="color:#fff; ">If you do not receive confirmation that your application was submitted, please email your application to <a href="mailto:techfair-sr@mit.edu">techfair-sr@mit.edu</a>. We will be sending out an email to all applicants on Dec 5, if you submit an application do not receive an email, please contact us.</p>
</div>
<p></p>
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
			<td><label>What does your startup do? </label></td>
		</tr>
			<th></th>
			<td><textarea name="q1" rows="5" cols="55"></textarea></td> 
		</tr> 
		<tr> 
			<th></th>
			<td><label>What is your startup's name? </label></td> 
		</tr>
		<tr>
			<th></th>
			<td><textarea name="q2" rows="5" cols="55"></textarea></td> 
		</tr> 
		<tr> 
			<th></th>
			<td><label>How will you demonstrate your project, and will it be demo-able by the end of IAP?</label></td> 
		</tr>
		<tr>
			<th></th>
			<td><textarea name="q3" rows="5" cols="55"></textarea></td> 
		</tr> 
		<tr>
			<th></th>
			<td>
				<button type="submit" name="submit">Submit</button>
			</td>
		</tr>
	</table>
</form>
*/?>
<iframe src="https://docs.google.com/spreadsheet/embeddedform?formkey=dDJkalJzZHRkMmtMSzJWc2pjU09iYXc6MQ" width="760" height="2000" frameborder="0" marginheight="0" marginwidth="0">Loading...</iframe>
<?php endif;?>
