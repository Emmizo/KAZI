<?php
require 'customer.php';
$select=$obj->retrieve();
$rows = array();
$result=array();
$count=0;

while($fetch = $select->fetch_array()){
$count+=1;
$result['customer_id']=$fetch['customer_id'];
$result['customer']=$fetch['customer_name'];
$result['category']=$fetch['category_name'];
//$result['problem']=$fetch['isues'];
$result['Telephone']=$fetch['tel'];
//$result['status']=$fetch['status'];
array_push($rows,$result);
}
$returnJs = array('message'=>'success','status'=>1,'data'=>$rows,'Returned data'=>$count);
echo json_encode($returnJs);
?>