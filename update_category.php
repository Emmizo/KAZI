<?php
require 'category.php';
$category_id=$_POST['category_id'];
$cat->SetCate($category_id);
$result=$cat->View();

while($fetch=$result->fetch_array());
if(isset($_POST)){
    $data=array();
    $category_name=$_POST['category_name'];
    $cat->SetCategoryName($category_name);
    $res=$cat->Update();
    if($res){
        $message='Update category went well';
        $status='1';
    }
    else{
    $message='Update category went bad';
    $status='0';
}}
$return=array('Message'=>$message,'Status'=>$status);
echo json_encode($return);

?>