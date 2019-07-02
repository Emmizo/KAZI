<?php
require 'config.php';
header('Access-Control-Allow-Origin: *');
header('Content-Type:application/json');
class Agreement extends Config{
    private $customer_id;
    private $category_id;
    private $tec_id;
    private $price;
    private $gree_date;
    private $status;
    private $statusTec;
    private $id;
    public function __construct(){
        $this->connect();
        $this->status="Pending";
    }
    public function SetCustomerID($customerID){
        $this->customer_id=$customerID;
    }
    public function SetCategoryID($categoryID){
        $this->category_id=$categoryID;
    }
    public function SetTechnicianID($techID){
        $this->tec_id=$techID;
    }
    public function SetPrice($Price){
        $this->price=$Price;
    }
    public function SetAgreeDate($AgreeDate){
        $this->agree_date=$AgreeDate;
    }
    public function SetStatus($StatusView){
        $this->status=$StatusView;
    }
    public function SetStatusTec($statusTec){
        $this->statusTec=$statusTec;
    }
    public function SetID($ID){
        $this->id=$ID;
    }
    public function create(){
        $sql=$this->conn->query("UPDATE `agreement` SET `tec_id` = '$this->tec_id', `price` = '$this->price', `agree_date` = '$this->agree_date', `status` = '$this->status' WHERE `agreement`.`id` = '$this->id';")or die($this->conn->error);
        if($sql){
            return $sql;
        }
        else{
            return $sql.mysqli_error($this->conn);
        }
    }
    public function read(){
        $stmt=$this->conn->query("SELECT customer.customer_id,customer.customer_name,category.category_name,technician.tec_name,agreement.price,agreement.agree_date,agreement.status 
        FROM agreement 
                       INNER JOIN customer ON customer.customer_id=agreement.customer_id2
                       INNER JOIN category ON category.category_id=agreement.category_id
                       INNER JOIN technician ON technician.category_id2=category.category_id WHERE technician.tec_id=agreement.tec_id AND id ORDER BY id DESC");
            if($stmt){
                return $stmt;
            }
            else{
                return $stmt.mysqli_error($this->conn);
            }
    }
    public function Update(){
        $stmt=$this->conn->query("UPDATE technician SET statusTec='Busy' WHERE tec_id='$this->tec_id' ");
     if($stmt){
         return $stmt;
     }
     else{
         return $stmt.mysqli_error($this->conn);
     }
    }
}
$agree=new Agreement();
?>