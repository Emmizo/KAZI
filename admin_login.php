<?php
require 'Autantication.php';
if(isset($_POST)){
    $username=$_POST['username'];
    $password=$_POST['password'];
    $auta->SetUsername($username);
    $auta->SetPassword($password);
    $stmt=$auta->admin();
    $result=array();
    $rows=array();
    $message=array('Wrong password or username');
    $status=array(0);
    while($fetch=$stmt->fetch_array()){
        $result['Admin ID']=$fetch['admin_id'];
        array_push($rows,$result);
        if($stmt){
            $message='success';
            $status=1;
        }
    }
}
$return=array('Message'=>$message,'Status'=>$status,'Data'=>$rows);
echo json_encode($return);

?>