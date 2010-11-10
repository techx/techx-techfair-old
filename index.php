<?php
error_reporting(E_ALL ^ E_NOTICE);
require('parts/routing.php');
require('parts/header.php');
require('parts/nav.php');
require('parts/footer.php');
?>
<!DOCTYPE html>
<html> 
<head>
<?php make_header($d['title']); ?>
</head>
<body>
<?php
require('pages/'.$d['content']);
?>
</body>
</html>