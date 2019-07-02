<?php
require 'technician.php';
if(!empty($_POST)){
$tec_id=$_POST['tec_id'];
//$password=$_POST['password'];
$tec->TecID($tec_id);
//$tec->GetPassword($password);
}
$dis=$tec->ViewAccount();
$rows=array();
$result=array();
$num=0;
while($fetch=$dis->fetch_array()){
    $num +=1;
    $result['Technician ID']=$fetch['tec_id'];
    $result['customer ID']=$fetch['customer_id'];
    $result['customer name']=$fetch['customer_name'];
    $result['category name']=$fetch['category_name'];
    $result['Date']=$fetch['agree_date'];
    $result['Price']=$fetch['price'];
    $result['status']=$fetch['status'];
    $result['Technician']=$fetch['tec_name'];
    $result['Price']=$fetch['price'];
    $result['Description']=$fetch['isues'];
    array_push($rows,$result);
}
$return=array('Message'=>'success','status'=>'1','Data'=>$rows,'Number of customer'=>$num);
echo json_encode($return);

?>