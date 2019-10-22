<?php

require_once("headers.php");

$jobs = Job::getAll($mysqli);
//$jobs->debug();
// echo "<table>";
// foreach($jobs->getRecords() as $id => $job){
//     echo "<tr>";
//     echo "<td>".$job->getJobId()."</td>";
//     echo "<td>".$job->getJobType()."</td>";
//     echo "<td>".$job->getJobDescription()."</td>";
//     echo "<td>".$job->getLocation()."</td>";
//     echo "<td>".$job->getCost()."</td>";
//     echo "<td>".$job->getActiveDate()."</td>";
//     echo "<td>".$job->getEstimateDate()."</td>";
//     echo "<td><a href=\"showEstimate.php?id=".$job->getJobId()."\">View</a></td>";
//     echo "</tr>";
// }
// echo "</table>";

require_once("footer.php");

?>
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
        <p>Date: <b><?php echo $job->getActiveDate(); ?></b></p>
        <p>Estimate Date: <b><?php echo $job->getEstimateDate(); ?></b></p>
        </div>
        <div class="panel-footer pviewestimate">
            <!-- <a href="showEstimate.php?id=<?php echo $job->getJobId(); ?>" class="btn btn-primary">View Estimates</a> -->
            <input type="hidden" value="<?php echo $job->getJobId(); ?>" >
            <?php $estimates = Estimate::getAllJob($mysqli, $job->getJobId()); ?>
            <a data-toggle="modal" data-target="" class="btn btn-primary viewestimate" name="viewestimate">View Estimates</a>
            
            <!-- Modal -->
            <div id="" class="modal fade estimate" role="dialog">
            <div class="modal-dialog modal-lg">

                <!-- Modal content-->
                <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Modal Header</h4>
                </div>
                <div class="modal-body">
                    <p>Estimates</p>
                    <?php
                        foreach($estimates->getRecords() as $id => $estimate){
                            echo "<tr>";
                            echo "<td>ID".$estimate->getJobId()."</td>";
                            echo "<td>TID".$estimate->getTradesmanId()."</td>";
                            echo "<td>EXPDATE".$estimate->getExpirationDate()."</td>";
                            echo "<td>ESTID".$estimate->getEstimateId()."</td>";
                            echo "<td>COST".$estimate->getTotalCost()."</td>";
                            echo "<td>MCOST".$estimate->getMaterialCost()."</td>";
                            echo "<td>LCOST".$estimate->getLabourCost()."</td>";
                            // echo "<td><a href=\"showEstimate.php?id=".$job->getId()."\">View</a></td>";
                            echo "</tr>";
                        }
                    ?>
                    
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
