<?php 
require_once("headers.php");
$estimate=Estimate::find($mysqli,$_GET['id']);
//echo $estimate->getJobId();
$job=Job::find($mysqli,$estimate->getJobId());
//var_dump($job);
//echo $job->getJobType();
?>
<html>

<head>
     <title> Edit Booking</title>
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
</head>

<body style="background-color:silver;">
     <div class="container">
     <div id="add_data_Modal" class="">
          <div class="modal-dialog">
               <div class="modal-content">
                    <div class="modal-header" style="text-align:center;background-color:#337ab7;">
                         <!-- <button type="button" class="close" data-dismiss="modal">&times;</button>   -->
                         <h4 class="modal-title"><b>Edit Booking</b></h4>
                    </div>
                    <div class="modal-body" style="text-align:center;background-color:white;">
					<form method="post" id="insert_form" action="editEstimateDB.php">
					<!-- <p><label>Job Id</label><input name="jobId" type="text" value="<?php echo $estimate->getJobId();?>"></p>  -->
<p><label>Job Type</label><input name="jtype" type="text" disabled value="<?php echo $job->getJobType();?>"></p>
<p><label>Job Description</label><textarea name="jdescription" disabled type="text" value=""><?php echo $job->getJobDescription();?></textarea></p>
<p><label>Customer Cost Range</label><input name="crange" type="number" disabled value="<?php echo $job->getCost();?>"></p> 
<p><label>Material Cost</label><input name="mcost" type="number" value="<?php echo $estimate->getMaterialCost();?>"></p>
<p><label>Labour Cost</label><input name="lcost" type="number" value="<?php echo $estimate->getLabourCost();?>"></p>
<p><label>Expiration Date</label><input name="expdate" type="date" value="<?php echo $estimate->getExpirationDate();?>"></p>

<input type="hidden" name="eid" value="<?php echo $_GET['id'];?>">
<p><input type="submit" value="Confirm"></p>
					 </form>
					 </div>
                     
               </div>
          </div>
     </div>
                                   </div>
</body>
</html>