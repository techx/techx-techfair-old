<!DOCTYPE html> 
<?php
require('parts/routing.php');
require('parts/header.php');
require('parts/nav.php');
require('parts/footer.php');
?>
<html> 
<head>
<?php header($d['title']); ?>
</head>
<body>
<?php
require($d['file']);
?>
</body
</html>