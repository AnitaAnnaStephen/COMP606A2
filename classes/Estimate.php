<?php

class Estimate{

  // private properties of this class 
  private $eid = null;
  private $jid = null;
  private $tid = null;
  private $mcost = "";
  private $lcost = "";
  private $tcost = "";
  private $expdate = null;
  private $isaccepted=null;
  
  
  // constructor to create new estimate object
  public function __construct($eid, $jid,$tid,$mcost, $lcost, $tcost, $expdate,$isaccepted){
    $this->eid = $eid;
    $this->jid = $jid;
    $this->tid = $tid;
    $this->mcost = $mcost;
    $this->lcost = $lcost;
    $this->tcost = $tcost;
    $this->expdate = $expdate;
    $this->isaccepted=$isaccepted;
  }

  public static function create($mysqli,$jid,$tid, $mcost, $lcost, $expdate){
    // create a new estimate record in estimatedetails table and if successful 
    // create a estimate object and return it otherwise return false;
    $eid=0;
    $result = false;
    $tcost=$lcost+$mcost;
    $isaccepted=0;
    $sql = sprintf("insert into estimatedetails(jobid,tid,materialcost, labourcost, totalcost, expirationdate,isaccepted) values('%s', '%s','%s', '%s', '%s', '%s','%s')",  $jid,$tid,$mcost,$lcost ,$tcost, $expdate,$isaccepted);
    $qresult = $mysqli->query($sql);
    if ($qresult){
      $eid = $mysqli->insert_id;
      $estimate = new Estimate($eid,$jid,$tid, $mcost, $lcost, $tcost, $expdate,$isaccepted);
      $result = $estimate;
    }
    return $result;
  }

  public static function edit($mysqli,$eid, $mcost, $lcost, $expdate){
    // create a new estimate record in estimatedetails table and if successful 
    // create a estimate object and return it otherwise return false;
    $result = false;
    $tcost=$lcost+$mcost;
    $isaccepted=0;
    $sql1 = sprintf("select * from estimatedetails where EstimateId=%s", $eid);
    $qresult1 = $mysqli->query($sql1);
    if ($qresult1){
      if ($qresult1->num_rows == 1){
        $row = $qresult1->fetch_assoc();
        $jid=$row['JobId'];
        $tid=$row['TId'];
      }
    }
    $sql = sprintf("update estimatedetails set materialcost='%s', labourcost='%s', totalcost='%s', expirationdate='%s' where EstimateId='%s'",  $mcost,$lcost ,$tcost, $expdate,$eid);
    $qresult = $mysqli->query($sql);
    if ($qresult){
      $estimate = new Estimate($eid,$jid,$tid, $mcost, $lcost, $tcost, $expdate,$isaccepted);
      $result = $estimate;
    }
    return $result;
  }
  public static function delete($mysqli,$eid){
    // create a new estimate record in estimatedetails table and if successful 
    // create a estimate object and return it otherwise return false;
    $sql1 = sprintf("select * from estimatedetails where EstimateId=%s", $eid);
    $qresult1 = $mysqli->query($sql1);
    if ($qresult1){
      if ($qresult1->num_rows == 1){
        $row = $qresult1->fetch_assoc();
        $_SESSION['tid']=$row['TId'];
      }
    }
    $result = false;
    $sql = sprintf("delete from estimatedetails where EstimateId='%s'", $eid);
    $qresult = $mysqli->query($sql);
    if ($qresult){
     
      $result = true;
    }
    return $result;
  }
  public static function find($mysqli, $eid){
    // search estimatedetails table and locate record with id
    // get that record and create estimate object 
    // return estimate object OR false if we cannot find it
    $result = false;
    $sql = sprintf("select * from estimatedetails where EstimateId=%s", $eid);
    $qresult = $mysqli->query($sql);
    if ($qresult){
      if ($qresult->num_rows == 1){
        $row = $qresult->fetch_assoc();
        $estimate = new Estimate($row['EstimateId'], $row['JobId'],$row['TId'], $row['MaterialCost'], $row['LabourCost'], $row['TotalCost'], $row['ExpirationDate'],$row['IsAccepted']);
        $result = $estimate;
      }
    }
    return $result;
  } 
  public static function accept($mysqli,$eid){
    // create a new estimate record in estimatedetails table and if successful 
    // create a estimate object and return it otherwise return false;
    $result = false;
    // $tcost=$lcost+$mcost;
    $isaccepted=1;
    $sql1 = sprintf("select * from estimatedetails where EstimateId=%s", $eid);
    $qresult1 = $mysqli->query($sql1);
    if ($qresult1){
      if ($qresult1->num_rows == 1){
        $row = $qresult1->fetch_assoc();
        // $jid=$row['JobId'];
        // $tid=$row['TId'];
      }
    }
    $sql = sprintf("update estimatedetails set isAccepted='%s' where EstimateId='%s'",$isaccepted, $eid);
    $qresult = $mysqli->query($sql);
    if ($qresult){
      $estimate = new Estimate($row['EstimateId'], $row['JobId'],$row['TId'], $row['MaterialCost'], $row['LabourCost'], $row['TotalCost'], $row['ExpirationDate'],$row['IsAccepted']);
      // $estimate = new Estimate($eid,$jid,$tid, $mcost, $lcost, $tcost, $expdate,$isaccepted);
      $result = $estimate;
    }
    return $result;
  }
  
  public static function findByTradesman($mysqli, $tid){
    // search estimatedetails table and locate record with id
    // get that record and create estimate object 
    // return estimate object OR false if we cannot find it
    $result = false;
    $sql = sprintf("select * from estimatedetails where tid=%s", $tid);
    $result = $mysqli->query($sql);    
    $estimate = false;
    if ($result){
      $estimates = new Collection();
      while($row = $result->fetch_assoc()){
        $estimate =  new Estimate($row['EstimateId'], $row['JobId'],$row['TId'], $row['MaterialCost'], $row['LabourCost'], $row['TotalCost'], $row['ExpirationDate'],$row['IsAccepted']);
        $estimates->Add($row['EstimateId'], $estimate);      
      }    
    }
    return $estimates;   
  } 

  public static function getAllEstimatePerJob($mysqli,$jid){
    // get all estimates based on jobid and return as a collection of estimate objects
    // returns false or a collection of estimate objects
    $sql = sprintf("select * from estimatedetails where jobid=%s",$jid);
    $result = $mysqli->query($sql);    
    $estimates = false;
    if ($result){
      $estimates = new Collection();
      while($row = $result->fetch_assoc()){
        $estimate =  new Estimate($row['EstimateId'], $row['JobId'],$row['TId'], $row['MaterialCost'], $row['LabourCost'], $row['TotalCost'], $row['ExpirationDate'],$row['IsAccepted']);
        $estimates->Add($row['EstimateId'], $estimate);      
      }    
    }
    return $estimates;    
  }

  public static function getAll($mysqli){
    // get all estimates based on jobid and return as a collection of estimate objects
    // returns false or a collection of estimate objects
    $sql = sprintf("select * from estimatedetails ");
    $result = $mysqli->query($sql);    
    $estimates = false;
    if ($result){
      $estimates = new Collection();
      while($row = $result->fetch_assoc()){
        $estimate =  new Estimate($row['EstimateId'], $row['JobId'],$row['TId'], $row['MaterialCost'], $row['LabourCost'], $row['TotalCost'], $row['ExpirationDate'],$row['IsAccepted']);
        $estimates->Add($row['EstimateId'], $estimate);      
      }    
    }
    return $estimates;    
  }


  // ------ setter methods -------
  public function setJobid($jid){
    $this->$jid = $jid;
  }

  public function setEstimateid($eid){
    $this->$eid = $eid;
  }

  public function setIsAccepted($isaccepted){
    $this->$isaccepted = $isaccepted;
  }
  public function setTradesmanid($tid){
    $this->$tid = $tid;
  }

  public function setTotalCost($tcost){
    $this->$tcost = $tcost;
  }
  public function setMaterialCost($mcost){
    $this->$mcost = $mcost;
  }
  public function setLabourCost($lcost){
    $this->$lcost = $lcost;
  }
    public function setExpirationDate($expdate){
   
      $this->expdate = $expdate;
    
  }
 
 
 
  // ------- getter methods ----------
  public function getJobId(){    
    return $this->jid;
  }
  public function getTradesmanId(){    
    return $this->tid;
  }
  public function getIsAccepted(){    
    return $this->isaccepted;
  }
  public function getExpirationDate(){    
    return $this->expdate;
  }
  public function getEstimateId(){
    return $this->eid;
  }
  public function getTotalCost(){
    return $this->tcost;
  }
  public function getMaterialCost(){
    return $this->mcost;
  }
  public function getLabourCost(){
    return $this->lcost;
  }


  // method for debugging  object instance
  public function debug(){
    echo "<pre><code>";
    var_dump($this);
    echo "</code></pre>";
  }

}

?>
