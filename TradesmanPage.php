<?php

require_once("headers.php");

$jobs = Job::getAll($mysqli);
//$jobs->debug();
echo "<table>";
echo "<tr>";
echo "<td>Job Id</td>";
echo "<td>User Id</td>";
echo "<td>Job Type</td>";
echo "<td>Job Description</td>";
echo "<td>Location</td>";
echo "<td>Cost</td>";
echo "<td>Active Date</td>";
echo "<td>Estimate Date</td>";
echo "</tr>";
foreach($jobs->getRecords() as $id => $job){
    echo "<tr>";
    echo "<td>".$job->getJobId()."</td>";
    echo "<td>".$job->getUserId()."</td>";
    echo "<td>".$job->getJobType()."</td>";
    echo "<td>".$job->getJobDescription()."</td>";
    echo "<td>".$job->getLocation()."</td>";
    echo "<td>".$job->getCost()."</td>";
    echo "<td>".$job->getActiveDate()."</td>";
    echo "<td>".$job->getEstimateDate()."</td>";
    echo "<td><a href=\"postEstimate.php?jid=".$job->getJobId()."&tid=".$_GET['tid']."\">Post Estimate</a></td>";
    echo "</tr>";
}
echo "</table>";


require_once("footer.php");

?>

