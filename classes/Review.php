<!-- Class Review having functions to add review as well fetch reviews based on conditions -->
<?php

class Review{

  // private properties of this class 
  private $eid = null;
  private $rid = null;
 // private $tid = null;
  private $comment = "";
  private $rating = "";

  
  // constructor to create new review object
  public function __construct($rid, $eid,$comment, $rating){
    $this->eid = $eid;
    $this->rid = $rid;
    //$this->tid = $tid;
    $this->comment = $comment;
    $this->rating = $rating;
      }

      public static function create($mysqli,$jid,$comment, $rating){
        // create a new review record in reviewdetails table and if successful 
        // create a review object and return it otherwise return false;
        $estimateid=0;
        $sql1= sprintf("select * from estimatedetails where JobId=%s", $jid);
        $qqresult = $mysqli->query($sql1);
        if ($qqresult){
          if ($qqresult->num_rows == 1){
            $row = $qqresult->fetch_assoc();
            $estimateid= $row['EstimateId'];
          }
        }
        //echo $estimateid;
        $rid=0;
        $result = false;
        if($estimateid !=0){
          $sql2= sprintf("select * from reviewdetails where EstimateId=%s", $estimateid);
        $qqqresult = $mysqli->query($sql2);
        if ($qqqresult->num_rows == 0){
        $sql = sprintf("insert into reviewdetails(EstimateId,Comment, Rating) values('%s', '%s','%s')",  $estimateid,$comment,$rating);
        $qresult = $mysqli->query($sql);
        if ($qresult){
          $rid = $mysqli->insert_id;
          $review = new Review($rid,$estimateid,$comment, $rating);
          $result = $review;
        }
      }
        }
        
        return $result;
      }

      public static function find($mysqli, $jid){
        // search reviewdetails table and locate record with id
        // get that record and create review object 
        // return review object OR false if we cannot find it
        $result = false;
        $r = false;
        $estimateid=0;
        $sql1= sprintf("select * from estimatedetails where JobId=%s", $jid);
        //echo $sql1;
        $qqresult = $mysqli->query($sql1);
        if ($qqresult){
          if ($qqresult->num_rows == 1){
            $row = $qqresult->fetch_assoc();
            $estimateid= $row['EstimateId'];
            //echo $estimateid;
          }
        }
        $sql = sprintf("select * from reviewdetails where EstimateId=%s", $estimateid);
        $qresult = $mysqli->query($sql);
        if ($qresult){
          if ($qresult->num_rows == 1){
            $r= new Collection();
            $row = $qresult->fetch_assoc();
            $review = new Review($row['rid'],$row['EstimateId'], $row['Comment'],$row['Rating']);
            $result = $review;
            $_SESSION['eid']=$row['EstimateId'];
            // $r->Add($row['rid'], $result);
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