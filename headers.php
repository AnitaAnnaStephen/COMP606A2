<?php

require "libs/dbconnect.php";
require "libs/autoloader.php";

session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script> -->
<style>
  .col-25 {
  float: left;
  width: 20%;
  margin-top: 6px;
}
  </style>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body style="height:1500px;background-color: white;">
<nav class="navbar navbar-inverse navbar-fixed-top">
<div class="container-fluid">
<div class="navbar-header">
<a class="" href="#"><img src="logo.jpg" alt="logo" style="width:40px;margin-top:10px"></a>
</div>
<ul class="nav navbar-nav">
<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Hello <?php echo $_SESSION['firstname']; ?> <span class="caret"></span></a>
<!-- <li><a class="nav-link" href="userPage.php">View Jobs</a></li> -->
<li><?php 
//toggle to show login, signup and logout button
if($_SESSION['uid']<>''){ 

echo  "<li><a class=\"nav-link\" href=\"UserPage.php?uid=".$_SESSION['uid']."\">Home </a></li>";
echo "<li><a class=\"nav-link\" href=\"viewAllJobs.php\">View All Jobs</a></li>";
echo "<li><a class=\"nav-link\" href=\"viewExpiredJobs.php?uid=".$_SESSION['uid']."\">View Past Jobs</a></li>";
echo "<li><a data-toggle=\"modal\" data-target=\"#myModal\">Post Job</a></li>";


}else{
echo "<li><a class=\"nav-link\" href=\"TradesmanPage.php?tid=".$_SESSION['tid']."\">Home</a></li>";
echo "<li><a class=\"nav-link\" href=\"viewJobs.php?tid=".$_SESSION['tid']."\">View Jobs</a></li>";
echo "<li><a class=\"nav-link\" href=\"viewPastEstimates.php?tid=".$_SESSION['tid']."\">View Past Estimates</a></li>";
} 
?></li>

<ul class="dropdown-menu">
<li><a href="#">Page 1-1</a></li>
</ul>
</li>
</ul>
<ul class="nav navbar-nav navbar-right">

<li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>

</ul>
</div>
</nav>
<div class="container" style="margin-top:80px">
<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
<div class="modal-dialog">

<!-- Modal content-->
<div class="modal-content">
<div class="modal-header" style="text-align:center;background-color:#337ab7;">
<button type="button" class="close" data-dismiss="modal">&times;</button>
<h2 class="modal-title">Post a Job</h2>
</div>
<div class="modal-body" style="text-align:center;background-color:white;">
<p>Enter Job Details</p>
<form method="post" action="addJob.php" enctype="application/x-www-form-urlencoded" class="">
<p><div class="form-group"><label>Job Type</label><input name="jtype" type="text" required="true" class="form-control"></div></p>
<!-- <p><label>Job Description</label><textarea rows="2"name="jdescription"  cols="20"></p> -->
<p><div class="form-group"><label>Job Description</label><textarea name="jdescription" required="true" type="text" class="form-control"></textarea></div></p>
<p><div class="form-group"><label>Location</label><input name="jlocation" required="true" type="text" class="form-control"></div></p>
<p><div class="form-group"><label>Cost Range</label><input name="crange" required="true" type="number" class="form-control"></div></p>
<p><div class="form-group"><label>Active Date</label><input name="actdate" required="true" type="date" class="form-control"></div></p>
<p><div class="form-group"><label>Estimate End Date</label><input name="estenddate" required="true" type="date" class="form-control"></div></p>
<input type="hidden" name="uid" value="<?php echo $_SESSION['uid'];?>">
<p><input type="submit" value="Post Job" class="btn btn-primary"></p>
</form>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
</div>
</div>

</div>
</div>
