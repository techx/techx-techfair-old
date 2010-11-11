<?php
error_reporting(E_ALL ^ E_NOTICE);
require('parts/routing.php');
require('parts/head.php');
require('parts/header.php');
require('parts/footer.php');
?>
<!DOCTYPE html>
<html> 
<head>
<?php make_head($d['title']); ?>
</head>
<body>
	<div id="container">
	<?php
	make_header($sectionName,$routes);
	require('pages/'.$d['content']);
	make_footer();
	?>
	</div>
</body>
</html>