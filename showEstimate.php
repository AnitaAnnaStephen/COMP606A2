<!-- Page to show all estimates for a Job -->
<?php

require_once("headers.php");
//Calling function to get all estimates for a particular job
$jobs = Estimate::getAllJob($mysqli, $_GET['id']);
//$jobs->debug();
echo "<table>";
foreach($jobs->getRecords() as $id => $job){
    echo "<tr>";
    echo "<td>".$job->getJobId()."</td>";
    echo "<td>".$job->getTradesmanId()."</td>";
    echo "<td>".$job->getExpirationDate()."</td>";
    echo "<td>".$job->getEstimateId()."</td>";
    echo "<td>".$job->getTotalCost()."</td>";
    echo "<td>".$job->getMaterialCost()."</td>";
    echo "<td>".$job->getLabourCost()."</td>";
    // echo "<td><a href=\"showEstimate.php?id=".$job->getId()."\">View</a></td>";
    echo "</tr>";
}
echo "</table>";


require_once("footer.php");

?>

