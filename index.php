<?php
error_reporting(E_ALL ^ E_NOTICE);
//relationships between URLs and files
require('parts/routing.php');
//elements in <head>
require('parts/head.php');
//header of site, top banner and nav
require('parts/header.php');
//footer of site
require('parts/footer.php');
?>
<!DOCTYPE html>
<html> 
<head>
<?php make_head($d['title']); ?>
</head>
<body>
	<div id="container">
		<?php make_header($sectionName,$routes);?>
		<div id="content">
			<?php require('pages/'.$d['content']); ?>
		</div>
		<?php make_footer();?>
	</div>
</body>
</html>