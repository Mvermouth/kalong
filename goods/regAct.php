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
include('./include/init.php');
$use=new UserModel();
$use->getdesc();
$use->_facade();
//print_r($res);
print_r($_POST);
echo '<hr/>';
$data=$_POST;
$data['redtime']=time();
print_r($data=$use->_facade($data));
if($use->add($data)){
    echo '注册成功';
}else{
    echo '注册失败';
    return false;
}