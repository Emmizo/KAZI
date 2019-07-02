<?php
require 'admin.php';
$res=$views->view();
$rows=array();
$result=array();
$num=0;
while($fetch=$res->fetch_array()){
    $num +=1;
    $result['customer ID']=$fetch['customer_id'];
    $result['customer name']=$fetch['customer_name'];
    $result['category name']=$fetch['category_name'];
    $result['Technician name']=$fetch['tec_name'];
    $result['Technician']=$fetch['statusTec'];
    array_push($rows,$result);
}
$return=array('Message'=>'success','status'=>'1','Data'=>$rows,'Number of customer'=>$num);
echo json_encode($return);

?>