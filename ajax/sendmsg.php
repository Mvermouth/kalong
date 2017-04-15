<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/4/14
 * Time: 16:10
 */
require ('./conn.php');
if($_POST){
   $res=$_POST['res'];
   $pos=$_COOKIE['use'];
   $content=$_POST['content'];
}
$sql="insert into msg (res,pos,content) values ('".$res."','".$pos."','".$content."')";
echo $mysqli->query($sql) ? 'ok' :'no ok';
