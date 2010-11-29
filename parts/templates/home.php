<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link href="css/home.css" rel="stylesheet" type="text/css" />
	<!--<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js"></script>-->
	<script type="text/javascript" src="/js/jquery-1.4.2.min.js"></script>
	<script type="text/javascript" src="/js/cufon-yui.js"></script>
	<script type="text/javascript" src="/js/Helvetica.font.js"></script>
	<script type="text/javascript">
		Cufon.replace('h2, h3, #menu a');
	</script>
	<title><?php echo $basetitle?></title>
	<?php include_once('parts/analytics.php');?>
</head>
<body>
	<div id="container">
		<div id="header">
			<div id="header-content">
				<h1>
					<a href="/"><span>MIT TechFair</span></a>
					<div><h2>January 31, 2011</h2><h2>10:00am - 3:30pm at Rockwell Cage</h2></div>
				</h1>
			</div>
		</div>
		<div id="body">
		<div id="c1">
			<div id="event" class="box">
				<h3>the event</h3>
				TechFair is MIT's annual student-run technology expo. All are welcome to sample an eclectic mix of cutting edge technology from companies, labs, and MIT students. 
                <p>Excited about the fair? Kick off starts with an all-night <a href="/events/hackathon/">Hack-a-thon</a>, progresses into the <a href="/events/venue/">fair itself</a> and ends with a <a href="/events/banquet/">banquet</a>. </p><p>TechFair is also home to the <a href="http://www.mittechfair.org/think/index.php">THINK competition</a>, which occurs in the months preceeding TechFair.</p>
				<p>If you are a student and would like to stay up to date with the latest updates and reminders, fill out our <a href="/engage/">student interest form</a>!</p>
				<p><a href="/events/">more info &raquo;</a></p>
			</div>
		<div id="think" class="box">
			<h3>THINK</h3>
			<p>high school science and technology competition</p>
			<p><a href="http://www.mittechfair.org/think/index.php">more info &raquo;</a></p>
		</div>
		<img src="img/photo1.jpg" id="photo1" class="box" /></div>
		<div id="c2">
			<img src="img/photo2.jpg" id="photo2" class="box" />
			<div id="exhibitors" class="box">
				<h3>for exhibitors</h3>
				<p><a href="/companies/">why techfair</a></p>
				<p><a href="/companies/packages/">sponsorship packages</a></p>
				<p><a href="http://mittechfair.org/portal/">company sign in</a></p>
				<p><a href="/students/">MIT student exhibitors</a></p>
			</div>
		</div>
	<div id="c3">
		<div id="menu">
			<ul>
				<li id="map"><a href="/events/venue/" class="box">the fair</a></li>
				<li id="team"><a href="/about/" class="box">about us</a></li>
				<li id="history"><a href="/drop/" class="box">r&#233;sum&#233; drop</a></li>
			</ul>
		</div>
		<div id="techat" class="box">
			<h3>tech@techfair</h3>
			<script src="http://widgets.twimg.com/j/2/widget.js"></script>
			<script>
			new TWTR.Widget({
			  version: 2,
			  type: 'profile',
			  rpp: 3,
			  interval: 6000,
			  width: 290,
			  height: 220,
			  theme: {
			    shell: {
			      background: '#8bb1f1',
			      color: '#000'
			    },
			    tweets: {
			      background: '#8bb1f1',
			      color: '#000', 
			      links: '#fff' 
			    }
			  },
			  features: {
			    scrollbar: false,
			    loop: false,
			    live: false, 
			    hashtags: false,
			    timestamp: false,
			    avatars: false,
			    behavior: 'all'
			  }
			}).render().setUser('mittechfair').start();
			</script>
			<a href="http://twitter.com/mittechfair/">visit our twitter page &raquo;</a></p>
		</div>
		<img src="img/photo3.jpg" id="photo3" class="box" /></div>
		<div style="clear:both"></div>
	</div>
	<div id="footer">
		<div id="footer-content">
			<div id="flickr"></div>
			<div id="footer-links">
				<ul>
					<li><a href="/about/">about us</a></li>
					<li><a href="/contact/">contact us</a></li>
					<li id="copyright">copyright 2006-2011 MIT TechFair</li>
				</ul>
			</div>
			<div style="clear:both"></div>
		</div>
	</div>
</div>
</body>
</html>
