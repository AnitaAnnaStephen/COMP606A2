<!-- Page to get all expired estimates -->
<?php
require_once("headers.php");
//Calling function to get all expired estimates posted by the tradesman
$estimates = Estimate::findExpiredBytradesman($mysqli,$_GET['tid']);
//var_dump($jobs);
//echo $jobs->getJobId();
require_once("footer.php");
?>
<div class="container">
<div class="row">
    <?php   
  $count=0;
                        foreach($estimates->getRecords() as $id => $estimate)
                                {
                                 $count=$count+1;
                                }
                               //echo $count;
                               //Check if tradesman has posted any estimates'
                                if($count ==0)
                                {
                                  echo "You do not have any expired estimates ....";
                                //   echo "<a href=\"viewJobs.php?tid=".$_GET['tid']."\" class=\"btn\" >Click here to view jobs</a> ";
                                 
                                }
                                else
                                { 
                                  //Display all estimates posted by the tradesman
                                   foreach($estimates->getRecords() as $id => $estimate)
                                   { ?>
                                   <div class="col-sm-4" >
                                   <div class="panel panel-primary">
                                   <?php $job= Job :: find($mysqli,$estimate->getJobId());?>
                                   
                                   <?php 
                                     if($estimate->getIsAccepted() == 1 && $job->getIsClosed() == 0)
                                      {
                                        $bcolor="#dff0d8";
                                        $color="3c763d";
                                        echo '<div class="panel-heading" style="background-color:green;">'.$job->getJobType().'</div>';
                                        $status="Accepted";
                                      }
                                     else if ($job->getIsClosed() == 1)
                                     {
                                        $bcolor="white";
                                        $color="black";
                                        $status="Job removed";
                                        echo '<div class="panel-heading" style="background-color:red;">'.$job->getJobType().'</div>';
                                     } 
                                     else 
                                     {
                                        $bcolor="white";
                                        $color="black";
                                        $status="Pending";
                                        echo '<div class="panel-heading" >'.$job->getJobType().'</div>';
                                      }
                                   
                                   echo '<div class=\"panel-body\" id=\"background\" style=\"height:400px;background-color:'.$bcolor.';color:'.$color.';">';
                                  
                                    ?>
                                     
                                   <p><b>Job Details</b></p>
                                   <p><?php echo $job->getJobDescription(); ?></p>
                                   <p>Job Id: <b><?php echo $estimate->getJobId(); ?></b></p>
                                   <p>Location: <b><?php echo $job->getLocation(); ?></b></p>
                                   <p>Cost Range: <b><?php echo $job->getCost(); ?></b></p>
                                   <p>Estimate Date: <b><?php echo $job->getEstimateDate(); ?></b></p>
                                   <p>Active Date: <b><?php echo $job->getActiveDate(); ?></b></p>
                                   <?php echo  '<p id="bg-text" >'.$status.'</p>'; ?>
                                   <p><b>Estimate Details</b></p>
                                   <p>Labour Cost: <b><?php echo $estimate->getLabourCost(); ?></b></p>
                                   <p>Material Cost: <b><?php echo $estimate->getMaterialCost(); ?></b></p>
                                   <p>Total Cost: <b><?php echo $estimate->getTotalCost(); ?></b></p>
                                   <p>Date: <b><?php echo $estimate->getExpirationDate(); ?></b></p>
                                  
                                  </div>
                          
                                      <div class="panel-footer pviewestimate" style="text-align: center;">            
                                     <?php   
                                      
                                     
                                      if($estimate->getIsAccepted() == 1 && $job->getIsClosed() == 0)
                                      {
                                        // echo "<a href=\"#\" class=\"btn btn-primary viewestimate\" disabled style=\"width: 100px;margin-left: 25px;background-color: green;\" >Accepted </a>";
                                        
                                        echo "<a href=\"showClientDetails.php?uid=".$job->getUserId()."\"  style=\"background-color: green;\" class=\"btn btn-primary viewestimate\">Click here to view client review</a>";
                                        // echo '<a data-toggle="modal" data-target="" class="btn btn-primary viewestimate" style="background-color: green;" name="viewestimate">Click here to view client details</a>';
                                        
                                      }
                                      else if ($job->getIsClosed() == 1)
                                      {
                                        echo "<a href=\"deleteEstimateDB.php?id=".$estimate->getEstimateId()."\"  style=\"background-color: red;\" class=\"btn btn-primary viewestimate\" onclick=\"return confirm('Are you sure to remove your estimate?')\">Delete the Estimate</a>";
                                      }
                                     
                                      ?>
                                      </div>
                          
                          </div>
                          </div>
                          
                          <?php }}; ?>
    </div>
</div>

