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

</head>
<body>
    <div id="container">
        <?php
        make_header(NULL, NULL, $routes);
        ?>
        <div id="slideshow">
            <div id="info">
                <h2>Techfair 2012</h2>
                <h3>Rockwell Cage - Monday, February 6</h3>
                <h4>9am - 3pm</h4>
                <p>
                    With <strong><a href="/companies/exhibitorlist/">over 50 companies and 30 student projects</a></strong>, this year's student-run expo is bound to be the largest yet.
                </p>
                <p>
                  MIT students, <a href="http://umeqo.com/techfair"><strong>drop your resume</strong></a> by February 4th
                </p>
				<div id="mini-schedule-container">
					<div id="mini-schedule-grow-button"></div>
					<div id="mini-schedule-button">
						<div style="padding: 3px 0px 8px 12px; background: rgba(104, 196, 252, 0.8)">
						  <h3><strong>Show Schedule ></strong></h3>
						  </div>
					</div>
					<div id="mini-schedule">
						<div id="mini-schedule-content">
							<h2>Schedule</h2>
							<h3>Full Schedule <a href="/events/">Here</a></h3>
							<table cellpadding=4 cellspacing=5 RULES=ROWS>
                <tr>
                  <th><strong>Event</strong>
                  <th><strong>Time</strong>
                  <th><strong>Location</strong>
                </tr>
                <tr>
                  <td width=92><a href="/events/hackathon/"><strong>Hackathon</strong></a>
                  <td>Sat 2/4 10pm-8am
                  <td>TBA
                </tr>
                <tr>
                  <td><a href="/events/fair/"><strong>The Fair</strong></a>
                  <td>Mon 2/6 9am-3pm
                  <td>Rockwell Cage
                </tr>
                <tr>
                  <td><a href="/events/banquet/"><strong>Banquet</strong></a>
                  <td>Mon 2/6 6pm-8:30pm
                  <td>The Hyatt
                </tr>
                <tr>
                  <td><a href="/events/afterparty/"><strong>Afterparty</strong></a>
                  <td>Mon 2/6 9pm-11pm
                  <td>E14 6th floor
                </tr>
                <tr>
                  <td><a href="/events/talks/"><strong>TechTalks</strong></a>
                  <td>Sat 2/11 Time TBA
                  <td>10-250
                </tr>
              </table>
              
						</div>
					</div>
				</div>
            </div>
            <div id="overlay"></div>
            <img class="show" src="http://i19.photobucket.com/albums/b169/3xc1m4tion/1.png"/>
            <img src="http://i19.photobucket.com/albums/b169/3xc1m4tion/2.png"/>
            <img src="http://i19.photobucket.com/albums/b169/3xc1m4tion/3.png"/>
            <img src="http://i19.photobucket.com/albums/b169/3xc1m4tion/4.png"/>
            <img src="http://i19.photobucket.com/albums/b169/3xc1m4tion/5.png"/>
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
</body>
</html>

