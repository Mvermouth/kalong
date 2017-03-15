<?php
print_r(glob('./test/*.txt'));
echo '<hr/>';
//目录操作
$path='./test';
$ziyuan=opendir($path);
//echo readdir($ziyuan);
//echo readdir($ziyuan);
//echo readdir($ziyuan);
//echo readdir($ziyuan);
while(($filename=readdir($ziyuan))!==false){
	echo $filename.'<br/>';
	if(is_dir($path.'/'.$filename)){
		echo $filename.'是目录<br/>';
	}
	echo '<br/>';
}
//mkdir('./test')
//创建目录
foreach(array('d','dw','fw','wf') as $v){
	$paths=$path.'/'.$v;
	if(file_exists($paths)&&is_dir($paths)){
		echo '目录已经存在';
	}else{
		if(mkdir($paths)){
			echo 'OK';
		}else{
			echo 'shibai';
		}
	}
}


?>