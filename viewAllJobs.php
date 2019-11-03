<?php
require_once("headers.php");
//Calling function to get all active jobs
$jobs = Job::getAll($mysqli);

require_once("footer.php");
?>
<div class="container">
<div class="row">
    <?php 
    // if((!$jobs)){
    //   echo '<h1>No jobs to show</h1>';
    // }
    // else{
    foreach($jobs->getRecords() as $id => $job){  ?>

<div class="col-sm-4">
      <div class="panel panel-primary">
        <div class="panel-heading"><?php echo $job->getJobType(); ?></div>
        <div class="panel-body" style="height:230px">
        <p><?php echo $job->getJobDescription(); ?></p>
        <p>Location: <b><?php echo $job->getLocation(); ?></b></p>
        <p>Cost: <b><?php echo $job->getCost(); ?></b></p>
        <p>Date: <b><?php echo $job->getActiveDate(); ?></b></p>
        <p>Estimate Date: <b><?php echo $job->getEstimateDate(); ?></b></p>
        </div>
        <div class="panel-footer pviewestimate">
            <!-- <a href="showEstimate.php?id=<?php echo $job->getJobId(); ?>" class="btn btn-primary">View Estimates</a> -->
            <input type="hidden" value="<?php echo $job->getJobId(); ?>" >          
        </div>
        </div>
      </div>
    <?php //}
  }; ?>
</div>
</div>

