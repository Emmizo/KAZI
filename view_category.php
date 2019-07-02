<?php
require 'category.php';
$res=$cat->View();
$row=array();
$result=array();
$num=0;
while($fetch=$res->fetch_array()){
    $num +=1;
    $result['Category ID']=$fetch['category_id'];
    $result['Category Name']=$fetch['category_name'];
    array_push($row,$result);
}
$return=array('Message'=>'Success','Status'=>'1','Data'=>$row,'Categories Available'=>$num);
echo json_encode($return);

?>