<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/3/6
 * Time: 10:49
 */

echo $_POST['usename'];
echo "<br/>";
//echo $_POST['pic'];
echo "<br/>";
print_r($_FILES);
//sleep(5);
//if(move_uploaded_file($_FILES['pic']['tmp_name'],'./r/'.$_FILES['pic']['name'])){
//	rename('./r/'.$_FILES['pic']['name'],'./r/'.time().rand(10000,99999).'.jpg');
//	
//}else{
//	return false;
//}

//随机创建目录
function mk_dir(){
	$dir='./r/'.date('mj',time());
	//$s=rand();
	if(is_dir($dir)){
		return $dir;
	}else{
		mkdir($dir,0777,true);
		return $dir;
	}
}
function getex($file){
	$ex=explode('.',$file);
	return end($ex);
}
function getname(){
	$str='qpwoeirutylaksjdhfgmznxbcv8520369741';
	return substr(str_shuffle($str),0,6);
}
$pic=$_FILES['pic'];
$path=mk_dir().'/'.getname().'.'.getex($pic['name']);
if(move_uploaded_file($_FILES['pic']['tmp_name'],$path)){
	echo 'ok';
	exit;
}else{
	echo 'no';
}

?>

