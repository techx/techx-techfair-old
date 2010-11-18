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