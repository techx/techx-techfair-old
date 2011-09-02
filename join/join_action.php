<?php
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
	!($_POST['year']=='G' || $_POST['year']=='2011' || $_POST['year']=='2012' || $_POST['year']=='2013' || $_POST['year']=='2014')
)
{
	$errors['year'] = 'Please choose a valid graduation year.';
}
if(!isset($_POST['major1']) || $_POST['major1']=='' || $_POST['major1']=='0' || !isset($_POST['major2']) || $_POST['major2']=='')
{
	$errors['major'] = 'Please indicate your major(s).';
}
if($_FILES['resume']['error']>0)
{
	$fileErrors = array(
		1 => 'File too large.',
		'File too large.',
		'Error uploading file (3). Please try again.',
		'Please select a file to upload.',
		6 => 'Error uploading file (6). Please try again.',
		'Error uploading file (7). Please try again.',
	);
	if(isset($fileErrors[$_FILES['resume']['error']])) $errors['resume'] = $fileErrors[$_FILES['resume']['error']];
	else $errors['resume'] = 'Error uploading file.';
} else {
	if($_FILES['resume']['size']>5242880)
	{
		$errors['resume'] = 'File size must be less than 5MB.';
	}
	/*
	if($_FILES['resume']['type']!='application/pdf' && $_FILES['resume']['type']!='application/download' && $_FILES['resume']['type']!='application/save-as')
	{
		$to = 'TechFair IT <techfair-it@mit.edu>';
		$subject = "File Upload Error (".date("F j, Y, g:i a").")";
		$message = "Error uploading, not valid pdf. Mime type of ".$_FILES['resume']['type']." detected. Uploaded by ".$_POST['firstname']." ".$_POST['lastname']." (".$_POST['email'].")";
		$headers = 'From: no-reply@tf.mit.edu'."\r\nContent-type: text/html\r\n".'X-Mailer: PHP/' . phpversion();
		mail($to,$subject,$message,$headers);
		$errors['resume'] = 'Must be a pdf.';
	}
	*/
}

//if there are no errors, add mysql entry and move file to safe place
if(count($errors) == 0)
{
	//add mysql entry
	$mysql = mysql_connect('mysql.mit.edu', 'techfair', '02139techfair') or die(mysql_error());
	mysql_select_db('techfair+resume');
	(isset($_POST['fulltime'])) ? $fulltime = 1 : $fulltime = 0;
	(isset($_POST['internship'])) ? $internship = 1 : $internship = 0;
	
	$query = sprintf("SELECT resume from resumedrop11 WHERE email='%s'",mysql_real_escape_string($_POST['email']));
	$result = mysql_query($query);
	
	$dir = '/mit/techfair/web_scripts/resumes/';
	
	if (mysql_num_rows($result)>0) {
	    $row = mysql_fetch_assoc($result);
    	$resume = $row['resume'];
	
	    $query = sprintf("DELETE from resumedrop11 WHERE email='%s'",mysql_real_escape_string($_POST['email']));
	    mysql_query($query);
	    
	    $newname = $dir.'old/'.basename($resume);
	    rename($resume,$newname);
	}
	
	$query = sprintf("INSERT into resumedrop11 (firstname,lastname,email,year,major1,major2,phone,fulltime,internship) VALUES ('%s','%s','%s','%s','%s','%s','%d','%d','%d')",
				mysql_real_escape_string($_POST['firstname']),
				mysql_real_escape_string($_POST['lastname']),
				mysql_real_escape_string($_POST['email']),
				mysql_real_escape_string($_POST['year']),
				mysql_real_escape_string($_POST['major1']),
				mysql_real_escape_string($_POST['major2']),
				mysql_real_escape_string($_POST['phone1'].$_POST['phone2'].$_POST['phone3']),
				$fulltime,
				$internship
				);
	$insert = mysql_query($query);
	
	if ($insert)
	{
		$id = mysql_insert_id();
		$lastname = str_replace('/','',$_POST['lastname']);
		$firstname = str_replace('/','',$_POST['firstname']);
		$filename = $id.'_'.$lastname.'_'.$firstname.'.pdf';

		$filepath = $dir.$filename;
		if (move_uploaded_file($_FILES['resume']['tmp_name'],$filepath))
		{
			$query = sprintf("UPDATE resumedrop11 SET resume='%s' WHERE id=%d",
						mysql_real_escape_string($filepath),
						$id);
			$update = mysql_query($query);
			if($update)
			{
				//redirect to success message
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