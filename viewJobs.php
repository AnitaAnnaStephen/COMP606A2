<!-- Page for displaying all jobs for Tradesman -->
<?php

require_once("headers.php");

$jobs = Job::getAll($mysqli);
require_once("footer.php");

?>
<div class="container">
<div class="row">
    <?php foreach($jobs->getRecords() as $id => $job){  ?>

<div class="col-sm-4">
      <div class="panel panel-primary">
        <div class="panel-heading"><?php echo $job->getJobType(); ?></div>
        <div class="panel-body" style="height:230px">
        <form method="post" action="addEstimate.php" enctype="application/x-www-form-urlencoded">
        <p><?php echo $job->getJobDescription(); ?></p>
        <p>Location: <b><?php echo $job->getLocation(); ?></b></p>
        <p>Cost: <b><?php echo $job->getCost(); ?></b></p>
        <p>Date: <b><?php echo $job->getActiveDate(); ?></b></p>
        <p>Estimate Date: <b><?php echo $job->getEstimateDate(); ?></b></p>
        </div>
        <div class="panel-footer pviewestimate">
            <!-- <a href="showEstimate.php?id=<?php echo $job->getJobId(); ?>" class="btn btn-primary">View Estimates</a> -->
            <input type="hidden" name="jid" value="<?php echo $job->getJobId(); ?>" >
            <input type="hidden" name="tid" value="<?php echo $_GET['tid']; ?>" >
            <p><input type="submit" class="btn btn-primary viewestimate" value="Post Estimates"></p>
            <!-- <a data-toggle="modal" data-target="addestimate" class="btn btn-primary viewestimate" name="viewestimate">Post Estimates</a> -->
          </form>
            <!-- Modal -->
            <div id="addestimate" class="modal fade estimate" role="dialog">
            <div class="modal-dialog modal-lg" style="width: 40%;">

                <!-- Modal content-->
                <div class="modal-content">
                <div class="modal-header"style="text-align:center;background-color:#337ab7;">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h2 class="modal-title"><b>Post Estimates</b></h2>
                </div>
                <div class="modal-body"  style="text-align:center;background-color:white;">
                    
                <p>Enter Estimate Details</p>
        <form method="post" action="addJobEstimate.php" enctype="application/x-www-form-urlencoded">
        <!-- <?php echo $job->getJobId();?> -->
           <!-- <p><label>Job Id</label><input name="jobId" type="text" value="<?php echo $job->getJobId();?>"></p>  -->
          <p><label>Job Type</label><input name="jtype" type="text" disabled value="<?php echo $job->getJobType();?>"></p>
          <p><label>Job Description</label><textarea name="jdescription" disabled type="text" value=""><?php echo $job->getJobDescription();?></textarea></p>
          <p><label>Customer Cost Range</label><input name="crange" type="number" disabled value="<?php echo $job->getCost();?>"></p> 
          <p><label>Job Start Date:</label><input name="sdate" type="date" disabled value="<?php echo $job->getActiveDate();?>"></p> 
          <p><label>Estimate Date</label><input name="edate" type="date" disabled value="<?php echo $job->getEstimateDate();?>"></p> 
          <p><label>Material Cost</label><input name="mcost" type="number"></p>
          <p><label>Labour Cost</label><input name="lcost" type="number"></p>
          <p><label>Expiration Date</label><input name="expdate" type="date"></p>
          
          <input type="hidden" name="sdate" value="<?php echo $job->getActiveDate();?>">
          <input type="hidden" name="edate" value="<?php echo $job->getEstimateDate();?>">
          <input type="hidden" name="tid" value="<?php echo $_GET['tid'];?>">
          <input type="hidden" name="jobId" value="<?php echo $job->getJobId();?>">
          <!-- <?php echo $job->getJobId();?> -->
          <p><input type="submit" value="Post Estimate"></p>
        </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
                </div>

            </div>
            </div>
            <!-- end Modal -->
        </div>

      </div>
    </div>

    <?php }; ?>
    </div>
</div>
<script>
  $(document).ready(function() {
    $(document).on('click', '.viewestimate', function() {
      debugger;
      var a = $(this).parents('.pviewestimate').find('.estimate');
      $(a).modal('show');
    });
  });
</script>
