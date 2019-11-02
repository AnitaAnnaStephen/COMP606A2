<!-- Class Estimate having functions to update ,edit and delete estimates as well fetch estimates based on conditions -->
<?php

class Review{

  // private properties of this class 
  private $eid = null;
  private $rid = null;
 // private $tid = null;
  private $comment = "";
  private $rating = "";

  
  // constructor to create new estimate object
  public function __construct($rid, $eid,$comment, $rating){
    $this->eid = $eid;
    $this->rid = $rid;
    //$this->tid = $tid;
    $this->comment = $comment;
    $this->rating = $rating;
      }

      public static function create($mysqli,$eid,$comment, $rating){
        // create a new estimate record in estimatedetails table and if successful 
        // create a estimate object and return it otherwise return false;
        $rid=0;
        $result = false;
        $sql = sprintf("insert into reviewdetails(EstimateId,Comment, Rating) values('%s', '%s','%s')",  $eid,$comment,$rating);
        $qresult = $mysqli->query($sql);
        if ($qresult){
          $rid = $mysqli->insert_id;
          $review = new Review($rid,$eid,$comment, $rating);
          $result = $review;
        }
        return $result;
      }

      public static function find($mysqli, $eid){
        // search estimatedetails table and locate record with id
        // get that record and create estimate object 
        // return estimate object OR false if we cannot find it
        $result = false;
        $sql = sprintf("select * from reviewdetails where EstimateId=%s", $eid);
        $qresult = $mysqli->query($sql);
        if ($qresult){
          if ($qresult->num_rows == 1){
            $row = $qresult->fetch_assoc();
            $review = new Review($row['RId'],$row['EstimateId'], $row['Comment'],$row['Rating']);
            $result = $review;
            $_SESSION['eid']=$row['EstimateId'];
          }
        }
        return $result;
      }     

        // ------ setter methods -------
  public function setRid($rid){
    $this->$rid = $rid;
  }

  public function setEid($eid){
    $this->$eid = $eid;
  }

  public function setRating($rating){
    $this->$rating = $rating;
  }

      public function setComment($comment){
        $result = true;
        if (is_string($comment)){
          $this->comment = $comment;
        } else $result = false;
        return $result;
      }
    // ------- getter methods ----------
  public function getRId(){    
    return $this->jid;
  }
  public function getEId(){    
    return $this->uid;
  }
  public function getRating(){    
    return $this->rating;
  }
  public function getComment(){    
    return $this->comment;
  }
        // method for debugging  object instance
  public function debug(){
    echo "<pre><code>";
    var_dump($this);
    echo "</code></pre>";
  }
    }
    ?>