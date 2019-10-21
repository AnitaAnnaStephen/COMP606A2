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

<!-- <nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top">
  <a class="navbar-brand" href="#"><img src="logo.jpg" alt="logo" style="width:40px;"></a>
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" href="userPage.php">View Jobs</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="logout.php">logout</a>
    </li>
    <li class="nav-item">
   
    
    <?php 
                    //toggle to show login, signup and logout button
                    if($_SESSION['uid']<>''){ 
                    
                    echo "<a class=\"nav-link\" href=\"postJob.php\">Post Job</a>";
                    
                 }else{
                       
                 } 
                 ?> 


</li>
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
        Dropdown link
      </a>
      <div class="dropdown-menu">
        <a class="dropdown-item" href="#">Link 1</a>
        <a class="dropdown-item" href="#">Link 2</a>
        <a class="dropdown-item" href="#">Link 3</a>
      </div>
    </li>
  </ul>

</nav> -->
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
                    
                    echo "<a class=\"nav-link\" href=\"postJob.php\">Post Job</a>";
                    
                 }else{
                       
                 } 
                 ?></li>
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Page 1 <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="#">Page 1-1</a></li>
        </ul>
      </li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
      <li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
      
    </ul>
  </div>
</nav>
<div class="container" style="margin-top:80px">