<?php
    $email = $_POST['email'];
    $name = $_POST['name'];
    if ($email == "" || $name == "") {
        header('HTTP/1.0 400 Missing params.', true, 400);
        return;
    }
    $mysqli = new mysqli('sql.mit.edu','techfair','02139techfair','techfair+dayof');
    if (mysqli_connect_errno()) { 
        printf("Connect failed: %s\n", mysqli_connect_error()); 
        exit(); 
    }
    $stmt = $mysqli->prepare("INSERT INTO registration2013 (email, name) VALUES (?,?)");
    $stmt->bind_param('ss', $email, $name);
    $stmt->execute();
    $stmt->close();
    $mysqli->close();
    echo "Saved";
?>
