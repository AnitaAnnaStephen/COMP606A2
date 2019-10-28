<?php

require_once("headers.php");
//$data = $_GET["param"];
//var_dump($data);
//echo $data;
// $jobs = Job::getAll($mysqli);
// //$jobs->debug();
// echo "<table>";
// echo "<tr>";
// echo "<td>Job Id</td>";
// echo "<td>User Id</td>";
// echo "<td>Job Type</td>";
// echo "<td>Job Description</td>";
// echo "<td>Location</td>";
// echo "<td>Cost</td>";
// echo "<td>Active Date</td>";
// echo "<td>Estimate Date</td>";
// echo "</tr>";
// foreach($jobs->getRecords() as $id => $job){
//     echo "<tr>";
//     echo "<td>".$job->getJobId()."</td>";
//     echo "<td>".$job->getUserId()."</td>";
//     echo "<td>".$job->getJobType()."</td>";
//     echo "<td>".$job->getJobDescription()."</td>";
//     echo "<td>".$job->getLocation()."</td>";
//     echo "<td>".$job->getCost()."</td>";
//     echo "<td>".$job->getActiveDate()."</td>";
//     echo "<td>".$job->getEstimateDate()."</td>";
//     // echo "<td><a href=\"postEstimate.php?jid=".$job->getJobId()."&tid=".$data."\">Post Estimate</a></td>";
//     echo "<td><a data-toggle=\"modal\" data-target=\"#myPostModal\">Post Estimate</a></td>";
//     echo "</tr>";
// }
// echo "</table>";
?>

<div class="container" >
<div class="row">
<?php  $estimates=Estimate ::findByTradesman($mysqli,$_GET['tid']);
                                $count=0;
                                //echo $count;
                                foreach($estimates->getRecords() as $id => $estimate)
                                {
                                   $count=$count+1;
                                  
                                }
                                //echo $count;
                                if($count ==0)
                                {
                                  echo "You have not posted any estimates yet! Post one now....";
                                  echo "<a href=\"viewJobs.php?tid=".$_GET['tid']."\" class=\"btn\" >Click here to view jobs</a> ";
                                 
                                }
                                else
                                {
                                  
                                   foreach($estimates->getRecords() as $id => $estimate)
                                   {?>
                                   <div class="col-sm-4" >
      <div class="panel panel-primary">
      <?php $job= Job :: find($mysqli,$estimate->getJobId());?>
        <div class="panel-heading"><?php echo $job->getJobType(); ?></div>
        <div class="panel-body" style="height:400px">
        <p><b>Job Details</b></p>
        <p><?php echo $job->getJobDescription(); ?></p>
        <p>Job Id: <b><?php echo $estimate->getJobId(); ?></b></p>
        <p>Cost Range: <b><?php echo $job->getCost(); ?></b></p>
        <p>Estimate Date: <b><?php echo $job->getEstimateDate(); ?></b></p>
        <p>Active Date: <b><?php echo $job->getActiveDate(); ?></b></p>
        <p><b>Estimate Details</b></p>
        <p>Labour Cost: <b><?php echo $estimate->getLabourCost(); ?></b></p>
        <p>Material Cost: <b><?php echo $estimate->getMaterialCost(); ?></b></p>
        <p>Total Cost: <b><?php echo $estimate->getTotalCost(); ?></b></p>
        <p>Date: <b><?php echo $estimate->getExpirationDate(); ?></b></p>
        
        </div>
        <div class="panel-footer pviewestimate" style="text-align: center;">
            
            <input type="hidden" value="<?php echo $estimate->getEstimateId(); ?>" >
            
            <?php 
            echo "<a href=\"editEstimate.php?id=".$estimate->getEstimateId()."\"  class=\"btn btn-primary viewestimate\">Edit Estimate</a>";
            echo "<a href=\"deleteEstimateDB.php?id=".$estimate->getEstimateId()."\" class=\"btn btn-primary viewestimate\" onclick=\"return confirm('Are you sure to cancel your estimate?')\">Cancel Estimate</a>";

            ?>
            <!-- <a href="editEstimate.php?id="<?php echo $estimate->getEstimateId(); ?>  class="btn btn-primary viewestimate">Edit Estimate</a>
            <a href="deleteEstimateDB.php?id="<?php echo $estimate->getEstimateId();?> class="btn btn-primary viewestimate" onclick="return confirm('Are you sure to cancel your estimate?')">Cancel Estimate</a> -->

        </div>

</div>
</div>

<?php }}; ?>
</div>
</div>
 
<?php require_once("footer.php"); ?>