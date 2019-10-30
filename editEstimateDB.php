<!-- Page to check if username and password is correct -->

<?php 
require_once("heading.php");
$start=$_POST['sdate'];
$estimate=$_POST['edate'];
$expdate=$_POST['expdate'];
if($expdate>$start)
{
    $_SESSION['error']= "Expiration date past job start date";
    header("Location:editEstimate.php?eid=".$_SESSION['eid']);//redirecting to edit estimate page
}
else{
    $editestimate=Estimate :: edit($mysqli,$_POST['eid'], $_POST['mcost'], $_POST['lcost'], $_POST['expdate']);
    //var_dump($editestimate);
    if(!$editestimate){
    echo "<h2>Failed to update</h2>";
    }
    else {
    echo "<h2>Updated</h2>";
    header("Location: TradesmanPage.php?tid=".$editestimate->getTradesmanId());//redirecting to user profile
    }

}


require_once("footer.php");
?>