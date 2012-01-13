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
    
    var j = 0;
    function nextSponsor() {
            $("#sponsorslide div").eq((j+1) %2).removeClass("hide").addClass("show");
            $("#sponsorslide div").eq((j) %2).removeClass("show").addClass("hide");
            setTimeout(reset, 2000);
                j++;
                j = j %2;
    }
    function reset() {
            $("#sponsorslide div").eq((j+1) %2).removeClass();
    }

    $(document).ready(function() {
        setInterval(nextSponsor, 8000);
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
            height: 121px;
            margin: 10px 0 0 25px;
            display: inline-block;
            background: url(img/homepage/logo.png) no-repeat left center;
        }
        #nav li{
            display: block;
            float: left;   
            margin-bottom: 10px;
        }
       #slideshow {
            height: 665px;
            width: 1000px;
            overflow: hidden;
            position: relative;
        }
        #overlay {
            position: absolute;
            top: 20px;
            height: 665px;
            width: 1000px;
            background: url('img/homepage/slideshow-pixels.png') no-repeat center bottom;
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
            padding: 25px 15px 20px;
        }
        #linkout, #linkout a {
            color: #006cff;
            vertical-align: top;
        }
        #copyright {
            float: right;
        }
        
        /*sponsors panel code*/
        #sponsors {
            height: 50px;
            width: 1000px;
            overflow: hidden;
            position: relative;
            background-image: url(http://i19.photobucket.com/albums/b169/3xc1m4tion/sponsorheader.png);
            }
        #sponsorslide {
            position: absolute;
            height: 30px;
            width: 1000px;
            top: 20px;
            overflow: hidden;
            }
        #set {
            position: absolute;
            height: 30px;
            width: 1000px;
            top: 50px;
            }
        #set img {
            padding-left: 30px;
            padding-right: 30px;
            }
        #set.show {
            position: absolute;
            top: 0;
            display: block;
            transition: top 2s ease 0s;
            -moz-transition: top 2s ease 0s;
            -webkit-transition: top 2s ease 0s;
        }
        #set.hide {
            position: absolute;
            top: -50px;
            display: block;
            transition: top 2s ease 0s;
            -moz-transition: top 2s ease 0s;
            -webkit-transition: top 2s ease 0s;
        }

        /*make the navigation menu list*/
        #nav {
            margin: 10px 0 0;
            width: 1000px;
            list-style: none;
            background: #ffffff;
            padding: 0;
            overflow:hidden;
        }

        /*apply general rules for menu items*/
        #nav li {
            margin: 0;
            float: left;
            width: 249px;
            text-align: center;
            border-left:1px solid #999;
            list-style:none;
        }
        #nav li:first-child {
            width:250px;
            border: 0;
        }
        #nav li:last-child {
            border: 0;
        }
        
        #nav > li > a {
            padding: 5px 0;;
            display: block;
        }
        
        #nav #subMenu {
            height:0;
            width:1000px;
            transition: height 0.3s;
            -moz-transition: height 0.3s; /* Firefox 4 */
            -webkit-transition: height 0.3s; /* Safari and Chrome */
            -o-transition: height 0.3s; /* Opera */
            -moz-box-shadow: inset 0 5px 5px #EEE;
            -webkit-box-shadow: inset 0 5px 5px #EEE;
            box-shadow: inset 0 5px 5px rgba(0,0,0,0.1), inset 0 -5px 5px rgba(0,0,0,0.1);
            background: #FAFAFA;
            margin: 0;
        }
        #subMenu ul {
            list-style: none;
            margin: 0;
            padding: 0;
            width: 1000px;
        }
      
        #subMenu li {
            border-left: 1px solid #ddd;
            height:200px;
            width:249px;
        }   
         #subMenu li:first-child {
            width:250px;
            border: 0;
        }
         #subMenu li:last-child {
            width:249px;
            border-left: 1px solid #ddd;
        }

        #nav a {
            color: #000;
            text-decoration: none;
        }
        #nav a:hover {
            text-decoration: underline;
        }
        #subMenu a {
            color: #bbb;
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
        
    /*sponsors nav*/        
    ul#sponsorlinks {
        height: 29px;
        overflow: hidden;
        width: 1000px;
        margin: 0 auto;
        list-style: none;
    }
    ul#sponsorlinks li {
        height: 29px;
        overflow: hidden;
        display:inline;
        padding: 10px;
    }
    ul#sponsorlinks a {
        height: 29px;
        overflow: hidden;
        float: left; 
        text-indent: -9999px;
        padding: 10px;
    }
    ul#sponsorlinks li#facebook a {
        width: 150px;
        background: url(http://i19.photobucket.com/albums/b169/3xc1m4tion/logos1.png) 0px 0px;
    }
    ul#sponsorlinks li#facebook a:hover{  
        background-position: 0px -29px;  
    }  
    ul#sponsorlinks li#adobe a {
        width: 195px;
        background: url(http://i19.photobucket.com/albums/b169/3xc1m4tion/logos1.png) -150px 0px;
    }
    ul#sponsorlinks li#adobe a:hover{  
        background-position: -150px -29px;  
    }  
    ul#sponsorlinks li#cisco a {
        width: 134px;
        background: url(http://i19.photobucket.com/albums/b169/3xc1m4tion/logos1.png) -363px 0px;
    }
    ul#sponsorlinks li#cisco a:hover{  
        background-position: -363px -29px;  
    }  
    ul#sponsorlinks li#dropbox a {
        width: 159px;
        background: url(http://i19.photobucket.com/albums/b169/3xc1m4tion/logos1.png) -547px 0px;
    }
    ul#sponsorlinks li#dropbox a:hover{  
        background-position: -547px -29px;  
    }  
    ul#sponsorlinks li#mozilla a {
        width: 135px;
        background: url(http://i19.photobucket.com/albums/b169/3xc1m4tion/logos1.png) -741px 0px;
    }
    ul#sponsorlinks li#mozilla a:hover{  
        background-position: -741px -29px;  
    } 
    ul#sponsorlinks li#microsoft a {
        width: 160px;
        background: url(http://i19.photobucket.com/albums/b169/3xc1m4tion/logos2.png) -40px 0px;
    }
    ul#sponsorlinks li#microsoft a:hover{  
        background-position: -40px -29px;  
    }  
    ul#sponsorlinks li#oracle a {
        width: 176px;
        background: url(http://i19.photobucket.com/albums/b169/3xc1m4tion/logos2.png) -223px 0px;
    }
    ul#sponsorlinks li#oracle a:hover{  
        background-position: -223px -29px;  
    }  
    ul#sponsorlinks li#palantir a {
        width: 177px;
        background: url(http://i19.photobucket.com/albums/b169/3xc1m4tion/logos2.png) -410px 0px;
    }
    ul#sponsorlinks li#palantir a:hover{  
        background-position: -410px -29px;  
    }  
    ul#sponsorlinks li#schlumberger a {
        width: 183px;
        background: url(http://i19.photobucket.com/albums/b169/3xc1m4tion/logos2.png) -583px 0px;
    }
    ul#sponsorlinks li#schlumberger a:hover{  
        background-position: -583px -29px;  
    }  
    ul#sponsorlinks li#sequoia a {
        width: 200px;
        background: url(http://i19.photobucket.com/albums/b169/3xc1m4tion/logos2.png) -783px 0px;
    }
    ul#sponsorlinks li#sequoia a:hover{  
        background-position: -783px -29px;  
    }
    
    #info {
        background: white;
        width: 200px;
        height: 100px;
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
                </ul>
            </li>
        </ul>
        <div id="slideshow">
            <div id="info"></div>
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
        <div id="sponsors" align="center">
            <div id="sponsorslide" >

           
    <div id="set" class="show">
        <ul id="sponsorlinks">
            <li id="facebook"><a href=http://www.facebook.com></a></li>
            <li id="adobe"><a href=http://www.adobe.com></a></li>
            <li id="cisco"><a href=http://www.cisco.com></a></li>
            <li id="dropbox"><a href=http://www.dropbox.com></a></li>
            <li id="mozilla"><a href=http://www.mozilla.com></a></li>
        </ul>
    </div>
    <div id="set">
        <ul id="sponsorlinks">
            <li id="microsoft"><a href=http://www.microsoft.com></a></li>
            <li id="oracle"><a href=http://www.oracle.com></a></li>
            <li id="palantir"><a href=http://www.palantir.com></a></li>
            <li id="schlumberger"><a href=http://www.schlumberger.com></a></li>
            <li id="sequoia"><a href=http://www.sequoia.com></a></li>
        </ul>        
        </div><br>

</div>
</div>
    </div>
</body>
</html>

