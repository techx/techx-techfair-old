<pre>
<?php
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
	$mysqli = new mysqli('mysql.mit.edu', 'techfair', 'it02139', 'techfair+db');
	if (mysqli_connect_errno())
	{
		printf("Connect failed: %s\n", mysqli_connect_error());
	    exit();
	}
	$stmt = $mysqli->prepare("INSERT into resumedrop11 (firstname,lastname,email,year,course,phone) VALUES (?,?,?,?,?,?,?)");
	$phone = $_POST['phone1'].$_POST['phone2'].$_POST['phone3'];
	$stmt->bind_param('sssssss',$_POST['firstname'],$_POST['lastname'],$_POST['email'],$_POST['year'],$_POST['course'],$_POST['resume'],$phone);
	$stmt->execute();
	$stmt->close();
	
	$lastname = str_replace('/','',$_POST['lastname']);
	$firstname = str_replace('/','',$_POST['firstname']);
	$filename = $mysqli->insert_id.$lastname.$firstname.'.pdf';
	$dir = 'uploads/';
	$path = $dir.$filename;
	if (is_uploaded_file($_FILES['resume']['tmp_name']) && move_uploaded_file($_FILES['resume']['tmp_name'],$path))
	{
		$stmt = $mysqli->prepare("UPDATE resumedrop11 SET resume=? WHERE id=".$mysqli->insert_id);
		$stmt->bind_param('s',$path);
		$stmt->execute();
		$stmt->close();
		//flag of $status = 1 lets resume.php know everything was successful
		$status = 1;
	} else {
		exit('File could not be uploaded. Please go back in your browser and try again.');
	}
	*/
}
?>
</pre>