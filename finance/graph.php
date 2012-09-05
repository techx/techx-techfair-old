<?
$WIDTH = 800;
$HEIGHT = 600;
$data = Array();
if ($_FILES["file"]["size"] > 0) {
	$x = explode("\n", file_get_contents($_FILES["file"]["tmp_name"]));
	foreach ($x as $str) {
		$a = explode(" ", $str);
		$data[] = Array(floatval($a[0]), floatval($a[1]));
	}
}
?>
<!DOCTYPE html>
<html lang=en>
<head>
<title>Graphr</title>
</head>
<body>
<form action=graph.php method=post enctype="multipart/form-data">
<label for=file>Graph:</label>
<input type=file name=file id=file />
<input type=submit name=submit value=Submit />
</form>
<svg xmlns="http://www.w3.org/2000/svg" version=1.1>
<rect width=<?echo $WIDTH;?> height=<?echo $HEIGHT;?> style="fill:rgb(255,255,255);strike-width:1;stroke:rgb(0,0,0)" />
<?
// find min, max of x, y
$minx = $data[0][0];
$maxx = $data[0][0];
$miny = $data[0][1];
$maxy = $data[0][1];
foreach ($data as $a) {
	$minx = min($minx, $a[0]);
	$maxx = max($maxx, $a[0]);
	$miny = min($miny, $a[1]);
	$maxy = max($maxy, $a[1]);
}
$miny--; $maxy++;
foreach ($data as $a) {
	$x = $WIDTH*$a[0]/(float)($maxx-$minx);
	$y = $HEIGHT - $HEIGHT*$a[1]/(float)($maxy-$miny);
	echo "<circle cx=$x cy=$y r=2 fill=red />";
}
?>
</svg>
<div style="position:absolute; top:650px;">
<h3>Graph data</h3>
<ol>
<?
foreach ($data as $a) {
	$x = $WIDTH*$a[0]/(float)($maxx-$minx);
	$y = $HEIGHT - $HEIGHT*$a[1]/(float)($maxy-$miny);
	echo "<li>($x, $y)</li>";
}
?>
</ol>
</div>
</body>
</html>

