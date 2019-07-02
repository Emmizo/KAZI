<?php
require 'category.php';
if(isset($_POST)){
    $category_id=$_POST['category_id'];
    $category_name=$_POST['category_name'];
    $data=array();
    $cat->SetCategoryID($category_id);
    $cat->SetCategoryName($category_name);
    $sql=$cat->create();
    if($sql){
        $message='new category applied';
        $status=$sql;
    }
    else{
        $message='fail to apply new category';
        $status=$sql;
    }
}
$js=array('message'=>$message,'status'=>$status);
echo json_encode($js);
?>