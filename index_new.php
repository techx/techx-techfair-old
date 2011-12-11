<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>MIT Techfair</title>
    <link href='http://fonts.googleapis.com/css?family=Galdeano' rel='stylesheet' type='text/css'>
    
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
        
    <script type="text/javascript">
      var _gaq = _gaq || [];  _gaq.push(['_setAccount', 'UA-19969189-3']);  _gaq.push(['_trackPageview']);
      (function() {    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);  })();
    
    var i = 0;
    function advanceSlide() {
    console.log (i);    
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
    
    <style>
        body {
            background: #e6e6e6;
            margin: 0;
            padding: 0;
            font-family: 'Galdeano', sans-serif;
        }
        #container {
            margin: 0 auto;
            width: 1000px;
            background: #FFF;
        }
        #header {
            width: 100%;
            height: 121px;
            background: url(img/homepage/pixely.png) no-repeat top right;
        }
        #logo {
            text-indent: -1000em;
            width: 333px;
            height: 74px;
            margin: 10px 0 0 25px;
            display: inline-block;
            background: url(img/homepage/logo.png);
        }
        #nav {
            width: 100%;
            list-style: none;
        }
        #nav li{
            display: block;
            float: left;   
        }
       #slideshow {
            height: 665px;
            width: 1000px;
            overflow: hidden;
            position: relative;
            margin-top: 10px;
        }
        #overlay {
            position: absolute;
            top: 0;
            height: 665px;
            width: 1000px;
            background-image: url(http://i19.photobucket.com/albums/b169/3xc1m4tion/slideshow-pixels.png);
            z-index: 150;
        }
        #slideshow img {
            position: absolute;
            top: 665px;
            z-index: 1;
        }
        #slideshow img.show {
            top: 0;
            display: block;
            transition: top 2s ease 0s;
            -moz-transition: top 2s ease 0s;
            -webkit-transition: top 2s ease 0s;
            z-index: 100;
        }
        #slideshow img.hide {
            top: -665px;
            display: block;
            transition: top 2s ease 0s;
            -moz-transition: top 2s ease 0s;
            -webkit-transition: top 2s ease 0s;
            z-index: 100;
        }
        #linkout {
            padding: 10px;
        }
        #linkout, #linkout a {
            color: #006cff;
            vertical-align: top;
        }
        #copyright {
            float: right;
        }
        #sponsors{
            width: 100%;
            height: 80px;
            background: url(img/homepage/sponsorheader.png);
        }


        /*make the navigation menu list*/
        #nav {
            width: 1000px;
            list-style: none;
            background: #ffffff;
            margin: 0;
            padding: 0;
            overflow:hidden;
        }
        
        /*apply general rules for menu items*/
        #nav li {
            float: left;
            width: 250px;
            text-align: center;
            border-left:1px solid #999;
            box-sizing: border-box;
            list-style:none;
            background:#ffffff;
        }
        #nav li:first-child {
            border: 0;
        }
        #nav li:last-child {
            border: 0;
        }
        
        #nav > li > a {
            padding: 2px 0;;
            display: block;
        }
        
        #subMenu {
            height:0px;
            width:1000px;
            transition: height 0.3s;
            -moz-transition: height 0.3s; /* Firefox 4 */
            -webkit-transition: height 0.3s; /* Safari and Chrome */
            -o-transition: height 0.3s; /* Opera */
        }
        #subMenu ul {
            list-style: none;
            margin: 0;
            padding: 0;
            width: 1000px;
            background: yellow;
        }
      
        #subMenu li {
            border:0;
            height:200px;
            width:250px;
            background:#ffffff;
        }   
        #nav a {
            color: #000;
            text-decoration: none;
        }
        #nav a:hover {
            text-decoration: underline;
        }
        #subMenu a {
            color: #ccc;
            display:block;
            margin-top:15px;

            transition: color 0.3s;
            -moz-transition: color 0.3s; /* Firefox 4 */
            -webkit-transition: color 0.3s; /* Safari and Chrome */
            -o-transition: color 0.3s; /* Opera */
        }
        /*Display the corresponding submenu on hover, keep it open while hovering over it */
        #eMain:hover ~ #subMenu > ul > #eSub a, #eSub:hover a,
        #sMain:hover ~ #subMenu > ul > #sSub a, #sSub:hover a,
        #cMain:hover ~ #subMenu > ul > #cSub a, #cSub:hover a,
        #aMain:hover ~ #subMenu > ul > #aSub a, #aSub:hover a {
            color: #666;
        }
        #eSub:hover a:hover,
        #sSub:hover a:hover,
        #cSub:hover a:hover,
        #aSub:hover a:hover {
            color: #AAA;
            text-decoration: none;
        }
        #nav:hover #subMenu {
            height:200px;
        }
        
    </style>

</head>
<body>
    <div id="container">
        <div id="header">
            <a id="logo">Techfair</a>
        </div>
       <ul id="nav">
            <li id="eMain">
                <a href="#">Events</a>
            </li>
            <li id="sMain">
                <a href="#">For Students</a>
            </li>
            <li id="cMain">
                <a href="#">For Companies</a>
            </li>
            <li id="aMain">
                <a href="#">About Us</a>
            </li>
            <li id="subMenu">
                <ul>
                    <li id="eSub"><a href="#">Hack-a-thon</a> <a href="#">The Fair</a> <a href="#">TechTalks</a> <a href="#">Banquet</a> <a href="#">Afterparty</a></li>
                    <li id="sSub"><a href="http://google.com">2012 List of Exibitors</a> <a href="#">Startups & Projects</a> <a href="#">Project Funding</a> </li>
                    <li id="cSub"><a href="#">2012 List of Exibitors</a> <a href="#">Sponsorship Packages</a> <a href="#">Portal</a> </li>
                    <li id="aSub"><a href="#">Exec Team</a> <a href="#">Past Sponsors</a></li>
                    <li style="clear:both"></li>
                </ul>
            </li>
        </ul>
        <div id="slideshow">
            <div id="overlay"></div>
            <img class="show" src="http://i19.photobucket.com/albums/b169/3xc1m4tion/1.png"/>
            <img src="http://i19.photobucket.com/albums/b169/3xc1m4tion/2.png"/>
            <img src="http://i19.photobucket.com/albums/b169/3xc1m4tion/3.png"/>
            <img src="http://i19.photobucket.com/albums/b169/3xc1m4tion/4.png"/>
            <img src="http://i19.photobucket.com/albums/b169/3xc1m4tion/5.png"/>
        </div>
        <div id="linkout">
            <a href="mailto:techfair-exec@mit.edu">techfair-exec@mit.edu</a>
            <a href="http://facebook.com/techfair"><img src="img/homepage/facebook.png" alt="fb" /></a>
            <a href="http://twitter.com/mittechfair"><img src="img/homepage/twitter.png" alt="twitter" /></a>
            <span id="copyright">&copy; MIT Techfair 2012</span>
        </div>
        <div id="sponsors">
        
        </div>
    </div>
</body>
</html>

