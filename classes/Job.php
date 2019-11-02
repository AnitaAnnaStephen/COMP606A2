<!-- Class Job having functions to update ,edit and delete jobs as well fetch jobs based on conditions -->

<?php

class Job{

  // private properties of this class 
  private $jid = null;
  private $uid = null;
  private $jdescription = "";
  private $jtype = "";
  private $cost = null;
  private $activedate = "";
  private $estimationdate = null;
  private $location = null;
  private $isclosed="";
  
  
  // constructor to create new job object
  public function __construct($jid,$uid, $jtype,$jdescription,$location,   $cost, $activedate,$estimationdate,$isclosed){
    $this->jid = $jid;
    $this->uid = $uid;
    $this->jdescription = $jdescription;
    $this->jtype = $jtype;
    $this->cost = $cost;
    $this->activedate = $activedate;
    $this->estimationdate = $estimationdate;
    $this->location = $location;
    $this->isclosed = $isclosed;
  }

  public static function create($mysqli, $uid, $jtype,$jdescription,$location,   $cost, $activedate,$estimationdate,$isclosed){
    // create a new job record in jobdetails table and if successful 
    // create a job object and return it otherwise return false;
    $jid=0;
    $result = false;
    // $today=date('Y-m-d');//getting current date
    // if($activedate>=$today && $estimationdate >= $today)
    // {
      $sql = sprintf("insert into jobdetails(uid,jobtype, jobdescription, location, costrange,activedate,estimatedate,isclosed) values('%s','%s', '%s', '%s', '%s', '%s', '%s', '%s')", $uid, $jtype,$jdescription,$location ,$cost, $activedate,$estimationdate,$isclosed);
    $qresult = $mysqli->query($sql);
    if ($qresult){
      $jid = $mysqli->insert_id;
      $job = new Job($jid,$uid,$jtype,$jdescription,$location,$cost, $activedate,$estimationdate,$isclosed);
      $result = $job;
    }
   // }
    
    return $result;
  }

  public static function find($mysqli, $jid){
    // search jobdetails table for given job id and locate record with id
    // get that record and create job object 
    // return job object OR false if we cannot find it
    $result = false;
    $sql = sprintf("select * from jobdetails where  jobid=%s", $jid);
    $qresult = $mysqli->query($sql);
    if ($qresult){
      if ($qresult->num_rows == 1){
        $row = $qresult->fetch_assoc();
        $job = new Job($row['JobId'],$row['UId'], $row['JobType'], $row['JobDescription'], $row['Location'], $row['CostRange'], $row['ActiveDate'], $row['EstimateDate'],$row['IsClosed']);
        $result = $job;
      }
    }
    return $result;
  } 

  public static function findByUser($mysqli, $uid){
    // search jobdetails table for given user id  and locate record with id
    // get that record and create job object 
    // return job object OR false if we cannot find it
    $result = false;
    $today=date('Y-m-d');
  //echo $today;
    $sql = sprintf("select * from jobdetails where IsClosed=0 and UId=%s and ActiveDate>='%s'", $uid,$today);
    $result = $mysqli->query($sql);    
    $job = false;
    if ($result){
      //echo $sql;
      $jobs = new Collection();
      while($row = $result->fetch_assoc()){
        $job = new Job($row['JobId'],$row['UId'], $row['JobType'], $row['JobDescription'], $row['Location'], $row['CostRange'], $row['ActiveDate'], $row['EstimateDate'],$row['IsClosed']);
       //echo $row['ActiveDate'];
        $jobs->Add($row['JobId'], $job);      
      }    
    }
    return $jobs;
  } 

  public static function findExpiredByUser($mysqli, $uid){
    // search jobdetails table for given user id  and locate record with id
    // get that record and create job object 
    // return job object OR false if we cannot find it
    $result = false;
    $today=date('Y-m-d');
  //echo $today;
    $sql = sprintf("select * from jobdetails where IsClosed=0 and IsEstimateAccepted=1 and UId=%s and ActiveDate<'%s'", $uid,$today);
    $result = $mysqli->query($sql);    
    $job = false;
    if ($result){
      //echo $sql;
      $jobs = new Collection();
      while($row = $result->fetch_assoc()){
        $job = new Job($row['JobId'],$row['UId'], $row['JobType'], $row['JobDescription'], $row['Location'], $row['CostRange'], $row['ActiveDate'], $row['EstimateDate'],$row['IsClosed']);
       //echo $row['ActiveDate'];
        $jobs->Add($row['JobId'], $job);      
      }    
    }
    return $jobs;
  } 

  
  public static function getAll($mysqli){
    // get all jobs and return as a collection of job objects
    // returns false or a collection of job objects
    $today=date('Y-m-d');
    //echo $today;
    $sql = sprintf("select * from jobdetails where IsEstimateAccepted=0 and IsClosed=0 and  ActiveDate>='%s'",$today);
    $result = $mysqli->query($sql);    
    $jobs = false;
    if ($result){
           $jobs = new Collection();
      while($row = $result->fetch_assoc()){
        $job =  new Job($row['JobId'],$row['UId'], $row['JobType'], $row['JobDescription'], $row['Location'], $row['CostRange'], $row['ActiveDate'], $row['EstimateDate'],$row['IsClosed']);
        $jobs->Add($row['JobId'], $job);      
      }    
    }
    return $jobs;    
  }
  public static function edit($mysqli,$jid, $jtype, $jdescription,$location, $crange,$sdate,$edate){
    // edit an estimate record in estimatedetails table and if successful 
    // create a estimate object and return it otherwise return false;
    $result = false;
    $sql1 = sprintf("select * from jobdetails where IsClosed=0 and JobId=%s", $jid);
    $qresult1 = $mysqli->query($sql1);
    if ($qresult1){
      if ($qresult1->num_rows == 1){
        $row = $qresult1->fetch_assoc();
        // $jid=$row['JobId'];
        $uid=$row['UId'];
        $isclosed=$row['IsClosed'];
      }
    }
    $sql = sprintf("update jobdetails set JobType='%s', JobDescription='%s', Location='%s', CostRange='%s', ActiveDate='%s', EstimateDate='%s' where JobId='%s'",  $jtype,$jdescription,$location ,$crange, $sdate,$edate,$jid);
    var_dump($sql);
    $qresult = $mysqli->query($sql);
    if ($qresult){
      echo "hi";
      $job = new Job($jid,$uid,$jtype,$jdescription,$location,$crange, $sdate,$edate,$isclosed);
      $result = $job;
    }
    return $result;
  }
  public static function delete($mysqli,$jid){
    //delete job record in jobdetails table and if successful 
    // return true otherwise return false;
    $sql1 = sprintf("select * from jobdetails where IsClosed=0 and JobId=%s", $jid);
    $qresult1 = $mysqli->query($sql1);
    if ($qresult1){
      if ($qresult1->num_rows == 1){
        $row = $qresult1->fetch_assoc();
        $_SESSION['uid']=$row['UId'];
      }
    }
    $result = false;
    $sql = sprintf("update jobdetails set IsClosed=1 where JobId='%s'", $jid);
    $qresult = $mysqli->query($sql);
    if ($qresult){
     
      $result = true;
    }
    return $result;
  }

  // ------ setter methods -------
  public function setJid($jid){
    $this->$jid = $jid;
  }

  public function setUid($uid){
    $this->$uid = $uid;
  }

  public function setCost($cost){
    $this->$cost = $cost;
  }
  
  public function setIsClosed($isclosed){
    $this->$isclosed = $isclosed;
  }
  

  public function setJDescription($jdescription){
    $result = true;
    if (is_string($jdescription)){
      $this->jdescription = $jdescription;
    } else $result = false;
    return $result;
  }

  public function setJType($jtype){
    $result = true;
    if (is_string($jtype)){
      $this->jtype = $jtype;
    } else $result = false;
    return $result;
  }

  public function setLocation($location){
    $result = true;
    if (is_string($location)){
      $this->location = $location;
    } else $result = false;
    return $result;
  }

  
  public function setActiveDate($activedate){
   
      $this->activedate = $activedate;
    
  }
 
  public function setEstimateDate($estimationdate){
   
    $this->estimationdate = $estimationdate;
  
}

 
  // ------- getter methods ----------
  public function getJobId(){    
    return $this->jid;
  }
  public function getUserId(){    
    return $this->uid;
  }
  public function getIsClosed(){    
    return $this->isclosed;
  }
  public function getJobDescription(){    
    return $this->jdescription;
  }
  public function getJobType(){
    return $this->jtype;
  }

  public function getLocation(){
    return $this->location;
  }

  public function getCost(){
    return $this->cost;
  }

  public function getActiveDate(){
    return $this->activedate;
  }
  
  public function getEstimateDate(){
    return $this->estimationdate;
  }

  // method for debugging  object instance
  public function debug(){
    echo "<pre><code>";
    var_dump($this);
    echo "</code></pre>";
  }

}

?>
