<!-- Page to add new Estimate by Tradesman for a job -->
<?php

require_once("headers.php");
$start=$_POST['sdate'];
$estimate=$_POST['edate'];
$expdate=$_POST['expdate'];
//Calling function to find if record already exists
$existing=Estimate :: findByTradesmanAndJob($mysqli, $_POST['jobId'],$_SESSION['tid']);

if($existing)

{
    $_SESSION['error']="Already";
    header("Location:addEstimate.php?jid=".$_POST['jobId']);//redirecting to add Estimate page
    
}
else if($expdate>$start)
{
    $_SESSION['error']= "Expiration";
    header("Location:addEstimate.php?jid=".$_POST['jobId']);//redirecting to add estimate page
}
else
{
    //Calling function to create estimate
    $estimate = Estimate::create($mysqli, $_POST['jobId'],$_SESSION['tid'], $_POST['mcost'], $_POST['lcost'], $_POST['expdate']);
    
    if (!$estimate){
        
        echo "<h2>failed to add estimate</h2>";
    } else {
        
        echo "<p>Estimate Posted </p>";
       
       header("Location:TradesmanPage.php?tid=".$estimate->getTradesmanId());//redirecting to tradesman profile
        
    }
}
require_once("footer.php");

?>