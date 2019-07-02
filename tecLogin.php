<?php
require 'Autantication.php';
session_start();
if(isset($_POST)){
   
    $username=$_POST['username'];
    $password=$_POST['password'];
    $auta->SetUsername($username);
    $auta->SetPassword($password);

    $sql=$auta->TecLogin();
    $result=array();
    $rows=array();
    $message=array('Wrong username and password');
    $status=array('0');
    while($fetch = $sql->fetch_array()){
    $result['Tec_id']=$fetch['tec_id'];
    //$fetch['customer_id']=$_SESSION['customer_id'];
    $result['Name']=$fetch['tec_name'];
    array_push($rows,$result);

    
    if($sql){
        $message='Ok';
        $status=1;
    }
        }}
       
        $returnJs = array('message'=>$message,'status'=>$status,'data'=>$rows);
        echo json_encode($returnJs);
    
?>