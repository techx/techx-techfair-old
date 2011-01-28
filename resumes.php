<?php
if (isset($_GET['resume'])):
    $mysqli = new mysqli('mysql.mit.edu','techfair','02139techfair','techfair+resume');
    $result = $mysqli->query(sprintf("SELECT resume FROM resumedrop11 WHERE id=%d",$_GET['resume']));
    $data = $result->fetch_assoc();
    $file = $data['resume'];
    header('Content-Description: File Transfer');
    header('Content-Type: application/pdf');
    header('Content-Length: '.filesize($file));
    header('Content-Disposition: inline; filename=' . basename($file));
    readfile($file);
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
            background-color: #FFF;
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
        table#main tr:nth-child(even) {
            background-color: #E2E2E2;
        }
        table#main th.smaller {
            min-width: 40px;
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
            top: 90px;
            padding: 0 10px;
        }
        #menu label.title {
            display: block;
            text-transform: uppercase;
            font-size: 16px;
        }
        #menu label {
            text-transform: none;
            font-size: 12px;
            padding: 10px 0 0 2px;
        }
        #checkboxes label:hover {
            cursor: pointer;
            color: #CCC;
        }
        #checkboxes td {
            vertical-align: middle;
            line-height: 16px;
            padding: 2px 0;
        }
    </style>
</head>
<body>
    <h1>MIT TechFair 2011 Resume Book</h1>
    <?php
    function echoHeader($name,$key) {
        /*if (!isset($_GET[$key])) echo '<a href="?',$key,'=1">',$name,'</a>';
        elseif ($_GET[$key]==1) echo '<a href="?',$key,'=2">',$name,'</a>';
        elseif ($_GET[$key]==2) echo '<a href="?">',$name,'</a>';*/
        echo $name;
    }
    ?>
    <table id="main">
        <tr>
            <th><?php echoHeader('Last Name','lname')?></th>
            <th><?php echoHeader('First Name','fname')?></th>
            <th><?php echoHeader('Email','email')?></th>
            <th class="smaller"><?php echoHeader('Year','year')?></th>
            <th><?php echoHeader('Major(s)','major')?></th>
            <th><?php echoHeader('Looking For','look')?></th>
            <th>Resume</th>
        </tr>
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
            $yearQuery[] = "year=".$year;
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
if (isset($_GET['l']['f'])) $query .= ' AND fulltime=1';
if (isset($_GET['l']['i'])) $query .= ' AND internship=1';
$query .= " ORDER BY year, lastname, firstname";
$result = $mysqli->query($query);
$i = 0;
while($row = $result->fetch_assoc()):
?>
        <tr>
            <td><?php echo $row['lastname']?></td>
            <td><?php echo $row['firstname']?></td>
            <td><?php echo strtolower($row['email'])?></td>
            <td><?php echo $row['year']?></td>
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
                elseif ($row['fulltime']==1) echo 'Internship';
                elseif ($row['internship']==1) echo 'Full-Time';
                ?>
            </td>
            <td><a href="?resume=<?php echo $row['id']?>">Download</td>
        </tr>
<?php
$i++;
endwhile;
if ($i==0) {
    echo '<tr><td colspan="7">No resumes match your filters.</td></tr>';
}
$result->close();
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
            <table id="checkboxes">
                <tr><td><input type="checkbox" name="l[f]" value="1" id="lf"<?php if (isset($_GET['l']['f'])) echo ' checked="checked"';?>/></td><td><label for="lf">Full-Time</label></td></tr>
                <tr><td><input type="checkbox" name="l[i]" value="1" id="li"<?php if (isset($_GET['l']['i'])) echo ' checked="checked"';?>/></td><td><label for="li">Internship</label></td></tr>
            </table>
            <p><input type="submit" value="Update"/></p>
            <label class="title">Filter by year</label>
            <table id="checkboxes">
            <?php
            $years = array(2011,2012,2013,2014);
            foreach ($years as $year) {
                echo '<tr><td><input type="checkbox" name="y[',$year,']" value="',$year,'" id="y',$year,'"';
                if (isset($_GET['y'][$year])) echo ' checked="checked"';
                echo '/></td><td><label for="y',$year,'">',$year,'</label></td></tr>';
            }
            ?>
            </table>
            <p><input type="submit" value="Update"/></p>
            <label class="title">Filter by major</label>
            <table id="checkboxes">
            <?php
            foreach($majors as $key=>$major) {
                echo '<tr><td><input type="checkbox" name="m[',$key,']" id="m',$key,'" value="',$key,'"';
                if (isset($_GET['m'][$key])) echo ' checked="checked"';
                echo '/></td><td><label for="m',$key,'">',$key,' ',$major,'</label></td></tr>';
            }
            ?>
            </table>
            <p><input type="submit" value="Update"/></p>
        </form>
    </div>
</body>
</html>
<?php endif?>