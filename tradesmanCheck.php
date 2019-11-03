<!-- Page to check if username and password is correct for Tradesman -->

<?php 
require_once("heading.php");

$loggedTradesman = Tradesman::find($mysqli, $_POST['email'], $_POST['password']);
if(!$loggedTradesman){
    $_SESSION['error']="Invalid username or password";
    header("Location: tradesmanLogin.php");
}
else {//On Successful login
    echo "<h2>Login Success</h2>";
    $_SESSION['uid'] = '';
    $_SESSION['tid'] = $loggedTradesman->getTId();
  header("Location: TradesmanPage.php?tid=".$loggedTradesman->getTId());//redirecting to Tradesman profile
}


require_once("footer.php");

?>
