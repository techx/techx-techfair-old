<?php
function make_header($sectionName,$subSectionName,$routes)
{
?>
	<div id="header">
		<div id="header-content">
			<h1>
				<a href="/"><span>MIT TechFair</span></a>
				<div>
					<h2>January 31, 2011</h2><h2>10:00am - 3:30pm at Rockwell Cage</h2>
				</div>
			</h1>
		</div>
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
				<?php
				if($key!='home' && !isset($section['show'])):
					$printkey = $key.'/';
				?>
					<li>
						<?php ($sectionName==$key && $subSectionName=='') ? $class=' class="current"' : $class='';?>
						<?php if(!isset($section['external'])):?>
							<a href="/<?php echo $printkey?>"<?php echo $class?>><?php echo $section['name']?></a>
						<?php else:?>
							<a href="<?php echo $section['external']?>"<?php echo $class?>><?php echo $section['name']?></a>
						<?php endif;?>
						<?php if(isset($section[''])): //only folders have a key named '' for the main page?>
							<?php ($sectionName == $key) ? $class = 'shown' : $class = 'collapse'; ?>
							<ul class="<?php echo $class?>">
								<?php foreach($section as $subkey=>$page): ?>
									<?php if(is_array($page) && $subkey != ''):?>
										<?php if(isset($page['content'])):?>
											<?php ($sectionName==$key && $subSectionName==$subkey) ? $class=' class="current"' : $class='';?>
											<li><a href="/<?php echo $key?>/<?php echo $subkey ?>/"<?php echo $class?>><?php echo $page['name']?></a></li>
										<?php else:?>
											<li><a href="<?php echo $page['external']?>"><?php echo $page['name']?></a></li>
										<?php endif;?>
									<?php endif;?>
								<?php endforeach;?>
							</ul>
						<?php endif;?>
					</li>
				<?php endif;?>
			<?php endforeach;?>
			</ul>
		</div>
<<<<<<< HEAD
		<div id="photo" class="navEl" style="background:url(/img/banners/<?= rand(1,8)?>.png);"></div>
	</div>
<?php
}
?>
