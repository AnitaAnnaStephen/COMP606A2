<!-- Home page of Tradesman -->

<?php
require_once("headers.php");
?>
<html>
<head>
<style>
#background{
    position:absolute;
    z-index:0;
    background:white;
    display:block;
    min-height:5%; 
    min-width:5%;
    color:yellow;
}

#content{
    position:absolute;
    z-index:1;
}

#bg-text
{
   text-align:center;
    color:darkgrey;
    font-size:30px;
    transform:rotate(360deg);
    -webkit-transform:rotate(360deg);
}
</style>
</head>
<body>
<div class="container" >
  <div class="row">
    <?php  $estimates=Estimate ::findByTradesman($mysqli,$_SESSION['tid']);
      $count=0;
                                
      foreach($estimates->getRecords() as $id => $estimate)
      {
       $count=$count+1;
                                  
     }
     //Check if tradesman has posted any estimates'
      if($count ==0)
      {
        echo "You have not posted any estimates yet! Post one now....";
        echo "<a href=\"viewJobs.php?tid=".$_GET['tid']."\" class=\"btn\" >Click here to view jobs</a> ";
       
      }
      else
      { 
        //Display all estimates posted by the tradesman
         foreach($estimates->getRecords() as $id => $estimate)
         {?>
         <div class="col-sm-4" >
         <div class="panel panel-primary">
         <?php $job= Job :: find($mysqli,$estimate->getJobId());?>
         <!-- <div class="panel-heading"><?php echo $job->getJobType(); ?></div> -->
         <?php if($estimate->getIsAccepted() == 1) {
           $bcolor="#dff0d8";
          $color="3c763d";
          echo '<div class="panel-heading" style="background-color:green;">'.$job->getJobType().'</div>';
          $status="Accepted";
         }
         else{
           $bcolor="white";
           $color="black";
           $status="";
           echo '<div class="panel-heading">'.$job->getJobType().'</div>';
         } 
         
         echo '<div class=\"panel-body\" id=\"background\" style=\"height:400px;background-color:'.$bcolor.';color:'.$color.';">';
        
          ?>
           
         <p><b>Job Details</b></p>
         <p><?php echo $job->getJobDescription(); ?></p>
         <p>Job Id: <b><?php echo $estimate->getJobId(); ?></b></p>
         <p>Location: <b><?php echo $job->getLocation(); ?></b></p>
         <p>Cost Range: <b><?php echo $job->getCost(); ?></b></p>
         <p>Estimate Date: <b><?php echo $job->getEstimateDate(); ?></b></p>
         <p>Active Date: <b><?php echo $job->getActiveDate(); ?></b></p>
         <?php echo  '<p id="bg-text" >'.$status.'</p>'; ?>
         <p><b>Estimate Details</b></p>
         <p>Labour Cost: <b><?php echo $estimate->getLabourCost(); ?></b></p>
         <p>Material Cost: <b><?php echo $estimate->getMaterialCost(); ?></b></p>
         <p>Total Cost: <b><?php echo $estimate->getTotalCost(); ?></b></p>
         <p>Date: <b><?php echo $estimate->getExpirationDate(); ?></b></p>
        
        </div>

         <div class="panel-footer pviewestimate" style="text-align: center;">
            
            <!-- <input type="hidden" value="<?php echo $estimate->getEstimateId(); ?>" > -->
            
            <?php 
            if ($estimate->getIsAccepted()==0)
            {
              
              echo "<a href=\"editEstimate.php?id=".$estimate->getEstimateId()."&tid=".$_GET['tid']."\"  style=\"width: 60px;margin-left: 25px;\" class=\"btn btn-primary viewestimate\">Edit </a>";
              echo "<a href=\"deleteEstimateDB.php?id=".$estimate->getEstimateId()."\"  style=\"width: 60px;margin-left: 25px;\" class=\"btn btn-primary viewestimate\" onclick=\"return confirm('Are you sure to remove your estimate?')\">Delete </a>";
  
            }
            else
            {
              // echo "<a href=\"#\" class=\"btn btn-primary viewestimate\" disabled style=\"width: 100px;margin-left: 25px;background-color: green;\" >Accepted </a>";
              $user = User::getByUserId($mysqli, $job->getUserId());
              
              echo '<a data-toggle="modal" data-target="" class="btn btn-primary viewestimate" style="background-color: green;" name="viewestimate">Click here to view client details</a>';
              
            }
           
            ?>
             <!-- Modal -->
 <div id="" class="modal fade estimate" role="dialog">
            <div class="modal-dialog modal-lg">

                <!-- Modal content-->
                <div class="modal-content">
                <div class="modal-header" style="text-align:center;background-color:#337ab7;">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h2 class="modal-title"><b>View Client Details</b></h2>
                </div>
                <div class="modal-body">
                    <p><label>Client Name :</label><?php echo $user->getFName().' '.$user->getLName(); ?></p>
                    <p><label>Address     :</label><?php echo $user->getAddress().' , '.$user->getSuburb(); ?></p>
                    <p><label>P.O         :</label><?php echo $user->getPO(); ?></p>
                    <p><label>City        :</label><?php echo $user->getCity(); ?></p>
                    <p><label>Phone Number:</label><?php echo $user->getPhone(); ?></p>
                    <p><label>Email       :</label><?php echo $user->getEmail(); ?></p>
                    <?php
                                        
                    ?>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
                </div>

            </div>
            </div>
            <!-- end Modal -->
        </div>

</div>
</div>

<?php }}; ?>
</div>
</div>

 
<?php require_once("footer.php"); ?>
<script>
  $(document).ready(function() {
    $(document).on('click', '.viewestimate', function() {
      debugger;
      var a = $(this).parents('.pviewestimate').find('.estimate');
      $(a).modal('show');
    });
    $(".div1").fadeOut(3000);
  });
</script>
</body>
</html>