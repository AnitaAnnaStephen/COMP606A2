<!-- Page for User to Change Password -->

<?php 
require_once("heading.php");
//Calling function to change Password
$reset=User :: changePassword($mysqli, $_POST['email'], $_POST['phone'], $_POST['password']);
 var_dump($reset);
if(!$reset){
    $_SESSION['reseterror']="Invalid Email or phone number";
    header("Location: userForgotPassword.php");//redirecting to Forgot Password page
}
 else {
   
    $_SESSION['reseterror']="";
   header("Location: Login.php");//redirecting to login page
    
}


require_once("footer.php");
?>