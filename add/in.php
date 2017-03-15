<?php
$servername="localhost";
$usename="root";
$password="root";
$conn=mysql_connect($servername,$usename,$password);
if(!$conn){
	die("connect faile".mysqli_connect_error());
}
//echo "it is ok";
mysql_select_db('test');
mysql_set_charset('utf-8');
$sql="SELECT shop_price FROM goods";
$res=mysql_query($sql);
$data=array();
//print_r($res);
if($res&&mysql_num_rows($res)>0){
	while($arr=mysql_fetch_assoc($res)){
		$data[]=$arr;
	}
}	
//print_r($data);
$tid=$_GET['tid'];
//foreach($data as $k=>$v){
//	if($tid==$k){
//		echo $k;
//	}
//}

?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<title>Document</title>
</head>
<body>
	<?php foreach($data as $k=>$v){if($tid==$k){ ?>
		<h1>
			<?php echo $data[$k]['shop_price']; ?>
		</h1>
	<?php }} ?>
</body>
</html>

