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
$cats=new catModel();
$goods=new goodsModel();
//栏目下的商品
$cat_id=$_GET['cat_id'];
//每页2个
$perpage=2;
//当前页
$page_id=isset($_GET['page']) ? $_GET['page']+0 : 1;
$durpage=$page_id;
//一共几条
$total=$goods->getCatList($cat_id);
//print_r($total);
//exit;
//echo $total;
$pagenav=new PageTool($total,$perpage,$durpage);

//取出树状导航，面包屑导航

//分页

if($page_id < 1 ){
    $page_id=1;
}
//一共多少页
$pagenum=ceil($total/$perpage);
//echo "<hr/>";
//echo $pagenum."ye";
//echo "<hr/>";
//echo $page_id."id";
if($page_id > $pagenum ){
    $page_id=1;
}


$offer=($page_id-1)*$perpage;
$navb=$pagenav->show();
//echo $cnt;

if(empty($cat_id)){
    echo "cat_id 不存在";
    header('location:index.php');
    exit;
}

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