<?php
require 'technician.php';
$id=$_POST['id'];
$res=$tec->ViewAccount();
$tec->AgreeID($id);
$fetch = $res->fetch_array();
if(isset($_POST)){
    $status=$_POST['status'];
    $tec_id=$_POST['tec_id'];
    $tec->TecID($tec_id);
    $tec->SetStatus($status);
    $res=$tec->UpdateStatus();
    $data=array();

if($res){
    $message='Update status succesful';
    $status=1;
}
else{
    $message='Update status fail';
    $status=0;
}}
$result=array('Message'=>$message,'Status'=>$status);
echo json_encode($result);
?>