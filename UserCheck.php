<!-- Page to check if username and password is correct -->

<?php 
require_once("heading.php");

$loggedUser = User::find($mysqli, $_POST['email'], $_POST['password']);

if(!$loggedUser){
   // echo "<h2>Invalid username or password </h2>";
    //$error="Invalid username or password";
    $_SESSION['error']="Invalid username or password";
    header("Location: Login.php");

    //echo "Invalid username or password";
    //echo "<script>setTimeout(\"location.href = 'Login.php';\",1500);</script>";

//     echo '<script language="javascript">
// alert("Invalid username or password");
// window.location.href="Login.php";
// </script>';
}
 
else {
    echo "<h2>Login Success</h2>";
    $_SESSION['uid'] = $loggedUser->getUId();
    $_SESSION['tid'] = '';
    header("Location: UserPage.php?uid=".$loggedUser->getUId());//redirecting to user profile  
}


require_once("footer.php");

?>
