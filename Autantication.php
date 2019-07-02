<?php
require 'config.php';
header('Access-Control-Allow-Origin: *');
header('Content-Type:application/json');
Class Authantic extends Config{
private $username;
private $password;
private $user_username;
private $user_password;
public function __construct(){
    $this->connect();
}
public function SetUsername($username){
    $this->username=$username;
}
public function SetPassword($password){
    $this->password=$password;
}
public function SetUser_username($user_username){
    $this->user_username=$user_username;
}
public function SetUser_password($user_password){
    $this->user_password=$user_password;
}
public function customerAuta(){
    $sql=$this->conn->query("SELECT * FROM customer WHERE user_username='$this->user_username' AND user_password='$this->user_password'");
    if($sql->num_rows >= 0){
        return $sql;
    }
    else{
        return $sql.mysqli_error($this->conn);
    }
    
}
public function Admin(){
    $stmt=$this->conn->query("SELECT * FROM admin WHERE username='$this->username' AND password='$this->password'");
    if($stmt->num_rows>=0){
        return $stmt;
    }
    else{
        return $stmt.mysqli_error($this->conn);
    }

}
public function TecLogin(){
    $sql=$this->conn->query("SELECT * FROM technician WHERE username='$this->username' AND password='$this->password'");
    if($sql->num_rows >= 0){
        return $sql;
    }
    else{
        return $sql.mysqli_error($this->conn);
    }
    

}
}
$auta=new Authantic();
?>