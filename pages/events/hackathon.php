<?php if($_GET['msg']=='success'):?>
<div class="success">Your email has been saved. Thank you for your interest in MIT TechFair!</div>
<?php endif;?>
<h1>Facebook Hack-a-thon</h1>
<h2>What</h2>
<p>The Hack-a-thon is a coding competition sponsored by Facebook. Hack individually or in teams, or form up to teams of 10!
This competition is open to all MIT students. Build something awesome that you've always wanted to build. Facebook Engineers will be on site to work with you and judge the final projects. Food/caffeine/free shirts will be distributed.</p>
<h3>Prizes</h3>
<p><strong>$1000 in awards</strong> and, of course, notoriety to be gained</p>
<h2>When</h2>
<p><strong>January 30th to January 31st</strong>, <strong>10pm to 8am</strong>, the night before TechFair!</p>
<h2>Where</h2>
<p><strong>Room 32-082</strong> - Stata Basement TEAL Room</p>
<h2>Interested?</h2>
<p>Enter your MIT email for more details:</p>
<?php if (isset($error['email'])) echo $error['email']?>
<form action="" method="post">
	<input type="hidden" name="action" value="hackathon" />
	<input type="text" name="email" />
	<button type="submit">Submit</button>
</form>