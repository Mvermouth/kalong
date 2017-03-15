<?php
//递归
function sum($n){
	$a=(1+$n)*$n/2;
	return $a;
}
echo sum(100);
echo '<br/>';
function df($o){
	if($o==1){
		return 1;
	}
	return $o+df($o-1);
}
echo df(100);
echo '<br/>';
//打印出级联目录;
$path='./';
function readir($path,$i=1){
	$dh=opendir($path);
	//$res=readdir($dh);
	//return $res;
	while(($res=readdir($dh))!==false){
		if($res=='.'||$res=='..'){
			continue;
		}
		echo str_repeat("&nbsp",$i).$res.'<br/>';
//		if($res=='.'||$res=='..'){
//			continue;
//		}
		if(is_dir($path.'/'.$res)){
			//echo '这是目录<br/>';
			
			readir($path.'/'.$res,$i+1);	
			//$i++;
		}
	}
	closedir($dh);
}
readir($path,1);
?>