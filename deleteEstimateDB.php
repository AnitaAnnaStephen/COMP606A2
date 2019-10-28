<!-- Page to check if username and password is correct -->

<?php 
require_once("heading.php");
$deleteestimate=Estimate :: delete($mysqli,$_GET['id']);
var_dump($deleteestimate);
if(!$deleteestimate){
    echo "<h2>Failed to update</h2>";
}
 else {
    echo "<h2>Updated</h2>";
    header("Location: TradesmanPage.php?tid=".$_SESSION['tid']);//redirecting to user profile
    
}


require_once("footer.php");
?>