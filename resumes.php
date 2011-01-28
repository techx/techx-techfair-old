<!DOCTYPE html>
<html>
<head>
    <title>Resume Book</title>
    <style>
        body, html {
            background-color: #222;
            font-family: Arial, sans-serif;
            color: #FFF;
        }
        h1 {
            text-align: center;
        }
        table {
            margin: 0 auto;
            color: #000;
            background-color: #FFF;
        }
        table td, table th {
            padding: 5px 7px;
        }
        a {
            color: #000;
        }
        a:hover {
            color: #999;
        }
    </style>
</head>
<body>
    <h1>MIT TechFair 2011 Resume Book</h1>
    <?php
    function echoHeader($name,$key) {
        if (!isset($_GET[$key])) echo '<a href="?',$key,'=1">',$name,'</a>';
        elseif ($_GET[$key]==1) echo '<a href="?',$key,'=2">',$name,'</a>';
        elseif ($_GET[$key]==2) echo '<a href="?">',$name,'</a>';
    }
    ?>
    <table>
        <tr>
            <th><?php echoHeader('First Name','fname')?></th>
            <th><?php echoHeader('Last Name','lname')?></th>
            <th><?php echoHeader('Email','email')?></th>
            <th><?php echoHeader('Year','year')?></th>
            <th><?php echoHeader('Major(s)','major')?></th>
            <th><?php echoHeader('Looking For','look')?></th>
            <th>Resume</th>
        </tr>
        <tr>
            <td>Joshua</td>
            <td>Ma</td>
            <td>joshma@mit.edu</td>
            <td>2014</td>
            <td>6-2</td>
            <td>Internship</td>
            <td><a href="#">Download</td>
        </tr>
        <tr>
            <td>Joshua</td>
            <td>Ma</td>
            <td>joshma@mit.edu</td>
            <td>2014</td>
            <td>6-2</td>
            <td>Internship</td>
            <td><a href="#">Download</td>
        </tr>
        <tr>
            <td>Joshua</td>
            <td>Ma</td>
            <td>joshma@mit.edu</td>
            <td>2014</td>
            <td>6-2</td>
            <td>Internship</td>
            <td><a href="#">Download</td>
        </tr>
        <tr>
            <td>Joshua</td>
            <td>Ma</td>
            <td>joshma@mit.edu</td>
            <td>2014</td>
            <td>6-2</td>
            <td>Internship</td>
            <td><a href="#">Download</td>
        </tr>
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
<?php
//endforeach;
?>
    </table>
</body>
</html>