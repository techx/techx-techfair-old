<?php
function make_header($sectionName,$routes)
{
?>
	<div id="header">
	</div>
	<div id="nav" class="clearfix">
		<div id="navleft" class="navEl">
			<div id="navleft1"></div>
			<div id="navleft2"></div>
			<div id="navleft3"></div>
		</div>
		<div id="navlinks" class="navEl">
			<ul>
			<?php foreach($routes as $key=>$section):?>
				<?php if($key=='home') $key = ''?>
				<li>
				<a href="/<?php echo $key?>"><?php echo $section['name']?></a>
				<?php if ($sectionName == $key):?>
				<ul>
					<?php foreach($section as $key=>$page): ?>
						<?php if(is_array($page) && $key != ''):?>
						<li><a href="/<?php echo $sectionName?>/<?php echo $key ?>"><?php echo $page['name']?></a></li>
						<?php endif;?>
					<?php endforeach;?>
				</ul>
				</li>
				<?php endif;?>
			<?php endforeach;?>
			</ul>
		</div>
		<div id="photo" class="navEl">Image goes here.</div>
	</div>
<?php
}
?>