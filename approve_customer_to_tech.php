<?php
require 'agree.php';
if(isset($_POST)){
    $id=$_POST['id'];
    $tec_id=$_POST['tec_id'];
    $price=$_POST['price'];
    $agree_date=$_POST['agree_date'];
    $data=array();
    $agree->SetID($id);
    $agree->SetTechnicianID($tec_id);
    $agree->SetPrice($price);
    $agree->SetAgreeDate($agree_date);
    $res=$agree->Update();
    $stmt=$agree->create();
    if($stmt && $res){
        $notification='customer assigned to technician';
        $view=$stmt;
    }
    else{
        $notification='customer not assigned to technician something wrong';
        $view=$stmt;
    }
}
$result=array('Notifacation '=>$notification,'Status'=>$view);
echo json_encode($result);
?>