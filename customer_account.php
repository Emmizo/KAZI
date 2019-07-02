<?php
require 'Autantication.php';
session_start();
if(isset($_POST)){
   
    $user_username=$_POST['user_username'];
    $user_password=$_POST['user_password'];
    $auta->SetUser_username($user_username);
    $auta->SetUser_password($user_password);

    $sql=$auta->customerAuta();
    $result=array();
    $rows=array();
    $message=array('Wrong password and username');
    $status=array('0');
    while($fetch = $sql->fetch_array()){
    $result['customer']=$fetch['customer_id'];
    //$fetch['customer_id']=$_SESSION['customer_id'];
    $result['Name']=$fetch['customer_name'];
    array_push($rows,$result);
    if($sql){
        $message='Success';
        $status='1';
    }
    }}
        $returnJs = array('message'=>$message,'status'=>$status,'data'=>$rows);
        echo json_encode($returnJs);
?>