<!DOCTYPE html>
<html> 
<head>
<?php make_head($d['title']); ?>
</head>
<body>
	<?php make_header($sectionName,$subSectionName,$routes);?>
	<div id="container">
		<div id="content">
			<?php require($d['content']); ?>
		</div>
	</div>
	<?php make_footer();?>
</body>
</html>