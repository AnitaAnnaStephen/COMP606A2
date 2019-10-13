<!-- Page to check if username and password is correct -->

<?php 
require_once("headers.php");

$loggedTradesman = Tradesman::find($mysqli, $_POST['email'], $_POST['password']);
if(!$loggedTradesman){
    echo "<h2>Invalid username or password</h2>";
}
if (is_null($loggedTradesman)){
    "<h2>Invalid username or password</h2>";
} else {
    echo "<h2>Login Success</h2>";
   header("Location: TradesmanPage.php");//redirecting to user profile
    //echo "<p><a href=\"tradesmanHome.php\">show all Users</a></p>";
}


require_once("footer.php");

?>
