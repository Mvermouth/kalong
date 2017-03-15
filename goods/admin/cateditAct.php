<?php
define('ACC',true);
include('../include/init.php');
$data=array();
if(empty($_POST['cat_id'])){
	exit("none");
}
$data['cat_id']=$_POST['cat_id'];
$data['intro']=$_POST['intro'];
$data['cat_name']=$_POST['cat_name'];
$data['parent_id']=$_POST['parent_id'];
$cat=new catModel();
echo "修改".$data['cat_id']."<br/>";
echo "<br/>".$data['parent_id'];
$t=$cat->gettree($data['parent_id']);
$flag=true;
foreach($t as $v){
	if($v['cat_id']==$data['cat_id']){
		//echo "你是我爹";
		$flag=false;
		break;
	}
}
if(!$flag){
	exit("你是我爹");
}else{
	echo "你不是我爹";
}
//print_r($t);
//
//exit;
echo $cat->update($data) ? "ok":'shibai';
?>