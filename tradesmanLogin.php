<!-- Page for user to login -->

<!DOCTYPE html>
<html>
    <head>
        <title>Login Page</title>
        <link rel="stylesheet" type="text/css" href="stylesheet.css">
        <link rel="stylesheet" href="css/bootstrap.min.css">
         
    </head>
    <body style="background-color:silver;">
        <div id="header">
        <p>
            <img src="Logo.jpg" alt="Logo" width="100" height="100">
            
                
            </p>
            <p>
                <h2>Tradesman Login </h2>
            </p>
        </div>
        <div id="login">
            <!-- <form action="" method="POST"> -->
            <form method="post" action="tradesmanCheck.php" enctype="application/x-www-form-urlencoded">
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
            <!-- <span><?php echo $error;?></span> -->
            </form>
        </div>
        <div id="register">
            <p> <label style="font-weight:normal;">Not a tradesman yet? </label>
                <a href="tradesmanRegister.php">Register Now</a>
            </p>
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




