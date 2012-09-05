<h1>Planning board 2012 application</h1>
<p>TechFair is an ambitious organization always looking for visionary new ideas and passionate, creative individuals. Join us and learn professional skills while meeting other students passionate about tech. Be a part of a very unique event on campus. <strong>Applications deadline: 11:59pm on Thursday, 9/20</strong></p>
<p>After we receive your application, we may contact you to schedule an interview during the week of 9/24. 
  <br><strong>Questions? Contact the exec team at <a href="mailto:techfair-exec@mit.edu">techfair-exec@mit.edu</a></strong></p>
<h2>Committees</h2>
<p>Techfair has a 9 person exec team overseeing 6 main committees and 2 intercommittees - no matter where your strengths lie, there's a place for you! Intercommittees cannot be applied for directly - Techfair members will be given a later chance to apply. Feel free to indicate interest in the intercommittees in the open-ended answers below.</p>
  
  <h3>Corporate Relations</h3>
  <p>
  Corporate Relations chooses, contacts, and courts the bleeding-edge technology companies for Techfair, with the responsibility for inviting everything from start-ups to multi-national corporations. Members learn how to contact and interface with recruiters and professionals alike.
  </p>
  <h3>Marketing</h3>
  <p>
  The Marketing committee shapes Techfair's image in the MIT community with a variety of creative publicity campaigns, ranging from traditional to the unconventional. As one of the top marketing groups on campus, members will learn not only learn how to advertise effectively on campus, but also acquire important skills applicable to real world marketing. Techfair's marketing committee is often a springboard for successful publicity chairs in many other student groups.
    </p>
  <h3>Student Relations</h3>
  <p>
  The Student Relations team recruits MIT startups, labs, and student projects to become exhibitors at Techfair. Members learn their way around the entrepreneurial community at MIT; whether it's the next big webapp, a customize-designed 3d printer, or a motorized shopping cart, it's the job of Student Relations to bring these projects to Techfair.
    </p>
  <h3>Logistics</h3>
  <p>
  The Logistics team is responsible for ironing out all the details involved in planning such a large event. Members of the logistics team learn how to plan and manage large events, in particular how to deal with numerous MIT offices and outside vendors that are involved in planning any event. The skills and knowledge accrued by the logistics team are indispensable to any MIT student group.
    </p>
  <h3>Finance</h3>
  <p>
  The Finance team is responsible for managing Techfair's budget, and facilitating the reimbursement process. Members obtain an intimate familiarity with the Student Activities Office (SAO) and MIT policies: connections and knowledge that are vital to all MIT student groups.
    </p>
  <h3>Developer Operations (DevOps)</h3>
  <p>
  DevOps builds the technological backbone of Techfair: members build and design the website, internal tools, company portal, and mobile applications. If you're interested in applying web tech and/or Android / iPhone development to very practical areas, this is the committee for you! (As a bonus, your work is <strong>very</strong> consumer-facing - in this case, half of the consumers will be potential employers.)
    </p>
  <h3>Techtalks <span class="intercommittee">Intercommittee</span></h3>
  <p>
  The Techtalks committee is just in its second year, dedicated to building up Techfair's newest event. The committee takes charge of contacting and recruiting prominent speakers from various technology industries. Members will get an unparalleled opportunity to contribute their vision to this new planning committee. Check out <a href="/events/talks/">last year's talks page</a> for a better picture of the event.
    </p>
  <h3>Identity <span class="intercommittee">Intercommittee</span></h3>
  <p>The Identity committee is the R&amp;D team of Techfair - members brainstorm and throw experimental events like hackathons, panels, and more. Recognizing that Techfair is no longer just a fair, Identity coordinates with all other committees to push the organization into new territories and develop the future vision of Techfair.
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
if(!function_exists('echoTextarea'))
{
  function echoTextarea($key) {
    if(isset($_POST[$key])) echo $_POST[$key];
  }
}
if(!function_exists('pickSelect'))
{
	function pickSelect($key,$option) {
		if(isset($_POST[$key]) && $_POST[$key]==$option) echo 'selected';
	}
}

$email = $_SERVER['SSL_CLIENT_S_DN_Email']; // email
echo '<h2 id="form">Application</h2>'; // application title

$mysql = mysql_connect('mysql.mit.edu', 'techfair', '02139techfair') or die(mysql_error());
mysql_select_db('techfair+applications');
$query = sprintf("SELECT id FROM applications_2013 WHERE email='%s'",$email);
$result = mysql_query($query);
$exists = mysql_num_rows($result);
if($exists>0):
?>
<?php if($_GET['msg']=='success'):?>
<div class="success">Your application has been successfully submitted. We will be contacting you soon to schedule an interview!</div>
<?php endif;?>
<div class="success">You have already submitted an application. <strong>If you'd like to update it, resubmit it below. Your previous submission will be overwritten.</strong></div>
<?php endif;?>
<form action="#form" method="post" enctype="multipart/form-data">
	<input type="hidden" name="action" value="resume" />
	<table>
    <tr>
      <td></td>
			<td class="error"><?php echoError('firstname')?></td>
		</tr>
		<tr>
			<th><label for="firstname">First Name</label></th>
			<td><input type="text" name="firstname" id="firstname" size="20" <?php echoValue('firstname')?>/></td>
    </tr>
    <tr>
      <td></td>
			<td class="error"><?php echoError('lastname')?></td>
		</tr>
		<tr>
			<th><label for="lastname">Last Name</label></th>
			<td><input type="text" name="lastname" id="lastname"  size="20" <?php echoValue('lastname')?>/></td>
    </tr>
		<tr>
			<th><label for="email">Email</label></th>
			<td><?php echo $email?><input type="hidden" name="email" value="<?php echo $email?>" /></td>
    </tr>
    <tr>
      <td></td>
			<td class="error"><?php echoError('phone')?></td>
		</tr>
		<tr>
			<th><label>Phone</label></th>
			<td>
				(&nbsp;<input type="text" name="phone1" id="phone1" size="3" maxlength="3" class="center" <?php echoValue('phone1')?>/>&nbsp;)
				<input type="text" name="phone2" id="phone1" size="3" maxlength="3" class="center" <?php echoValue('phone2')?>/>&nbsp;
				<input type="text" name="phone3" id="phone1" size="4" maxlength="4" class="center" <?php echoValue('phone3')?>/>
			</td>
    </tr>
    <tr>
      <td></td>
			<td class="error"><?php echoError('year')?></td>
		</tr>
		<tr>
			<th><label for="year">Year</label></th>
			<td>
				<select name="year" id="year">
					<option value="2016" <?php pickSelect('year','2016')?>>2016</option>
					<option value="2015" <?php pickSelect('year','2015')?>>2015</option>
					<option value="2014" <?php pickSelect('year','2014')?>>2014</option>
					<option value="2013" <?php pickSelect('year','2013')?>>2013</option>
					<option value="G" <?php pickSelect('year','G')?>>Grad</option>
				</select>
			</td>
    </tr>
    <tr>
      <td></td>
			<td class="error"><?php echoError('major')?></td>
		</tr>
		<tr>
			<th><label for="course1">Course(s)</label></th>
			<td>
				<select name="course1" id="course1">
					<option value="0">Pick a course</option>
				<?php
        mysql_select_db('techfair+resume');
				$query = "SELECT course from courses ORDER BY id asc";
				$result = mysql_query($query);
				while($row = mysql_fetch_row($result)):
				?>
					<option <?php pickSelect('course1',$row[0])?>><?php echo $row[0]?></option>
				<?php endwhile;?>
				</select><br />
				<select name="course2" id="course2">
					<option value="0">Optional second course</option>
				<?php
				$query = "SELECT course from courses WHERE id!=41 ORDER BY id asc";
				$result = mysql_query($query);
				while($row = mysql_fetch_row($result)):
				?>
					<option <?php pickSelect('course2',$row[0])?>><?php echo $row[0]?></option>
				<?php
          endwhile;
          mysql_select_db('techfair+applications');
        ?>
				</select>
			</td>
    </tr>
    <tr>
      <td></td>
			<td class="error"><?php echoError('committee')?></td>
		</tr>
		<tr>
			<th valign="top"><label>Committee interest</label></th>
			<td>
        <p>Select up to 2 committees that you are interested in. Descriptions are at the top of the page.</p>
        <select name="committee1">
          <option value="0">Select a comittee</option>
          <option value="Corporate Relations" <?php pickSelect('committee1', 'Corporate Relations')?>>Corporate Relations</option>
          <option value="Marketing" <?php pickSelect('committee1', 'Marketing')?>>Marketing</option>
          <option value="Student Relations" <?php pickSelect('committee1', 'Student Relations')?>>Student Relations</option>
          <option value="Logistics" <?php pickSelect('committee1', 'Logistics')?>>Logistics</option>
          <option value="Finance" <?php pickSelect('committee1', 'Finance')?>>Finance</option>
          <option value="Developer Ops" <?php pickSelect('committee1', 'Developer Ops')?>>Developer Ops</option>
        </select>
        
        <select name="committee2">
          <option value="0">Optional second committee</option>         
          <option value="Corporate Relations" <?php pickSelect('committee2', 'Corporate Relations')?>>Corporate Relations</option>
          <option value="Marketing" <?php pickSelect('committee2', 'Marketing')?>>Marketing</option>
          <option value="Student Relations" <?php pickSelect('committee2', 'Student Relations')?>>Student Relations</option>
          <option value="Logistics" <?php pickSelect('committee2', 'Logistics')?>>Logistics</option>
          <option value="Finance" <?php pickSelect('committee2', 'Finance')?>>Finance</option>
          <option value="Developer Ops" <?php pickSelect('committee2', 'Developer Ops')?>>Developer Ops</option>
        </select>
			</td>
		</tr>
    <tr>
      <td></td>
			<td class="error"><?php echoError('short_answers')?></td>
    </tr>
		<tr>
		  <th valign="top"><label>Short answer</label></th>
		  <td>
		        <p>Why these committees?</p>
		    		<textarea name="why" rows="4" cols="60" /><?php echoTextarea('why')?></textarea>
      	    <p>What other commitments/interest do you expect to have during the semester? (greek life, sports, etc)</p>	
		    		<textarea name="commitments" rows="4" cols="60" /><?php echoTextarea('commitments')?></textarea>
          	<p>What's something (a club, cause, even TV show) you're passionate about?</p>
		    		<textarea name="passions" rows="4" cols="60" /><?php echoTextarea('passions')?></textarea>
		  </td>
		</tr>
	
	  <tr>
	    <td colspan=2>If you have any extra materials you'd like us to see, tell us or upload here. Examples: resume, personal website, portfolio, blog, etc. Anything works, but it's totally optional.
      </td>
	  </tr>
    <tr>
      <td></td>
			<td class="error"><?php echoError('extra')?></td>
    </tr>
	  <tr>

	    <th><label>Extra link/text</labe> </th>
	    <td><input type="text" width="300" name="extra" <?php echoValue('extra')?>fg/></td>
	  </tr>
    <tr>
      <td></td>
			<td class="error"><?php echoError('attachment')?></td>
    </tr>
		<tr>
			<th><label>Optional Attachment</label></th>
			<td>			  
			  <input type="file" name="attachment" <?php echoValue('attachment')?>/></td>
		</tr>
		<tr>
			<th></th>
			<td><button type="submit" value="Apply">Apply!</button></td>
		</tr>
	</table>
</form>
<p><strong>If you are encountering any errors, please email <a href="mailto:techfair-devops@mit.edu">techfair-devops@mit.edu</a>.</strong></p>
