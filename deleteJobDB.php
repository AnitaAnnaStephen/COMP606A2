<!-- Page to check if username and password is correct -->

<?php 
require_once("heading.php");
$deletejob=Job :: delete($mysqli,$_GET['id']);
var_dump($deletejob);
if(!$deletejob){
    echo "<h2>Failed to update</h2>";
}
 else {
    echo "<h2>Updated</h2>";
    header("Location: UserPage.php?uid=".$_SESSION['uid']);//redirecting to user profile
    
}


require_once("footer.php");
?>