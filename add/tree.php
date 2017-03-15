<?php
//tree应用x
//人肉
$peo=array(
	array('id'=>1,'name'=>'独孤求败','parent'=>0),
	array('id'=>2,'name'=>'杨过','parent'=>6),
	array('id'=>3,'name'=>'风清扬','parent'=>1),
	array('id'=>4,'name'=>'令狐冲','parent'=>3),
	array('id'=>6,'name'=>'神雕','parent'=>1),
	array('id'=>7,'name'=>'郭靖','parent'=>0),
	array('id'=>8,'name'=>'刘亦菲','parent'=>2),
	array('id'=>9,'name'=>'小龙女','parent'=>2),
);
//思路，只要parent！=就继续找
//递归
function family($peo,$id){
	$tree=array();
	foreach($peo as $v){
		if($v['id']==$id){
			//$tree[]=$v;
			if($id>0){
				$tree=array_merge($tree,family($peo,$v['parent']));
			}
			$tree[]=$v;
		}
	}
	return $tree;
}
print_r(family($peo,2));
echo '<hr/>';
//$ppp=[];
//$ppp[]='aaa';
//$ppp[]='bbb';
//
//
//print_r($ppp);
//diedai  迭代 效率比递归高
function treed($p,$id){
	$tree=array();
	
	while($id!=0){
		foreach($p as $v){
			if($v['id']==$id){
//				$tree[]=$v;
				array_unshift($tree,$v);
				$id=$v['parent'];
			}
		}
	}
		return $tree;
}
print_r(treed($peo,2));
//如何用迭代找栏目的子孙数
?>