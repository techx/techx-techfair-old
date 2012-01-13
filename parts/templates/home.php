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
                <h2>Introducing Techfair 2012</h2>
                <h3>Techfair comes to Rockwell Cage on February 6th!</h3>
                <p>
                    With <strong>over 50 companies</strong>, this year's student-run fair is bound to be the largest yet.
                </p>
                <p>
                    Be sure to <a href="http://umeqo.com/techfair">drop your resume</a> before the fair, and check out the <a href="#">fair schedule</a>.
                    Don't miss out on the <a href="/events/hackathon">hackathon</a> and <a href="/events/banquet">banquet</a>!
                </p>
            </div>
            <div id="overlay"></div>
            <img class="show" src="http://i19.photobucket.com/albums/b169/3xc1m4tion/1.png"/>
            <img src="http://i19.photobucket.com/albums/b169/3xc1m4tion/2.png"/>
            <img src="http://i19.photobucket.com/albums/b169/3xc1m4tion/3.png"/>
            <img src="http://i19.photobucket.com/albums/b169/3xc1m4tion/4.png"/>
            <img src="http://i19.photobucket.com/albums/b169/3xc1m4tion/5.png"/>
        </div>
        <div id="linkout">
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
                <li id="andmore"><a href="#">and more...</a></li>
            </ul>
            
        </div>
    </div>
</body>
</html>

