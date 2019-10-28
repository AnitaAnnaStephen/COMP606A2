<!-- Page to check if username and password is correct -->

<?php 
require_once("heading.php");
$editestimate=Estimate :: edit($mysqli,$_POST['eid'], $_POST['mcost'], $_POST['lcost'], $_POST['expdate']);
var_dump($editestimate);
if(!$editestimate){
    echo "<h2>Failed to update</h2>";
}
 else {
    echo "<h2>Updated</h2>";
    header("Location: TradesmanPage.php?tid=".$editestimate->getTradesmanId());//redirecting to user profile
    
}


require_once("footer.php");
?>