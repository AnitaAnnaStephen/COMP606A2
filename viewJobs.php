<?php

require_once("headers.php");
//$data = $_GET["param"];
//var_dump($data);
//echo $data;
$jobs = Job::getAll($mysqli);
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
foreach($jobs->getRecords() as $id => $job){
    // echo "<tr>";
    // echo "<td>".$job->getJobId()."</td>";
    // echo "<td>".$job->getUserId()."</td>";
    // echo "<td>".$job->getJobType()."</td>";
    // echo "<td>".$job->getJobDescription()."</td>";
    // echo "<td>".$job->getLocation()."</td>";
    // echo "<td>".$job->getCost()."</td>";
    // echo "<td>".$job->getActiveDate()."</td>";
    // echo "<td>".$job->getEstimateDate()."</td>";
    // // echo "<td><a href=\"postEstimate.php?jid=".$job->getJobId()."&tid=".$data."\">Post Estimate</a></td>";
    // echo "<td><a data-toggle=\"modal\" data-target=\"#myPostModal\">Post Estimate</a></td>";
    // echo "</tr>";
}
// echo "</table>";
?>
 <!DOCTYPE html>  
 <html> 
 <body>
<!-- Modal -->
<div id="myPostModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" style="text-align:center;background-color:#337ab7;">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h2 class="modal-title">Post Estimate</h2>
      </div>
      <div class="modal-body" style="text-align:center;background-color:white;">
        <p>Enter Estimate Details</p>
        <form method="post" action="addJobEstimate.php" enctype="application/x-www-form-urlencoded">
 <!-- <p><label>Job Id</label><input name="jobId" type="text" value="<?php echo $job->getJobId();?>"></p>  -->
<p><label>Job Type</label><input name="jtype" type="text" disabled value="<?php echo $job->getJobType();?>"></p>
<p><label>Job Description</label><textarea name="jdescription" disabled type="text" value=""><?php echo $job->getJobDescription();?></textarea></p>
<p><label>Customer Cost Range</label><input name="crange" type="number" disabled value="<?php echo $job->getCost();?>"></p> 
<p><label>Material Cost</label><input name="mcost" type="number"></p>
<p><label>Labour Cost</label><input name="lcost" type="number"></p>
<p><label>Expiration Date</label><input name="expdate" type="date"></p>

<input type="hidden" name="tid" value="<?php echo $_GET['tid'];?>">
<input type="hidden" name="jobId" value="<?php echo $job->getJobId();?>">
<p><input type="submit" value="Post Estimate"></p>
</form>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<?php require_once("footer.php"); ?>


<div class="container">
 <div class="row">
    <?php foreach($jobs->getRecords() as $id => $job){  ?>

   <div class="col-sm-4">
      <div class="panel panel-primary">
        <div class="panel-heading"><?php echo $job->getJobType(); ?></div>
        <div class="panel-body" style="height:230px">
        <p><?php echo $job->getJobDescription(); ?></p>
        <p>Location: <b><?php echo $job->getLocation(); ?></b></p>
        <p>Cost: <b><?php echo $job->getCost(); ?></b></p>
        <p>Job Active Date: <b><?php echo $job->getActiveDate(); ?></b></p>
        <p>Last day to post estimate: <b><?php echo $job->getEstimateDate(); ?></b></p>
        </div>
        <div class="panel-footer pviewestimate">
            <!-- <a href="showEstimate.php?id=<?php echo $job->getJobId(); ?>" class="btn btn-primary">View Estimates</a> -->
            <input type="hidden" value="<?php echo $job->getJobId(); ?>" >
            <?php $estimates = Estimate::getAllEstimatePerJob($mysqli, $job->getJobId()); ?>
            <a data-toggle="modal" data-target="#myPostModal" class="btn btn-primary viewestimate" name="viewestimate">Post Estimate</a>
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
<body>
</html>