<?php
function make_nav($sectionName,$subSectionName,$routes,$navId) {
?>
		<ul id="<?php echo $navId; ?>">
			<?php
			$k = 0;
			foreach($routes as $key=>$section):?>
				<?php
				if($key!='home' && !isset($section['show'])):
					$printkey = $key.'/';
				?>
					<?php ($sectionName==$key) ? $class=' current' : $class='';?>
					<?php ($key=='think') ? $think=' think' : $think='';?>
					<?php if($key!='think'): /*Don't generate the THINK link for the navigation*/?>
					
					<li id="menu<?php echo $k?>">
						<?php if(!isset($section['external'])):?>
							<a href="/<?php echo $printkey?>"><?php echo $section['name']?></a>
						<?php else:?>
							<a href="<?php echo $section['external']?>"><span><?php echo $section['name']?></span></a>
						<?php endif;?>
					</li>
					<?php endif;?>
					
				<?php
				$k++;
				endif;?>
			<?php endforeach;?>
					<li id="submenu">
						<?php
						$k = 0;
						foreach($routes as $key=>$section):?>
							<?php
							if($key!='home' && !isset($section['show'])):
								$printkey = $key.'/';
							?>
								<?php ($sectionName==$key) ? $class=' current' : $class='';?>
								<?php ($key=='think') ? $think=' think' : $think='';?>
									
									<?php if(isset($section[''])): //only folders have a key named '' for the main page?>
										<?php ($sectionName == $key) ? $class = 'shown' : $class = 'hidden'; ?>
										<ul id="sub<?php echo $k?>">
											
											<?php $uniqueName=''; 
										 		switch($printkey){
													case "events/":
														$uniqueName = "2013 Events Schedule";
														break;
													case "companies/":
														$uniqueName = "Get Involved";
														break;
													case "students/":
														$uniqueName = "Get Involved";
														break;
													case "about/":
														$uniqueName = "About Techfair";
														break;
												}
											?>
											<li><a href="/<?php echo $printkey?>"><?php echo $uniqueName?></a></li>
											<?php foreach($section as $subkey=>$page): ?>
												<?php if(is_array($page) && $subkey != ''):?>
                          <?php if (isset($page['show']) && !$page['show']) continue; ?>
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
							<?php
							$k++;
							endif;?>
						<?php endforeach;?>
					</li>
		</ul>
<?php
}

function make_header($sectionName,$subSectionName,$routes)
{
?>
    <div id="header">
	    	<a id="logo" href="/">Techfair</a>
	</div>
<?php
    make_nav($sectionName,$subSectionName,$routes, "nav");
}
?>
