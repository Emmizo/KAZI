<?php
require 'admin.php';
$rows=array();
$result=array();
$count=0;
$res=$views->NewAppoint();
while($fetch = $res->fetch_array()){
$count+=1;
$result['customer ID']=$fetch['customer_id'];
$result['customer']=$fetch['customer_name'];
$result['category']=$fetch['category_name'];
$result['Telephone']=$fetch['tel'];
$result['Agreement date']=$fetch['agree_date'];
$result['Status']=$fetch['status'];
$result['Description']=$fetch['isues'];
array_push($rows,$result);

}
$returnJs = array('message'=>'success','status'=>1,'Data'=>$rows,'Returned data'=>$count);
echo json_encode($returnJs);

?>