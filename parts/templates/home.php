<!DOCTYPE html>
<html>

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>MIT Techfair</title>
    
  <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,400,300,600' rel='stylesheet' type='text/css'>
  <link href="css/typicons_kit/css/typicons.css" rel="stylesheet" />
  <link href="css/style.css" rel="stylesheet" />
  <link href="css/home.css" rel="stylesheet" />

  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVA4WxYlg7xLQh_Yfnj2PDqK4LI1S_y6g&sensor=false"></script>
  <script src="js/home.js"></script>
        
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

      <div class="schedule">
        <div id="schedule-map" class="schedule-map"></div>
        <div class="schedule-wrapper">
          <h3>2013 Schedule</h3>
          <div class="event">
            <div class="event-name">Hackathon</div>
            <div class="time-item">Feb 2 <strong>8PM</strong></div>
            <div class="desc-item">doors open</div>
            <div class="desc-item map-location" data-name="Ray and Maria Stata Center" data-lat="42.361667" data-lng="-71.090512">
              <a href="http://goo.gl/maps/R3EKa">Stata Center <span class="typicn export"></span></a>
            </div>
            <div class="time-item">Feb 3 <strong>1PM</strong></div>
            <div class="desc-item">hacking ends</div>
            <div class="time-item no-date"><strong>1:30PM</strong></div>
            <div class="desc-item">presentation &amp; awards</div>
            <div class="clearfix"></div>
          </div>
          <div class="event">
            <div class="event-name">Fair</div>
            <div class="time-item">Feb 4 <strong>10AM</strong></div>
            <div class="desc-item">doors open</div>
            <div class="desc-item map-location" data-name="Rockwell Cage" data-lat="42.359242" data-lng="-71.095855">
              <a href="http://http://goo.gl/maps/vwbqj">Rockwell Cage <span class="typicn export"></span></a>
            </div>
            <div class="time-item no-date"><strong>3PM</strong></div>
            <div class="desc-item">fair concludes</div>
            <div class="clearfix"></div>
          </div>
          <div class="event">
            <div class="event-name">Banquet</div>
            <div class="time-item no-date"><strong>6PM</strong></div>
            <div class="desc-item">networking kickoff</div>
            <div class="desc-item map-location" data-name="Media Lab" data-lat="42.363047" data-lng="-71.085963">
              <a href="http://goo.gl/maps/t7wDX">Boston Marriott Cambridge<span class="typicn export"></span></a>
            </div>
            <div class="time-item no-date"><strong>8:30PM</strong></div>
            <div class="desc-item">banquet concludes</div>
            <div class="clearfix"></div>
          </div>
          <div class="event">
            <div class="event-name">Afterparty</div>
            <div class="time-item no-date"><strong>9PM</strong></div>
            <div class="desc-item">the party begins</div>
            <div class="desc-item map-location" data-name="Media Lab" data-lat="42.360415" data-lng="-71.087315">
              <a href="http://goo.gl/maps/d6YFp">Media Lab<span class="typicn export"></span></a>
            </div>
            <div class="clearfix"></div>
          </div>
          <div class="event">
            <div class="event-name">TechTalks</div>
            <div class="time-item">Feb 8 <strong>6-10PM</strong></div>
            <div class="desc-item map-location" data-name="32-123" data-lat="42.361315" data-lng="-71.090646">
              <a href="http://goo.gl/maps/R3EKa">32-123 (Stata Center) <span class="typicn export"></span></a>
            </div>
          </div>
        </div>
      </div>

      <div class="tile main-fair">
        <h2 class="techfair2013">Techfair 2013</h2>
        <p>Kick off your spring semester with Techfair 2013. Featuring the
        largest number of companies and student exhibitors ever (really, we
        can't fit more), it's going to be an event you won't want to miss.</p>
        <div class="event-details">
          <a href="http://goo.gl/maps/vwbqj">
            <img class="map" height="200" src="http://maps.googleapis.com/maps/api/staticmap?center=MIT+W33&size=350x200&scale=2&sensor=false&markers=color:blue%7Clabel:T%7CMIT+W33" />
          </a>
          <div class="fair-detail">
            <span class="typicn location"></span>
            <div class="detail-caption">
              <a href="http://goo.gl/maps/vwbqj">Rockwell Cage <span class="typicn export nofloat"></span></a> <span class="sub">MIT Building W33</span>
              <p class="address">
                120 Vassar St<br />
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
        <h2>Hackathon</h2>
        <p>Techfair is proud to bring to the MIT community the <a
        href="/hack">Techfair Hackathon (sponsored by Palantir)</a>.</p>
        <p>We've worked hard to put <strong>$5000 of prize money on the
        line</strong>, three awesome meals, notable judges, and competitors
        from throughout the northeast. Battle it out over a 12 hour period and
        BRING HONOR AND GLORY TO YOUR SCHOOL.</p>
        <p>Visit <a href="/hack">techfair.mit.edu/hack</a> for more
        details, and be sure to <a
        href="http://techfairhack2013.eventbrite.com">register on
        Eventbrite</a>.
        <img class="palantir-logo" src="/img/homepage/palantir.png" />
        <div class="event-details">
          <div class="fair-detail">
            <span class="typicn location"></span>
            <div class="detail-caption">
              <a href="http://goo.gl/maps/R3EKa">Ray and Maria Stata Center <span class="typicn export nofloat"></span></a>
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
        </div>
      </div>
      <div class="tile">
        <h2>TechTalks</h2>
        <p>The second annual TechTalks takes place the Friday after Techfair!
        Come by after classes to hear our incredible lineup of speakers, grab
        some food, and meet interesting people.</p>
        <p>Visit <a href="/talks">techfair.mit.edu/talks</a> for more
        details and for videos from last year.</p>
        <div class="event-details">
          <div class="fair-detail">
            <span class="typicn location"></span>
            <div class="detail-caption">
              <a href="http://goo.gl/maps/R3EKa">32-123 (Ray and Maria Stata Center) <span class="typicn export nofloat"></span></a>
            </div>
          </div>
          <div class="fair-detail">
            <span class="typicn time"></span>
            <div class="detail-caption">
              Fri Feb 8
              <p>
                6pm: Speaker A<br />
                7pm: Speaker B<br />
                8pm: Speaker C<br />
                9pm: Speaker D
              </p>
            </div>
          </div>
        </div>
      </div>

      <div class="half tile">
        <h2>Banquet</h2>
        <p><img src="/img/banquet/Banquet3.jpg" width="400" /></p>
        <p><strong>The Techfair banquet is an exclusive event that allows
        companies and students to connect over a classy dinner.</strong>
        Companies that are attending will be able to invite students of their
        choice to sit at their table.</p>
        <p>Invites will start going out in January - look out for an invitation
        by email and text. <strong>Invitations must be accepted by the end of
        the fair, 3pm.</strong></p>
        <p>Visit <a
        href="/events/banquet/">techfair.mit.edu/events/banquet/</a> for more
        information.</p>
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
              Mon Feb 4, 6-8:30pm
            </div>
          </div>
        </div>
      </div>
      <div class="half tile">
        <h2>Afterparty</h2>
        <p><img src="/img/photos/3-3.jpg" width="400" /></p>
        <p>Kinects, Xbox, and Surfaces meet a live DJ, food, drinks, and an
        incredible view of the Boston skyline. The Afterparty is brought to you
        by Microsoft - party one last time before classes start!</p>
        <p><strong>Come celebrate the end of Techfair day with us at the
        top of the Media Lab.</strong> We'll be giving away free Xboxes and
        Surfaces - for more afterparty information visit <a
        href="/events/afterparty/">techfair.mit.edu/events/afterparty/</a>.</p>
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
        </div>
      </div>

      <?php make_footer();?>
    </div>
</body>
</html>
