<!DOCTYPE html>
<html> 
<head>
<?php make_head($d['title']); ?>
<?php include_once($_SERVER['DOCUMENT_ROOT'].'/parts/analytics.php');?>
</head>
<body>
	<div id="container">
		<?php make_header($sectionName,$subSectionName,$routes);?>
		<div id="content">
			<?php require($d['content']); ?>
            <div class="clearfix"></div>
		</div>
		<?php make_footer($routes);?>
	</div>
</body>
</html>
