<!-- Page to add new Tradesman -->
<?php

require_once("heading.php");
//Calling function to create new tradesman
$newTradesman = Tradesman::create($mysqli, $_POST['fname'], $_POST['lname'],   $_POST['email'],$_POST['phone'], $_POST['password']);
if(!$newTradesman){
    echo "<h2>Failed</h2>";
}
else {
    echo "<h2>New Tradesman Created</h2>";
    $_SESSION['uid'] = '';
    $_SESSION['tid'] = $newTradesman->getTId();
  header("Location: TradesmanPage.php?tid=".$newTradesman->getTId());//redirecting to user profile
}


require_once("footer.php");

?>