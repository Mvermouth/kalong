<?php
//把a读出来并赋值
//$str=fopen('./aaa.txt',"r");
//var_dump($str);
//$res=fget('./aaa.txt','r');
$wen='./aaa.txt';
$str=file_get_contents($wen);
echo $str;
echo '<br/>';
//$url='http://www.qq.com';
//echo file_get_contents($url);
file_put_contents('./bvb.txt',$str);
echo '<br/>';
$url='http://finance.ifeng.com/a/20170221/15207223_0.shtml';
//$html=file_get_contents($url);
//if(file_put_contents('pachong.html',$html)){
//	echo "OK";
//}else{
//	echo "it loster";
//}
//$fff='./pachong.html';
//$jiu=fopen($fff,'a+');
//echo fread($jiu,19);
//if(fwrite($jiu,'vbeber第千度万第')){
//	//echo '真的烦';
//}else{
//	//echo '???';
//}

$h='localhost';
$u='root';
$p='root';
$conn=mysql_connect($h,$u,$p);
if(!$conn){
	die();
}
mysql_select_db('test');
mysql_set_charset('utf8');
//$sql="SELECT goods_name FROM goods";
//$sql='insert into score values ($data[0],$data[1])';
//$res=mysql_query($sql);
//$res=mysql_query($sql);
//	$dat=array();
//	//print_r($res);
//	if($res&&mysql_num_rows($res)>0){
//		while($arr=mysql_fetch_assoc($res)){
//			$dat[]=$arr;
//		}
//	}	
//	print_r($dat[0]['goods_name']);


$file='./name.txt';
$arr=array();
//$con=file_get_contents($file);
//print_r(explode('0',$con)); 方法不好
//$jvbing=fopen($file,'rb');
////$res=fgets($jvbing);
////print_r($res);
//while(!feof($jvbing)){
//	static $i=0;
//	$arr[$i]=fgets($jvbing);
//	$i++;
//}
//print_r($arr);
fclose($jvbing);
//超级暴力
$brr=file($file);
print_r($brr);
echo "<hr/>";
echo date("F d Y H:i:s",filemtime($file));
echo "<hr/>";
$score='./score.csv';
$dh=fopen($score,'rb');
while(!feof($dh)){
	//static $data;
	//static $i=0;
	$data=fgetcsv($dh);
	print_r($data);
	//$i++;
}
fclose($dh);
$sql="insert into score values ('神经',95)";
//$res=mysql_query($sql);
echo "<br/>";
foreach(array('ccc.txt','ddd.txt','vvv.txt','xxx.txt') as $v){
	$del='./test/'.$v;
	if(filesize($del)<10){
		unlink($del);	
		echo '小余10';
		continue;
	}
	$title=file_get_contents($del);
	if(stripos($title,'fuck')!==false){
		unlink($del);
		echo '有脏话的'.$del;
	}else{
		echo 'OK';
	}
}
?>