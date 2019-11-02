<!-- Page to add a new job by the user -->
<?php

require_once("headers.php");

//Calling create function in Job class
$job = Job::create($mysqli,$_SESSION['uid'], $_POST['jtype'],$_POST['jdescription'], $_POST['jlocation'], $_POST['crange'], $_POST['actdate'], $_POST['estenddate'],'0');
$today=date('Y-m-d');//getting current date
if (!($job)){
   
    "<h2>failed to add result</h2>";
} else {
    echo "<p>Job Posted </p>";
    $_SESSION["success"]="post";
    //Redirect to user profile
    header("Location:UserPage.php?uid=".$job->getUserId());
    
}


require_once("footer.php");

?>