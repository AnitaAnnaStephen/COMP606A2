
<!-- Page to call function to get all expired jobs for a user  -->
<?php
require_once("headers.php");

require_once("footer.php");
session_start();
//Calling function to get all expired jobs
$jobs = Job::findExpiredByUser($mysqli,$_GET['uid']);
?>
<style>
 @import url(//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css);
fieldset, label { margin: 0; padding: 0; }
body{ margin: 20px; }
h1 { font-size: 1.5em; margin: 10px; }

/****** Style Star Rating Widget *****/

.rating { 
  border: none;
  float: left;
}

.rating > input { display: none; } 
.rating > label:before { 
  margin: 5px;
  font-size: 1.25em;
  font-family: FontAwesome;
  display: inline-block;
  content: "\f005";
}

.rating > .half:before { 
  content: "\f089";
  position: absolute;
}

.rating > label { 
  color: #ddd; 
 float: right;
}

/***** CSS Magic to Highlight Stars on Hover *****/

.rating > input:checked ~ label, /* show gold star when clicked */
.rating:not(:checked) > label:hover, /* hover current star */
.rating:not(:checked) > label:hover ~ label { color: #FFD700;  } /* hover previous stars in list */

.rating > input:checked + label:hover, /* hover current star when changing rating */
.rating > input:checked ~ label:hover,
.rating > label:hover ~ input:checked ~ label, /* lighten current selection */
.rating > input:checked ~ label:hover ~ label { color: #FFED85;  } 
  </style>
<div class="container">
<div class="row">
<?php 
  if(isset($_SESSION["success"])&&($_SESSION["success"]=="post")){
    ?>
    
<div class="alert alert-success div1" align="center">
  <strong>Rating Success!</strong>
</div>
<?php
  unset($_SESSION["success"]);
  }
  ?>
    <?php 
     $count=0;
     //echo $count;
     foreach($jobs->getRecords() as $id => $job)
     {
        $count=$count+1;
        //var_dump($job);
       
     }
     //echo $count;
     if($count ==0)
     {
      echo '<h3 style="font-style:italic;">No expired jobs to show</h3>';
      
      
     }
    
    else{
    foreach($jobs->getRecords() as $id => $job){  ?>

<div class="col-sm-4">
      <div class="panel panel-primary">
        <div class="panel-heading"><?php echo $job->getJobType(); ?></div>
        <div class="panel-body" style="height:230px">
        <p><?php echo $job->getJobDescription(); ?></p>
        <p>Location: <b><?php echo $job->getLocation(); ?></b></p>
        <p>Cost: <b><?php echo $job->getCost(); ?></b></p>
        <p>Date: <b><?php echo $job->getActiveDate(); ?></b></p>
        <p>Estimate Date: <b><?php echo $job->getEstimateDate(); ?></b></p>
        </div>
        <div class="panel-footer pviewrate">
            <?php $estimate = Estimate::getAcceptedEstimatePerJob($mysqli, $job->getJobId()); ?>
            <a href="rate.php?jid=<?php echo $job->getJobId();?>&uid=<?php echo $_GET['uid'];?>" class="btn btn-primary viewrate" name="viewrate">Rate the Tradesman</a>
        </div>
      </div>
      </div>
    <?php }};
   ?>
</div>
</div>
<script>
  $(document).ready(function() {
    $(".div1").fadeOut(3000);
  });
</script>
