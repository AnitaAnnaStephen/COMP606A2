<?php

require_once("headers.php");

$newUser = User::create($mysqli, $_POST['fname'], $_POST['lname'], $_POST['address'], $_POST['suburb'],$_POST['city'], $_POST['po'], $_POST['phone'], $_POST['email'], $_POST['password']);
if(!$newUser){
    echo "<h2>Failed</h2>";
}
if (is_null($newUser)){
    "<h2>failed to create new User</h2>";
} else {
    echo "<h2>New User Created</h2>";
    echo "<p><a href=\"tradesmanHome.php\">show all Users</a></p>";
}


require_once("footer.php");

?>