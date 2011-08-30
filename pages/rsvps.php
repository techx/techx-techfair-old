<h1>Banquet RSVPS</h1>
<style>
#rsvps {
    font-size: 11px;
}
#rsvps td {
    padding: 2px 5px;
}
.pad {
    height: 10px;
}
</style>
<table id="rsvps">
<?php
$mysqli = new mysqli('mysql.mit.edu','techfair','02139techfair','techfair+dayof');
$q = $mysqli->query("SELECT fname,lname,company,athena,status,UNIX_TIMESTAMP(timestamp) as timestamp,phone,meal FROM banquet_rsvp ORDER BY company,status,timestamp,meal");
$cur = "";
$status = array('Attending','Not Attending','Waitlisted');
$i = 1;
while ($row = $q->fetch_assoc()) {
$p = $mysqli->query("SELECT id,colabname,hash,banquetnumreps,package FROM companies WHERE id={$row['company']}");
$company = $p->fetch_assoc();
$s = $mysqli->query("SELECT banquetseats FROM packages WHERE id={$company['package']}");
$package = $s->fetch_assoc();
$banquetseats = $package['banquetseats'];
$o = $mysqli->query("SELECT count(athena) as invitees FROM banquet_rsvp WHERE company={$company['id']}");
$num = $o->fetch_assoc();
$num = $num['invitees'];
if ($company['colabname']!=$cur) {
    echo "<tr class='pad'><td colspan=\"5\"><strong><a href=\"http://techfair.mit.edu/b&id=",$company['hash'],"\">",$company['colabname'],"</a></strong></td><td>(reps + invitees=)taken/available</td></tr>";
    $cur = $company['colabname'];
}
?>
<tr>
    <td style="text-align:right"><?php echo $i?>.</td>
    <td><?php echo $row['fname'],' ',$row['lname'],' (',$row['athena'],')'?></td>
    <td><?php echo $row['phone']?></td>
    <td><?php echo $row['meal']?></td>
    <td><?php echo $status[$row['status']]?></td>
    <td>(<?php echo $company['banquetnumreps']?> + <?php echo $num?>=)<strong><?php echo ($company['banquetnumreps']*1+$num)?>/<?php echo $banquetseats ?></strong></td>
</tr>
<?php
$i++;
}
?>
</table>
<h2>): Nobody's Coming!</h2>
<ul>
<?php
$q2 = $mysqli->query("SELECT id,colabname FROM companies");
while ($row = $q2->fetch_assoc()) {
    $p2 = $mysqli->query("SELECT count(athena) as count FROM banquet_rsvp WHERE company={$row['id']}");
    $data = $p2->fetch_assoc();
    if ($data['count']==0) {
        echo '<li>',$row['colabname'],'</li>';
    }
}
?>
</ul>
