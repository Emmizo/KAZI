<?php
require 'customer.php';
if(isset($_POST)){
    $customer_id2=$_POST['customer_id2'];
    $category_id=$_POST['category_id'];
    $isues=$_POST['isues'];
    $data=array();
    $obj->AgreeCustomerID($customer_id2);
    $obj->SetCategory($category_id);
    $obj->SetIsues($isues);
    $res=$obj->CustomerInAcount();
    if($res){
        $message='Appaintment Received';
        $status=1;
    }
    else{
        $message='Appaintment Fail';
        $status=0;
    }
}
$result=array('Notification'=>$message,'Status'=>$status);
echo json_encode($result);
?>