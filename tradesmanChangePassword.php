<!-- Page to change Password for Tradesman -->

<?php 
require_once("heading.php");
//Calling function to update password
$reset=Tradesman :: changePassword($mysqli, $_POST['email'], $_POST['phone'], $_POST['password']);
if(!$reset){
    $_SESSION['reseterror']="Invalid Email or phone number";
    header("Location: tradesmanForgotPassword.php");//redirecting to Forgot Password page
}
 else {//On successful updation
   
    $_SESSION['reseterror']="";
   header("Location: tradesmanLogin.php");//redirecting to login page
    
}


require_once("footer.php");
?>