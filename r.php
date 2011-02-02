<?php
if (isset($_POST['email'])):
    //$email = mysql_real_escape_string($_POST['email']);
    $email = $_POST['email'];
    $full_email = $email;
    $email = strtolower($email);
    if(preg_match("/mit.edu/",$email))
        $email = substr($email,0,strlen($email)-8);
	exec("ldapsearch -h ldap.mit.edu -p 389 -u -b 'dc=mit,dc=edu' -x '(uid=".$email.")'", $output1);
    $output1 = implode($output1);
    if(preg_match("/givenName/",$output1))
    {
        echo 'SUCCESS';
        $mysqli = new mysqli('mysql.mit.edu','techfair','02139techfair','techfair+dayof');
        if (mysqli_connect_errno()) { 
            printf("Connect failed: %s\n", mysqli_connect_error()); 
            exit(); 
        }
        $stmt = $mysqli->prepare("INSERT INTO registration (email) VALUES (?)");
        $stmt->bind_param('s',$full_email);
        $stmt->execute();
        $stmt->close();
        $mysqli->close();
    } else {
        echo 'FAILURE';
    }
else:
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Day of Fair Registration</title>
        <style>
            body, html {
                font-family: Arial;
                background: -webkit-gradient(linear,0% 0%, 0% 100%, from(#333), to(#111));
                height: 100%;
                margin: 0;
                padding: 0;
            }
            #container {
                width: 100%;
                text-align: center;
                height: 250px;
                position: absolute;
                top: 50%;
                margin-top: -200px;
            }
            h1 {
                font-size: 5em;
                font-weight: 400;
                color: #FFF;
                letter-spacing: -0.05em;
                text-shadow: #000 0 -2px 0;
                margin: 0 0 20px 0;
            }
            label {
                font-size: 2em;
                display: block;
                color: #AAA;
                text-shadow: #000 0 -1px 0;
                margin-bottom: 10px;
            }
            input[type=text] {
                font-size: 3em;
                padding: 0.2em;
                border: 3px solid #000;
                border-radius: 10px;
                width: 600px;
                text-align: center;
            }
            .message {
                font-size: 2em;
                border-right: 2px solid #000;
                border-bottom: 2px solid #000;
                border-left: 2px solid #000;
                display: inline-block;
                width: 800px;
                padding: 10px 0;
                -moz-border-radius-bottomright: 8px;
                -moz-border-radius-bottomleft: 8px;
                border-bottom-right-radius: 8px;
                border-bottom-left-radius: 8px;
                color: #FFF;
                text-shadow: #000 0 -1px 0;
            }
            #success {
                background-color: #78AB46;
            }
            #failure {
                background-color: #8E2323;
            }
            .button {
                display: inline-block;
                background-color: #AAA;
                padding: 5px 8px;
                color: #FFF;
                text-shadow: #000 0 -1px 0;
                border-radius: 2px;
                -moz-border-radius: 2px;
            }
        </style>
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js"></script>
        <script>
            $(document).ready(function(){
                $('.message').hide();
                $('#form').submit(function(){
                    if ($('#email').val()!='') {
                        $.post('/r.php',{'email': $('#email').val()},function(data){
                            $('#email').val('');
                            if(data!="FAILURE") var div = $('#success');
                            else var div = $('#failure');
                            $(div).slideDown(200);
                            setTimeout(function(){
                                $(div).slideUp(200);
                            },1000);
                        });
                    }
                    return false;
                });
            });
        </script>
    </head>
    <body>
        <div id="container">
            <h1>Welcome to MIT TechFair!</h1>
            <form action="" method="post" id="form">
                <label for="email"><span class="button">ENTER</span> to submit your MIT email</label>
                <input type="text" id="email" name="email" placeholder="MIT Email"autocomplete="off"/>
            </form>
            <div id="success" class="message">Thanks!</div>
            <div id="failure" class="message">Try again!</div>
        </div>
    </body>
</html>
<?php endif; ?>
