<!-- Page to check if username and password is correct -->

<?php 
require_once("heading.php");
//Calling function to check if user exists and password is correct
$loggedUser = User::find($mysqli, $_POST['email'], $_POST['password']);

if(!$loggedUser){//Redirecting to Login page
   
    $_SESSION['error']="Invalid username or password";
    header("Location: Login.php");

   
}
 
else {
    echo "<h2>Login Success</h2>";
    $_SESSION['uid'] = $loggedUser->getUId();
    $_SESSION['tid'] = '';
    header("Location: UserPage.php?uid=".$loggedUser->getUId());//redirecting to user profile  
}


require_once("footer.php");

?>
