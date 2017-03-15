<?php
	print_r($_FILES);
	
	
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
//$pic=$_FILES['pic'];

	foreach($_FILES as $k => $v){
		$path=mk_dir().'/'.getname().'.'.getex($v['name']);
		if(move_uploaded_file($v['tmp_name'],$path)){
			echo 'ok';
		}else{
			echo 'no';
		}
	}
?>