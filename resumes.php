<!DOCTYPE html>
<html>
<head>
    <title>Resume Book</title>
</head>
<body>
    <h1>MIT TechFair 2011 Resume Book</h1>
<?php
$mysqli = new mysqli('mysql.mit.edu','techfair','02139techfair','techfair+dayof');
if (mysqli_connect_errno()) { 
    printf("Connect failed: %s\n", mysqli_connect_error()); 
    exit(); 
}
$result = $mysqli->query("SELECT * FROM registration ORDER BY lastname,firstname");
while($row = $result->fetch_assoc()){ 
    printf("%s (%s)\n", $row['Name'], $row['Population']); 
}
$result->close();
$mysqli->close();
?>
</body>
</html>