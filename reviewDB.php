<!-- Page to add a new review by the user -->
<?php
echo $_POST['jid'];
require_once("headers.php");

//Calling create function in review class
$review = Review::create($mysqli,$_POST['jid'], $_POST['comment'],$_POST['rating']);
// $today=date('Y-m-d');//getting current date
if (!($review)){
   
    "<h2>failed to add result</h2>";
    header("Location:viewExpiredJobs.php?uid=".$_POST['uid']);
} else {
    echo "<p>Job Posted </p>";
    // echo $_POST['jid'];
    $_SESSION["success"]="post";
    //Redirect to user profile
    // header("Location:viewExpiredJobs.php?uid=".$job->getUserId());
    header("Location:viewExpiredJobs.php?uid=".$_POST['uid']);
    
}


require_once("footer.php");

?>