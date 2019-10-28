<?php

require_once("headers.php");
//$data = $_GET["param"];
//var_dump($data);
//echo $data;
// $jobs = Job::getAll($mysqli);
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
// foreach($jobs->getRecords() as $id => $job){
//     echo "<tr>";
//     echo "<td>".$job->getJobId()."</td>";
//     echo "<td>".$job->getUserId()."</td>";
//     echo "<td>".$job->getJobType()."</td>";
//     echo "<td>".$job->getJobDescription()."</td>";
//     echo "<td>".$job->getLocation()."</td>";
//     echo "<td>".$job->getCost()."</td>";
//     echo "<td>".$job->getActiveDate()."</td>";
//     echo "<td>".$job->getEstimateDate()."</td>";
//     // echo "<td><a href=\"postEstimate.php?jid=".$job->getJobId()."&tid=".$data."\">Post Estimate</a></td>";
//     echo "<td><a data-toggle=\"modal\" data-target=\"#myPostModal\">Post Estimate</a></td>";
//     echo "</tr>";
// }
// echo "</table>";
?>
 <!DOCTYPE html>  
 <html> 
<body style="background-color: silver;">  
           <br /><br />  
           <div class="container" style="width:700px;">  
           <title>Tradesman Page</title>
                <h3 align="center"><b>View your Estimates</b></h3>  
                <br />  
                <div class="table-responsive">  
                     <div align="right">  
                      <!-- <a href="viewJobs.php?tid=<?php echo $_GET['tid']; ?>" class="btn" style="background-color:#fff;">View Jobs</a>   -->
                     </div>  
                     <br />  
                     <div id="bookings_table">  
                          <table class="table table-bordered">  
                                <?php  $estimates=Estimate ::findByTradesman($mysqli,$_GET['tid']);
                                $count=0;
                                //echo $count;
                                foreach($estimates->getRecords() as $id => $estimate)
                                {
                                   $count=$count+1;
                                  
                                }
                                //echo $count;
                                if($count ==0)
                                {
                                  echo "You have not posted any estimates yet! Post one now....";
                                  echo "<a href=\"viewJobs.php?tid=".$_GET['tid']."\" class=\"btn\" >Click here to view jobs</a> ";
                                 
                                }
                                else
                                {
                                    
                                  echo "<tr>";
                                  echo "<td><b>Estimate Id</b></td>";
                                  echo "<td><b>Job Id</b></td>";
                                  echo "<td><b>Labour Cost</b></td>";
                                  echo "<td><b>Material Cost</b></td>";
                                  echo "<td><b>Total Cost</b></td>";
                                  echo "<td><b>Expiration Date</b></td>";
                                  
                                  echo "</tr>";
                                  foreach($estimates->getRecords() as $id => $estimate)
                                  {
                                    echo "<tr>";
                                    echo "<td>".$estimate->getEstimateId()."</td>";
                                    echo "<td>".$estimate->getJobId()."</td>";
                                    echo "<td>$ ".$estimate->getLabourCost()."</td>";
                                    echo "<td>$ ".$estimate->getMaterialCost()."</td>";
                                    echo "<td>$ ".$estimate->getTotalCost()."</td>";
                                    echo "<td>".$estimate->getExpirationDate()."</td>";
                                    echo "<td><a href=\"editEstimate.php?id=". $estimate->getEstimateId()."\"     class=\"btn\">Edit</td>";
                                  
                                    echo "</tr>";
                                  }
                                }
                               ?>  
                              
                          </table>  
                     </div>  
                </div>  
           </div>  
          
      </body>
    </html>
<!-- Modal -->
<div id="myPostModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header"  style="text-align:center;background-color:#337ab7;">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h2 class="modal-title">Edit Estimate</h2>
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