<?php

require "libs/dbconnect.php";
require "libs/autoloader.php";

session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script> -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body style="height:1500px">
<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
    <a class="" href="#"><img src="logo.jpg" alt="logo" style="width:40px;margin-top:10px"></a>
    </div>
    <ul class="nav navbar-nav">
      <li><a class="nav-link" href="userPage.php">View Jobs</a></li>
      <li><?php 
                    //toggle to show login, signup and logout button
                    if($_SESSION['uid']<>''){ 
                    
                    echo "<a data-toggle=\"modal\" data-target=\"#myModal\">Post Job</a>";
                    
                 }else{
                       
                 } 
                 ?></li>
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Hello <?php echo $_SESSION['firstname'] ?> <span class="caret"></span></a>
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
        <form method="post" action="addJob.php" enctype="application/x-www-form-urlencoded">
<p><label>Job Type</label><input name="jtype" type="text" ></p>
<!-- <p><label>Job Description</label><textarea rows="2"name="jdescription"  cols="20"></p> -->
<p><label>Job Description</label><input name="jdescription" type="text" ></p>
<p><label>Location</label><input name="jlocation" type="text" ></p>
<p><label>Cost Range</label><input name="crange" type="number" ></p>
<p><label>Active Date</label><input name="actdate" type="date"></p>
<p><label>Estimate End Date</label><input name="estenddate" type="date">
<input type="hidden" name="uid" value="<?php echo $_SESSION['uid'];?>">
<p><input type="submit" value="Post Job"></p>
</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>