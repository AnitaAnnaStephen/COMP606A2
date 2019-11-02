

<?php 
require_once("heading.php");

$reset=Tradesman :: changePassword($mysqli, $_POST['email'], $_POST['phone'], $_POST['password']);
 //var_dump($reset);
if(!$reset){
    $_SESSION['reseterror']="Invalid Email or phone number";
    header("Location: tradesmanForgotPassword.php");//redirecting to login page
}
 else {
   
    $_SESSION['reseterror']="";
   header("Location: tradesmanLogin.php");//redirecting to login page
    
}


require_once("footer.php");
?>