<?php
require 'config.php';
header('Access-Control-Allow-Origin: *');
header('Content-Type:application/json');
class Technician extends Config{
    private $tec_id;
    private $tec_name;
    private $category_id;
    private $email;
    private $tel;
    private $username;
    private $password;
    private $status;
    private $statusTec;
    public function __construct(){
        $this->connect();
        $this->tec_id=rand(9,1000000);
    }
    public function SetTec($technician){
        $this->tec_name=$technician;
    }
    public function SetCat($category){
        $this->category_id=$category;
    }
    public function SetEmail($email){
        $this->email=$email;
    }
    public function SetTel($phone){
        $this->tel=$phone;
    }
    public function TecID($ID){
            $this->tec_id=$ID;
    }
    public function StatusTec($status){
        $this->statusTec=$status;
    }
    public function GetUsername($user_name){
        $this->username=$user_name;
}
    public function GetPassword($user_password){
        $this->password=$user_password;
}
    public function SetStatus($status){
    $this->status=$status;
}
    public function AgreeID($ID){
    $this->id=$ID;
}
    public function SetStatusTec($tec){
    $this->statusTec=$tec;
}
    public function createTec(){
        $stmt=$this->conn->query("INSERT INTO `technician` (`tec_id`,`tec_name`, `category_id2`, `email`, `tel`,`statusTec`, `username`, `password`) VALUES ('$this->tec_id','$this->tec_name', '$this->category_id','$this->email','$this->tel','Available','$this->username','$this->password');");
        if($stmt){
        return $stmt;
       }
       else{
        return $stmt.mysqli_error($this->conn);
    }
}
public function read(){
    $sql=$this->conn->query("SELECT technician.statusTec,technician.tec_id,technician.tec_name, category.category_name,technician.category_id2,technician.email,technician.tel FROM technician INNER JOIN category ON category.category_id=technician.category_id2 WHERE tec_id ORDER BY tec_id DESC");
    if($sql){
        return $sql;
    }
    else{
        return $sql.mysqli_error($this->conn);
    }
}
public function Update(){
    $stmt=$this->conn->query("UPDATE technician SET tec_name='$this->tec_name',category_id2='$this->category_id',email='$this->email',tel='$this->tel' WHERE tec_id='$this->tec_id'")or die($this->conn->error);
    if($stmt){
        return $stmt;
    }
    else{
        return $stmt.mysqli_error($this->conn);
    }
}
public function TecCategor(){
    $sql=$this->conn->query("SELECT technician.statusTec,technician.tec_id,technician.tec_name, category.category_name,technician.category_id2,technician.email,technician.tel FROM technician INNER JOIN category ON category.category_id=technician.category_id2 WHERE category_id='$this->category_id'");
    if($sql){
        return $sql;
    }
    else{
        return $sql.mysqli_error($this->conn);
    }
}
public function ViewAccount(){
    $stmt=$this->conn->query("SELECT technician.tec_id, agreement.isues,agreement.price,agreement.id,agreement.price,agreement.price,agreement.agree_date,agreement.status,customer.customer_id,technician.tec_name,technician.category_id2,customer.customer_name,category.category_name,category.category_id 
    FROM technician INNER JOIN category ON technician.category_id2=category.category_id 
    INNER JOIN agreement ON agreement.tec_id=technician.tec_id 
    INNER JOIN customer ON customer.customer_id=agreement.customer_id2 WHERE  technician.tec_id='$this->tec_id'");
    if ($stmt){
        return $stmt;
    }
    else{
        return $stmt.mysqli_error($this->conn);
    }
    }
    public function UpdateStatus(){
        $stmt=$this->conn->query("UPDATE agreement SET status='$this->status' WHERE id='$this->id'");
        $sql=$this->conn->query("UPDATE technician SET statusTec='Available' WHERE tec_id='$this->tec_id'");
        if($stmt && $sql){
            return $stmt AND $sql;
        }
        else{
            return $stmt.mysql_error($this->conn);
            }
         }
     }
     $tec=new Technician();
?>