<!-- Page to add a new job by the user -->
<?php

require_once("headers.php");


//Calling create function in Job class
$job = Job::create($mysqli,$_SESSION['uid'], $_POST['jtype'],$_POST['jdescription'], $_POST['jlocation'], $_POST['crange'], $_POST['actdate'], $_POST['estenddate'],'0');

if (is_null($job)){
    "<h2>failed to add result</h2>";
} else {
    echo "<p>Job Posted </p>";
    //Redirect to user profile
    header("Location:UserPage.php?uid=".$job->getUserId());
    
}


require_once("footer.php");

?>