<!-- Page to add new User -->
<?php

require_once("heading.php");
//Calling function to create new user
$newUser = User::create($mysqli, $_POST['fname'], $_POST['lname'], $_POST['address'], $_POST['suburb'],$_POST['city'], $_POST['po'], $_POST['phone'], $_POST['email'], $_POST['password']);
if(!$newUser){
    echo "<h2>Failed</h2>";
}
 else {
    echo "<h2>New User Created</h2>";
    echo "<h2>Login Success</h2>";
    $_SESSION['uid'] = $newUser->getUId();
    $_SESSION['tid'] = '';
    header("Location: UserPage.php?uid=".$newUser->getUId());//redirecting to user profile
    
}


require_once("footer.php");

?>