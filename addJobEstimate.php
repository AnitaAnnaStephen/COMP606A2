<?php

require_once("headers.php");
$start=$_POST['sdate'];
$estimate=$_POST['edate'];
$expdate=$_POST['expdate'];
//echo $expdate;
//echo $start;
$existing=Estimate :: findByTradesmanAndJob($mysqli, $_POST['jobId'],$_SESSION['tid']);
//var_dump($existing);
if($existing)

{
    $_SESSION['error']="Already posted estimate for this job";
    header("Location:addEstimate.php?jid=".$_POST['jobId']);//redirecting to add Estimate page
    
}
else if($expdate>$start)
{
    $_SESSION['error']= "Expiration date past job start date";
    header("Location:addEstimate.php?jid=".$_POST['jobId']);//redirecting to add estimate page
}
else
{
    $estimate = Estimate::create($mysqli, $_POST['jobId'],$_SESSION['tid'], $_POST['mcost'], $_POST['lcost'], $_POST['expdate']);
    //var_dump($estimate);
    if (!$estimate){
        
        echo "<h2>failed to add estimate</h2>";
    } else {
        
        echo "<p>Estimate Posted </p>";
       // echo $estimate->getTradesmanId();
       header("Location:TradesmanPage.php?tid=".$estimate->getTradesmanId());//redirecting to tradesman profile
        
    }
}
require_once("footer.php");

?>