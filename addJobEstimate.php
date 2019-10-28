<?php

require_once("headers.php");

$estimate = Estimate::create($mysqli, $_POST['jobId'],$_POST['tid'], $_POST['mcost'], $_POST['lcost'], $_POST['expdate']);

if (is_null($estimate)){
    "<h2>failed to add result</h2>";
} else {
    echo "<p>Estimate Posted </p>";
   // echo $estimate->getTradesmanId();
    header("Location: TradesmanPage.php?tid=".$estimate->getTradesmanId());//redirecting to tradesman profile
    
}


require_once("footer.php");

?>