<?php
//迭代
function mk($p){
	
	$arr=array();
	
	while(!is_dir($p)){
		array_unshift($arr,$p);
		$p=dirname($p);
	}
	//return $arr;
	if(empty($arr)){
		return true;
	}
	foreach($arr as $v){
		mkdir($v);
	}
	return true;
}
//print_r(mk('./r'));
//$arr=[1,"r","r'0/f",4];
//print_r(addslashes($arr[2]));
$arr=array("d'd",array("dwd'fw","dwd'fw",array("cc'cc")));
//递归转移
function zhuan($ar){
	if(is_array($ar)){
		foreach($ar as $k => $v){
			if(is_string($v)){
				$nar[$k]=addslashes($v);
			}else if(is_array($v)){
				$nar[$k]=zhuan($v);
				//$nar[$k]=addslashes($v);
			}
		}
	}
	return $nar;
}
//print_r($arr);
 //print_r(zhuan($arr));
?>