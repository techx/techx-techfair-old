<?php
function verify($formValues)
{
    if($formValues['passwd']=='ilovetechfair') return true;
    else
    {
        echo '<center>Incorrect password.</center>';
        return false;
    }
}

function displayForm()
{ ?>
    <html>
    <head>
    <table width="300" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">
    <tr>
    <form method="post" action="<?= $_SERVER['PHP_SELF'] ?>">
    <td>
    <table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">
    <tr>
    <td colspan="3"><strong>Techfair 2011 Resume Book Login</strong></td>
    </tr>
    <tr>
    <td colspan="3">Please enter the password below. You should have received this password in an email - please email <a href="mailto:techfair-it@mit.edu">techfair-it@mit.edu</a> if you need the password resent.</a></td>
    </tr>
    <tr>
    <td width="78">Password :</td>
    <td width="294"><input name="passwd" type="password" id="passwd" value="<?= htmlentities($formValues['passwd']) ?>"/></td>
    </tr>
    <tr>
    <td><input type="submit" value="Submit"></td>
    </tr>
    </table>
    </td>
    </form>
    </tr>
    </table>
    </head>
    </html>
<?
}
if($_SERVER['REQUEST_METHOD']=='POST')
{
    $formValues = $_POST;
    if(!verify($formValues))
        displayForm();
    else
    {
        $pass=$formValues['passwd'];
        session_register("pass");
        header("location:resumebook.php");
    }
}
else displayForm();
?>
