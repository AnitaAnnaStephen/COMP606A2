<?php require_once("headers.php");?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Post Estimate</title>
     <?php $job = Job::find($mysqli, $_GET['jid']);
     ?>
      
</head>
<body>

<h1>Enter Estimate</h1>

<form method="post" action="addJobEstimate.php" enctype="application/x-www-form-urlencoded">
<p><label>Job Id</label><input name="jobId" type="text" value="<?php echo $job->getJobId();?>"></p> 
<p><label>Job Type</label><input name="jtype" type="text" value="<?php echo $job->getJobType();?>"></p>
<p><label>Job Description</label><input name="jdescription" type="text" value="<?php echo $job->getJobDescription();?>"></p>
<p><label>Customer Cost Range</label><input name="crange" type="number" value="<?php echo $job->getCost();?>"></p>
<p><label>Material Cost</label><input name="mcost" type="number"></p>
<p><label>Labour Cost</label><input name="lcost" type="number"></p>
<p><label>Expiration Date</label><input name="expdate" type="date"></p>

<input type="hidden" name="tid" value="<?php echo $_GET['tid'];?>">
<p><input type="submit" value="Post Estimate"></p>
</form>

</body>
</html>