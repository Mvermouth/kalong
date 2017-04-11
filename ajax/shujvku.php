<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/4/10
 * Time: 17:11
 */
$conn=mysql_connect('localhost','root','root');
if(!$conn){
    exit;
}
mysql_select_db('test');
mysql_set_charset('utf-8');
$sql="SELECT name FROM user where name LIKE '%".$_POST['usename']."%' limit 0,3";
//print_r($sql);exit;
$res=mysql_query($sql);
$data=array();
//print_r($res);
if($res&&mysql_num_rows($res)>0){
    while($arr=mysql_fetch_assoc($res)){
        $data[]=$arr;
    }
}
echo json_encode($data);
