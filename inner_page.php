<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>MIT Techfair</title>
    
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
        
 
    <style>
       @font-face {font-family: 'CallunaSans-Regular';src: url('css/webfonts/1D47AE_0_0.eot');src: url('css/webfonts/1D47AE_0_0.eot?#iefix') format('embedded-opentype'),url('css/webfonts/1D47AE_0_0.woff') format('woff'),url('css/webfonts/1D47AE_0_0.ttf') format('truetype');}
 
       body {
            background: #e6e6e6;
            margin: 0;
            padding: 0;
            font-family: 'CallunaSans-Regular', sans-serif;
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
            color: #111;
            text-decoration: none;
        }
        #nav:hover #subMenu {
            height:200px;
        }
        

        
       #content {
       		border-top: 1px solid #dddddd;
			clear: both;
			padding: 10px 20px 20px;
		}
		#content a {
			color: #006cff;
		}
		#content h1 {
			margin: 20px 0 0 0px;
			font-size: 30px;
			font-weight: 300;
			padding-left: 0px;
		}
		#content h2 {
			font-size: 24px;
			color: #76AADF;
			margin: 10px 0 5px 0px;
			padding-left: 0px;
		}
		#content h3 {
			font-size: 20px;
			color: #F29523;
			margin: 10px 0 0;
			margin-left: 0px;
			padding-left: 0px;
		}
		#content h4 {
		    font-size: 14px;
		    font-weight: 600;
		}
		#content p {
			padding: 5px 0;
			font-size: 14px;
			line-height: 22px;
			color: #444;
		}
		#content strong {
			font-weight: 600;
		}
		#content ul {
			font-size: 14px;
			line-height: 22px;
			list-style-type: disc;
			padding-left: 20px;
		}

		#column-top {
			width:100%;
		}
		#column-left {
			width: 50%;
			float:left;
		}
        #column-right {
			width: 50%;
			float:right;
		}
		#column-bottom {
			width: 100%;
			clear:both;
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
     	<div id="content">
	
			<div id="column-top">
				<h1>The Fair</h1>
				<p>Come join the expo of cutting edge technology and experience the innovation from Oracle, Facebook, 23andme, Dropbox, and many more companies and labs!</p>
				<p>Techfair will be conducted "trade-show" style. The audience will be able to walk around to different companies and learn about the company, what they're presenting on, how the science and technologies work, and careers in the company and field of research. We'll also be raffling off great prizes!</p>
				<p>Please visit this site soon for a list of companies that will be presenting during the exposition. If you have any questions, please contact us! We also welcome MIT students to help organize the fair.</p>
				<p><a href="https://picasaweb.google.com/103604151821709535051/MITTechFair2011">View our photos from Techfair 2011</a></p>
			</div>
			<div id="column-left">
				<h2>Who</h2>
				<p>All MIT students, staff, and affliates are welcome to attend!</p>
				<h3 id="raffle">RAFFLE WINNERS</h3>
				<strong>Round 1</strong>
				<ul>
				    <li>SSD Drive: <strong>Rishikesh R. Tirumala (rrt)</strong></li>
				    <li>23" Monitor: <strong>Kwadwo Nyarko (kwadwo)</strong></li>
				    <li>Asus Netbook: <strong>Amanda J. Lazaro (ajlazaro)</strong></li>
				</ul>
				<strong>Round 2</strong>
				<ul>
				    <li>SSD Drive: <strong>Sarah R. Edris (sedris)</strong></li>
				    <li>23" Monitor: <strong>Victor Marius Costan (costan)</strong></li>
				    <li>Apple iPad: <strong>Steven Carreno (carreno)</strong></li>
				</ul>
			</div>
			
			<div id="column-right">
				<h2>What</h2>
				<p>Techfair: An annual student-run technology expo dedicated to innovation</p>
		
				<h2>When</h2>
				<p>
				10:00am - 3:30pm<br>
				January 31st, 2011<br>
				MIT Spring 2011 Registration Day
				</p>
			</div>
			
			<div id="column-bottom">
				<h2>Where</h2>
				<p>Techfair 2011 will be held at Rockwell Cage (building W33) on MIT campus, located on Vassar Street behind the student center. If you're coming from out of town, <a href="http://whereis.mit.edu/directions.html">directions to MIT are available</a>. Click the map below for a larger, interactive version.</p>
				<h3>Map</h3>
				<a href="http://whereis.mit.edu/?go=W33"><img src="/img/map.png" alt="map of MIT" /></a>	
			</div>
				
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

