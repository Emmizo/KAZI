<?php
require 'customer.php';
if(isset($_POST)){
    $customer_id=$_POST['customer_id'];
    $customer_name=$_POST['customer_name'];
    $category_id=$_POST['category_id'];
    $isues=$_POST['isues'];
    $tel=$_POST['tel'];
    $user_username=$_POST['user_username'];
    $user_password=$_POST['user_password'];
    $result=array();
    $obj->SetCustomer($customer_name);
    $obj->SetCategory($category_id);
    $obj->SetIsues($isues);
    $obj->SetTel($tel);
    $obj->SetUser($user_username);
    $obj->SetPass($user_password);
    $stmt=$obj->create();
    if($stmt){
        $message='customer inserted';
        $status=$stmt;
    }
    else{
        $message='fail';
        $status=$stmt; 
    }
}
$return=array('message'=>$message,'status'=>$status);
echo json_encode($return);
?>