<?php
if (!isset($_GET['id'])) {
    echo '<h1>Invalid URL.</h1><p>Try <a href="/">visting our home page</a>.';
} else {

$mysqli = new mysqli('mysql.mit.edu','techfair','02139techfair','techfair+dayof');
$hash = $mysqli->real_escape_string($_GET['id']);
$r = $mysqli->query("SELECT id,colabname,banquetnumreps FROM companies WHERE hash='$hash'");
if ($mysqli->affected_rows!=0) {
$data = $r->fetch_assoc();
?>
<h1>Banquet RSVPs</h1>
<h2>Welcome, <?php echo $data['colabname']?></h2>
<p>Below you will find a live updated list of people who have RSVPed to the banquet. Use this as a measure for how many additional invites you should be sending out.</p>
<p><strong>Remember that your own representatives need an invite too.</strong> A full table seats 10 people, so 3 representatives means only 7 students can attend.</p>
<h2>RSVPs</h2>
<?php
    $q = $mysqli->query("SELECT fname,lname,athena,status,UNIX_TIMESTAMP(timestamp) as timestamp,phone FROM banquet_rsvp WHERE company={$data['id']} ORDER BY status,timestamp");
    $status = array('Attending','Not Attending','Waitlisted');
    date_default_timezone_set('America/New_York');
    $section = -1;
    if ($mysqli->affected_rows==0) echo '<h3>No RSVPs yet.</h3>';
    while ($row = $q->fetch_assoc()) {
    if ($section!=$row['status']) {
        $section = $row['status'];
        echo '<h3>',$status[$section],'</h3>';
    }
    /*
    $query = $mysqli->query("SELECT id,hash FROM companies");
    while ($row = $query->fetch_assoc()) {
        $id = $row['id'];
        $hash = substr($row['hash'],0,3);
        $query2 = $mysqli->query("UPDATE companies SET hash='$hash' WHERE id=$id");
    }*/
    ?>
    <div class="rsvp">
        <h4><?php echo $row['fname'],' ',$row['lname']?></h4>
        <div>Phone: <?php echo $row['phone']?></div>
        <div>RSVPed at: <?php echo date('g:i:s a',$row['timestamp'])?></div>
    </div>
    <?php
    }
} else {
    echo '<h1>Invalid URL.</h1><p>Try <a href="/">visting our home page</a>.';
}

}
?>