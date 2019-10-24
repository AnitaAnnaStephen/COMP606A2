<!-- Page to check if username and password is correct -->

<?php 
require_once("headers.php");

$loggedTradesman = Tradesman::find($mysqli, $_POST['email'], $_POST['password']);
//echo http_build_query($loggedTradesman);
if(!$loggedTradesman){
    echo "<h2>Invalid username or password</h2>";
}
if (is_null($loggedTradesman)){
    "<h2>Invalid username or password</h2>";
} else {
    echo "<h2>Login Success</h2>";
    $_SESSION['uid'] = '';
    $_SESSION['tid'] = $loggedTradesman->getTId();
    //var_dump ($loggedTradesman);
    //echo http_build_query($loggedTradesman);
  header("Location: TradesmanPage.php?tid=".$loggedTradesman->getTId());//redirecting to user profile
//    header("Location: TradesmanPage.php?param=".http_build_query($loggedTradesman));
    //echo "<p><a href=\"tradesmanHome.php\">show all Users</a></p>";
}


require_once("footer.php");

?>
