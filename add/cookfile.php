<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/3/16
 * Time: 11:11
 * cookie完成浏览history
 */
//cookie计数器lian手

//记你来本网站访问了多少页面

//第一次没有cookie信息
header("Content-type: text/html; charset=utf8");
if(!isset($_COOKIE['num'])){
    $num=1;
    setcookie('num',2);
}else{
    $num=$_COOKIE['num'];
    setcookie('num',$num+1);
}
echo '第'.$num.'次';

