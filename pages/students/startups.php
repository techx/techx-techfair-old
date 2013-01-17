<?php if($_GET['msg']=='success'):?>

<div class="success">Your email has been saved. Thank you for your interest in MIT Techfair!</div>
<?php endif;?>
<h1>Student Startups</h1>
<p>Show off your startup to other students and companies the annual Techfair technology expo! All MIT students with their own tech startups are welcome to apply for a booth. The fair is on February 4, 2013.</p>
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
<p>The application deadline has passed for 2013. Email <a
href="mailto:techfair-sr@mit.edu">techfair-sr@mit.edu</a> for more information
about Techfair 2014.</p>
<?php /*
<iframe src="https://docs.google.com/spreadsheet/embeddedform?formkey=dGRFX2ZhZGZLMXg5R1dESTVKbmhpa3c6MA" width="760" height="800" frameborder="0" marginheight="0" marginwidth="0">Loading...</iframe>
*/ ?>

<?php endif;?>
