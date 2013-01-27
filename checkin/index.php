<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    sleep(1);
    // Validate email.
    $email = $_POST['email'];

    $email = strtolower($email);
    // Remove @mit.edu part.
    if (preg_match("/mit.edu/",$email)) {
        $email = substr($email, 0, strlen($email) - strlen('@mit.edu'));
    }
	exec("ldapsearch -h ldap.mit.edu -p 389 -u -b 'dc=mit,dc=edu' -x '(uid=".$email.")'", $output1);
    $output1 = implode($output1);
    if (preg_match("/givenName/",$output1))
    {
        echo 'SUCCESS';
        $mysqli = new mysqli('sql.mit.edu','techfair','02139techfair','techfair+applications');
        if (mysqli_connect_errno()) { 
            printf("Connect failed: %s\n", mysqli_connect_error()); 
            exit(); 
        }
        // $stmt = $mysqli->prepare("INSERT INTO midway_2012 (email) VALUES (?)");
        // $stmt->bind_param('s', $_POST['email']);
        // $stmt->execute();
        // $stmt->close();
        $mysqli->close();
    } else {
        header('HTTP/1.0 400 Invalid Athena', true, 400);
    }
    return;
}
?>
<!DOCTYPE html>
<html>
<head>
  <script src="jquery-1.9.0.min.js"></script>
  <script src="athenas.js"></script>
  <script src="script.js"></script>
  <!--<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' />-->
  <link rel="stylesheet" href="style.css" />
</head>
<body>
  <div id="loading" class="hide"><div>
    <div class="div0"></div>
    <div class="div1"></div>
    <div class="div2"></div>
    <div class="div3"></div>
  </div></div>
  <input type="text" id="athena" />
</body>
</html>
