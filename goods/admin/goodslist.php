<?php
define('ACC',true);
include('../include/init.php');
//实例化goodmodel
//拿出数据丢丢丢
$goods=new goodsModel();
$goodslist=$goods->getgoods();
//print_r($goodslist);



include(ROOT.'view/admin/templates/goodslist.html');
?>