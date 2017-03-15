<?php
define('ACC',true);
include('../include/init.php');
$goods=new goodsModel();
if(isset($_GET['act'])&&$_GET['act']=='show'){
	$goodslist=$goods->gettrash();
	//print_r($res);
	include(ROOT.'view/admin/templates/goodslist.html');
}else{
	$goods_id=$_GET['goods_id']+0;
	$res=$goods->trash($goods_id);
	if($res>0){
		echo "丢尽了回收站";
	}else{
		echo "没丢到";
	}
}
?>