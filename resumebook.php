<?php
function displayResumeBook()
{
$mysqli = new mysqli('sql.mit.edu','techfair','02139techfair','techfair+resume');
if (isset($_GET['resume'])):
    $result = $mysqli->query(sprintf("SELECT resume FROM resumedrop11 WHERE id=%d",$_GET['resume']));
    $data = $result->fetch_assoc();
    $file = $data['resume'];
    header('Content-Description: File Transfer');
    header('Content-Type: application/pdf');
    header('Content-Length: '.filesize($file));
    header('Content-Disposition: inline; filename=' . basename($file));
    readfile($file);
elseif (isset($_POST['resumes'])):
    $query = "SELECT resume FROM resumedrop11 WHERE ";
    $ids = array();
    foreach ($_POST['resumes'] as $resume) $ids[] = sprintf('id=%d',$resume);
    $query .= implode(" OR ",$ids);
    $resumes = array();
    $result = $mysqli->query($query);
    while ($row = $result->fetch_assoc()) {
        $resumes[] = $row['resume'];
    }
    $file = '/mit/techfair/web_scripts/resumes/temp/'.uniqid().'.zip';
    //$file = create_zip($resumes,$guid_path,true);
    $args = implode('" "',$resumes);
    $cmd = 'zip -j '.$file.' "'.$args.'"';
    exec($cmd);
    header('Content-Description: File Transfer');
    header('Content-Type: application/zip');
    header('Content-Length: '.filesize($file));
    header('Content-Disposition: attachment; filename= resumes.zip');
    readfile($file);
    unlink($file);
else:
?><!DOCTYPE html>
<html>
<head>
    <title>Resume Book</title>
    <style>
    /* http://meyerweb.com/eric/tools/css/reset/ 
       v2.0 | 20110126
       License: none (public domain)
    */
    
    html, body, div, span, applet, object, iframe,
    h1, h2, h3, h4, h5, h6, p, blockquote, pre,
    a, abbr, acronym, address, big, cite, code,
    del, dfn, em, img, ins, kbd, q, s, samp,
    small, strike, strong, sub, sup, tt, var,
    b, u, i, center,
    dl, dt, dd, ol, ul, li,
    fieldset, form, label, legend,
    table, caption, tbody, tfoot, thead, tr, th, td,
    article, aside, canvas, details, embed, 
    figure, figcaption, footer, header, hgroup, 
    menu, nav, output, ruby, section, summary,
    time, mark, audio, video {
    	margin: 0;
    	padding: 0;
    	border: 0;
    	font-size: 100%;
    	font: inherit;
    	vertical-align: baseline;
    }
    /* HTML5 display-role reset for older browsers */
    article, aside, details, figcaption, figure, 
    footer, header, hgroup, menu, nav, section {
    	display: block;
    }
    body {
    	line-height: 1;
    }
    ol, ul {
    	list-style: none;
    }
    blockquote, q {
    	quotes: none;
    }
    blockquote:before, blockquote:after,
    q:before, q:after {
    	content: '';
    	content: none;
    }
    table {
    	border-collapse: collapse;
    	border-spacing: 0;
    }
    </style>
    <style>
        body, html {
            background-color: #222;
            font-family: Arial, sans-serif;
            color: #FFF;
        }
        h1 {
            text-align: center;
            font-size: 50px;
            letter-spacing: -3px;
            padding: 20px 0;
            text-shadow: #000 0 -1px 0;
        }
        table#main {
            margin: 0 10px 0 300px;
            color: #000;
            font-size: 13px;
        }
        table#main td, table#main th {
            padding: 5px 7px;
            text-align: left;
        }
        table#main th {
            font-size: 15px;
            min-width: 100px;
            background-color: #8BB1F1;
            color: #FFF;
        }
        table#main th a {
            color: #FFF;
        }
        table#main tr:nth-child(even) td {
            background-color: #E2E2E2;
        }
        table#main th.smaller {
            min-width: 40px;
        }
        table#main td {
            background-color: #FFF;
        }
        a {
            color: #000;
        }
        a:hover {
            color: #999;
        }
        .light {
            color: #888;
        }
        #menu {
            width: 280px;
            position: absolute;
            top: 100px;
            padding: 0 10px;
        }
        #menu label.title {
            display: block;
            text-transform: uppercase;
            font-size: 16px;
            margin-top: 20px;
        }
        #menu label {
            text-transform: none;
            font-size: 12px;
            padding: 10px 0 0 2px;
        }
        #menu a {
            color: #FFF;
            text-decoration: none;
            display: inline-block;
            background-color: #666;
            padding: 3px;
            margin-left: 4px;
            font-size: 12px;
        }
        #menu a:hover {
            background-color: #999;
        }
        .checkboxes label:hover {
            cursor: pointer;
            color: #CCC;
        }
        .checkboxes td {
            vertical-align: middle;
            line-height: 16px;
            padding: 2px 0;
        }
        .message td {
            text-align: center !important;
            font-weight: 600;
            color: #FFF;
            background-color: transparent !important;
        }
    </style>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('.selectAll').each(function(){
                $(this).click(function(){
                    $(this).parent().parent().parent().find('input[type=checkbox]').attr('checked','checked');
                });
            });
            $('.clearAll').each(function(){
                $(this).click(function(){
                    $(this).parent().parent().parent().find('input[type=checkbox]').each(function(){
                        if ($(this).attr('disabled')==false) $(this).removeAttr('checked');
                    });
                });
            });
        });
    </script>
</head>
<body>
    <h1>MIT TechFair 2011 Resume Book</h1>
<?php
$mysqli = new mysqli('mysql.mit.edu','techfair','02139techfair','techfair+resume');
if (mysqli_connect_errno()) { 
    printf("Connect failed: %s\n", mysqli_connect_error()); 
    exit(); 
}
$majorResult = $mysqli->query("SELECT course,degree FROM courses");
$majors = array();
while($row = $majorResult->fetch_assoc()) {
    $majors[$row['course']]=$row['degree'];
}
$query = "SELECT * FROM resumedrop11";
if (isset($_GET['y']) || isset($_GET['m'])) {
    $query .= ' WHERE ';
    if (isset($_GET['y'])) {
        $yearQuery = array();
        foreach ($_GET['y'] as $year) {
            $yearQuery[] = "year='".$year."'";
        }
        $query .= '('.implode(' or ',$yearQuery).')';
    }
    if (isset($_GET['m'])) {
        if (isset($_GET['y'])) $query .= ' AND ';
        $majorQuery = array();
        foreach ($_GET['m'] as $major) {
            $majorQuery[] = "major1='".$major."' or major2='".$major."'";
        }
        $query .= '('.implode(' or ',$majorQuery).')';
    }
}
if (!isset($_GET['l']['n'])) {
    $lookingForQuery = array();
    if (isset($_GET['l']['f'])) $lookingForQuery[] = "fulltime=1";
    if (isset($_GET['l']['i'])) $lookingForQuery[] = "internship=1";
    if (isset($_GET['l']['f'])||isset($_GET['l']['i'])) $query .= ' and ('.implode(' or ',$lookingForQuery).')';
}
$query .= " ORDER BY year, lastname, firstname";
$result = $mysqli->query($query);
$i = 0;
    function echoHeader($name,$key) {
        /*if (!isset($_GET[$key])) echo '<a href="?',$key,'=1">',$name,'</a>';
        elseif ($_GET[$key]==1) echo '<a href="?',$key,'=2">',$name,'</a>';
        elseif ($_GET[$key]==2) echo '<a href="?">',$name,'</a>';*/
        echo $name;
    }
    ?>
    <table id="main">
        <tr class="message">
            <td colspan="8"><?php echo $mysqli->affected_rows?> resumes match the current filters</td>
        </tr>
        <tr>
            <th>Last Name</th>
            <th>First Name</th>
            <th>Email</th>
            <th class="smaller">Year</th>
            <th>Phone</th>
            <th>Major(s)</th>
            <th>Looking For</th>
            <th>Resume</th>
        </tr>
<?php
$ids = array();
while($row = $result->fetch_assoc()):
?>
        <tr>
            <td><?php echo $row['lastname']?></td>
            <td><?php echo $row['firstname']?></td>
            <td><?php echo strtolower($row['email'])?></td>
            <td><?php echo $row['year']?></td>
            <td><?php echo '(',substr($row['phone'],0,3),') ',substr($row['phone'],3,3),'-',substr($row['phone'],6,4)?></td>
            <td>
                <?php echo $majors[$row['major1']]?>
                <?php
                if ($row['major2']!=0) {
                    echo '<span class="light"> and </span>',$majors[$row['major2']];
                }
                ?>
            </td>
            <td>
                <?php
                if ($row['fulltime']==1 && $row['internship']==1) echo 'Internship & Full-Time';
                elseif ($row['fulltime']==1) echo 'Full-Time';
                elseif ($row['internship']==1) echo 'Internship';
                ?>
            </td>
            <td><a href="?resume=<?php echo $row['id']?>">Download</td>
        </tr>
<?php
$i++;
$ids[] = $row['id'];
endwhile;
if ($i==0) {
    echo '<tr><td colspan="7">No resumes match your filters.</td></tr>';
} else {
    $query = "?";
    foreach ($ids as $key=>$id) {
        if ($query!="?") $query .= "&";
        $query .= "resumes[".$key."]=".$id;
    }
?>
    <tr><td colspan="7" style="text-align:right">Note: "Download All" will take time to start the download, as the resumes need to be dynamically zipped before downloading. The more resumes you download at once, the longer it will take.</td><td>
        <form action="" method="post">
<?php foreach ($ids as $key=>$id) {
    echo '<input type="hidden" name="resumes[',$key,']" value="',$id,'"/>';
}
?>
            <input type="submit" value="Download All" />
        </form>
    </td></tr>
<?php
}
$result->close();
?>
        <tr class="message">
            <td colspan="8"><?php echo $mysqli->affected_rows?> resumes match the current filters</td>
        </tr>
<?php
$mysqli->close();
?>
    </table>
    <div id="menu">
        <form action="" method="get">
            <!--<label for="s1">Sort by</label>
            <select name="s1" id="s1">
                <option value="lname" <?php if(!isset($_GET['s1'])||$_GET['s1']=='lname') echo 'selected' ?>>Last Name</option>
                <option value="fname" <?php if(isset($_GET['s1'])&&$_GET['s1']=='fname') echo 'selected' ?>>First Name</option>
                <option value="email" <?php if(isset($_GET['s1'])&&$_GET['s1']=='email') echo 'selected' ?>>Email</option>
                <option value="year" <?php if(isset($_GET['s1'])&&$_GET['s1']=='year') echo 'selected' ?>>Year</option>
                <option value="major" <?php if(isset($_GET['s1'])&&$_GET['s1']=='major') echo 'selected' ?>>Major</option>
            </select>
            <select name="o1">
                <option value="asc">Ascending</option>
                <option value="desc">Descending</option>
            </select>
            <label for="s2">And then by</label>
            <select name="s2" id="s2">
                <option value="lname" <?php if(isset($_GET['s2'])&&$_GET['s2']=='lname') echo 'selected' ?>>Last Name</option>
                <option value="fname" <?php if(!isset($_GET['s2'])||$_GET['s2']=='fname') echo 'selected' ?>>First Name</option>
                <option value="email" <?php if(isset($_GET['s2'])&&$_GET['s2']=='email') echo 'selected' ?>>Email</option>
                <option value="year" <?php if(isset($_GET['s2'])&&$_GET['s2']=='year') echo 'selected' ?>>Year</option>
                <option value="major" <?php if(isset($_GET['s2'])&&$_GET['s2']=='major') echo 'selected' ?>>Major</option>
            </select>
            <select name="o2">
                <option value="asc">Ascending</option>
                <option value="desc">Descending</option>
            </select>
            <p>
                <input type="submit" value="Update"/>
            </p>-->
            <label class="title">Filter by Looking For</label>
            <table class="checkboxes">
                <tr>
                    <td></td>
                    <td><a href="javascript:void(0)" class="selectAll">Select All</a><a href="javascript:void(0)" class="clearAll">Clear All</a></td>
                </tr>
                <tr><td><input type="checkbox" name="l[n]" value="1" id="ln" checked="checked" disabled="disabled"/></td><td><label for="ln">None specified</label></td></tr>
                <tr><td><input type="checkbox" name="l[f]" value="1" id="lf"<?php if (isset($_GET['l']['f'])||!isset($_GET['l'])) echo ' checked="checked"';?>/></td><td><label for="lf">Full-Time</label></td></tr>
                <tr><td><input type="checkbox" name="l[i]" value="1" id="li"<?php if (isset($_GET['l']['i'])||!isset($_GET['l'])) echo ' checked="checked"';?>/></td><td><label for="li">Internship</label></td></tr>
            </table>
            <p><input type="submit" value="Update All"/></p>
            <label class="title">Filter by graduation year</label>
            <table class="checkboxes">
                <tr>
                    <td></td>
                    <td><a href="javascript:void(0)" class="selectAll">Select All</a><a href="javascript:void(0)" class="clearAll">Clear All</a></td>
                </tr>
            <?php
            $years = array(2011,2012,2013,2014,'G');
            foreach ($years as $year) {
                echo '<tr><td><input type="checkbox" name="y[',$year,']" value="',$year,'" id="y',$year,'"';
                if (isset($_GET['y'][$year])||!isset($_GET['y'])) echo ' checked="checked"';
                echo '/></td><td><label for="y',$year,'">',$year,'</label></td></tr>';
            }
            ?>
            </table>
            <p><input type="submit" value="Update All"/></p>
            <label class="title">Filter by major</label>
            <table class="checkboxes">
                <tr>
                    <td></td>
                    <td><a href="javascript:void(0)" class="selectAll">Select All</a><a href="javascript:void(0)" class="clearAll">Clear All</a></td>
                </tr>
            <?php
            foreach($majors as $key=>$major) {
                echo '<tr><td><input type="checkbox" name="m[',$key,']" id="m',$key,'" value="',$key,'"';
                if (isset($_GET['m'][$key])||!isset($_GET['m'])) echo ' checked="checked"';
                echo '/></td><td><label for="m',$key,'">',$key,' ',$major,'</label></td></tr>';
            }
            ?>
            </table>
            <input type="hidden" name="update" value="yes">
            <p><input type="submit" value="Update All"/></p>
        </form>
    </div>
</body>
</html>
<? endif; }?>
<?
session_start();
if(!session_is_registered("pass"))
    header("location:resumelogin.php");
else displayResumeBook();
?>
