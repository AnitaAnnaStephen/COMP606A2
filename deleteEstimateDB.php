<!-- Page to delete estimate -->

<?php 
require_once("heading.php");
//Calling function to delete estimate
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