<?php if($_GET['msg']=='success'):?>
<div class="success">Your email has been saved. Thank you for your interest in MIT TechFair!</div>
<?php endif;?>
<h1>Techfair Interest</h1>
<p>Keep up with Techfair info session and application reminders, Techfair student grants, and more!</p>
<div id="midway" class="interest">
	<p>Enter your MIT email:</p>
	<?php if (isset($error['email'])) echo '<div class="error">',$error['email'],'</div>';?>
	<form action="" method="post">
		<input type="hidden" name="action" value="midway" />
		<input type="text" name="email" />
		<button type="submit">Submit</button>
	</form>
</div>