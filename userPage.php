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
            <?php $estimates = Estimate::getAllEstimatePerJob($mysqli, $job->getJobId()); ?>
            <a data-toggle="modal" data-target="" class="btn btn-primary viewestimate" name="viewestimate">View Estimates</a>

            <!-- Modal -->
            <div id="" class="modal fade estimate" role="dialog">
            <div class="modal-dialog modal-lg">

                <!-- Modal content-->
                <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h2 class="modal-title"><b>View Estimates</b></h2>
                </div>
                <div class="modal-body">
                    
                    <?php
                    echo "<table>";
                    echo '<tr style="font-weight:bold;">';
                    echo "<td>Job Id</td>";
                    echo "<td>Tradesman Id</td>";
                   // echo "<td>Tradesman Name</td>";
                    echo "<td>Expiration Date</td>";
                    echo "<td>Material Cost</td>";
                    echo "<td>Labour Cost</td>";
                    echo "<td>Total Cost</td>";
                   
                    echo "</tr>";
                        foreach($estimates->getRecords() as $id => $estimate){
                          //$tradesman=  Tradesman ::findById($mysqli,$estimate->getTradesmanId());
                          //var_dump($tradesman);
                          //echo $tradesman->getFName();
                            echo "<tr>";
                            echo "<td>".$estimate->getJobId()."</td>";
                            echo "<td>".$estimate->getTradesmanId()."</td>";
                            //echo "<td>".$tradesman->getFName()."</td>"; //'  '.$tradesman->getLName()."</td>"; 
                            echo "<td>".$estimate->getExpirationDate()."</td>";
                           // echo "<td>ESTID".$estimate->getEstimateId()."</td>";
                            
                            echo "<td>$".$estimate->getMaterialCost()."</td>";
                            echo "<td>$".$estimate->getLabourCost()."</td>";
                            echo "<td>$".$estimate->getTotalCost()."</td>";
                            // echo "<td><a href=\"showEstimate.php?id=".$job->getId()."\">View</a></td>";
                            echo "</tr>";
                        }
                        echo "</table>";
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
