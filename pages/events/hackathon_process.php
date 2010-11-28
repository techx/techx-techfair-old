<?php
$errors = array();
if(!isset($_POST['email']) || $_POST['email']=='' || (preg_match('/^[^@]+@[a-zA-Z0-9._-]+\.[a-zA-z]+$/',$_POST['email'])==0))
{
	$errors['email'] = 'Please enter a valid email.';
} else {
	list($user,$domain) = explode("@",$_POST['email']);
	if (!getmxrr($domain,$mxhosts)) $errors['email'] = 'Please enter a valid email.';
}
if (count($errors)==0)
{
	//add mysql entry
	$mysql = mysql_connect('mysql.mit.edu', 'techfair', 'tech02139portal') or die(mysql_error());
	mysql_select_db('techfair+resume');
	$query = sprintf("INSERT into hackathon11 (email) VALUES (%s)",mysql_real_escape_string($_POST['email']));
	$insert = mysql_query($query);
	if ($insert)
	{
		header('Location: &msg=success');
	}
}
?>