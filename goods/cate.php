<?php
define('ACC',true);
require('./include/init.php');
$cate=new Cate();
$data['name']=$_POST['test1'];
$data['intro']=$_POST['test2'];
if(!$cate->add($data)){
	$res=true;
}else {
	$res=false;
}
echo $res? "ok":"no";
?>