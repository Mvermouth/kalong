<?php
	$path='./';
	//print_r($_SERVER["REQUEST_URI"]);
	$url=$_SERVER["REQUEST_URI"];
	//print_r($url);
	if(isset($_GET["dir"])){
		$path=$path.'./'.$_GET["dir"]."/";
	}else{
		$url=$url."?dir=";
	}
	
	$dh=opendir($path);
	if($dh===false){
		echo "打开失败";
		exit;
	}
	realpath($path);
	echo $path;
	$list=array();
	//$item=readdir($dh);
	while(($item=readdir($dh))!==false){
		$list[]=$item;
		//var_dump($list);
	}	
	//print_r($list);
	closedir($dh);
?>



<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<title>Document</title>
</head>
<style>
	table{
		border:1px solid red;
	}
	td{
		width: 100px;
		height: 26px;
		border: 1px solid black;
	}
</style>
<body>
	<h1>文件管理工具</h1>
	<table>
		<tr>
			<td>序号</td>
			<td>文件名</td>
			<td>操作</td>
		</tr>
		<?php
			foreach($list as $k=>$v){
		?>
		<tr>
			
			<td><?php echo $k ?></td>
			
			<td><?php echo $v ?></td>
			<td><?php 
					if(is_dir($path.'./'.$v)===true){
						echo '<a href="'.$url."/".$v.'">浏览</a>';					
					}else {
						echo '<a href="'.$path.$v.'">查看</a>';	
					}
				 ?></td>
		</tr>
		<?php
			}	
		?>
		
	</table>
</body>
</html>