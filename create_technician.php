<?php
require 'technician.php';
if(isset($_POST)){
    $tec_name=$_POST['tec_name'];
    $category_id=$_POST['category_id'];
    $email=$_POST['email'];
    $tel=$_POST['tel'];
    $username=$_POST['username'];
    $password=$_POST['password'];
    $data=array();
    $tec->SetTec($tec_name);
    $tec->SetCat($category_id);
    $tec->SetEmail($email);
    $tec->SetTel($tel);
    $tec->GetUsername($username);
    $tec->GetPassword($password);

    $stmt=$tec->createTec();
    if($stmt){
        $message='new Technician registered';
        $status=$stmt;
    }
    else{
        $message='Fail to register new Technician';
        $status=$stmt;
    }
}
$returnJs=array('Message'=>$message,'status'=>$status);
echo json_encode($returnJs);
?>