<?php
error_reporting(E_ALL);
$errors = array();
if(!isset($_POST['firstname']) || $_POST['firstname']=='')
{
	$errors['firstname'] = 'Please enter a first name.';
}
if(!isset($_POST['lastname']) || $_POST['lastname']=='')
{
	$errors['lastname'] = 'Please enter a last name.';
}
if(!isset($_POST['email']) || $_POST['email']=='' || (preg_match('/^[^@]+@[a-zA-Z0-9._-]+\.[a-zA-z]+$/',$_POST['email'])==0))
{
	$errors['email'] = 'Please enter a valid email.';
} else {
	list($user,$domain) = explode("@",$_POST['email']);
	if (!getmxrr($domain,$mxhosts)) $errors['email'] = 'Please enter a valid email.';
}
if(
	!isset($_POST['phone1']) || !isset($_POST['phone2']) || !isset($_POST['phone3'])
	|| (preg_match('/^[0-9]{3}$/',$_POST['phone1'])==0)
	|| (preg_match('/^[0-9]{3}$/',$_POST['phone2'])==0)
	|| (preg_match('/^[0-9]{4}$/',$_POST['phone3'])==0)
)
{
	$errors['phone'] = 'Please enter a valid phone number.';
}
if(
	!isset($_POST['year']) ||
	!($_POST['year']=='G' || $_POST['year']=='2012' || $_POST['year']=='2013' || $_POST['year']=='2014' || $_POST['year']=='2015')
)
{
	$errors['year'] = 'Please choose a valid graduation year.';
}
if(!isset($_POST['course1']) || $_POST['course1']=='' || $_POST['course1']=='0' || !isset($_POST['course2']) || $_POST['course2']=='')
{
	$errors['major'] = 'Please indicate your major(s).';
}
if(!isset($_POST['committee1']) || $_POST['committee1']=='' || $_POST['committee1']=='0' || !isset($_POST['committee2']) || $_POST['committee2']=='')
{
	$errors['committee'] = 'Please indicate your interested committee(s).';
}
if(!isset($_POST['why']) || $_POST['why']=='' || !isset($_POST['commitments']) || $_POST['commitments']=='' || !isset($_POST['passions']) || $_POST['passions']=='') {
  $errors['short_answers'] = 'Please fill out all the short answers.';
}
if($_FILES['attachment']['error']>0 && $_FILES['attachment']['error']!=4)
{
	$fileErrors = array(
		1 => 'File too large.',
		'File too large.',
		'Error uploading file (3). Please try again.',
		'Please select a file to upload.',
		6 => 'Error uploading file (6). Please try again.',
		'Error uploading file (7). Please try again.',
	);
	if(isset($fileErrors[$_FILES['attachment']['error']])) {
    $errors['attachment'] = $fileErrors[$_FILES['attachment']['error']];
  } else {
    $errors['attachment'] = 'Error uploading file.';
  }
} else {
	if($_FILES['attachment']['size']>5242880)
	{
		$errors['attachment'] = 'File size must be less than 5MB.';
	}
	/*
	if($_FILES['attachment']['type']!='application/pdf' && $_FILES['attachment']['type']!='application/download' && $_FILES['attachment']['type']!='application/save-as')
	{
		$to = 'Techfair IT <techfair-it@mit.edu>';
		$subject = "File Upload Error (".date("F j, Y, g:i a").")";
		$message = "Error uploading, not valid pdf. Mime type of ".$_FILES['attachment']['type']." detected. Uploaded by ".$_POST['firstname']." ".$_POST['lastname']." (".$_POST['email'].")";
		$headers = 'From: no-reply@tf.mit.edu'."\r\nContent-type: text/html\r\n".'X-Mailer: PHP/' . phpversion();
		mail($to,$subject,$message,$headers);
		$errors['attachment'] = 'Must be a pdf.';
	}
	*/
}

//if there are no errors, add mysql entry and move file to safe place
if(count($errors) == 0)
{
	//add mysql entry
	$mysql = mysql_connect('mysql.mit.edu', 'techfair', '02139techfair') or die(mysql_error());
	mysql_select_db('techfair+applications');
	
	$query = sprintf("SELECT id from applications_2012 WHERE email='%s'",mysql_real_escape_string($_POST['email']));
	$result = mysql_query($query);
	
	$dir = '/mit/techfair/web_scripts/applications/2012/';
	
	if (mysql_num_rows($result)>0) {
	    $row = mysql_fetch_assoc($result);
    	$attachment = $row['attachment'];
	
	    $query = sprintf("DELETE from applications_2012 WHERE email='%s'",mysql_real_escape_string($_POST['email']));
	    mysql_query($query);

      if ($attachment!='') {
        $newname = $dir.'old/'.basename($attachment);
        rename($attachment,$newname);
      }
	}
	
	$query = sprintf("INSERT into applications_2012 (first,last,email,phone,year,course_1,course_2,committee_1,committee_2,why,commitments,passions, extra, attachment) VALUES ('%s','%s','%s','%s','%d','%s','%s','%s','%s','%s','%s','%s','%s','%s')",
				mysql_real_escape_string($_POST['firstname']),
				mysql_real_escape_string($_POST['lastname']),
				mysql_real_escape_string($_POST['email']),
				mysql_real_escape_string($_POST['phone1'].$_POST['phone2'].$_POST['phone3']),
				mysql_real_escape_string($_POST['year']),
				mysql_real_escape_string($_POST['course1']),
				mysql_real_escape_string($_POST['course2']),
				mysql_real_escape_string($_POST['committee1']),
				mysql_real_escape_string($_POST['committee2']),
				mysql_real_escape_string($_POST['why']),
				mysql_real_escape_string($_POST['commitments']),
				mysql_real_escape_string($_POST['passions']),
				mysql_real_escape_string($_POST['extra']),
				mysql_real_escape_string($_POST['attachment'])
				);
	$insert = mysql_query($query) or die(mysql_error());
	
	if ($insert)
	{
		$id = mysql_insert_id();
		$lastname = str_replace('/','',$_POST['lastname']);
		$firstname = str_replace('/','',$_POST['firstname']);
    $fileinfo = pathinfo($_FILES['attachment']['name']);
    $extension = $fileinfo['extension'];
    $filename = sprintf("%s_%s_%s.%s", $id, $lastname, $firstname, $extension);

		$filepath = $dir.$filename;
		if ($_FILES['attachment']['error']==4 || move_uploaded_file($_FILES['attachment']['tmp_name'],$filepath))
		{
      if ($_FILES['attachment']['error']!=4) {
        $query = sprintf("UPDATE applications_2012 SET attachment='%s' WHERE id=%d",
              mysql_real_escape_string($filepath),
              $id);
        $update = mysql_query($query);
        $attachment_url = sprintf('http://tf.mit.edu/applications/2012/%s', $filename);
      } else {
        $update = true;
        $attachment_url = '--';
      }
			if($update)
			{
				//redirect to success message
        $to = 'Techfair Exec <techfair-exec@mit.edu>, '.$_POST['email'];
        $subject = sprintf("[Techfair] Application: %s %s", $_POST['firstname'], $_POST['lastname']);
        $message_template = <<<EOT
New application submitted on %s:<br />
<br />
Name: %s %s<br />
Email: %s<br />
Phone: (%s) %s-%s<br />
Year: %s<br />
Course(s): %s %s<br />
Committees: %s %s<br />
<br />
Why these committees?<br />
%s<br /><br />
What other commitments/interests?<br />
%s<br /><br />
What's something you're passionate about?<br />
%s<br /><br />
<br />
Extra: %s<br />
Attachment: %s<br />
<br />
Love,<br />
The Application Bot
EOT;
        $message = sprintf($message_template,
                     date("F j, Y, g:i a"),
                     htmlspecialchars($_POST['firstname']),
                     htmlspecialchars($_POST['lastname']),
                     htmlspecialchars($_POST['email']),
                     htmlspecialchars($_POST['phone1']),
                     htmlspecialchars($_POST['phone2']),
                     htmlspecialchars($_POST['phone3']),
                     htmlspecialchars($_POST['year']),
                     htmlspecialchars($_POST['course1']),
                     ($_POST['course2']=='0') ? '' : $_POST['course2'],
                     htmlspecialchars($_POST['committee1']),
                     ($_POST['committee2']=='0') ? '' : $_POST['committee2'],
                     nl2br(htmlspecialchars($_POST['why'])),
                     nl2br(htmlspecialchars($_POST['commitments'])),
                     nl2br(htmlspecialchars($_POST['passions'])),
                     htmlspecialchars(($_POST['extra'] == '') ? '--' : $_POST['extra']),
                     $attachment_url);
        $headers = 'From: no-reply@tf.mit.edu'."\r\nContent-type: text/html\r\n".'X-Mailer: PHP/' . phpversion();
        mail($to,$subject,$message,$headers);
				header('Location: ?msg=success');
			} else {
				unlink($filepath);
				exit('Could not update data in database');
			}
    } else {
			exit('File could not be uploaded. Please go back in your browser and try again.');
		}
	} else {
		exit('Could not insert data into database.');
	}
}
?>
