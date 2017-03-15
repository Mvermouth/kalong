<?php
define('ACC',true);
require("../include/init.php");
$goods_id=$_GET['goods_id']+0;
//print_r($_GET['goods_id']+0);
$goods=new goodsModel();
$goodsinfor=$goods->find($goods_id);
//$goodsimg=$goods->find($goods_id);
//print_r($goodsinfor);

include(ROOT.'view/admin/templates/goodsinfo.html');
?>