<?php require_once("heading.php");?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tradesman Registeration</title>
    <link rel="stylesheet" type="text/css" href="stylesheet.css">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <!-- <?php require("heading.php"); ?> -->
<script src="http://code.jquery.com/jquery-2.1.0.min.js"></script>
<script>
var check = function() {
  if (document.getElementById('password').value ==
    document.getElementById('repassword').value) {
    document.getElementById('message').style.color = 'green';
    document.getElementById('message').innerHTML = 'matching';
  } else {
    document.getElementById('message').style.color = 'red';
    document.getElementById('message').innerHTML = 'not matching';
  }
}
</script>
</head>
<body style="background-color:white;">
<div id="registration">
<h1 style="text-align: center;">Enter Details</h1>
<?php
            $error ="";
                    if(isset($_SESSION["reseterror"])){
                        $error = $_SESSION["reseterror"];
                        echo "<span>$error</span>";
                        $_SESSION["reseterror"]="";
                    }
                ?>
<form method="post" action="userChangePassword.php" enctype="application/x-www-form-urlencoded">
<p><label>Email</label><input name="email" type="email" required="true"  placeholder ="Email Address" style="border-radius: 5px;height: 20px;"></p> 
<p><label>Phone</label><input name="phone" type="text" required="true" pattern="^\+?\d{0,13}" placeholder ="Mobile Number" style="border-radius: 5px;height: 20px;"></p>
<p><label>Password</label><input name="password" id="password" type="password" pattern="[A-Za-z0-9]{3,15}" title="Minimum 3 characters" style="border-radius: 5px;height: 20px;" onkeyup='check();' required="true" placeholder ="Password" style="border-radius: 5px;height: 20px;"></p>
<p><label>Confirm Password</label><input name="repassword" id="repassword" type="password" pattern="[A-Za-z0-9^\w]{3,15}" title="Minimum 3 characters" style="border-radius: 5px;height: 20px;" onkeyup='check();' required="true" placeholder ="Confirm Password" style="border-radius: 5px;height: 20px;"><span id='message'></span></p>

<p style="text-align: center;padding-top: 15px;">
<button type="submit" id="btn" value="Change" style="width:160px;">Reset Password</button></p>
</form>
</div>
<ul style="text-align:center;">
                    
                    <a href="Login.php" style="text-align:right;">Home</a>|
                    <a href="#" style="text-align:right;">About</a>|
                    <a href="#" style="text-align:right;">Contact Us</a>|
                    <a href="tradesmanLogin.php" style="text-align:right;">Tradesman Login</a>
               </ul>
</body>
</html>