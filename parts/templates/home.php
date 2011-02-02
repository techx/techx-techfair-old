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
		<div>
		    <span id="close"><span class="ui-icon ui-icon-circle-close"></span>close</span>
			<script src="http://player.ooyala.com/player.js?width=960&height=540&embedCode=ZkeGd2MTrsnQOCzU7pYc2DfL1xbek1cv&autoplay=1&browserPlacement=left350px"></script><noscript><object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" id="ooyalaPlayer_22y6g_gj3ciu90" width="960" height="540" codebase="http://fpdownload.macromedia.com/get/flashplayer/current/swflash.cab"><param name="movie" value="http://player.ooyala.com/player.swf?embedCode=ZkeGd2MTrsnQOCzU7pYc2DfL1xbek1cv&version=2" /><param name="bgcolor" value="#000000" /><param name="allowScriptAccess" value="always" /><param name="allowFullScreen" value="true" /><param name="flashvars" value="embedType=noscriptObjectTag&embedCode=ZkeGd2MTrsnQOCzU7pYc2DfL1xbek1cv&autoplay=1&browserPlacement=left350px" /><embed src="http://player.ooyala.com/player.swf?embedCode=ZkeGd2MTrsnQOCzU7pYc2DfL1xbek1cv&version=2" bgcolor="#000000" width="960" height="540" name="ooyalaPlayer_22y6g_gj3ciu90" align="middle" play="true" loop="false" allowscriptaccess="always" allowfullscreen="true" type="application/x-shockwave-flash" flashvars="&embedCode=ZkeGd2MTrsnQOCzU7pYc2DfL1xbek1cv&autoplay=1&browserPlacement=left350px" pluginspage="http://www.adobe.com/go/getflashplayer"></embed></object></noscript>
		</div>
	</div>
	<div id="container">
		<div id="header">
			<div id="header-content">
			    <div id="header-inner">
    				<h1>
    					<a href="/"><span>MIT TechFair</span></a>
    					<div><h2>"Reg Day" Monday, January 31, 2011</h2><h2>10:00am - 3:30pm at Rockwell Cage</h2></div>
    				</h1>
			
        			<div id="countdown">
                    <div id="countdown-day" class="cd"><span id="cd-day">Lo</span><span class="cd-sub">days</span></div>
                    <div id="countdown-hr" class="cd"><span id="cd-hr">ad</span><span class="cd-sub">hours</span></div>
                    <div id="countdown-min" class="cd"><span id="cd-min">in</span><span class="cd-sub">mins</span></div>
                    <div id="countdown-sec" class="cd"><span id="cd-sec">g</span><span class="cd-sub">secs</span></div>
                    <div style="clear:both"></div>
                    </div>

                    <script>
                    var montharray=new Array("Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec")

                    function countdown(yr,m,d){
                    	theyear=yr;themonth=m;theday=d;
                    	var today=new Date();
                    	var todayy=today.getYear();
                    	if (todayy < 1000)
                    		todayy+=1900;
                    	var todaym=today.getMonth();
                    	var todayd=today.getDate();
                    	var todayh=today.getHours();
                    	var todaymin=today.getMinutes();
                    	var todaysec=today.getSeconds();
                    	var todaystring=montharray[todaym]+" "+todayd+", "+todayy+" "+todayh+":"+todaymin+":"+todaysec;
                    	futurestring=montharray[m-1]+" "+d+", "+yr;
                    	dd=Date.parse(futurestring)-Date.parse(todaystring);
                    	dday=Math.floor(dd/(60*60*1000*24)*1);
                    	dhour=Math.floor((dd%(60*60*1000*24))/(60*60*1000)*1);
                    	dmin=Math.floor(((dd%(60*60*1000*24))%(60*60*1000))/(60*1000)*1);
                    	dsec=Math.floor((((dd%(60*60*1000*24))%(60*60*1000))%(60*1000))/1000*1);
                    	if(dday==0&&dhour==0&&dmin==0&&dsec==1){
                    		document.getElementById('countdown').innerHTML='It\'s today! Check us out at Rockwell Cage!';
                    		document.getElementById('countdown').style='background-color:#222;border-bottom:10px solid #aaa;';
                    		return;
                    	}
                    	else{
                    		document.getElementById('cd-day').innerHTML=dday;
                    		document.getElementById('cd-hr').innerHTML=dhour;
                    		document.getElementById('cd-min').innerHTML=dmin;
                    		document.getElementById('cd-sec').innerHTML=dsec;
                    		setTimeout("countdown(theyear,themonth,theday)",1000);
                    	}
                    }

                    countdown(2011,1,31);
                    </script>
                
    			</div>
    		</div>
		</div>
		<div id="body">
		<div id="c1">
			<div id="event" class="box">
				<h3>schedule of events</h3>
				<table>
				    <tr>
				        <th><a href="/events/hackathon/">Hack-a-thon</a></th>
				        <td>1/30 10pm - 1/31 8am<br /><span>32-082 (Stata TEAL room)</td>
				    </tr>
				    <tr class="mainFair">
				        <th><a href="/events/venue/">TechFair</a></th>
				        <td>1/31 10am - 3:30pm<br />Rockwell Cage</td>
				    </tr>
				    <tr>
				        <th><a href="/events/talks/">TechTalks</a></th>
				        <td>At the Fair</td>
				    </tr>
				    <tr>
				        <th><a href="/events/banquet/">Banquet</a></th>
				        <td>1/31 6pm - 8:30pm<br />Hyatt Regency 16th floor<br />Charles View Ballroom</td>
				    </tr>
				    <tr>
				        <th><a href="/events/afterparty/">Afterparty</a></th>
				        <td>1/31 9pm - 11pm<br />E15 (Old Media Lab)<br />Lower Atrium</td>
				    </tr>
				</table>
				<p>Events require a non-expired MIT ID. <a href="/events/">more info &raquo;</a></p>
			</div>
    		<div id="think" class="box">
    			<h3>THINK</h3>
    			<p>high school science and technology competition</p>
    			<p><a href="http://www.mittechfair.org/think/index.php">more info &raquo;</a></p>
    		</div>
    		<img src="img/photo1.jpg" id="photo1" class="box" />
		</div>
		<div id="c2">
			<div id="photo2" class="box">
			    <img src="/img/logos/oracle.png" />
		        <img src="/img/logos/23andme.png" />
                <img src="/img/logos/akamai.png" />
                <!--<img src="/img/logos/aol.png" />-->
                <img src="/img/logos/boeing.png" />
                <img src="/img/logos/cisco.png" />
                <img src="/img/logos/cooliris.png" />
                <img src="/img/logos/dropbox.png" />
                <img src="/img/logos/facebook.png" />
                <img src="/img/logos/interactive.png" />
                <img src="/img/logos/lockheed.png" />
                <img src="/img/logos/mathworks.png" />
                <img src="/img/logos/mesoscale.png" />
                <img src="/img/logos/microsoft.png" />
                <img src="/img/logos/mozilla.png" />
                <img src="/img/logos/palantir.png" />
                <img src="/img/logos/schlumberger.png" />
                <img src="/img/logos/synaptics.png" />
                <img src="/img/logos/walz.png" />
			</div>
			<div id="exhibitors" class="box">
        		<h3>for companies</h3>
        		<p><a href="/companies/exhibitorlist/">2011 exhibitors</a></p>
        		<p><a href="/events/talks/">TechTalks</a></p>
        		<p><a href="http://mittechfair.org/portal/">company sign in</a></p>
			</div>
		</div>
	<div id="c3">
		<div id="menu">
			<ul>
				<li id="map"><a href="/events/venue/" class="box">the fair</a></li>
				<li id="team"><a href="http://dl.dropbox.com/u/13568755/Booklet2011-Jan25-med-res.pdf" class="box">booklet</a></li>
				<li id="history"><a href="/drop/" class="box">r&#233;sum&#233; drop</a></li>
			</ul>
		</div>
		<div id="students" class="box">
			<h3>for students</h3>
			<p><a href="/companies/exhibitorlist/">2011 exhibitors</a></p>
			<p><a href="/students/checklist/">TechFair checklist</a></p>
			<p><a href="/drop/">r&#233;sum&#233; drop</a></p>
			<div style="font-size:18px;text-align:center;"><a href="/events/venue/#raffle" style="text-decoration:underline">The raffle winners have been announced!</a></div>
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
					<li id="copyright">copyright 2006-2011 MIT TechFair</li>
				</ul>
			</div>
			<div style="clear:both"></div>
		</div>
	</div>
</div>
<script type="text/javascript">
	$('#photo2').click(function(){
		$('#movie').css('display','block');
	});
	$('#movie #close').click(function(){
		$('#movie').css('display','none');
	});
	$(document).keyup(function(event){
	    if (event.keyCode=='27') {
	        $('#movie').css('display','none');
	    }
	});
</script>
</body>
</html>
