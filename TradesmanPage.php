<!-- Home page of Tradesman -->

<?php
require_once("headers.php");
?>

<div class="container" >
  <div class="row">
    <?php  $estimates=Estimate ::findByTradesman($mysqli,$_SESSION['tid']);
      $count=0;
                                
      foreach($estimates->getRecords() as $id => $estimate)
      {
       $count=$count+1;
                                  
     }
     //Check if tradesman has posted any estimates'
      if($count ==0)
      {
        echo "You have not posted any estimates yet! Post one now....";
        echo "<a href=\"viewJobs.php?tid=".$_GET['tid']."\" class=\"btn\" >Click here to view jobs</a> ";
       
      }
      else
      { 
        //Display all estimates posted by the tradesman
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
            
            <!-- <input type="hidden" value="<?php echo $estimate->getEstimateId(); ?>" > -->
            
            <?php 
            echo "<a href=\"editEstimate.php?id=".$estimate->getEstimateId()."&tid=".$_GET['tid']."\"  style=\"width: 60px;margin-left: 25px;\" class=\"btn btn-primary viewestimate\">Edit </a>";
            echo "<a href=\"deleteEstimateDB.php?id=".$estimate->getEstimateId()."\"  style=\"width: 60px;margin-left: 25px;\" class=\"btn btn-primary viewestimate\" onclick=\"return confirm('Are you sure to remove your estimate?')\">Delete </a>";

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