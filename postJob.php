<?php require_once("headers.php");?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Post Job</title>
     <!-- <?php $job = Job::find($mysqli, $_GET['jid']);
     ?> -->
      
</head>
<body>

<h1>Enter Job Setail</h1>

<form method="post" action="addJob.php" enctype="application/x-www-form-urlencoded">
<p><label>Job Type</label><input name="jtype" type="text" ></p>
<p><label>Job Description</label><input name="jdescription" type="text" ></p>
<p><label>Location</label><input name="jlocation" type="text" ></p>
<p><label>Cost Range</label><input name="crange" type="number" ></p>
<p><label>Active Date</label><input name="actdate" type="date"></p>
<p><label>Estimate End Date</label><input name="estenddate" type="date">
<input type="hidden" name="uid" value="<?php echo $_SESSION['uid'];?>">
<p><input type="submit" value="Post Job"></p>
</form>
</body>
</html>