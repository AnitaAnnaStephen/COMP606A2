<?php
require_once("headers.php");
$jobs = Job::findExpiredByUser($mysqli,$_GET['uid']);
//var_dump($jobs);
//echo $jobs->getJobId();
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
            <?php $estimate = Estimate::getAcceptedEstimatePerJob($mysqli, $job->getJobId()); ?>
            <a data-toggle="modal" data-target="" class="btn btn-primary viewestimate" name="viewestimate">Rate the Tradesman</a>
             <!-- Modal -->
             <div id="" class="modal fade estimate" role="dialog">
            <div class="modal-dialog modal-lg">

                <!-- Modal content-->
                <div class="modal-content">
                <div class="modal-header" style="text-align:center;background-color:#337ab7;">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h2 class="modal-title"><b>Rate the Tradesman</b></h2>
                </div>
                <div class="modal-body">
                    
                    <?php
                                $tradesman= Tradesman :: findById($mysqli,$estimate->getTradesmanId());
                                echo "<tr class=".$color.">";
    
                                //echo "<td>".$estimate->getJobId()."</td>";
                                echo "<td>".$estimate->getTradesmanId()."</td>";
                                echo "<td>".$tradesman->getFName().'  '.$tradesman->getLName()."</td>"; 
                                
                                
                                 echo "<td ".$hid."><a href=\"rateEstimate.php?eid=".$estimate->getEstimateId()."&uid=".$_GET['uid']."\">Accept</a></td>";
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
    <?php //}
   ?>
</div>
</div>

