<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link href="css/home.css" rel="stylesheet" type="text/css" />
	<link href="css/jquery-ui/jquery.ui.all.css" rel="stylesheet" type="text/css" />
	<!--<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js"></script>-->
	<script type="text/javascript" src="/js/jquery-1.4.2.min.js"></script>
	<script type="text/javascript" src="/js/jquery-ui-1.8.6.custom.min.js"></script>
	<script type="text/javascript" src="/js/cufon-yui.js"></script>
	<script type="text/javascript" src="/js/Helvetica.font.js"></script>
	<script type="text/javascript">
		Cufon.replace('h2, h3, #menu a');
	</script>
	<title><?php echo $basetitle?></title>
	<?php include_once('parts/analytics.php');?>
</head>
<body>
	<div class="ui-widget-overlay" id="movie">
	</div>
	<div id="container">
		<div id="header">
			<div id="header-content">
				<h1>
					<a href="/"><span>MIT Techfair</span></a>
					<div><h2>January 31, 2011</h2><h2>10:00am - 3:30pm at Rockwell Cage</h2></div>
				</h1>
			</div>
		</div>
		<div id="body">
		<div id="c1">
			<div id="event" class="box">
				<h3>the event</h3>
				Techfair is MIT's annual student-run technology expo. All are welcome to sample an eclectic mix of cutting edge technology from companies, labs, and MIT students. 
                <p>Excited about the fair? Kick off starts with an all-night <a href="/events/hackathon/">Hackathon</a>, progresses into the <a href="/events/fair/">fair itself</a> and ends with a <a href="/events/banquet/">banquet</a>. </p><p>Techfair is also home to the <a href="http://www.mittechfair.org/think/index.php">THINK competition</a>, which occurs in the months preceeding Techfair.</p>
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
			<div id="photo2" class="box"> 
<script src="http://player.ooyala.com/player.js?width=310&height=174&embedCode=I1ZzNpOlFP_EKb6i-tTDPrBqmWN63kf7&view=channel"></script><noscript><object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" id="ooyalaPlayer_3n3dn_gheiblkd" width="310" height="174" codebase="http://fpdownload.macromedia.com/get/flashplayer/current/swflash.cab"><param name="movie" value="http://player.ooyala.com/player.swf?embedCode=I1ZzNpOlFP_EKb6i-tTDPrBqmWN63kf7&version=2" /><param name="bgcolor" value="#000000" /><param name="allowScriptAccess" value="always" /><param name="allowFullScreen" value="true" /><param name="flashvars" value="embedType=noscriptObjectTag&embedCode=I1ZzNpOlFP_EKb6i-tTDPrBqmWN63kf7&view=channel" /><embed src="http://player.ooyala.com/player.swf?embedCode=I1ZzNpOlFP_EKb6i-tTDPrBqmWN63kf7&version=2" bgcolor="#000000" width="310" height="174" name="ooyalaPlayer_3n3dn_gheiblkd" align="middle" play="true" loop="false" allowscriptaccess="always" allowfullscreen="true" type="application/x-shockwave-flash" flashvars="&embedCode=I1ZzNpOlFP_EKb6i-tTDPrBqmWN63kf7&view=channel" pluginspage="http://www.adobe.com/go/getflashplayer"></embed></object></noscript>
			</div>
			<div id="exhibitors" class="box">
				<h3>for companies</h3>
				<p><a href="/companies/">why techfair</a></p>
				<p><a href="/companies/packages/">sponsorship packages</a></p>
				<p><a href="http://mittechfair.org/portal/">company sign in</a></p>
				<p><a href="/students/">MIT student exhibitors</a></p>
			</div>
		</div>
	<div id="c3">
		<div id="menu">
			<ul>
				<li id="map"><a href="/events/fair/" class="box">the fair</a></li>
				<li id="team"><a href="/drop/" class="box">r&#233;sum&#233; drop</a></li>
				<li id="history"><a href="/events/hackathon/" class="box">hack-a-<br/>thon</a></li>
			</ul>
		</div>
		<div id="students" class="box">
			<h3>for students</h3>
			<p><a href="/students/">opportunities at techfair</a></p>
			<p><a href="/students/individual/">individual exhibitors</a></p>
			<p><a href="/students/startups/">student startups</a></p>
			<p><a href="/drop/">r&#233;sum&#233; drop</a></p>
			<!--
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
		-->
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
					<li id="copyright">copyright 2006-2011 MIT Techfair</li>
				</ul>
			</div>
			<div style="clear:both"></div>
		</div>
	</div>
</div>
<!--
<script type="text/javascript">
	$('#photo2').click(function(){
		$('#movie').css('display','block');
	});
	$('#movie').click(function(){
		$(this).css('display','none');
	});
</script>
-->
</body>
</html>
