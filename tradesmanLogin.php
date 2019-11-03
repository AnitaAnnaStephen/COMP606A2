<!-- Page for Tradesman to login -->
<?php require_once("heading.php");?>
<!DOCTYPE html>
<html>
    <head>
        <title>Login Page</title>
        <link rel="stylesheet" type="text/css" href="stylesheet.css">
        <link rel="stylesheet" href="css/bootstrap.min.css">
         
    </head>
    <body style="background-color:white;">
        <div id="header">
        </div>
        <div id="login">
            <!-- <form action="" method="POST"> -->
            <form method="post" action="tradesmanCheck.php" enctype="application/x-www-form-urlencoded">
            <p style="text-align: center;">
            <img src="Logo.jpg" alt="Logo" width="150" height="150">
            
                
            </p>
            <p>
            </p>
            <p>
                <h1 style="text-align: center;">Tradesman Login </h1>
            </p>
            <p>
                <label> UserName</label>    
            </p>
            <p>
            <input type="email" id="email" name="email" required="true" placeholder="Enter Email"style="width:100%;border-radius:10px;height: 25px;"/>
            </p>
            <div></div>
            <p>
                <label> Password</label>
            </p>
            <p>
                <input type="password" id="password" name="password" required="true" placeholder="Enter Password" style="width:100%;border-radius:10px;height: 25px;"/>
            </p>
            <p>
             <button type="submit" id="btn" name="login" > Login </button> 
            <a href="tradesmanForgotPassword.php" style="padding-left: 10px;">Forgot Password?</a>
            </p>
            <?php
            $error ="";
                    if(isset($_SESSION["error"])){
                        $error = $_SESSION["error"];
                        echo "<span>$error</span>";
                        $_SESSION["error"]="";
                    }
                ?>
            </form>
            <div id="register">
            <p> <label style="font-weight:normal;">Not a tradesman yet? </label>
                <a href="tradesmanRegister.php">Register Now</a>
            </p>
        </div>
        </div>
        
        <ul style="text-align:center;">
                    
                     <a href="Login.php" style="text-align:right;">Home</a>|
                     <a href="#" style="text-align:right;">About</a>|
                     <a href="#" style="text-align:right;">Contact Us</a>|
                     <a href="tradesmanLogin.php" style="text-align:right;">Tradesman Login</a>
                </ul>
        <?php require ("footer.php"); ?>
    </body>
   
</html>




