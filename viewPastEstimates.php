<!-- Page to get all expired jobs -->
<?php
require_once("headers.php");
//Calling function to get all expired estimates posted by the tradesman
$estimates = Estimate::findExpiredBytradesman($mysqli,$_GET['tid']);
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
                                  echo "<h3 style=\"font-style: italic;\" >You do not have any expired estimates ....</h3>";
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
                                   
                                   <p><b>Estimate Details</b></p>
                                   <p>Labour Cost: <b><?php echo $estimate->getLabourCost(); ?></b></p>
                                   <p>Material Cost: <b><?php echo $estimate->getMaterialCost(); ?></b></p>
                                   <p>Total Cost: <b><?php echo $estimate->getTotalCost(); ?></b></p>
                                   <p>Date: <b><?php echo $estimate->getExpirationDate(); ?></b></p>
                                  
                                  </div>
                          
                                      <div class="panel-footer pviewestimate" style="text-align: center;">            
                                     <?php   
                                      $today=date('Y-m-d');
                                     
                                      if($estimate->getIsAccepted() == 1 && $job->getIsClosed() == 0 )
                                      {
                                        
                                        echo "<a href=\"showUserReview.php?uid=".$job->getUserId()."&jid=".$job->getJobId()."\"  style=\"background-color: green;\" class=\"btn btn-primary viewestimate\">Click here to view client review</a>";
                                        
                                      }
                                      else if($estimate->getIsAccepted() == 0 && $job->getIsClosed() == 0 && $job->getActiveDate()<$today)
                                      {
                                        
                                        
                                        echo "<a href=\"#\"  style=\"background-color: #337ab7;\" disabled class=\"btn btn-primary viewestimate\">Rejected Estimate</a>";
                                        
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

