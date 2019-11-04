<?php
include("headers.php");
//Calling function to get all expired jobs
// $jobs = Job::findExpiredByUser($mysqli,$_GET['uid']);
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
  text-align:center;
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
.link {
  background-color: #337ab7;
  color: white;
  padding: 7px 11px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  float: right;
  margin-left: 25px;
}
a:hover{
    text-decoration:none;
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
<form method="POST" action="reviewDB.php">
                <!-- Modal content-->
                <div class="modal-content" style="width:50%;margin-left: 350px;">
                  <div class="modal-header" style="background-color:#337ab7;text-align:center;">
                    <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
                    <h2 class="modal-title" >Post Review</h2>
                  </div>
                  <?php $r = Review::find($mysqli, $_GET['jid'],$_GET['eid']); 
                    $five="";
                    $four="";
                    $three="";
                    $two="";
                    $one="";
                    $rr="";
                    ?>
                  <div class="modal-body" style="height:250px">
                  
                  
                    <p>
                    <!--star-->
                    
                    <input type="hidden" value="<?php echo $_GET['jid']; ?>" name="jid" class="jid">
                    <input type="hidden" value="<?php echo $_GET['eid'] ?>" name="eid" >
                    <input type="hidden" value="<?php echo $_GET['uid'] ?>" name="uid" >
                    <fieldset class="rating">
                    <?php
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
                        <input type="radio" id="star4" name="rating" value="4" <?php echo $four; ?>/><label class = "full" for="star4" title="Pretty good - 4 stars"></label>
                        <input type="radio" id="star3" name="rating" value="3" <?php echo $three; ?>/><label class = "full" for="star3" title="Okay work - 3 stars"></label>
                        <input type="radio" id="star2" name="rating" value="2" <?php echo $two; ?>/><label class = "full" for="star2" title="Kinda bad - 2 stars"></label>
                        <input type="radio" id="star1" name="rating" value="1" <?php echo $one; ?>/><label class = "full" for="star1" title="Very bad - 1 star"></label>
                        
                      
                    </fieldset>
                    
                    
                    <!--start-->

                    </p>
                    <textarea class="form-control" style="height:150px" placeholder="Add a comment..." name="comment"><?php if($r){echo trim($r->getComment());}?></textarea>
                  </div>
                  <div class="modal-footer">
                      <?php if(($rr==null)) {?>
                    <button type="submit" class="btn btn-primary">Submit</button>
                      <?php } ?>
                    <div class="link"><?php echo "<a style=\"color:white;\" href=\"ViewExpiredJobs.php?uid=".$_GET['uid']."\" >Cancel</a>";?></div>
                  </div>
                  </form>