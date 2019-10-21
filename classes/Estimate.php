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
  
  
  // constructor to create new estimate object
  public function __construct($eid, $jid,$tid,$mcost, $lcost, $tcost, $expdate){
    $this->eid = $eid;
    $this->jid = $jid;
    $this->tid = $tid;
    $this->mcost = $mcost;
    $this->lcost = $lcost;
    $this->tcost = $tcost;
    $this->expdate = $expdate;
  }

  public static function create($mysqli,$jid,$tid, $mcost, $lcost, $expdate){
    // create a new estimate record in estimatedetails table and if successful 
    // create a estimate object and return it otherwise return false;
    $eid=0;
    $result = false;
    $tcost=$lcost+$mcost;
    
    $sql = sprintf("insert into estimatedetails(jobid,tid,materialcost, labourcost, totalcost, expirationdate) values('%s', '%s','%s', '%s', '%s', '%s')",  $jid,$tid,$mcost,$lcost ,$tcost, $expdate);
    $qresult = $mysqli->query($sql);
    if ($qresult){
      $eid = $mysqli->insert_id;
      $estimate = new Estimate($eid,$jid,$tid, $mcost, $lcost, $tcost, $expdate);
      $result = $estimate;
    }
    return $result;
  }

  public static function find($mysqli, $eid){
    // search estimatedetails table and locate record with id
    // get that record and create estimate object 
    // return estimate object OR false if we cannot find it
    $result = false;
    $sql = sprintf("select * from estimatedetails where eid=%s", $eid);
    $qresult = $mysqli->query($sql);
    if ($qresult){
      if ($qresult->num_rows == 1){
        $row = $qresult->fetch_assoc();
        $estimate = new Estimate($row['EstimateId'], $row['JobId'],$row['TId'], $row['MaterialCost'], $row['LabourCost'], $row['TotalCost'], $row['ExpirationDate']);
        $result = $estimate;
      }
    }
    return $result;
  } 

  public static function getAllJob($mysqli,$jid){
    // get all estimates based on jobid and return as a collection of estimate objects
    // returns false or a collection of estimate objects
    $sql = sprintf("select * from estimatedetails where jobid=%s",$jid);
    $result = $mysqli->query($sql);    
    $estimate = false;
    if ($result){
      $estimates = new Collection();
      while($row = $result->fetch_assoc()){
        $estimate =  new Estimate($row['EstimateId'], $row['JobId'],$row['TId'], $row['MaterialCost'], $row['LabourCost'], $row['TotalCost'], $row['ExpirationDate']);
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
    $estimate = false;
    if ($result){
      $estimates = new Collection();
      while($row = $result->fetch_assoc()){
        $estimate =  new Estimate($row['EstimateId'], $row['JobId'],$row['TId'], $row['MaterialCost'], $row['LabourCost'], $row['TotalCost'], $row['ExpirationDate']);
        $estimates->Add($row['EstimateId'], $estimate);      
      }    
    }
    return $estimate;    
  }


  // ------ setter methods -------
  public function setJobid($jid){
    $this->$jid = $jid;
  }

  public function setEstimateid($eid){
    $this->$eid = $eid;
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
