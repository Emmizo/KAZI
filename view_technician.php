<?php
require 'technician.php';
$read=$tec->read();
$rows=array();
$result=array();
$num=0;
while($fetch=$read->fetch_array()){
    $num +=1;
    $result['Technician ID']=$fetch['tec_id'];
    $result['Technician name']=$fetch['tec_name'];
    $result['Specialist In']=$fetch['category_name'];
    $result['Email']=$fetch['email'];
    $result['Telephone']=$fetch['tel'];
    $result['statusTec']=$fetch['statusTec'];
    array_push($rows,$result);
}
$returnJs=array('Message'=>'Success','Status'=>'1','Data'=>$rows,'number of technician' =>$num);
echo json_encode($returnJs);
?>