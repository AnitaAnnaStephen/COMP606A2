<!-- Page for user to login -->
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
        <!-- <p>
            <img src="Logo.jpg" alt="Logo" width="100" height="100">
            
                
            </p>
            <p>
                <h2>User Login </h2>
            </p> -->
        </div>
        <div id="login">
            <!-- <form action="" method="POST"> -->
            <form method="post" action="UserCheck.php" enctype="application/x-www-form-urlencoded">
            <p style="text-align: center;">
            <img src="Logo.jpg" alt="Logo"  width="150" height="150">
            
                
            </p>
            <p>
            </p>
            <p style="text-align: center;">
                <h1 style="text-align: center;">User Login </h1>
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
            <a href="ForgotPassword.php" style="padding-left: 10px;">Forgot Password?</a>
            </p>
            <?php
                    if(isset($_SESSION["error"])){
                        $error = $_SESSION["error"];
                        echo "<span>$error</span>";
                        $_SESSION["error"]="";
                    }
                ?>
            </form>
            <p>
            
            </p>
            <div id="register">
            <p> <label style="font-weight:normal;">Don't have an account? </label>
                <a href="userRegister.php">Register Now</a>
            </p>
        </div>
        </div>
        <!-- <div id="register">
            <p> <label style="font-weight:normal;">Don't have an account? </label>
                <a href="userRegister.php">Register Now</a>
            </p>
        </div> -->
        <ul style="text-align:center;">
                    
                     <a href="Login.php" style="text-align:right;">Home</a>|
                     <a href="#" style="text-align:right;">About</a>|
                     <a href="#" style="text-align:right;">Contact Us</a>|
                     <a href="tradesmanLogin.php" style="text-align:right;">Tradesman Login</a>
                </ul>
        <?php require ("footer.php"); ?>
    </body>
   
</html>
