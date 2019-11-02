<!-- PAge that call accept function to accept an estimate -->
<?php

require_once("heading.php");
//Calling function to accept estimate
$estimate = Estimate::accept($mysqli, $_GET['eid']);
if(!$estimate){
    echo "<h2>Failed</h2>";
}
else {
    echo "<h2>Accepted</h2>";
    
  header("Location: userPage.php?uid=".$_GET['uid']);//redirecting to user profile
}


require_once("footer.php");

?>