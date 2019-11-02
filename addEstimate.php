<?php

require_once("headers.php");

if(!isset($_POST['jid']))
{
    $job = Job::find($mysqli, $_GET['jid']);
    
}
else{
    $job = Job::find($mysqli, $_POST['jid']);
    $_SESSION['error']="";
}

//var_dump($job);
require_once("footer.php");
session_start();
?>
<html>

<head>
     <title> Add Estimate</title>
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
     
     <style>
     * {
  box-sizing: border-box;
}

input[type=text], select, textarea {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  resize: vertical;
}
input[type=number], select, textarea {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  resize: vertical;
}

input[type=date], select, textarea {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  resize: vertical;
}
label {
  padding: 12px 12px 12px 0;
  display: inline-block;
}

input[type=submit] {
  background-color: #337ab7;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  float: right;
}


.link {
  background-color: #337ab7;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  float: right;
  margin-left: 25px;
}

input[type=submit]:hover {
  background-color: #45a049;
}

.container {
  border-radius: 5px;
  background-color: white;
  padding: 20px;
  width:800px;
}

.col-25 {
  float: left;
  width: 20%;
  margin-top: 6px;
}

.col-75 {
  float: left;
  width: 50%;
  margin-top: 6px;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}
.row{
     margin-left:150px;
}

/* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 600px) {
  .col-25, .col-75, input[type=submit] {
    width: 100%;
    margin-top: 0;
  }
}
</style>
<script>
function dateValidate2(expdate)
{
    var pickeddate =  new Date(expdate.value);
    var todayDate =  new Date();
    if( pickeddate > todayDate )
    {
       return true;
    }
    else
    {
        alert("Enter a Future Date");
    } 
}

</Script>
</head>
<body>
<?php 
  if(isset($_SESSION["error"])&&($_SESSION["error"]=="Already")){
    ?>
    
<div class="alert alert-success div1" align="center" style="margin-left:360px;margin-right:400px">
  <strong>Already posted estimate for this job!</strong>
</div>
<?php
  unset($_SESSION["error"]);
  }
  ?>
  <?php 
  if(isset($_SESSION["error"])&&($_SESSION["error"]=="Expiration")){
    ?>
    
<div class="alert alert-success div1" align="center" style="margin-left:360px;margin-right:400px">
  <strong>Expiration date past job start date!</strong>
</div>
<?php
  unset($_SESSION["error"]);
  }
  ?>
<div class="modal-content" style="height: 700px; margin-left: 360px; width: 50%; display: inline-block;">
                    <div class="modal-header" style="text-align:center;background-color:#337ab7;">
                         <!-- <button type="button" class="close" data-dismiss="modal">&times;</button>   -->
                         <h4 class="modal-title"><b>Add Estimate</b></h4>
                    </div>
            <!-- </div> -->
                    <!-- <div class="modal-body" style="text-align:center;background-color:white;"> -->
                    
                <h4 style="text-align:center;">Enter Estimate Details</h4>
                <?php
                    if(isset($_SESSION["error"])){
                        $error = $_SESSION["error"];
                        echo "<span style=\"margin-left: 260px;color:red;background-color:yellow;\">$error</span>";
                    }
                ?>
        <form method="post" action="addJobEstimate.php" enctype="application/x-www-form-urlencoded">
        <!-- <?php echo $job->getJobId();?> -->
           <!-- <p><label>Job Id</label><input name="jobId" type="text" value="<?php echo $job->getJobId();?>"></p>  -->
          <div class="row"><div class="col-25"><label>Job Type</label></div> <div class="col-75"><input name="jtype" required="true" type="text" disabled value="<?php echo $job->getJobType();?>"></div></div>
          <div class="row"><div class="col-25"><label>Job Description</label></div> <div class="col-75"><textarea name="jdescription" required="true" disabled type="text" value=""><?php echo $job->getJobDescription();?></textarea></div></div>
          <div class="row"><div class="col-25"><label>Customer Cost Range</label></div> <div class="col-75"><input name="crange" required="true" type="number" disabled value="<?php echo $job->getCost();?>"></div></div> 
          <div class="row"><div class="col-25"><label>Job Start Date:</label></div> <div class="col-75"><input name="sdate" type="date" required="true" disabled value="<?php echo $job->getActiveDate();?>"></div></div>
          <div class="row"><div class="col-25"><label>Estimate Date</label></div> <div class="col-75"><input name="edate" type="date" required="true" disabled value="<?php echo $job->getEstimateDate();?>"></div></div>
          <div class="row"><div class="col-25"><label>Material Cost</label></div> <div class="col-75"><input name="mcost" required="true" type="number"></div></div>
          <div class="row"><div class="col-25"><label>Labour Cost</label></div> <div class="col-75"><input name="lcost" required="true" type="number"></div></div>
          <div class="row"><div class="col-25"><label>Expiration Date</label></div> <div class="col-75"><input name="expdate" required="true" type="date" onblur="return dateValidate2(this)"></div></div>
          
          <input type="hidden" name="sdate" value="<?php echo $job->getActiveDate();?>">
          <input type="hidden" name="edate" value="<?php echo $job->getEstimateDate();?>">
          <input type="hidden" name="tid" value="<?php echo $_SESSION['tid'];?>">
          <input type="hidden" name="jobId" value="<?php echo $job->getJobId();?>">
          <!-- <?php echo $job->getJobId();?> -->
          <?php echo "</br>"; ?>
          <div class="row"><div class="col-75">
                         <?php 
                             $tid=$_SESSION['tid']; ?> 
          <div class="link"><?php echo "<a style=\"color:white;\" href=\"viewJobs.php?tid=".$tid."\" >Cancel</a>";?></div>
                         <input type="submit" style="text-align:center;" value="Post Estimate">
                         </div></div>
        </form>
               	<!-- </div> -->
                     
                   </div>
          <!-- </div> -->
     <!-- </div> -->
     <?php require ("footer.php"); ?>
</body>
</html>
<script>
  $(document).ready(function() {
    debugger;
    // $(".div1").fadeOut(4000);
  });
</script>