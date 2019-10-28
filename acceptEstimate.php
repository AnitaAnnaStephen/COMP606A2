<?php

require_once("heading.php");

$estimate = Estimate::accept($mysqli, $_GET['eid']);
if(!$estimate){
    echo "<h2>Failed</h2>";
}
else {
    echo "<h2>Accepted</h2>";
    // $_SESSION['uid'] = $estimate->getUId();
    // $_SESSION['tid'] = '';
    //var_dump ($loggedTradesman);
    //echo http_build_query($loggedTradesman);
  header("Location: userPage.php?uid=".$_GET['uid']);//redirecting to user profile
}


require_once("footer.php");

?>