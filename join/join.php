<?php if($_GET['msg']=='success'):?>
<div class="success">Your application has been successfully submitted. We will be contacting you soon to schedule an interview!</div>
<?php endif;?>
<h1>Planning board 2012 application</h1>
<p>TechFair is an ambitious organization always looking for visionary new ideas and passionate, creative individuals. Join us and learn professional skills while meeting other students passionate about tech. Be a part of a very unique event on campus.</p>
<h2>Committee descriptions</h2>
<p>Techfair has a 9 person exec team overseeing 8 committees. No matter where your strengths lie, we can find a place for you. 
  
  <p>
  <b>Corporate Relations</b>
  <br>
  Corporate Relations chooses, contacts, and courts the bleeding-edge technology companies for Techfair, with the responsibility for inviting everything from start-ups to multi-national corporations. Members learn how to contact and interface with recruiters and professionals alike.
  </p>
  <p>
  <b>
  Marketing</b>
  <br>
  The Marketing committee shapes Techfair's image in the MIT community with a variety of creative publicity campaigns, ranging from traditional to the unconventional. As one of the top marketing groups on campus, members will learn not only learn how to advertise effectively on campus, but also acquire important skills applicable to real world marketing. Techfair's marketing committee is often a springboard for successful publicity chairs in many other student groups.
    </p>
  <p>
  <b>Student Relations</b>
  <br>
  The Student Relations team recruits MIT startups, labs, and student projects to become exhibitors at Techfair. Members learn their way around the entrepreneurial community at MIT; whether it's the next big webapp, a customize-designed 3d printer, or a motorized shopping cart, it's the job of Student Relations to bring these projects to Techfair.
    </p>
  <p>
  <b>Logistics</b>
  <br>
  The Logistics team is responsible for ironing out all the details involved in planning such a large event. Members of the logistics team learn how to plan and manage large events, in particular how to deal with numerous MIT offices and outside vendors that are involved in planning any event. The skills and knowledge accrued by the logistics team are indispensable to any MIT student group.
    </p>
  <p>
  <b>TechTalks</b>
  <br>
  The TechTalks committee is a new committee this year, and will be contacting and recruiting prominent speakers from various technology industries. Members will get an unparalleled opportunity to contribute their vision to this new planning committee.
    </p>
  <p>
  <b>Internal Relations</b>
  <br>
  The Internal Relations team is responsible for planning many of Techfair's internal events. Members will have an opportunity to interact with members of all of the committees, and gain experience in planning large events and retreats.
    </p>
  <p>
  <b>Finance</b>
  <br>
  The Finance team is responsible for managing Techfair's budget, and facilitating the reimbursement process. Members obtain an intimate familiarity with the Student Activities Office (SAO) and MIT policies: connections and knowledge that are vital to all MIT student groups.
    </p>
  <p>
  <b>IT</b>
  <br>
  The IT committee will be responsible for maintaining and redesigning Techfair's website. On this small committee, members will have capacious responsibility and the opportunity to add to their portfolio.
    </p>
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

$email = $_SERVER['SSL_CLIENT_S_DN_Email']; // email
echo '<h3>Hi, <strong>',$_SERVER['SSL_CLIENT_S_DN_CN'],'</strong>!.</h3>'; // name

$mysql = mysql_connect('mysql.mit.edu', 'techfair', '02139techfair') or die(mysql_error());
mysql_select_db('techfair+resume');
$query = sprintf("SELECT attachment FROM applications12 WHERE email='%s'",$email);
$result = mysql_query($query);
$exists = mysql_num_rows($result);
if($exists>0):
?>
<p>You have already submitted an application;. If you'd like to update it, resubmit it below.</p>
<?php endif;?>
<form action="" method="post" enctype="multipart/form-data">
	<input type="hidden" name="action" value="resume" />
	<table>
		<tr>
			<th><label for="firstname">First Name</label></th>
			<td><input type="text" name="firstname" id="firstname" size="20" <?php echoValue('firstname')?>/></td>
			<td class="error"><?php echoError('firstname')?></td>
		</tr>
		<tr>
			<th><label for="lastname">Last Name</label></th>
			<td><input type="text" name="lastname" id="lastname"  size="20" <?php echoValue('lastname')?>/></td>
			<td class="error"><?php echoError('lastname')?></td>
		</tr>
		<tr>
			<th><label for="email">Email</label></th>
			<td><?php echo $email?><input type="hidden" name="email" value="<?php echo $email?>" /></td>
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
			<th><label for="year">Year</label></th>
			<td>
				<select name="year" id="year">
					<option value="G" <?php pickSelect('year','G')?>>Grad</option>
					<option value="2012" <?php pickSelect('year','2011')?><?php if(!isset($_POST['year'])) echo 'selected'?>>2011</option>
					<option value="2013" <?php pickSelect('year','2012')?>>2012</option>
					<option value="2014" <?php pickSelect('year','2013')?>>2013</option>
					<option value="2015" <?php pickSelect('year','2014')?>>2014</option>
				</select>
			</td>
			<td class="error"><?php echoError('year')?></td>
		</tr>
		<tr>
			<th><label for="course1">Course(s)</label></th>
			<td>
				<select name="course1" id="course1">
					<option value="0">Pick a course</option>
				<?php
				$query = "SELECT course from courses ORDER BY id asc";
				$result = mysql_query($query);
				while($row = mysql_fetch_row($result)):
				?>
					<option value="<?php echo $row[0]?>" <?php pickSelect('course1',$row[0])?>><?php echo $row[0]?></option>
				<?php endwhile;?>
				</select><br />
				<select name="course2" id="course2">
					<option value="0">Second course</option>
				<?php
				$query = "SELECT course from courses WHERE id!=41 ORDER BY id asc";
				$result = mysql_query($query);
				while($row = mysql_fetch_row($result)):
				?>
					<option value="<?php echo $row[0]?>" <?php pickSelect('course2',$row[0])?>><?php echo $row[0]?></option>
				<?php endwhile;?>
				</select> (optional)
			</td>
			<td class="error"><?php echoError('major')?></td>
		</tr>
		<tr>
			<th><label>Committee interest</label></th>
			<td>
			  Select up to 2 committees that you are interested in. Descriptions are at the top of the page.
			  <br>
        <select name="committee1">
        <option>Corporate Relations</option>
        <option>Marketing</option>
        <option>Student Relations</option>
        <option>Logistics</option>
        <option>TechTalk</option>
        <option>Internal Relations</option>
        <option>Finance</option>
        <option>Information Technology</option>
        </select><br/>
        
        <select name="committee2">
        <option>None</option>         
        <option>Corporate Relations</option>
        <option>Marketing</option>
        <option>Student Relations</option>
        <option>Logistics</option>
        <option>TechTalk</option>
        <option>Internal Relations</option>
        <option>Finance</option>
        <option>Information Technology</option>
        </select><br/>
			</td>
		</tr>
		<tr>
		  <th><label>Open-ended questions</label></th>
		  <td>
		        <p>
		    		Why those committees?
		    		<textarea rows="4" cols="30" value="<?php echo $question1?>" />
      	    </p>	
      	    <p>		  
		    		What other commitments/interest do you expect to have during the semester? (greek life, sports, etc)
		    		<textarea rows="4" cols="30" value="<?php echo $question2?>" />
          	</p>	
          	<p>		    		
		    		What's something you're passionate about? It could be a club or a cause or even reddit.
		    		<textarea rows="4" cols="30" value="<?php echo $question3?>" />
		        </p>
		  </td>
		</tr>
	
	  <tr>
	    <td colspan=2>If you have any extra materials you'd like us to see, tell us or upload here. Examples: resume, personal website, portfolio, blog, etc. Anything works, but it's just optional.
      </td>
	  </tr>
	  <tr>
	    <th>Extra information
	    </th>
	    <td><?php echo $extra?><input type="text" name="extra" value="<?php echo $extra?>" /></td>
			<td class="error"><?php echoError('extra')?></td>
	  </tr>
		<tr>
			<th><label>Optional Attachment</label></th>
			<td>			  
			  <input type="file" name="attachment" <?php echoValue('attachment')?>/></td>
			<td class="error"><?php echoError('attachment')?></td>
		</tr>
		<tr>
			<th></th>
			<td><button type="submit" value="Apply">Apply!</button></td>
		</tr>
	</table>
</form>
<p><strong>If you are encountering any errors, please email <a href="mailto:techfair-it@mit.edu">techfair-it@mit.edu</a>.</strong></p>