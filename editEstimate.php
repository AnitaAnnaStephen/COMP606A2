<!-- PAge to edit the estimate by tradesman -->
<?php 
require_once("headers.php");

if(!isset($_GET['id']))
{
    
    $estimate=Estimate::find($mysqli,$_GET['eid']);
}
else{
    
    $estimate=Estimate::find($mysqli,$_GET['id']);
    $_SESSION['error']="";
}
//$estimate=Estimate::find($mysqli,$_GET['id']);

$job=Job::find($mysqli,$estimate->getJobId());
?>
<html>

<head>
     <title> Edit Estimate</title>
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


@media screen and (max-width: 600px) {
  .col-25, .col-75, input[type=submit] {
    width: 100%;
    margin-top: 0;
  }
}
</style>
</head>

<body>
<?php 
  if(isset($_SESSION["error"])&&($_SESSION["error"]=="Expiration")){
    ?>
    
<div class="alert alert-success div1" align="center">
  <strong>Expiration date past job start date!</strong>
</div>
<?php
  unset($_SESSION["error"]);
  }
  ?>
     <!-- <div class="container"> -->
    
            <!-- <div class="row">  -->
               <div class="modal-content" style="height: 650px;">
                    <div class="modal-header" style="text-align:center;background-color:#337ab7;">
                         <!-- <button type="button" class="close" data-dismiss="modal">&times;</button>   -->
                         <h4 class="modal-title"><b>Edit Estimate</b></h4>
                   
                    </div>
                    <?php
                    if(isset($_SESSION["error"])){
                        $error = $_SESSION["error"];
                        echo "<span style=\"margin-left: 260px;color:red;background-color:yellow;\">$error</span>";
                    }
                ?>
            <!-- </div> -->
                    
					<form method="post" id="insert_form" action="editEstimateDB.php">
					
                         <div class="row"><div class="col-25"><label>Job Type</label></div> <div class="col-75"><input name="jtype" type="text" required="true"disabled value="<?php echo $job->getJobType();?>"></div></div>
                         <div class="row"><div class="col-25"><label>Job Description</label></div> <div class="col-75"><textarea name="jdescription" disabled type="text" value=""><?php echo $job->getJobDescription();?></textarea></div></div>
                         <div class="row"><div class="col-25"><label>Customer Cost Range</label></div> <div class="col-75"><input name="crange" type="text" disabled value="<?php echo $job->getCost();?>"></div></div>
                         <div class="row"><div class="col-25"><label>Job Start Date</label></div> <div class="col-75"><input name="sdate" type="text" disabled value="<?php echo $job->getActiveDate();?>"></div> </div>
                         <div class="row"><div class="col-25"><label>Estimate Date</label></div> <div class="col-75"><input name="edate" type="text" disabled value="<?php echo $job->getEstimateDate();?>"></div></div>
                         <div class="row"><div class="col-25"><label>Material Cost</label></div> <div class="col-75"><input name="mcost" type="number" required="true" value="<?php echo $estimate->getMaterialCost();?>"></div></div>
                         <div class="row"><div class="col-25"><label>Labour Cost</label></div> <div class="col-75"><input name="lcost" type="number" required="true" value="<?php echo $estimate->getLabourCost();?>"></div></div>
                         <div class="row"><div class="col-25"><label>Expiration Date</label></div> <div class="col-75"><input name="expdate" type="date" required="true" value="<?php echo $estimate->getExpirationDate();?>"></div></div>
                         <input type="hidden" name="eid" value="<?php echo $_GET['id'];?>">
                         <input type="hidden" name="sdate" value="<?php echo $job->getActiveDate();?>">
                         <input type="hidden" name="edate" value="<?php echo $job->getEstimateDate();?>">
                         <input type="hidden" name="tid" value="<?php echo $_SESSION['tid'];?>">
          
                         <div class="row"><div class="col-75">
                         <?php $tid= $_SESSION['tid']; ?> 
                         <div class="link"><?php echo "<a style=\"color:white;\" href=\"TradesmanPage.php?tid=".$tid."\" >Cancel</a>";?></div>
                         <input type="submit" style="text-align:center;" value="Confirm">
                         </div></div>
                         
					</form>
				<!-- </div> -->
                     
               </div>
          <!-- </div> -->
     <!-- </div> -->
     
</body>
</html>
<script>
  $(document).ready(function() {
    debugger;
    // $(".div1").fadeOut(4000);
  });
</script>