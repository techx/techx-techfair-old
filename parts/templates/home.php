<!DOCTYPE html>
<html>

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>MIT Techfair</title>
    
  <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,400,300,600' rel='stylesheet' type='text/css'>
  <link href="css/style.css" rel="stylesheet" />
  <link href="css/home.css" rel="stylesheet" />

  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
        
</head>

<body>
    <div id="container" class="home-container">
      <?php make_header(NULL, NULL, $routes);?>

      <div class="carousel">
        <div class="caption">
          <h1>A new approach to career fair.</h1>
          <p>Techfair is a student-run organization dedicated to bringing technology and recruiting to campus in a fresh, new way.</p>
        </div>
      </div>

      <div class="tile main-fair">
        <h2>Techfair 2013</h2>
        <img class="map" width="250" src="http://maps.googleapis.com/maps/api/staticmap?center=MIT+W33&size=250x250&scale=2&sensor=false&markers=color:blue%7Clabel:T%7CMIT+W33" />
        <p>Kick off your spring semester with Techfair 2013. Featuring the
        largest number of companies and student exhibitors ever (really, we
        can't fit more), it's going to be an event you won't want to miss.</p>
        <dl>
          <dt>Location</dt>
          <dd>Rockwell Cage, MIT Building W33</dd>
          <dt>Time and Date</dt>
          <dd>February 4th, 2013 - 10am-3pm</dd>
          <dt>
        </dl>
      </div>

      <?php make_footer();?>
    </div>
</body>
</html>
