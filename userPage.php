<?php

require_once("headers.php");

$jobs = Job::getAll($mysqli);
//$jobs->debug();
echo "<table>";
foreach($jobs->getRecords() as $id => $job){
    echo "<tr>";
    echo "<td>".$job->getJobId()."</td>";
    echo "<td>".$job->getJobType()."</td>";
    echo "<td>".$job->getJobDescription()."</td>";
    echo "<td>".$job->getLocation()."</td>";
    echo "<td>".$job->getCost()."</td>";
    echo "<td>".$job->getActiveDate()."</td>";
    echo "<td>".$job->getEstimateDate()."</td>";
    echo "<td><a href=\"showEstimate.php?id=".$job->getJobId()."\">View</a></td>";
    echo "</tr>";
}
echo "</table>";

require_once("footer.php");

?>

