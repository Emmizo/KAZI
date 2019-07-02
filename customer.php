<?php
require 'config.php';
header('Access-Control-Allow-Origin: *');
header('Content-Type:application/json');
class Customer extends Config{
    private $customer_id;
    private $customer_name;
    private $category_id;
    private $isues;
    private $tel;
    private $user_username;
    private $user_password;
    private $status;
    public function __construct(){
        $this->connect();
        $this->customer_id=rand(10,100000);
        $this->status="Wait";
    }
    public function SetCustomer($customer){
        $this->customer_name=$customer;
    }
    public function SetCategory($category){
        $this->category_id=$category;
    }
    public function SetIsues($problem){
        $this->isues=$problem;
    }
    public function SetTel($phone){
        $this->tel=$phone;
    }
    public function CustomerID($ID){
        $this->customer_id=$ID;
    }
    public function SetUser($username){
        $this->user_username=$username;
    }
    public function SetPass($password){
        $this->user_password=$password;
    }
    public function AgreeCustomerID($customer_id2){
        $this->customer_id2=$customer_id2;
    }
    public function SetID($ID){
        $this->id=$ID;
    }
public function create(){
    $stmt = $this->conn->query("INSERT INTO `customer` (`customer_id`,`customer_name`,   `tel`, `user_username`, `user_password`) VALUES ('$this->customer_id','$this->customer_name','$this->tel','$this->user_username','$this->user_password');") or die($this->conn->error);
    $sql=$this->conn->query("INSERT INTO `agreement` (`customer_id2`, `category_id`, `isues`,`status`) VALUES ('$this->customer_id','$this->category_id','$this->isues','$this->status');")or die($this->conn->error);
			if($stmt && $sql){
				return $stmt AND $sql;
            }
            else{
                return $stmt&&$sql.mysqli_error($this->conn);
            }
        }
    public function retrieve(){
        $sql=$this->conn->query("SELECT DISTINCT agreement.status,customer.tel,customer.customer_id,customer.customer_name,category.category_name,category.category_id,agreement.isues  FROM customer 
        INNER JOIN agreement ON agreement.customer_id2=customer.customer_id
        INNER JOIN category ON category.category_id=agreement.category_id WHERE customer_id ORDER BY customer_id DESC") or die($this->conn->error);
    if($sql){
        return $sql;
    }
    else{
        return false;
    }}
    public function Update(){
        $stmt=$this->conn->query("UPDATE customer SET customer_name='$this->customer_name',tel='$this->tel' WHERE customer_id='$this->customer_id'")or die($this->conn->error);
        $sql=$this->conn->query("UPDATE agreement SET category_id='$this->category_id',isues='$this->isues' WHERE customer_id2='$this->customer_id' AND id='$this->id'")or die($this->conn->error);
        if($stmt&&$sql){
            return $stmt AND $sql;
        }
        else{
            return $stmt.mysqli_error($this->conn);
        }
    } 
    public function Delete(){
        $stmt=$this->conn->query("DELETE FROM customer WHERE customer_id='$this->customer_id'")or die($this->conn->error);
        if($stmt){
            return $stmt;
        }
        else{
            return $stmt.mysqli_errror($this->conn);
        }
    }
    public function ViewAccount(){
        $sql=$this->conn->query("SELECT agreement.price, agreement.agree_date,agreement.status,customer.tel,customer.customer_id,customer.customer_name,category.category_name,category.category_id,agreement.isues  FROM customer 
        INNER JOIN agreement ON customer.customer_id=agreement.customer_id2 
        INNER JOIN category ON category.category_id=agreement.category_id WHERE customer_id='$this->customer_id'") or die($this->conn->error);
          if($sql){
              return $sql;
          }  
          else{
              return $sql.mysqli_error($this->conn);
                 }
            }
            public function CustomerInAcount(){
                $stmt=$this->conn->query("INSERT INTO `agreement` (`customer_id2`, `category_id`,`isues`,`status`) VALUES ('$this->customer_id2', '$this->category_id','$this->isues','Wait');")or die($this->conn->error);
                if($stmt){
                    return $stmt;
                }
                else{
                    return $stmt.mysqli_error($this->conn);
                }
            }
    }
$obj= new Customer();
?>