<!-- Page to enter details to edit the Job details -->
<?php 
require_once("headers.php");
$job=Job::find($mysqli,$_GET['id']);
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
function dateValidate(sdate)
{
    var pickeddate =  new Date(sdate.value);
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
function dateValidate2(edate)
{
    var pickeddate =  new Date(edate.value);
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
// function myFunction() {
//   var v2 = document.getElementById('sdate');
//   var v1 = document.getElementById('edate');
//   if(new Date (v1.value)>new Date (v2.value))
//   {
//     alert("Estimate end date should be before job active date");
//     return false;
//   }
//   else{
//     //var v=getAttribute("sdate");
//     alert(v1);
//     return true;
//   }
// }
</Script>
</head>

<body>
     <!-- <div class="container"> -->
    
            <!-- <div class="row">  -->
               <div class="modal-content" style="height: 600px;">
                    <div class="modal-header" style="text-align:center;background-color:#337ab7;">
                         <!-- <button type="button" class="close" data-dismiss="modal">&times;</button>   -->
                         <h4 class="modal-title"><b>Edit Job</b></h4>
                    </div>
            <!-- </div> -->
                    <!-- <div class="modal-body" style="text-align:center;background-color:white;"> -->
					<form method="post" id="insert_form" action="editJobDB.php">
                        <input type="hidden" name="jid" value="<?php echo $job->getJobId();?>" />
                         <div class="row"><div class="col-25"><label>Job Type</label></div> <div class="col-75"><input name="jtype" type="text"  required="true" value="<?php echo $job->getJobType();?>"></div></div>
                         <div class="row"><div class="col-25"><label>Job Description</label></div> <div class="col-75"><textarea name="jdescription"  required="true" type="text" value=""><?php echo $job->getJobDescription();?></textarea></div></div>
                         <div class="row"><div class="col-25"><label>Job Location</label></div> <div class="col-75"><input name="location" required="true" type="text" value="<?php echo $job->getLocation();?>"></div></div>
                         <div class="row"><div class="col-25"><label>Customer Cost Range</label></div> <div class="col-75"><input name="crange" required="true" type="text"  value="<?php echo $job->getCost();?>"></div></div>
                         <div class="row"><div class="col-25"><label>Job Start Date</label></div> <div class="col-75"><input name="sdate" type="date" required="true" onblur="return dateValidate(this)" value="<?php echo $job->getActiveDate();?>"></div> </div>
                         <div class="row"><div class="col-25"><label>Estimate Date</label></div> <div class="col-75"><input name="edate" type="date" required="true" onblur="return dateValidate2(this)" value="<?php echo $job->getEstimateDate();?>"></div></div> 
                         <div class="row"><div class="col-75"><input type="submit" style="text-align:center;" value="Confirm"  ></div></div>
					</form>
				<!-- </div> -->
                     
               </div>
          <!-- </div> -->
     <!-- </div> -->
     
</body>
</html>