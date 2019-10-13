<?php

require_once("headers.php");

$newTradesman = Tradesman::create($mysqli, $_POST['fname'], $_POST['lname'],   $_POST['email'],$_POST['phone'], $_POST['password']);
if(!$newTradesman){
    echo "<h2>Failed</h2>";
}
if (is_null($newTradesman)){
    "<h2>failed to add new Tradesman</h2>";
} else {
    echo "<h2>New Tradesman Created</h2>";
   
}


require_once("footer.php");

?>