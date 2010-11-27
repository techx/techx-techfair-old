<pre>
<?php
print_r($_POST);
print_r($_FILES);
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
if(!isset($_POST['course']) || $_POST['course']=='')
{
	$errors['course'] = 'Please enter course information.';
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
	if($_FILES['resume']['type']!='application/pdf')
	{
		$errors['resume'] = 'Must be a pdf.';
	}
}
print_r($errors);
//if there are no errors, add mysql entry and move file to safe place
if(count($errors) == 0)
{
	//add mysql entry
	$mysql = mysql_connect('localhost', 'techfair', 'it02139');
	mysql_select_db('techfair+db');
	$query = sprintf("INSERT into resumedrop11 (firstname,lastname,email,year,course,phone) VALUES ('%s','%s','%s','%s','%s','%s')",
				mysql_real_escape_string($_POST['firstname']),
				mysql_real_escape_string($_POST['lastname']),
				mysql_real_escape_string($_POST['email']),
				mysql_real_escape_string($_POST['year']),
				mysql_real_escape_string($_POST['course']),
				mysql_real_escape_string($_POST['phone']));
	echo $query;
	$insert = mysql_query($query);
	
	if ($insert)
	{
		$id = mysql_insert_id();
		$lastname = str_replace('/','',$_POST['lastname']);
		$firstname = str_replace('/','',$_POST['firstname']);
		$filename = $id.$lastname.$firstname.'.pdf';

		$dir = 'uploads/';
		$filepath = $dir.$filename;

		if (is_uploaded_file($_FILES['resume']['tmp_name']) && move_uploaded_file($_FILES['resume']['tmp_name'],$filepath))
		{
			$update = mysql_query("UPDATE resumedrop11 SET resume=$filepath WHERE id=$id");
			if($update)
			{
				//flag of $status = 1 lets resume.php know everything was successful
				$status = 1;
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
</pre>