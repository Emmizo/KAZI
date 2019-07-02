<?php
require 'customer.php';
if(isset($_POST)){
    $customer_id=$_POST['customer_id'];
    $del=array();
    $obj->CustomerID($customer_id);
    $res=$obj->delete();
    if($res){
        $message='Deleted';
        $status=$res;
    }
    else{
        $message='Fail to delete';
        $status=$res;
    }
}
$returnJs=array('Message'=>$message,'status'=>$status);
echo json_encode($returnJs);
?>