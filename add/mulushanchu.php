<?php
	//删除目录
	$file='./test';
foreach(array('dw','fw') as $v){
	$path=$file.'/'.$v;
	if(is_dir($path)){
		rmdir($path);
		echo '删除了目录'.$path;
	}else{
		echo '目录不存在';
	}
}
?>