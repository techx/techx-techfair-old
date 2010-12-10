<?php
//add mysql entry
$mysql = mysql_connect('mysql.mit.edu', 'techfair', '02139techfair') or die(mysql_error());
mysql_select_db('techfair+resume');
?>