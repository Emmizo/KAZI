<?php
require 'customer.php';
if(isset($_POST)){
    $customer_id=$_POST['customer_id'];
    $obj->CustomerID($customer_id);
    $rows=array();
    $result=array();
    $count=0;
    $res=$obj->ViewAccount();
while($fetch = $res->fetch_array()){
$count+=1;
$result['customer ID']=$fetch['customer_id'];
$result['customer']=$fetch['customer_name'];
$result['category']=$fetch['category_name'];
$result['problem']=$fetch['isues'];
$result['Telephone']=$fetch['tel'];
$result['Status']=$fetch['status'];
$result['Agreement date']=$fetch['agree_date'];
$result['price']=$fetch['price'];
array_push($rows,$result);
}
}
    $notify='Wrong username or password';
    $Statu=0;
$returnJs = array('message'=>'success','Notification'=>$notify,'status'=>1,'Data'=>$rows,'Returned data'=>$count);
echo json_encode($returnJs);


?>