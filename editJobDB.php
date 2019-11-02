<!-- Page to edit the job details -->

<?php 
require_once("heading.php");
//Calling function to edit Job
$editjob=Job :: edit($mysqli,$_POST['jid'], $_POST['jtype'], $_POST['jdescription'], $_POST['location'], $_POST['crange'], $_POST['sdate'], $_POST['edate']);

if(!$editjob){
    echo "<h2>Failed to update</h2>";
}
 else {
    echo "<h2>Updated</h2>";
    $_SESSION["success"]="edit";
    
    header("Location: UserPage.php?uid=".$editjob->getUserId());//redirecting to user profile
    
}


require_once("footer.php");
?>