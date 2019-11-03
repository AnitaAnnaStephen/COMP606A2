
<!-- Page to call function to get all expired jobs for a user  -->
<?php
require_once("headers.php");
//Calling function to get all expired jobs
$jobs = Job::findExpiredByUser($mysqli,$_GET['uid']);
//var_dump($jobs);
//echo $jobs->getJobId();
require_once("footer.php");
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
    // if((!$jobs)){
    //   echo '<h1>No jobs to show</h1>';
    // }
    // else{
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
        <div class="panel-footer pviewestimate">
            <!-- <a href="showEstimate.php?id=<?php echo $job->getJobId(); ?>" class="btn btn-primary">View Estimates</a> -->
            <!-- <input type="hidden" value="<?php echo $job->getJobId(); ?>" > -->
            <?php $estimate = Estimate::getAcceptedEstimatePerJob($mysqli, $job->getJobId()); ?>
            <a data-toggle="modal" data-target="" class="btn btn-primary viewestimate" name="viewestimate">Rate the Tradesman</a>
            <!--star-->
            <form method="POST" action="reviewDB.php">
            <input type="hidden" value="<?php echo $job->getJobId(); ?>" name="jid" >
            <input type="hidden" value="<?php echo $_GET['uid'] ?>" name="uid" >
            <fieldset class="rating">
            <?php $r = Review::find($mysqli, $job->getJobId()); 
            $five="";
            $four="";
            $three="";
            $two="";
            $one="";
             if($r){
            $rr= $r->getRating();
            
            if ($rr==5){
              $five="checked";
            }
            if ($rr==4){
              $four="checked";
            }
            if ($rr==3){
              $three="checked";
            }
            if ($rr==2){
              $two="checked";
            }
            if ($rr==1){
              $one="checked";
            }
          }
            ?>
                <input type="radio" id="star5" name="rating" value="5" <?php echo $five; ?>/><label class = "full" for="star5" title="Awesome - 5 stars"></label>
                <!-- <input type="radio" id="star4half" name="rating" value="4 and a half" /><label class="half" for="star4half" title="Pretty good - 4.5 stars"></label> -->
                <input type="radio" id="star4" name="rating" value="4" <?php echo $four; ?>/><label class = "full" for="star4" title="Pretty good - 4 stars"></label>
                <!-- <input type="radio" id="star3half" name="rating" value="3 and a half" /><label class="half" for="star3half" title="Meh - 3.5 stars"></label> -->
                <input type="radio" id="star3" name="rating" value="3" <?php echo $three; ?>/><label class = "full" for="star3" title="Meh - 3 stars"></label>
                <!-- <input type="radio" id="star2half" name="rating" value="2 and a half" /><label class="half" for="star2half" title="Kinda bad - 2.5 stars"></label> -->
                <input type="radio" id="star2" name="rating" value="2" <?php echo $two; ?>/><label class = "full" for="star2" title="Kinda bad - 2 stars"></label>
                <!-- <input type="radio" id="star1half" name="rating" value="1 and a half" /><label class="half" for="star1half" title="Meh - 1.5 stars"></label> -->
                <input type="radio" id="star1" name="rating" value="1" <?php echo $one; ?>/><label class = "full" for="star1" title="Sucks big time - 1 star"></label>
                <!-- <input type="radio" id="starhalf" name="rating" value="half" /><label class="half" for="starhalf" title="Sucks big time - 0.5 stars"></label> -->
                <button type="submit" class="btn btn-default">Submit</button>
              
            </fieldset>
            </form>
            
            <!--start-->
        </div>
      </div>
      </div>
    <?php }
   ?>
</div>
</div>

