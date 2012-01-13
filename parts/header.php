<?php
function make_header($sectionName,$subSectionName,$routes)
{
?>
    <div id="header">
        <div id="header-content">
            <div id="header-inner">
                <h1>
                    <a href="/"><a id="logo">Techfair</a></a>
                    <div>
                        <h2>"Reg Day" Monday, February 6th, 2012</h2><h2>9:00am - 3:00pm at Rockwell Cage</h2>
                    </div>
                </h1>
            
                <!--<div id="countdown">
                <div id="countdown-day" class="cd"><span id="cd-day">Lo</span><span class="cd-sub">days</span></div>
                <div id="countdown-hr" class="cd"><span id="cd-hr">ad</span><span class="cd-sub">hours</span></div>
                <div id="countdown-min" class="cd"><span id="cd-min">in</span><span class="cd-sub">mins</span></div>
                <div id="countdown-sec" class="cd"><span id="cd-sec">g</span><span class="cd-sub">secs</span></div>
                <div style="clear:both"></div>
                </div>-->

                <script type="text/javascript" src="/parts/counter.js"></script>
                </div>
            
        </div>
    </div>
    <div id="nav" class="clearfix">
        <div id="navleft" class="navEl">
            <div id="navleft1"></div>
            <div id="navleft2"></div>
            <div id="navleft3"></div>
        </div>
        <div id="navbar" class="navEl" style="background-image:url(/img/banners/<?php echo rand(1,8)?>.png);">
            <ul>
            <?php
            $k = 0;
            foreach($routes as $key=>$section):?>
                <?php
                if($key!='home' && !isset($section['show'])):
                    $printkey = $key.'/';
                ?>
                    <?php ($sectionName==$key) ? $class=' current' : $class='';?>
                    <?php ($key=='think') ? $think=' think' : $think='';?>
                    <li class="main<?php echo $class?><?php echo $think?>" id="s<?php echo $k?>">
                        <?php if(!isset($section['external'])):?>
                            <a href="/<?php echo $printkey?>"><?php echo $section['name']?></a>
                        <?php else:?>
                            <a href="<?php echo $section['external']?>"><span><?php echo $section['name']?></span></a>
                        <?php endif;?>
                        <?php if(isset($section[''])): //only folders have a key named '' for the main page?>
                            <?php ($sectionName == $key) ? $class = 'shown' : $class = 'hidden'; ?>
                            <ul class="<?php echo $class?>">
                                <li><a href="/<?php echo $printkey?>"><?php echo $section['name']?></a></li>
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
