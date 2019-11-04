<!-- Page for user to see client details -->
<?php 
require_once("headers.php");

$user = User::getByUserId($mysqli, $_GET['uid']);
require_once("footer.php");
?>

<head>
     <title> Client Details</title>
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
     <style>
       @import url(//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css);
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
  margin-right: 5px;
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
a:hover{
    text-decoration:none;
}
/***** CSS Magic to Highlight Stars on Hover *****/
.rating > input:checked ~ label, /* show gold star when clicked */
.rating > input:checked ~ label:hover ~ label { color: #FFED85;  } 

  </style>
</head>

<body>

    
               <div class="modal-content" style="height: 600px;width: 50%;margin-left: 350px;">
                    <div class="modal-header" style="text-align:center;background-color:#337ab7;">
                         <!-- <button type="button" class="close" data-dismiss="modal">&times;</button>   -->
                         <h4 class="modal-title"><b> Client Details</b></h4>
                   
                    </div>
                         <div class="row"><div class="col-25"><label>Client Name </label></div> <div class="col-75"><input name="jtype" type="text" disabled value="<?php echo $user->getFName().' '.$user->getLName(); ?>"></div></div>
                         <div class="row"><div class="col-25"><label>Address</label></div> <div class="col-75"><textarea name="jdescription" disabled type="text" value=""><?php echo $user->getAddress().' , '.$user->getSuburb();?></textarea></div></div>
                         <div class="row"><div class="col-25"><label>P.O</label></div> <div class="col-75"><input name="crange" type="text" disabled value="<?php echo $user->getPO();?>"></div></div>
                         <div class="row"><div class="col-25"><label>City</label></div> <div class="col-75"><input name="sdate" type="text" disabled value="<?php echo $user->getCity();?>"></div> </div>
                         <div class="row"><div class="col-25"><label>Phone Number</label></div> <div class="col-75"><input name="edate" type="text" disabled value="<?php echo $user->getPhone();?>"></div></div>
                         <div class="row"><div class="col-25"><label>Email </label></div> <div class="col-75"><input name="mcost" type="text" disabled value="<?php echo $user->getEmail();?>"></div></div>
                         <?php $r = Review::find($mysqli, $_GET['jid']);
                         $five="";
                         $four="";
                         $three="";
                         $two="";
                         $one="";
                         $rr="";
                         ?>
                         <div class="row"><div class="col-25"><label>Comment</label></div> <div class="col-75"><textarea name="comment" disabled type="text" value=""><?php if($r){ echo $r->getComment();}?></textarea></div></div>
                         <div class="row"><div class="col-25"><label  style="margin-top:13px">Star</label></div> <div class="col-75">
                         <p>
                    <!--star-->
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
                        <input type="radio" id="star3" name="rating" value="3" <?php echo $three; ?>/><label class = "full" for="star3" title="Meh - 3 stars"></label>
                        <input type="radio" id="star2" name="rating" value="2" <?php echo $two; ?>/><label class = "full" for="star2" title="Kinda bad - 2 stars"></label>
                        <input type="radio" id="star1" name="rating" value="1" <?php echo $one; ?>/><label class = "full" for="star1" title="Sucks big time - 1 star"></label>


                    </fieldset>


                    <!--start-->

                    </p>   
                        </div></div>
                         <div class="row"><div class="col-75">
                         <?php $tid= $_SESSION['tid']; ?> 
                         <div class="link"><?php echo "<a style=\"color:white;\" href=\"viewPastEstimates.php?tid=".$tid."\" >Close</a>";?></div>
                         <!-- <input type="submit" style="text-align:center;" value="Confirm"> -->
                         </div></div>
         
                     
               </div>
        
</body>
</html>
<script>
  $(document).ready(function() {
    debugger;
    // $(".div1").fadeOut(4000);
  });
</script>