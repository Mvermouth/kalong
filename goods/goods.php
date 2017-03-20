<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/3/18
 * Time: 15:56
 */
define('ACC',true);
require('./include/init.php');
session_start();
$goods_id=$_GET['goods_id']+0;
if(!$goods_id){
    echo "goods_id 不存在";
    header('location:index.php');
    exit;
}
$goods=new goodsModel();
//得到商品
//$sql="select * from goods where goods_id=".$goods_id;
if(!$g=$goods->find($goods_id)){
    echo 'kong';
    header('location:index.php');
    exit;
}

//找爸爸
$cat_id=$goods->getDad($goods_id);
//$g=$goods->find($goods_id);
//exit;
$cats=new catModel();
//面包屑
$nav=array_reverse($cats->gettree($cat_id));
//页头下拉
$cat=new catModel();
$catlist=$cat->getcatTree($cat->select(),0,0);


include (ROOT.'./view/front/shangpin.html');