<?php if($_GET['msg']=='success'):?>
<div class="success">Your r&#233;sum&#233; has been successfully dropped. We look forward to seeing you at MIT TechFair 2011!</div>
<?php endif;?>
<h1>R&#233;sum&#233; Drop</h1>
<p>The r&#233;sum&#233; drop is provided as a service to <strong>MIT students</strong> interested in companies coming to TechFair. These r&#233;sum&#233;s will be compiled into a book for each company to peruse.</p>
<h2>Student Information and R&#233;sum&#233;</h2>
<?php
if(!function_exists('echoError'))
{
	function echoError($key) {
		global $errors;
		if(isset($errors[$key])) echo $errors[$key];
	}
}
if(!function_exists('echoValue'))
{
	function echoValue($key) {
		global $status;
		if(isset($_POST[$key]) && $status==0) echo 'value="',$_POST[$key],'"';
	}
}
if(!function_exists('pickSelect'))
{
	function pickSelect($key,$option) {
		if(isset($_POST[$key]) && $_POST[$key]==$option) echo 'selected';
	}
}
if (@$_SERVER['SSL_CLIENT_S_DN_CN']) { // if certificate detected
  $email = $_SERVER['SSL_CLIENT_S_DN_Email']; // email
  echo '<h3>Welcome, <strong>',$_SERVER['SSL_CLIENT_S_DN_CN'],'</strong>.</h3>'; // name
}
?>

<form action="" method="post" enctype="multipart/form-data">
	<input type="hidden" name="action" value="resume" />
	<table>
		<tr>
			<th><label>First Name</label></th>
			<td><input type="text" name="firstname" id="firstname" size="20" <?php echoValue('firstname')?>/></td>
			<td class="error"><?php echoError('firstname')?></td>
		</tr>
		<tr>
			<th><label>Last Name</label></th>
			<td><input type="text" name="lastname" id="lastname"  size="20" <?php echoValue('lastname')?>/></td>
			<td class="error"><?php echoError('lastname')?></td>
		</tr>
		<tr>
			<th><label>Email</label></th>
			<td><input type="text" name="email" id="email"  size="25" <?php if(isset($email)) echo 'value="',$email,'"'?>/></td>
			<td class="error"><?php echoError('email')?></td>
		</tr>
		<tr>
			<th><label>Phone</label></th>
			<td>
				(&nbsp;<input type="text" name="phone1" id="phone1" size="3" maxlength="3" class="center" <?php echoValue('phone1')?>/>&nbsp;)
				<input type="text" name="phone2" id="phone1" size="3" maxlength="3" class="center" <?php echoValue('phone2')?>/>&nbsp;
				<input type="text" name="phone3" id="phone1" size="4" maxlength="4" class="center" <?php echoValue('phone3')?>/>
			</td>
			<td class="error"><?php echoError('phone')?></td>
		</tr>
		<tr>
			<th><label>Year</label></th>
			<td>
				<select name="year" id="year">
					<option value="G" <?php pickSelect('year','G')?>>Grad</option>
					<option value="2011" <?php pickSelect('year','2011')?><?php if(!isset($_POST['year'])) echo 'selected'?>>2011</option>
					<option value="2012" <?php pickSelect('year','2012')?>>2012</option>
					<option value="2013" <?php pickSelect('year','2013')?>>2013</option>
					<option value="2014" <?php pickSelect('year','2014')?>>2014</option>
				</select>
			</td>
			<td class="error"><?php echoError('year')?></td>
		</tr>
		<tr>
			<th><label>Course</label></th>
			<td>
				<?php
				$mysql = mysql_connect('mysql.mit.edu', 'techfair', 'tech02139portal') or die(mysql_error());
				mysql_select_db('techfair+resume');
				$query = "SELECT Course from courses";
				
				?>
				<input type="text" name="course" id="course"  size="20" <?php echoValue('course')?>/>
			</td>
			<td class="error"><?php echoError('course')?></td>
		</tr>
		<tr>
			<th><label>Resume (pdf)</label></th>
			<td><input type="file" name="resume" <?php echoValue('resume')?>/></td>
			<td class="error"><?php echoError('resume')?></td>
		</tr>
		<tr>
			<th></th>
			<td><button type="submit" value="Drop">Drop</button></td>
		</tr>
	</table>
</form>
