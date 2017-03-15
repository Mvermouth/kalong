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
	$sql="SELECT goods_name FROM goods";
	$res=mysql_query($sql);
	$data=array();
	//print_r($res);
	if($res&&mysql_num_rows($res)>0){
		while($arr=mysql_fetch_assoc($res)){
			$data[]=$arr;
		}
	}	
	//print_r($data);
	//$phone=$data[0]['goods_name'];
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<title>Document</title>
</head>
<style>
	p:hover{
		color: red;
	}
</style>
<body>
<?php
	foreach($data as $k=>$v){	
?>
<p>
	<?php echo '<a href="in.php?tid='.$k.'">'.$data[$k]['goods_name'].'</a>' ?>
</p>

<?php
}	
?>
	<a href=""></a>
</body>
</html>