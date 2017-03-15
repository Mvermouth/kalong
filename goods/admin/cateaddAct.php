<?php
//接收 cateadd.php表单发来的数据
//调用model数据入库
//第一步 接数据
//print_r($_POST);

//第二步
//实例化 model并调用相关
define('ACC',true);
include('../include/init.php');
$data=array();
if(empty($_POST['cat_name'])){
	exit("栏目不能为空");
}
$data['cat_name']=$_POST['cat_name'];
$data['parent_id']=$_POST['parent_id'];
$data['intro']=$_POST['intro'];
//print_r($data);
$cat=new catModel();
echo $cat->add($data) ? "ok":"no ok";
?>