<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/3/17
 * Time: 14:53
 */

define('ACC',true);
require ('./include/init.php');
session_start();
session_destroy();
$cat=new catModel();
$catlist=$cat->getcatTree($cat->select(),0,0);
$msg="退出成功";
include (ROOT.'./view/front/msg.html');
