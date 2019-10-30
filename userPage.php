<?php

require_once("headers.php");

require_once("footer.php");
session_start();
?>
<div class="container" >
<div class="row">
  <?php 
  if(isset($_SESSION["success"])&&($_SESSION["success"]=="post")){
    ?>
    
<div class="alert alert-success div1" align="center">
  <strong>Job Post Success!</strong>
</div>
<?php
  unset($_SESSION["success"]);
  }
  ?>
  <?php 
  if(isset($_SESSION["success"])&&($_SESSION["success"]=="edit")){
    ?>
    
<div class="alert alert-success div1" align="center">
  <strong>Update Success!</strong>
</div>
<?php
  unset($_SESSION["success"]);
  }
  ?>
<?php  $jobs=Job ::findByUser($mysqli,$_GET['uid']);
          $count=0;
          //echo $count;
          foreach($jobs->getRecords() as $id => $job)
          {
             $count=$count+1;
            
          }
          //echo $count;
          if($count ==0)
          {
            echo "You have not posted any jobs yet! Post one now....";
            echo "<a data-toggle=\"modal\" data-target=\"#myModal\">Click here to Post Job</a>";
           
           
          }
          else{
             foreach($jobs->getRecords() as $id => $job){  ?>

<div class="col-sm-4" >
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
            <?php 
            echo "<a href=\"editJob.php?id=".$job->getJobId()."\"  style=\"width: 60px;margin-left: 25px;\" class=\"btn btn-primary\">Edit </a>";
            echo "<a href=\"deleteJobDB.php?id=".$job->getJobId()."\"  style=\"width: 60px;margin-left: 25px;\" class=\"btn btn-primary\" onclick=\"return confirm('Are you sure to remove your job?')\">Delete </a>";

            ?>      
            <!-- Modal -->
            <div id="" class="modal fade estimate" role="dialog">
            <div class="modal-dialog modal-lg">

                <!-- Modal content-->
                <div class="modal-content">
                <div class="modal-header" style="text-align:center;background-color:#337ab7;">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h2 class="modal-title"><b>View Estimates</b></h2>
                </div>
                <div class="modal-body">
                    
                    <?php
                      $accept=false;
                      $ecount=0;
                      foreach($estimates->getRecords() as $id => $estimate)
                      {   $ecount=$ecount+1;
                          if($estimate->getIsAccepted()==1){
                          $accept=true;
                          }
                      }
                      if($accept==false){
                          $hid="";
                          
                      }else{
                          
                          $hid="style='display:none'";
                      }
                      if($ecount!=0)
                      {
                        echo "<table class='table'>";
                        echo '<tr style="font-weight:bold;">';
                        //echo "<td>Job Id</td>";
                        echo "<td>Tradesman Id</td>";
                        echo "<td>Tradesman Name</td>";
                        echo "<td>Tradesman Contact</td>";
                        echo "<td>Expiration Date</td>";
                        echo "<td>Material Cost</td>";
                        echo "<td>Labour Cost</td>";
                        echo "<td>Total Cost</td>";
                        //echo "<td>Choose</td>";
                        echo "</tr>";
                        foreach($estimates->getRecords() as $id => $estimate){
                          if($estimate->getIsAccepted()==0){
                              $color="white";      
                              }
                          else{
                              $color="alert-success";
                              }

                              $tradesman= Tradesman :: findById($mysqli,$estimate->getTradesmanId());
                                echo "<tr class=".$color.">";
    
                                //echo "<td>".$estimate->getJobId()."</td>";
                                echo "<td>".$estimate->getTradesmanId()."</td>";
                                echo "<td>".$tradesman->getFName().'  '.$tradesman->getLName()."</td>"; 
                                echo "<td>".$tradesman->getPhone()."</td>";
                                echo "<td>".$estimate->getExpirationDate()."</td>";
                               // echo "<td>ESTID".$estimate->getEstimateId()."</td>";
                               
                                echo "<td>$".$estimate->getMaterialCost()."</td>";
                                echo "<td>$".$estimate->getLabourCost()."</td>";
                                echo "<td>$".$estimate->getTotalCost()."</td>";
                                
                                 echo "<td ".$hid."><a href=\"acceptEstimate.php?eid=".$estimate->getEstimateId()."&uid=".$_GET['uid']."\">Accept</a></td>";
                                echo "</tr>";
                            }
                            echo "</table>";
                      }
                      else{
                        echo "<p style=\"text-align: center;\"><b>No Estimates yet...........!<b></p>";
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

    <?php }}; ?>
    </div>
</div>
<script>
  $(document).ready(function() {
    $(document).on('click', '.viewestimate', function() {
      debugger;
      var a = $(this).parents('.pviewestimate').find('.estimate');
      $(a).modal('show');
    });
    $(".div1").fadeOut(3000);
  });
</script>
