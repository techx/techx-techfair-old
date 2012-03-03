<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>MIT Techfair</title>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,400,300,600' rel='stylesheet' type='text/css'>
    
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
        
    <script type="text/javascript">
      var _gaq = _gaq || [];  _gaq.push(['_setAccount', 'UA-19969189-3']);  _gaq.push(['_trackPageview']);
      (function() {    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);  })();
    
    var i = 0;
    function advanceSlide() {
        $("#slideshow img").eq((i+2) %5).removeClass();
        $("#slideshow img").eq((i+1) %5).removeClass("hide").addClass("show");
        $("#slideshow img").eq(i).removeClass("show").addClass("hide");
        i++;
        i = i %5;
    }

    $(document).ready(function() {
        setInterval(advanceSlide, 8000);
		
		$("#mini-schedule-button").mouseover(
		  function () {
				$("#mini-schedule").addClass("schedule-show");
			}
		);
		$("#info").mouseleave(
		  function () {
				$("#mini-schedule").removeClass("schedule-show");
			}
		);
    });
    

    </script>
    
    <link href="css/style.css" rel="stylesheet" />


	<link rel="stylesheet" href="/css/prettyPhoto.css" type="text/css" media="screen" charset="utf-8" />
	<script src="/js/jquery.prettyPhoto.js" type="text/javascript" charset="utf-8"></script>
</head>
<body>
    <div id="container">
        <?php
        make_header(NULL, NULL, $routes);
        ?>
        <div id="slideshow">
            <div id="info">
                <h2>MIT Techfair</h2>
                <p>A huge thanks goes to everybody who came and helped make Techfair 2012 the largest yet!</p>
                <p>We're already busy prepping for Techfair 2013 and cannot wait to see everybody against next year. Until then, check out the pictures from the event <a href="#">here</a>.</p>
                <p>Techtalks, our newest event, saw attendees from throughout the Boston area. If you missed it, <a href="#">click through</a> to watch the videos.</p>
            </div>
			
            <div id="tf-overlay">
				<div id="homepage-video">
					<a href="http://www.youtube.com/watch?v=bzc4ge3H6hA" rel="prettyPhoto"></a>
				</div>
			</div>
            <img class="show" src="/img/homepage/1.png"/>
            <img src="/img/homepage/2.png"/>
            <img src="/img/homepage/3.png"/>
            <img src="/img/homepage/4.png"/>
            <img src="/img/homepage/5.png"/>
        </div>
		<?php make_footer();?>
		
       <!-- <div id="linkout">
            <a href="http://facebook.com/techfair"><img src="img/homepage/facebook.png" alt="fb" /></a>
            <a href="http://twitter.com/mittechfair"><img src="img/homepage/twitter.png" alt="twitter" /></a>
            <a href="mailto:techfair-exec@mit.edu">techfair-exec@mit.edu</a>
            <span id="copyright">&copy; MIT Techfair 2012</span>
        </div>
        <div id="sponsors">
            <h1>Attending Companies</h1>
            <ul id="sponsorlinks">
                <li id="facebook"><a href="http://www.facebook.com"></a></li>
                <li id="apple"><a href="http://www.apple.com"></a></li>
                <li id="dropbox"><a href="http://www.microsoft.com"></a></li>
                <li id="microsoft"><a href="http://oracle.com"></a></li>
                <li id="oracle"><a href="http://palantir.com"></a></li>
                <li id="palantir"><a href="http://www.slb.com"></a></li>
                <li id="slb"><a href="http://www.dropbox.com"></a></li>
                <li id="sequoia"><a href="http://www.sequoiacap.com"></a></li>
                <li id="andmore"><a href="/companies/exhibitorlist">and more...</a></li>
            </ul>
            
        </div>-->
    </div>

	<script type="text/javascript" charset="utf-8">
	  $(document).ready(function(){
	    $("a[rel^='prettyPhoto']").prettyPhoto({
			default_width: 800,
			default_height: 450,
			markup: '<div class="pp_pic_holder"> \
									<div class="ppt">&nbsp;</div> \
									<div class="pp_top"> \
										<div class="pp_left"></div> \
										<div class="pp_middle"></div> \
										<div class="pp_right"></div> \
									</div> \
									<div class="pp_content_container"> \
										<div class="pp_left"> \
										<div class="pp_right"> \
											<div class="pp_content" style="background: rgba(255,255,255,0)"> \
												<div class="pp_loaderIcon"></div> \
												<div class="pp_fade"> \
													<a href="#" class="pp_expand" title="Expand the image">Expand</a> \
													<div class="pp_hoverContainer"> \
														<a class="pp_next" href="#">next</a> \
														<a class="pp_previous" href="#">previous</a> \
													</div> \
													<div id="pp_full_res"></div> \
													<div class="pp_details"> \
														<div class="pp_nav"> \
															<a href="#" class="pp_arrow_previous">Previous</a> \
															<p class="currentTextHolder">0/0</p> \
															<a href="#" class="pp_arrow_next">Next</a> \
														</div> \
														<a class="pp_close" href="#">Close</a> \
													</div> \
												</div> \
											</div> \
										</div> \
										</div> \
									</div> \
									<div class="pp_bottom"> \
										<div class="pp_left"></div> \
										<div class="pp_middle"></div> \
										<div class="pp_right"></div> \
									</div> \
								</div> \
								<div class="pp_overlay"></div>'
		});
	  });
	</script>
</body>
</html>

