<?php

require_once("headers.php");

$jobs = Estimate::getAll($mysqli);
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
    echo "<td>".$job->geEstimateDate()."</td>";
    echo "<td><a href=\"showStudentDetail.php?id=".$job->getId()."\">View</a></td>";
    echo "</tr>";
}
echo "</table>";


require_once("footer.php");

?>

