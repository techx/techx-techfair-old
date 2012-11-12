<?php
$name = '';
$cost = '';
$package = '';
$invoice = '';
$other = '';
$url = '';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $name = htmlspecialchars($_POST['company']);
  $cost = htmlspecialchars($_POST['cost']);
  if (!is_numeric($cost)) {
    $cost = '';
  }
  $package = htmlspecialchars($_POST['package']);
  $other = htmlspecialchars($_POST['other']);
  if ($package == 'other') {
    $package = htmlspecialchars($_POST['other-name']);
  }
  $invoice = htmlspecialchars($_POST['invoice']);
  if ($name != '' &&
      $cost != '' &&
      $package != '' &&
      $invoice != '') {
    $hash = md5($name.'techfair'.$_SERVER['REQUEST_TIME']);
    $mysql = mysql_connect('mysql.mit.edu', 'techfair', '02139techfair') or die(mysql_error());
    mysql_select_db('techfair+dough');
    $query = sprintf("INSERT into payment_2013 (name,cost,hash,package,invoice,creator) VALUES ('%s','%d','%s','%s','%s','%s')",
      mysql_real_escape_string($name),
      mysql_real_escape_string($cost),
      mysql_real_escape_string($hash),
      mysql_real_escape_string($package),
      mysql_real_escape_string($invoice),
      mysql_real_escape_string($_SERVER['SSL_CLIENT_S_DN_Email']));
	  mysql_query($query) or die(mysql_error());
    $url = 'http://techfair.mit.edu/payment.php?i=' . $hash;
    header('Location: '.$url);
  }
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Create payment page</title>
</head>
<body>
  <form action="" method="POST">
    <h1>Create payment page</h1>
    <p>Type in the details, and a URL will be generated to accept credit card payments. Leave out dollar sign for cost.</p>
    <p>
      <input type="text" name="company" placeholder="company name" value="<?php echo $name; ?>" />
    </p>
    <p>
      <input type="text" name="cost" placeholder="package price" value="<?php echo $cost; ?>" />
    </p>
    <p>
      <?php
      function echo_if_selected($field, $value) {
        if ($field == $value) {
          echo 'checked';
        }
      }
      ?>
      <input type="radio" name="package" value="Startup" id="p-startup" <?php echo_if_selected('startup', $package); ?>/>
        <label for="p-startup">Startup</label>
      <input type="radio" name="package" value="Bronze" id="p-bronze" <?php echo_if_selected('bronze', $package); ?> />
        <label for="p-bronze">Bronze</label>
      <input type="radio" name="package" value="Silver" id="p-silver" <?php echo_if_selected('silver', $package); ?> />
        <label for="p-silver">Silver</label>
      <input type="radio" name="package" value="Gold" id="p-gold" <?php echo_if_selected('gold', $package); ?> />
        <label for="p-gold">Gold</label>
      <input type="radio" name="package" value="other" id="p-other" <?php echo_if_selected('other', $package); ?> />
        <label for="p-other">Other:
          <input type="text" name="other-name" value="<?php echo $other; ?>" />
        </label>
    </p>
    <p>
      <input type="text" name="invoice" placeholder="invoice number" value="<?php echo $invoice; ?>"/>
    </p>
    <p>
      <input type="submit" value="Create" />
    </p>
  </form>
</body>
</html>
