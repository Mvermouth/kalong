<?php
//页面都必须先加载init.php
require('./include/init.php');
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
$mysql=mysql::getins();
print_r($mysql);
//print_r($mysql);
//$sql="insert into tes values('$_GET[name]','$_GET[dd]')";
//if($mysql->query($sql)){
//	echo '连接成功';
//}else {
//	echo 'no';
//}
echo '<hr/>';
//if($mysql->query($sql)){
//	echo "ok";
//}else{
//	echo 'no';
//}
////Log::write($sql);
?>