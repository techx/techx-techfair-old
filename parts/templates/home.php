<!DOCTYPE html>
<html>

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>MIT Techfair</title>
    
  <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,400,300,600' rel='stylesheet' type='text/css'>
  <link href="/css/typicons_kit/css/typicons.css" rel="stylesheet" />
  <link href="/css/style.css" rel="stylesheet" />
  <link href="/css/home.css" rel="stylesheet" />

  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVA4WxYlg7xLQh_Yfnj2PDqK4LI1S_y6g&sensor=false"></script>
  <script src="/js/script.js"></script>
        
</head>

<body>
    <div id="container" class="home-container">
      <?php make_header(NULL, NULL, $routes);?>

      <div class="carousel">
        <div class="caption">
          <h1>A new approach to career fairs.</h1>
          <p>Techfair is a student-run organization dedicated to bringing technology and recruiting to campus in a fresh, new way.</p>
        </div>
      </div>
      <div class="for-companies">
        Sponsorships are unfortunately sold out for Techfair 2013. Are you a company attending Techfair 2013? Check out <a href="/companies/info/">our company info page</a>.
      </div>
      <?php schedule(); ?>
      <div class="tile main-fair">
        <h2 class="techfair2013">Techfair 2013</h2>
        <p>Kick off your spring semester with Techfair 2013. Featuring the
        largest number of companies and student exhibitors ever (really, we
        can't fit more), it's going to be an event you won't want to miss.</p>
        <div class="event-details">
          <a href="http://goo.gl/maps/vwbqj">
            <img class="map" height="200" src="http://maps.googleapis.com/maps/api/staticmap?center=MIT+W33&size=250x200&scale=2&sensor=false&markers=color:blue%7Clabel:T%7CMIT+W33" />
          </a>
          <div class="fair-detail">
            <span class="typicn location"></span>
            <div class="detail-caption">
              <a href="http://goo.gl/maps/vwbqj">Rockwell Cage <span class="typicn export nofloat"></span></a> <span class="sub">MIT Building W33</span>
              <p class="address">
                100 Vassar St<br />
                Cambridge, MA 02139
              </p>
            </div>
          </div>
          <div class="fair-detail">
            <span class="typicn time"></span>
            <div class="detail-caption">
              Mon, Feb 4 2013, 10am-3pm
            </div>
          </div>
          <div class="fair-detail">
            <span class="typicn thumbsUp"></span>
            <div class="detail-caption">
              Casual attire
            </div>
          </div>
          <div class="fair-detail">
            <span class="typicn thumbsDown"></span>
            <div class="detail-caption">
              Leave your paper resumes at home.
              <p>
                Drop your resume <a href="http://techfair.mit.edu/drop">online <span class="typicn export nofloat"></span></a> instead.
              </p>
            </div>
          </div>
        </div>
      </div>

      <div class="tile">
        <h2><a href="/hack/">Hackathon: hackMIT</a></h2>
        <p>Techfair is proud to bring to the MIT community <a
        href="/hack">hackMIT (sponsored by Techfair and Palantir)</a>.</p>
        <p>We've worked hard to put <strong>$5000 of prize money on the
        line</strong>, three awesome meals, notable judges, and competitors
        from throughout the northeast. Battle it out over a 12 hour period and
        BRING HONOR AND GLORY TO YOUR SCHOOL.</p>
        <img class="palantir-logo" src="/img/homepage/palantir.png" />
        <div class="event-details">
          <div class="fair-detail">
            <span class="typicn location"></span>
            <div class="detail-caption">
              <a href="http://goo.gl/maps/R3EKa">Stata Center <span class="typicn export nofloat"></span></a>
              <p class="address">
                32 Vassar St<br />
                Cambridge, MA 02139
              </p>
            </div>
          </div>
          <div class="fair-detail">
            <span class="typicn time"></span>
            <div class="detail-caption">
              Sat Feb 2, 8pm - Sun Feb 3, 3pm
            </div>
          </div>
          <div class="fair-detail">
            <span class="typicn anchor"></span>
            <div class="detail-caption">
              Visit <a href="/hack">techfair.mit.edu/hack</a> for detailed schedule, prizes, and more
            </div>
          </div>
          <div class="fair-detail">
            <span class="typicn anchor"></span>
            <div class="detail-caption">
              <a href="http://hackmit.eventbrite.com">Register on Eventbrite</a>
            </div>
          </div>
        </div>
      </div>
      <div class="tile">
        <h2><a href="/talks/">TechTalks</a></h2>
        <div class="speaker-mugs">
          <a href="/events/talks/#paul"><img src="/img/homepage/paul_english.jpg" alt="Paul English" /></a>
          <a href="/events/talks/#ari"><img src="/img/homepage/ari_gesher.jpg" alt="Ari Gesher" /></a>
          <a href="/events/talks/#yoky"><img src="/img/homepage/yoky_matsuoka.jpg" alt="Yoky Matsuoka" /></a>
          <a href="/events/talks/#peter"><img src="/img/homepage/peter_levine.jpg" alt="Peter Levine" /></a>
        </div>
        <p>The second annual TechTalks takes place the Friday after Techfair!
        Come by after classes to hear our incredible lineup of speakers, grab
        some food, and meet interesting people.</p>
        <div class="event-details">
          <div class="fair-detail">
            <span class="typicn location"></span>
            <div class="detail-caption">
              <a href="http://goo.gl/maps/R3EKa">32-123 (Stata Center) <span class="typicn export nofloat"></span></a>
            </div>
          </div>
          <div class="fair-detail">
            <span class="typicn time"></span>
            <div class="detail-caption">
              Fri Feb 8, 4-8pm
              <p>
                Kickoff starts at 4pm, followed by 30 
              <?php /*
              <p>
                <span class="speaker-time">4pm</span> Kickoff<br />
                <span class="speaker-time">4:15pm</span> Paul English <span class="speaker-affiliation">Kayak</span><br />
                <span class="speaker-time">5pm</span> Ari Gesher <span class="speaker-affiliation">Palantir</span><br />
                <span class="speaker-time">6pm</span> Yoky Matsuoka <span class="speaker-affiliation">Nest</span><br />
                <span class="speaker-time">7pm</span> Peter Levine <span class="speaker-affiliation">Andreesen Horowitz</span>
              </p>
              */ ?>
            </div>
          </div>
          <div class="fair-detail">
            <span class="typicn anchor"></span>
            <div class="detail-caption">
              Visit <a href="/talks">techfair.mit.edu/talks</a> for detailed schedule and more
            </div>
          </div>
          <div class="fair-detail">
            <span class="typicn anchor"></span>
            <div class="detail-caption">
              Watch this spot for a link to registration (coming soon)
            </div>
          </div>
        </div>
        <div class="clearfix"></div>
      </div>

      <div class="half tile">
        <h2><a href="/events/banquet/">Banquet</a></h2>
        <p><img src="/img/banquet/Banquet3.jpg" width="400" /></p>
        <p><strong>The Techfair banquet is an exclusive event that allows
        companies and students to connect over a classy dinner.</strong>
        Companies that are attending will be able to invite students of their
        choice to sit at their table.</p>
        <p>Invites will start going out in January - look out for an invitation
        by email and text. <strong>Invitations must be accepted by the end of
        the fair, 3pm.</strong></p>
        <div class="event-details">
          <div class="fair-detail">
            <span class="typicn location"></span>
            <div class="detail-caption">
              <a href="http://goo.gl/maps/t7wDX">Boston Marriott Cambridge <span class="typicn export nofloat"></span></a>
              <p class="address">
                2 Cambridge Center<br />
                Cambridge, MA 02142
              </p>
            </div>
          </div>
          <div class="fair-detail">
            <span class="typicn time"></span>
            <div class="detail-caption">
              Mon Feb 4, 5:30-8pm </div>
          </div>
          <div class="fair-detail">
            <span class="typicn anchor"></span>
            <div class="detail-caption">
              Visit <a href="/events/banquet/">techfair.mit.edu/events/banquet/</a> for more details
            </div>
          </div>
        </div>
      </div>
      <div class="half tile">
        <h2><a href="/events/afterparty/">Afterparty</a></h2>
        <p><img src="/img/photos/3-3.jpg" width="400" /></p>
        <p>Kinects, Xbox, and Surfaces meet live DJ, finger food, moocktails,
        and an incredible view of the Boston skyline. The Afterparty is brought
        to you by Microsoft - party one last time before classes start.</p>
        <p><strong>Come celebrate the end of IAP with us at the top of the
        Media Lab.</strong> We'll be giving away free Xboxes and
        Surfaces!
        <div class="event-details">
          <div class="fair-detail">
            <span class="typicn location"></span>
            <div class="detail-caption">
              <a href="http://goo.gl/maps/d6YFp">Media Lab<span class="typicn export nofloat"></span></a>
            </div>
          </div>
          <div class="fair-detail">
            <span class="typicn time"></span>
            <div class="detail-caption">
              Mon Feb 4, 9-11pm
            </div>
          </div>
          <div class="fair-detail">
            <span class="typicn anchor"></span>
            <div class="detail-caption">
              Visit <a
              href="/events/afterparty/">techfair.mit.edu/events/afterparty/</a>
              to learn how to win an Xbox 360 and other details
            </div>
          </div>
        </div>
      </div>

      <?php make_footer($routes); ?>
    </div>
</body>
</html>
