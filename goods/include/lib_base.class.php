<?php
//地址栏转义
//$arr=array("d'd",array("dwd'fw","dwd'fw",array("cc'cc")));
function _addslashes($parm){
	//static $nparm=[];
	foreach($parm as $k => $v){
		if(is_string($v)){
			$parm[$k]=addslashes($v);
		}else if(is_array($v)){
			$parm[$k]=_addslashes($v);
		}
	}
	return $parm;
}
//print_r(_addslashes($arr));
?>