<?php

require_once("headers.php");

$job = Job::create($mysqli,$_SESSION['uid'], $_POST['jtype'],$_POST['jdescription'], $_POST['jlocation'], $_POST['crange'], $_POST['actdate'], $_POST['estenddate'],'0');

if (is_null($job)){
    "<h2>failed to add result</h2>";
} else {
    echo "<p>Job Posted </p>";
    header("Location:UserPage.php?uid=".$job->getUserId());
    //echo "<p><a href=\"showallStudents.php\">show all students</a></p>";
}


require_once("footer.php");

?>