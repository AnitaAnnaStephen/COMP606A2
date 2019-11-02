<?php 
require_once("headers.php");

$user = User::getByUserId($mysqli, $_GET['uid']);
require_once("footer.php");
?>

<head>
     <title> CLient Details</title>
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
</head>

<body>

     <!-- <div class="container"> -->
    
            <!-- <div class="row">  -->
               <div class="modal-content" style="height: 500px;width: 50%;margin-left: 350px;">
                    <div class="modal-header" style="text-align:center;background-color:#337ab7;">
                         <!-- <button type="button" class="close" data-dismiss="modal">&times;</button>   -->
                         <h4 class="modal-title"><b> Client Details</b></h4>
                   
                    </div>
                   
            <!-- </div> -->
                    <!-- <div class="modal-body" style="text-align:center;background-color:white;"> -->
					<!-- <form method="post" id="insert_form" action="editEstimateDB.php"> -->
					
                         <div class="row"><div class="col-25"><label>Client Name </label></div> <div class="col-75"><input name="jtype" type="text" disabled value="<?php echo $user->getFName().' '.$user->getLName(); ?>"></div></div>
                         <div class="row"><div class="col-25"><label>Address</label></div> <div class="col-75"><textarea name="jdescription" disabled type="text" value=""><?php echo $user->getAddress().' , '.$user->getSuburb();?></textarea></div></div>
                         <div class="row"><div class="col-25"><label>P.O</label></div> <div class="col-75"><input name="crange" type="text" disabled value="<?php echo $user->getPO();?>"></div></div>
                         <div class="row"><div class="col-25"><label>City</label></div> <div class="col-75"><input name="sdate" type="text" disabled value="<?php echo $user->getCity();?>"></div> </div>
                         <div class="row"><div class="col-25"><label>Phone Number</label></div> <div class="col-75"><input name="edate" type="text" disabled value="<?php echo $user->getPhone();?>"></div></div>
                         <div class="row"><div class="col-25"><label>Email </label></div> <div class="col-75"><input name="mcost" type="text" disabled value="<?php echo $user->getEmail();?>"></div></div>
                         
                         <div class="row"><div class="col-75">
                         <?php $tid= $_SESSION['tid']; ?> 
                         <div class="link"><?php echo "<a style=\"color:white;\" href=\"TradesmanPage.php?tid=".$tid."\" >Close</a>";?></div>
                         <!-- <input type="submit" style="text-align:center;" value="Confirm"> -->
                         </div></div>
                         
					<!-- </form> -->
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