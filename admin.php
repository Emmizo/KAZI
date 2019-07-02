<?php
require 'config.php';
header('Access-Control-Allow-Origin: *');
header('Content-Type:application/json');
class Admin extends Config{
    
    public function __construct(){
        $this->connect();
    }
public function view(){
    $stmt=$this->conn->query("SELECT DISTINCT technician.statusTec,customer.customer_id,technician.tec_name,technician.category_id2,customer.customer_name,category.category_name,category.category_id 
    FROM customer INNER JOIN agreement ON agreement.customer_id2=customer.customer_id
    INNER JOIN category ON category.category_id=agreement.category_id  
    INNER JOIN technician ON technician.category_id2=category.category_id WHERE  customer_id ORDER BY customer_id ASC")or die($this->conn->error);
    if ($stmt){
        return $stmt;
    }
    else{
        return $stmt.mysqli_error($this->conn);
    }
}
public function NewAppoint(){
    $stmt=$this->conn->query("SELECT DISTINCT agreement.agree_date,agreement.status,customer.tel,customer.customer_id,customer.customer_name,category.category_name,category.category_id,agreement.isues  FROM customer 
    INNER JOIN agreement ON customer.customer_id=agreement.customer_id2 
    INNER JOIN category ON category.category_id=agreement.category_id WHERE status='Wait'")or die($this->conn->error);
    if($stmt){
        return $stmt;
    }
    else{
        return $stmt.mysqli_error($this->conn);
    }
}

}
$views=new Admin();
?>