<?php
//页面都必须先加载init.php
define('ACC',true);
require('./include/init.php');
session_start();
//Log::write('ceshi1');

//class Cshi{
//	public function query($sql){
//		Log::write($sql);
//	}
//}
//$ms=new Cshi();
//for($i=0;$i<5;$i++){
//	$sql='select goods_name from goods where goods_id='.mt_rand(1,32);
//	$ms->query($sql);
//}
//echo 'it is ok';

//print_r($_GET);
//$mysql =new mysql();

//$mysql=mysql::getins();
//print_r($mysql);

//print_r($mysql);
//$sql="insert into tes values('$_GET[name]','$_GET[dd]')";
//if($mysql->query($sql)){
//	echo '连接成功';
//}else {
//	echo 'no';
//}
//$arr=array('t2'=>'good');
//if($mysql->autoExecute("tes",$arr,"update","where t2='hho2oh'")){
//	echo 'ok';
//}else {
//	echo "no";
//}
//if($mysql->query($sql)){
//	echo "ok";
//}else{
//	echo 'no';
//}
////Log::write($sql);
//echo "deeeeeeeeeeeeeeee";
//$jiu=new testmodel();
//$arr=array('t1'=>'cao','t2'=>'jiuxcao');
//if(!$jiu->reg($arr)){
//	echo "OK";
//}else{
//	echo 'nonono';
//}

$goods=new goodsModel();
$newlist=$goods->getNewlist(5);
//print_r($res);

//exit;
include (ROOT.'./view/front/index.html');

?>