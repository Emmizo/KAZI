<?php
require 'config.php';
header('Access-Control-Allow-Origin: *');
header('Content-Type:application/json');
class Category extends Config{
    private $category_id;
    private $category_name;
    
    public function __construct(){
        $this->connect();
    }
    public function SetCategoryID($ID){
        $this->category_id=$ID;
    }
    public function SetCategoryName($name){
        $this->category_name=$name;
    }
    public function SetCate($ID){
        $this->category_id=$ID;
    }
    public function create(){
        $sql= $this->conn->query("INSERT INTO category (category_id, category_name) VALUES ('$this->category_id','$this->category_name')");

        if($sql){
            return $sql;
        }
        else{
            return $sql.mysqli_error($this->conn);
        }
    }
    public function View(){
        $stmt=$this->conn->query("SELECT * FROM category");
        if($stmt){
            return $stmt;
        }
        else{
            return $stmt.mysqli_error($this->conn);
        }
    }
    public function Update(){
        $stmt=$this->conn->query("UPDATE category SET category_name='$this->category_name' WHERE category_id='$this->category_id'");
        if($stmt){
            return $stmt;
        }
        else{
            return $stmt.mysqli_error($this->conn);
        }
    }
}
$cat=new Category();
?>