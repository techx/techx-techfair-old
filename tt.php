<?php
if (isset($_POST['email'])):
    //$email = mysql_real_escape_string($_POST['email']);
    $email = $_POST['email'];
	$name = $_POST['name'];
	$affiliation = $_POST['affiliation'];
	if ($email == '' || $name == '') {
		echo 'FAILURE';
		exit();
	}
    $mysqli = new mysqli('mysql.mit.edu','techfair','02139techfair','techfair+dayof');
    if (mysqli_connect_errno()) { 
        echo 'FAILURE';
        exit(); 
    }
    $stmt = $mysqli->prepare("INSERT INTO techtalks2012 (email, name, affiliation) VALUES (?, ?, ?)");
    $stmt->bind_param('sss',$email,$name,$affiliation);
    $stmt->execute();
    $stmt->close();
    $mysqli->close();
    echo 'SUCCESS';
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
                letter-spacing: -0.02em;
                text-shadow: #000 0 -2px 0;
                margin: 0 0 20px 0;
            }
            label {
                font-size: 2em;
                display: block;
                color: #AAA;
                text-shadow: #000 0 -1px 0;
                margin-top: 10px;
            }
            input[type=text] {
                font-size: 2em;
                padding: 0.5em;
                border: 3px solid #000;
                border-radius: 10px;
                width: 600px;
                text-align: left;
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
			p {
				color: #FFF;
				font-size: 22px;
			}
        </style>
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js"></script>
        <script>
            $(document).ready(function(){
                $('.message').hide();
                $('#form').submit(function(){
                    if ($('#email').val()!='') {
                        $.post('/tt.php',{
							'email': $('#email').val(),
							'name': $('#name').val(),
							'affiliation': $('#affiliation').val()
						},function(data){
							var div;
                            if(data!="FAILURE") {
								div = $('#success');
	                            $('#email').val('');
								$("#name").val('');
								$('#affiliation').val('');
							} else {
								div = $('#failure');
							}
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
            <h1>Welcome to Techtalks!</h1>
			<p>Please take a second to register (and sign up for the raffle)!</p>
            <form action="" method="post" id="form">
                <input type="text" id="name" name="name" placeholder="Name"autocomplete="off"/><br />
                <input type="text" id="email" name="email" placeholder="Email"autocomplete="off"/><br />
                <input type="text" id="affiliation" name="affiliation" placeholder="Affiliation (optional)"autocomplete="off"/><br />
                <label for="email">Press <span class="button">ENTER</span> to submit.</label>
				<div style="visibility:hidden">
				<input type="submit" />
				</div>
            </form>
            <div id="success" class="message">Thanks!</div>
            <div id="failure" class="message">Try again!</div>
        </div>
    </body>
</html>
<?php endif; ?>
