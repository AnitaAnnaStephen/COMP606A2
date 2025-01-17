<!-- Class Tradesman having functions to update ,edit tradesman details as well fetch tradesman details based on conditions -->
<?php

class Tradesman{

  //  properties of this class 
  public $tid = null;
  public $fname = "";
  public $lname = "";
  private $uId = null;
  private $email = "";
  private $phone = null;
  private $password = null;
  
  
  // constructor to create new tradesman object
  public function __construct($tid, $fname, $lname, $email, $phone,$password,$uid){
    $this->tid = $tid;
    $this->fname = $fname;
    $this->lname = $lname;
    $this->uid = $uid;
    $this->email = $email;
    $this->phone = $phone;
    $this->password = $password;
  }

  public static function create($mysqli, $fname, $lname, $email, $phone,$password){
    // create a new tradesman record in tradesmandetails table and if successful 
    // create a tradesman object and return it otherwise return false;
    $uid=0;
    $sql = sprintf("select * from userdetails where email='%s'", $email);
    
    $qresult = $mysqli->query($sql);
    if ($qresult){
      if ($qresult->num_rows == 1){
        $row = $qresult->fetch_assoc();
        $uid = $row['UId'];
        }
    }
    $password=md5($password);
    $result = false;
    $sql = sprintf("insert into tradesmandetails(firstname, lastname, email, phone,password,uid) values('%s', '%s', '%s', '%s', '%s', '%s')",  $fname, $lname, $email, $phone,$password,$uid);
    $qresult = $mysqli->query($sql);
    if ($qresult){
      $tid = $mysqli->insert_id;
      $tradesman = new Tradesman($tid, $fname, $lname, $email, $phone,$password,$uid);      
      $result = $tradesman;
      $_SESSION['username']=$email;//initialising session
        $_SESSION['firstname']=$fname;
        $_SESSION['lastname']=$lname;
        $_SESSION['tid']=$tid;
    }
    return $result;
  }

  public static function changePassword($mysqli, $email, $phone,$password){
    // update a tradesman record in tradesmandetails table and if successful 
    // create a tradesman object and return it otherwise return false;
    $tid=0;
    $sql = sprintf("select * from tradesmandetails where email='%s' and phone='%s'", $email,$phone);
    //echo $sql;
    $qresult = $mysqli->query($sql);
    if ($qresult){
      if ($qresult->num_rows == 1){
        $row = $qresult->fetch_assoc();
        $tid = $row['TId'];
        
        }
       
    }
    echo $tid;
    $result = false;
    if($tid>0)
    {
      //echo $password;
      $password=md5($password);
      
      $sql1 = sprintf("update tradesmandetails set password= '%s' where TId='%s' ", $password, $tid);
      //echo $sql1;
      $qresult1 = $mysqli->query($sql1);
      if ($qresult1){
             
        $result = true;
         }
    }
    // else 
    // {
    //   $_SESSION['reseterror']="Invalid Email or phone number";
    // }
    
    return $result;
  }

  public static function find($mysqli, $email,$password){
    // search tradesmandetails table and locate record 
    // get that record and create tradesman object 
    // return tradesman object OR false if we cannot find it
    $result = false;
    $password=md5($password);
    $sql = sprintf("select * from tradesmandetails where email='%s' and password='%s'", $email,$password);
    $qresult = $mysqli->query($sql);
    if ($qresult){
      if ($qresult->num_rows == 1){
        $row = $qresult->fetch_assoc();
        $tradesman = new Tradesman($row['TId'], $row['FirstName'], $row['LastName'], $row['Email'], $row['Phone'], $row['Password'], $row['UId']);
        $_SESSION['username']=$email;//initialising session
        $_SESSION['firstname']=$row['FirstName'];
        $_SESSION['lastname']=$row['LastName'];
        $_SESSION['tid']=$row['TId'];
        $result = $tradesman;
      }
    }
    return $result;
  } 

  public static function findById($mysqli, $tid){
    // search tradesmandetails table and locate record 
    // get that record and create tradesman object 
    // return tradesman object OR false if we cannot find it
    $result = false;
    $sql = sprintf("select * from tradesmandetails where tid='%s'", $tid);
    $qresult = $mysqli->query($sql);
    if ($qresult){
      if ($qresult->num_rows == 1){
        $row = $qresult->fetch_assoc();
        $tradesman = new Tradesman($row['TId'], $row['FirstName'], $row['LastName'], $row['Email'], $row['Phone'], $row['Password'], $row['UId']);
        //$_SESSION['username']=$email;//initialising session
       // $_SESSION['firstname']=$row['FirstName'];
        //$_SESSION['lastname']=$row['LastName'];
        $result = $tradesman;
      }
    }
    return $result;
  } 

  public static function getAll($mysqli){
    // get all tradesman and return as a collection of tradesman objects
    // returns false or a collection of tradesman objects
    $sql = "select * from tradesmandetails";
    $result = $mysqli->query($sql);    
    $tradesman = false;
    if ($result){
      $tradesmans = new Collection();
      while($row = $result->fetch_assoc()){
        $tradesman = new Tradesman($row['TId'], $row['FirstName'], $row['LastName'], $row['Email'], $row['Phone'], $row['Password'], $row['UId']);
        $tradesmans->Add($row['TId'], $tradesman);      
      }    
    }
    return $tradesman;    
  }


  // ------ setter methods -------
  public function setTid($tid){
    $this->$tid = $tid;
  }

  public function setFName($fname){
    $result = true;
    if (is_string($fname)){
      $this->fname = $fname;
    } else $result = false;
    return $result;
  }

  public function setLName($lname){
    $result = true;
    if (is_string($lname)){
      $this->lname = $lname;
    } else $result = false;
    return $result;
  }

  public function setUId($uid): bool{
    $this->$uid = $uid;
  }

  
  public function setPhone($phone){
    $result = true;
    if (preg_match('/^[0-9]{10}+$/', $phone)){
      $this->phone = $phone;
      $result = true;
    } 
    else {
      $result=false;
    }
    return $result;
  }
 

  public function setEmail($email){
    // string, email format
    $result = true;
    if (!eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$", $email)){
      $result = false;
    } else {
      $this->email = $email;
    }
    return $result;
  }  

  public function setPassword($password){
    // string, email format
    $result = true;
    $uppercase = preg_match('@[A-Z]@', $password);
    $lowercase = preg_match('@[a-z]@', $password);
    $number    = preg_match('@[0-9]@', $password);
    $specialChars = preg_match('@[^\w]@', $password);
    
    if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8) {
      $result = false;
    } else {
      $this->password = $password;
    }
    return $result;
  } 
  // ------- getter methods ----------
  public function getFName(){    
    return $this->fname;
  }

  public function getLName(){    
    return $this->lname;
  }
  public function getUId(){
    return $this->uid;
  }

  public function getEmail(){
    return $this->email;
  }

  public function getPhone(){
    return $this->phone;
  }

  public function getPassword(){
    return $this->password;
  }
  
  public function getTId(){
    return $this->tid;
  }

  // method for debugging  object instance
  public function debug(){
    echo "<pre><code>";
    var_dump($this);
    echo "</code></pre>";
  }

}

?>
