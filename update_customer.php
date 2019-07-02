<?php
require 'customer.php';
$customer_id=$_POST['customer_id'];
$obj->CustomerID($customer_id);
$res=$obj->retrieve();
$data=array();
$fetch=$res->fetch_array();
if(isset($_POST)){
    $customer_name=$_POST['customer_name'];
    $category_id=$_POST['category_id'];
    $isues=$_POST['isues'];
    $tel=$_POST['tel'];
    $id=$_POST['id'];
    $obj->SetID($id);
    $obj->SetCustomer($customer_name);
    $obj->SetCategory($category_id);
    $obj->SetIsues($isues);
    $obj->SetTel($tel);
    $result=$obj->Update();
    if($result){
        $message='Customer updated';
        $status='1';
    }
    else{
        $message='fail';
        $status='0';
    }
}
$notification=array('Notification'=>$message,'Status'=>$status);
echo json_encode($notification);
?>