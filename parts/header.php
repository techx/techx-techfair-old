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
		<div id="navbar" class="navEl" style="background:url(/img/banners/<?php echo rand(1,8)?>.png);">
			<ul>
			<?php
			$k = 0;
			foreach($routes as $key=>$section):?>
				<?php
				if($key!='home' && !isset($section['show'])):
					$printkey = $key.'/';
				?>
					<?php ($sectionName==$key) ? $class=' current' : $class='';?>
					<li class="main<?php echo $class?>" id="s<?php echo $k?>">
						<?php if(!isset($section['external'])):?>
							<a href="/<?php echo $printkey?>"><?php echo $section['name']?></a>
						<?php else:?>
							<a href="<?php echo $section['external']?>"><?php echo $section['name']?></a>
						<?php endif;?>
						<?php if(isset($section[''])): //only folders have a key named '' for the main page?>
							<?php ($sectionName == $key) ? $class = 'shown' : $class = 'hidden'; ?>
							<ul class="<?php echo $class?>">
								<?php foreach($section as $subkey=>$page): ?>
									<?php if(is_array($page) && $subkey != ''):?>
										<?php if(isset($page['content'])):?>
											<?php ($sectionName==$key && $subSectionName==$subkey) ? $class=' class="current"' : $class='';?>
											<li<?php echo $class?>><a href="/<?php echo $key?>/<?php echo $subkey ?>/"><?php echo $page['name']?></a></li>
										<?php else:?>
											<li><a href="<?php echo $page['external']?>"><?php echo $page['name']?></a></li>
										<?php endif;?>
									<?php endif;?>
								<?php endforeach;?>
							</ul>
						<?php endif;?>
					</li>
				<?php
				$k++;
				endif;?>
			<?php endforeach;?>
			</ul>
		</div>
	</div>
<?php
}
?>
