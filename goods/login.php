<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/3/17
 * Time: 9:44
 */

define('ACC',true);
require ('./include/init.php');
header("Content-type: text/html; charset=utf8");
$cat=new catModel();
$catlist=$cat->getcatTree($cat->select(),0,0);
if(isset($_POST['act'])){
    $u=$_POST['usename'];
    $p=$_POST['password'];
    //验证
    $user=new UserModel();
    $row=$user->chenkUsename($u,$p);
    if(empty($row)){
        $msg='帐号密码错误';
        include (ROOT.'./view/front/msg.html');
    }else{
        $msg='登陆成功';
        session_start();
        $_SESSION=$row;
        if(isset($_POST['remember'])){
            setcookie('remuser',$u,time()+48*3600);
            //$rem=$u;
        }else{
            //$rem='';
            setcookie('remuser','',0);
        }
        //setcookie('remuser',$rem,time()+48*3600);
        include (ROOT.'./view/front/msg.html');
    }
    exit;
}else{
    if(isset($_COOKIE['remuser'])){
        $rem=$_COOKIE['remuser'];
    }else{
        $rem='';
    }
    include (ROOT.'./view/front/denglu.html');
}


