<form action="banquerrsvps.php" method="POST">
First Name: <input type="text" name="firstname"/><br>
First Name: <input type="text" name="lastname"/><br>
Athena Login: <input type="text" name="athena"/><br>
Phone Number: <input type="text" name="phone"/><br>
<select name="company">
<?php
/**************************
* Need to change id, company name to reflect actual title of fields
**************************/
$result = mysql_query('SELECT id, companyname FROM tableName');
while($row = mysql_fetch_row($resource)){
  echo('<option name="$row[0]">$row[1]</option>');
} 
?>
</select><br>
<input type="radio" name="rsvp" value=1 checked>Coming<br>
<input type="radio" name="rsvp" value=0>Not Coming<br>
<input type="submit" value="RSVP!">
