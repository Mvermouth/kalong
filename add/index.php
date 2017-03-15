<html>
	<body style="background: #bdb5b8;">
	</body>
</html>
<?php
$a =false;
echo gettype($a);
if(is_bool($a)){
	echo "yes";
} else{
	echo "no";
}
echo "<br />";
$b="i am str";
echo $b;
echo "<br />";
print_r($b); 
echo "<br />";
var_dump($b);
echo "<br />";

//引用赋值，传递fu值
$c='12';
var_dump($c);
$c=$c+3;
var_dump($c);
echo "<br />";
$d=5;
$e=6;
$e=$d;
echo $e;
$e=&$c;
echo "<br />";
echo $e;
$c=10;
echo "<br />";
echo $e;
echo "<br />";
//销毁
$f=998;
$g=&$f;
unset($f);
if(isset($f)){
	echo "yes";
} else{
	echo "no";
}
echo "<br />";
echo $g;
echo "<br />";

//动态变量名
$jl="ljl";
$ljl="ct";
echo $$jl;
echo "<br />";

//三元运算符
$h=15;
$i=16;
$k=null;

$k=($h>$i ? $h:$i);
echo $k;
echo "<br />";

$j=23;
$l=241;
$m=21;
$n=null;
$o=($j>$l ? $j:$l);
$n=($o>$m ? $o:$m);
echo $n;
echo "<br />";
$p="41241";
$q=1414;
$r=$p.$q;
echo $r;
echo "<br />";

for($peo=100000,$i=0;$peo>5000;){
	if($peo>=50000){
		$peo=$peo-$peo*0.05;
	}else{
		$peo=$peo-5000;
	}
	$i++;
	//echo $i."<br />";
}
echo "<hr />";
function bridge(){
	for($peo=100000,$i=0;$peo>5000;){
		if($peo>=50000){
			$peo=$peo-$peo*0.05;
		}else{
			$peo=$peo-5000;
		}
		$i++;
		
	}
}
bridge();
echo $i."<br />";
function t($f){
	echo "1";
	echo $f;
	return "2";
	echo "3";
}
t($g);
echo "<br />";
function w(){
	$b=22;
	//echo $a;
}
w();
echo "<br />";

//作用域
echo "<br />";
$a ="r3r";
echo "$a";
echo '$a';
echo "<br />";
$res=$_POST['usename'];
if($res==null){
	echo "用户没有输入";
}else{
	var_dump($res);
}
$ip = $_SERVER["REMOTE_ADDR"];
echo $ip;
echo "<hr/>";
$pp="lplpl";
$lplpl="i am hel";
echo $$pp;
echo "<br />";
//返回时间戳
echo time();
echo "<br />";
echo microtime(true);
echo "<hr/>";
$tim=time();
echo gmdate($tim);
echo "<br/>";
date_default_timezone_set('UTC');
echo date('Y-m-d',mktime(2,2,2,2,2,2010));
echo "<br/>";
echo mktime(2,2,2,2,2,2010);
$offer=$tim-mktime(2,2,2,2,2,2010);
echo "<br/>";
echo $offer;
echo "<br/>";
$per= strtotime("now -5 day");
echo "<hr/>";
echo date('Y-m-d',$per);
echo "<br/>";
//数组
$arr=array(0=>'东',1=>array(0=>'南'));
print_r($arr);
$arr1=array('2'=>"a","b");
$arr1[]="ee";
print_r($arr1);
$arr=array("age"=>"213","lan"=>"1414","weigth"=>"2","name"=>"951");
//for($key=0;$key<count($arr);$key++){
//	echo $arr[$key]."<br/>";
//}
foreach($arr as $key => $value){
	echo 2*"$value"."<br/>";
}
echo "<br/>";
$arr3=array("a"=>"zhanglong","b"=>"ct","c"=>"kalong","d"=>"jixuan","e"=>null);
if(array_key_exists("e",$arr3)){
	echo "yes";
}else{
	echo "no";
}
echo "<br/>";
//print_r($_POST);
//print_r($_GET);
//print_r($_REQUEST);
//print_r($_SERVER);
function p(){
	//print_r($GLOBALS);
	$GLOBALS["a"]=99;
}
p();
echo "<hr/>";
echo $a;
echo "<br/>";
include('./baohan.php');
hello();
echo "<br/>";
function sum($po){
	$sm=0;
	for($a=0;$a<=$po;$a++){
		$sm+=$a;
	}
	echo $sm;
}
sum(100);

function duck(){
	$a=0;
	$b=0;
	for($a;$a<=35;$a++){
		$b=35-$a;
		if(($a*2+$b*4)==94){
			echo $a;
			echo "<br/>";
			echo $b;
		}
	}
}
function dfdf(){
	$a=0;
	//$b=0;
	for($a;$a>=0;$a++){
		if(($a%2)==1&&($a%3)==2&&($a%5)==4&&($a%6)==5&&($a%7)==0){
			echo "<br/>";
			echo $a;
			exit;
		}
	}
}
dfdf();



?>