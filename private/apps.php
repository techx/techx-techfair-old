<!DOCTYPE html>
<html>
<head></head>
<body>
<?php 
error_reporting(-1); 
?>
<?php
    $mysqli = new mysqli('mysql.mit.edu','techfair','02139techfair','techfair+applications');
        if (mysqli_connect_errno()) {
            printf('Connect failed: %s\n', mysqli_connect_error());
        exit();
    }
    if (isset($_GET['reject'])) {
      $reject = $_GET['reject'];
      if ($reject != '1' && $reject != '0') {
        $reject = '0';
      }
    } else {
      $reject = '0';
    }
    $res = $mysqli->query('SELECT * FROM applications_2013 where reject = ' . $reject);
    $res->data_seek(0);
    echo '<table cellpadding="10" cellspacing="5" border="1">';
    while ($row = $res->fetch_assoc()) {
        echo '<tr>';
        echo '<td>' , $row['first'] , ' ' , $row['last'] ,'</td>';
        echo '<td>' , $row['year'] , '</td>';
        echo '<td>' , $row['course_1'] , ' and ' , $row['course_2'] , ' </td>';
        echo '<td>' , $row['committee_1'] , '</td>';
        echo '<td>' , $row['committee_2'] , '</td>';
        echo '<td>' , $row['why'] , '</td>';
        echo '<td>' , $row['commitments'] , '</td>';
        echo '<td>' , $row['passions'] , '</td>';
        $pos = strpos($row['extra'], 'http');
        if ($pos !== false){
            echo '<td>' , '<a href=',$row['extra'],'>extra</a>' , '</td>';
        }
        $link = str_replace("/mit/techfair/web_scripts/","http://techfair.mit.edu/",$row['attachment']);
        if (strlen($link) > 1){
            echo '<td>' , '<a href=',$link,'>resume</a>' , '</td>';
        }
        echo '</tr>';
    }
    echo '</table>';
    $mysqli->close();
    
?>
</body>
</html>
