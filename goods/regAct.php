<?php
/**
 * Created by PhpStorm.
 * User: LL
 * Date: 2017/3/14
 * Time: 20:28
 * 接手用户注册信息
 */
//print_r($_POST);
define('ACC',true);
require('./include/init.php');
//if(!$_POST['usename']){
//
//}
//检查 用户名 email 密码是否正规

$use=new UserModel();
$use->getdesc();
$use->_facade();
//print_r($res);
//print_r($_POST);
//echo '<hr/>';
$data=$_POST;
$data['regtime']=time();
$data['password']=$use->encPassword($_POST['password']);
$data=$use->_facade($data);
if(!$use->_validate($data)){
    print_r($use->getErr());
    $msg="用户帐号密码错误";
    include (ROOT.'./view/front/msg.html');
    exit;
}
if($use->chenkUsename($_POST['usename'])){
    $msg='用户名存在';
    include (ROOT.'./view/front/msg.html');
    exit;
}
if($use->add($data)){
    $msg='注册成功';
}else{
    $msg='注册失败';
    include (ROOT.'./view/front/msg.html');
    exit;
}
include (ROOT.'./view/front/msg.html');