<?php
//递归创建木录
//echo mkdir('./a')?'ok':'no';
function mulu($m){
	//直接存在 
	if(is_dir($m)){
		return true;
	}
	//父目录存在
	if(is_dir(dirname($m))){
		return mkdir($m);
	}
	//什么都不在不在,创建父
	if(!is_dir(dirname($m))){
		mulu(dirname($m));
		mulu($m);
		
	}
}
//mulu('./c/f/r/s/d');

function mul($m){
	if(is_dir($m)){
		return true;
	}
	//is_dir(dirname($m)) ? mkdir($m):mulu(dirname($m));
	//mul($m);
	//is_dir()
	 return is_dir(dirname($m))||mul(dirname($m)) ? mkdir($m):false;//return是函数的话回执行？
}
//mul('./u/g/e/s');
//if(rmdir('./d',true)){
//	echo 'it is ok';
//}else{
//	echo 'it is f';
//}

//if(mkdir('./d/e/g3/o/p',0777,true)){
//	echo 'ok';
//}else{
//	echo "f";
//}

function del($p){
	if(!is_dir($p)){
		return null;
	}
	$dh=opendir($p);
	while(($row=readdir($dh))!==false){
		if($row=='.'||$row=='..'){
			continue;
		}
		if(!is_dir($p.'/'.$row)){
			unlink($p.'/'.$row);
		}else{
			del($p.'/'.$row);
		}
	}
//	if(scandir($p)==false){
//		rmdir($p);
//	}
	//if(count(scandir($p))==2){
		closedir($dh);
		rmdir($p);
		echo $p.'del<br/>';
	//}
	//del($p);
	echo $row;
	return true;
}
//echo del('./d')?'ok':'no';
//echo file_exists('./d/e/g3/o/p')? 'ok':'no';
?>