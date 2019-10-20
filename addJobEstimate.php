<?php

require_once("headers.php");

$estimate = Estimate::create($mysqli, $_POST['jobId'],$_POST['tid'], $_POST['mcost'], $_POST['lcost'], $_POST['expdate']);

if (is_null($estimate)){
    "<h2>failed to add result</h2>";
} else {
    echo "<p>Estimate Posted </p>";
   
    //echo "<p><a href=\"showallStudents.php\">show all students</a></p>";
}


require_once("footer.php");

?>