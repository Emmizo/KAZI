<?php
require 'agree.php';
$rs=$agree->read();
$rows=array();
$result=array();
$count=0;
while($fetch=$rs->fetch_array()){
    $count +=1;
    $result['Customer ID']=$fetch['customer_id'];
    $result['Client name']=$fetch['customer_name'];
    $result['Material']=$fetch['category_name'];
    $result['Technician name']=$fetch['tec_name'];
    $result['Price']=$fetch['price'];
    $result['Date']=$fetch['agree_date'];
    $result['Work']=$fetch['status'];
    array_push($rows,$result);
}
$sms=array('Message'=>'success','status'=>'1','Data'=>$rows,'number'=>$count);
echo json_encode($sms);
?>