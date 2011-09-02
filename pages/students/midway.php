<?php if($_GET['msg']=='success'):?>
<div class="success">Your email has been saved. Thank you for your interest in MIT TechFair!<br><br>
  <button type="submit" onclick="location.href='/midway'">Refresh </button></div>
<?php endif;?>

<?php if (isset($error['email'])) echo '<div class="error">',$error['email'],'</div>';?>

<?php if($_GET['msg']!='success'):?>
<h1>Techfair 2012 Interest</h1>
<p>Keep up with Techfair info session and application reminders, Techfair student grants, and more!</p>
<div id="facebook" class="interest">
	<p>Enter your MIT email:</p>
	<form action="" method="post">
		<input type="hidden" name="action" value="midway" />
		<input type="text" name="email" />
		<button type="submit">Submit</button>
	</form>
</div>
<?php endif;?>