<!-- Class User having functions to update ,edit user details as well fetch user details based on conditions -->
<?php

class User{

  // private properties of this class 
  private $uid = null;
  private $fname = "";
  private $lname = "";
  private $address = null;
  private $suburb = null;
  private $city = null;
  private $po = null;
  private $email = "";
  private $phone = null;
  private $password = null;
  
  
  // constructor to create new user object
  public function __construct($uid, $fname, $lname,$address,$suburb,$city,$po, $phone,$email, $password){
    $this->uid = $uid;
    $this->fname = $fname;
    $this->lname = $lname;
    $this->address = $address;
    $this->suburb = $suburb;
    $this->city = $city;
    $this->po = $po;
    $this->email = $email;
    $this->phone = $phone;
    $this->password = $password;
  }

  public static function create($mysqli, $fname, $lname,$address,$suburb,$city,$po, $phone,$email, $password){
    // create a new user record in userdetails table and if successful 
    // create a user object and return it otherwise return false;   
    $password=md5($password);//Password encryption
    $result = false;
      $sql = sprintf("insert into userdetails(firstname, lastname,address,suburb,city,PO,  phone,email,password) values('%s', '%s', '%s', '%s','%s', '%s', '%s','%s', '%s')",  $fname, $lname, $address,$suburb,$city,$po, $phone,$email, $password);
      $qresult = $mysqli->query($sql);
      if ($qresult){
      $uid = $mysqli->insert_id;
      $user = new User($uid, $fname, $lname,$address,$suburb,$city,$po, $phone,$email, $password);      
      $result = $user;
      $_SESSION['username']=$email;//initialising session
        $_SESSION['firstname']=$fname;
        $_SESSION['lastname']=$lname;
        $_SESSION['uid']=$uid;
     }    
    return $result;
  }

  public static function changePassword($mysqli, $email, $phone,$password){
    // create a new tradesman record in tradesmandetails table and if successful 
    // create a tradesman object and return it otherwise return false;
    $uid=0;
    $sql = sprintf("select * from userdetails where email='%s' and phone='%s'", $email,$phone);
    //echo $sql;
    $qresult = $mysqli->query($sql);
    if ($qresult){
      if ($qresult->num_rows == 1){
        $row = $qresult->fetch_assoc();
        $uid = $row['UId'];
        
        }
       
    }
    //echo $uid;
    $result = false;
    if($uid>0)
    {
      //echo $password;
      $password=md5($password);
      
      $sql1 = sprintf("update userdetails set password= '%s' where UId='%s' ", $password, $uid);
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
    // search userdetails table and locate record with id
    // get that record and create user object 
    // return user object OR false if we cannot find it
    $result = false;
    $password=md5($password);
    $sql = sprintf("select * from userdetails where email='%s' and password='%s'", $email,$password);
    $qresult = $mysqli->query($sql);
    if ($qresult){
      if ($qresult->num_rows == 1){
        $row = $qresult->fetch_assoc();
        $user = new User($row['UId'], $row['FirstName'], $row['LastName'], $row['Address'], $row['Suburb'], $row['City'], $row['PO'], $row['Phone'],$row['Email'], $row['Password']);
        $_SESSION['username']=$email;//initialising session
         $_SESSION['firstname']=$row['FirstName'];
         $_SESSION['lastname']=$row['LastName'];
        $result = $user;
      }
    }
    return $result;
  } 

  public static function getByUserId($mysqli, $uid){
    // search userdetails table and locate record with id
    // get that record and create user object 
    // return user object OR false if we cannot find it
    $result = false;
    $sql = sprintf("select * from userdetails where UId='%s'", $uid);
    $qresult = $mysqli->query($sql);
    if ($qresult){
      if ($qresult->num_rows == 1){
        $row = $qresult->fetch_assoc();
        $user = new User($row['UId'], $row['FirstName'], $row['LastName'], $row['Address'], $row['Suburb'], $row['City'], $row['PO'], $row['Phone'],$row['Email'], $row['Password']);
        $result = $user;
      }
    }
    return $result;
  } 

  public static function getAll($mysqli){
    // get all User and return as a collection of user objects
    // returns false or a collection of user objects
    $sql = "select * from userdetails";
    $result = $mysqli->query($sql);    
    $user = false;
    if ($result){
      $users = new Collection();
      while($row = $result->fetch_assoc()){
        $user = new User($row['UId'], $row['FirstName'], $row['LastName'], $row['Address'], $row['Suburb'], $row['City'], $row['PO'], $row['Phone'],$row['Email'], $row['Password']);
        $users->Add($row['uid'], $user);      
      }    
    }
    return $user;    
  }


  // ------ setter methods -------
  public function setUid($uid){
    $this->$uid = $uid;
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
  public function setAddress($address){
    $result = true;
    if (is_string($address)){
      $this->address = $address;
    } else $result = false;
    return $result;
  }
  public function setSuburb($suburb){
    $result = true;
    if (is_string($suburb)){
      $this->suburb = $suburb;
    } else $result = false;
    return $result;
  }
  public function setCity($city){
    $result = true;
    if (is_string($city)){
      $this->city = $city;
    } else $result = false;
    return $result;
  }

  public function setPo($po){
    $result = true;
    if (is_string($po)){
      $this->po = $po;
    } else $result = false;
    return $result;
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
  
  public function getAddress(){
    return $this->address;
  }
  public function getSuburb(){
    return $this->suburb;
  }
  public function getCity(){
    return $this->city;
  }
  public function getPo(){
    return $this->po;
  }
  // method for debugging  object instance
  public function debug(){
    echo "<pre><code>";
    var_dump($this);
    echo "</code></pre>";
  }

}

?>

