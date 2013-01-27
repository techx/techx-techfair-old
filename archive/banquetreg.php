<?        
	mysql_connect('mysql.mit.edu','techfair','02139techfair') or die();
	mysql_select_db('techfair+dayof');

if ($_POST['athena']==NULL){

// TODO have an input checker
?>

<form action="banquetreg.php" method="POST">
First Name: <input type="text" name="fname"/><br>
Last Name: <input type="text" name="lname"/><br>
Athena Login: <input type="text" name="athena"/><br>
Phone Number: <input type="text" name="phone"/><br>
<select name="company">
<?php
$q = mysql_query('SELECT id, colabname FROM companies ORDER BY colabname ASC');
while($row = mysql_fetch_assoc($q)){
  echo('<option value="'.$row['id'].'">'.$row['colabname'].'</option>');
} 
?>
</select>
<br />
<input type="radio" name="rsvp" value=0 checked id="rsvp1"><label for="rsvp1">Coming</label><br/>
<input type="radio" name="rsvp" value=1 id="rsvp2"><label for="rsvp1">Not Coming</label><br/>
<select name="meal">
    <option value="chicken">Chicken</option>
    <option value="seafood">Seafood</option>
    <option value="vegetarian">Vegetarian</option>
</select>
<input type="submit" value="RSVP!">
<? } else {
print_r($_POST['meal']);
$q = 'SELECT package FROM companies WHERE id = '.$_POST['company'];
$q = mysql_query($q);
$row = mysql_fetch_assoc($q);
$packageno = $row['package'];

$q = 'SELECT banquetseats FROM packages WHERE id='.$packageno;
$q = mysql_query($q);
$row = mysql_fetch_assoc($q);
$total_seats = $row['banquetseats']; // total number of seats used by company
print ('Company Total Seats: ' . $total_seats);


$occupied_seats = 0; // number of seats already filled
// TODO Check for banquet reps
$q = 'SELECT count(distinct athena) FROM banquet_rsvp WHERE athena != \'\' AND company = '.$_POST['company'];
$q = mysql_query($q);
$row = mysql_fetch_row($q);
$occupied_seats += $row[0];
print ('<br />Company Occupied Seats (not including you): ' . $occupied_seats);

// get number of banquet reps
$q = "SELECT banquetnumreps FROM companies WHERE id= ".$_POST['company'];
$q = mysql_query($q);
$row = mysql_fetch_row($q);
$rep_seats = $row[0];
print ('<br />Company reps: ' . $rep_seats);

$q = "SELECT count(athena) FROM banquet_rsvp WHERE athena='{$_POST['athena']}'";
$q = mysql_query($q);
$row = mysql_fetch_row($q);
if ($row[0]==0) {
    $query_head = 'INSERT INTO banquet_rsvp (fname, lname, athena, phone, company, meal, status) ';
    $q = $query_head . "VALUES ('{$_POST['fname']}',
    				'{$_POST['lname']}',
    				'{$_POST['athena']}',
    				'{$_POST['phone']}',
    				'{$_POST['company']}',
    				'{$_POST['meal']}'";
    $waitlist = false;
    if($total_seats - $occupied_seats - $rep_seats > 0){
    	$q .= ','.$_POST['rsvp'].')';
    }
    else{
    	$waitlist = true;
    	$q .= ',2)';
    }
    echo '<br />';
    mysql_query($q) or die('we were not able to add you for some reason');

    if($waitlist && $_POST['rsvp']==1){
    	echo 'Unfortunately, the company you selected has a full banquet table. You have been placed on the waitlist.';
    }
    else{
    	echo 'You have successfully RSVPed.';
    }
} else {
    echo '<br />You have already RSVPed.';
}

}

?>
