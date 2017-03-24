<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/3/18
 * Time: 14:25
 */
define('ACC',true);
require('./include/init.php');
session_start();
header("Content-type: text/html; charset=utf8");
//取出树状导航，面包屑导航
//栏目下的商品
$cat_id=$_GET['cat_id'];
//分页
$page_id=isset($_GET['page']) ? $_GET['page']+0 : 1;
if($page_id < 1 ){
    $page_id=1;
}
//每页2个
$perpage=2;
$offer=($page_id-1)*$perpage;


if(empty($cat_id)){
    echo "cat_id 不存在";
    header('location:index.php');
    exit;
}
$cats=new catModel();
$goods=new goodsModel();
$catAll=$cats->select();
//if(in_array($cat_id,$catAll['cat_id'])){
//    echo "cat_id 不存在";
//    exit;
//}
$categoryAll=$cats->find($cat_id);
if(!$categoryAll){
    echo "商品不存在";
    header('location:index.php');
    exit;
}
//print_r($categoryAll);
//导航
$sort=$cats->getcatTree($catAll,0,0);
//面包屑
$nav=array_reverse($cats->gettree($cat_id));
//商品
$goodslist=$goods->getTarget($cat_id,$offer,$perpage);
//exit;
$cat=new catModel();
$catlist=$cat->getcatTree($cat->select(),0,0);


include (ROOT.'./view/front/lanmu.html');