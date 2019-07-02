<?php
require 'technician.php';
$tec_id=$_POST['tec_id'];
$tec->TecID($tec_id);
$res=$tec->read();
$fetch=$res->fetch_array();
if(isset($_POST)){
    $tec_name=$_POST['tec_name'];
    $category_id=$_POST['category_id2'];
    $email=$_POST['email'];
    $tel=$_POST['tel'];
    $data=array();
    $tec->SetTec($tec_name);
    $tec->SetCat($category_id);
    $tec->SetEmail($email);
    $tec->SetTel($tel);
    $stmt=$tec->Update();
    if($stmt){
        $message='Update done';
        $status=$stmt;
    }
    else{
        $message='Fail to update Technician';
        $status=$stmt;
    }
}
$returnJs=array('Message'=>$message,'status'=>$status);
echo json_encode($returnJs);
?>