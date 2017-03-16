<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/3/16
 * Time: 14:09
 * cookie浏览历史
 */
//echo $_SERVER['HTTP_COOKIE'];
$url=$_SERVER['REQUEST_URI'];
$id=isset($_GET['id']) ? $_GET['id'] : 0;
echo '<hr/>';
echo $id;
//$url要放在数组 但是cook不能放数组
//$a=array('ef','ve');
//print_r($a);
//$b=implode('|',$a);
//print_r($b);
//print_r(explode('|',$b));
if(!isset($_COOKIE['hist'])){//第一次
    $his[]=$url;
}else{//多次之后
    //echo $_COOKIE['hist'];
    $his=explode('|',$_COOKIE['hist']);
    array_unshift($his,$url);
    $his=array_unique($his);
    if(count($his)>10){
        array_pop($his);
    }
}
setcookie('hist',implode('|',$his));
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<p><a href="cookiehistory.php?id=<?php echo $id-1; ?>" >上一页</a><p/>
<p><a href="cookiehistory.php?id=<?php echo $id+1; ?>" >下一页</a><p/>
<ul>
    <li>浏览历史</li>
    <?php foreach ($his as $v){?>
        <li><?php echo $v; ?></li>
    <?php } ?>
</ul>
</body>
</html>
