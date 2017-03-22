<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/3/22
 * Time: 9:56
 * 购物车流程页面，商城核心功能;
 */
define('ACC',true);
require('./include/init.php');
header("Content-type: text/html; charset=utf8");
session_start();
//地址栏上的参数=事件！

//if(!isset($_GET['act'])){
//
//}

//设置一个动作参数判断用户想干嘛
$act = isset($_GET['act']) ? $_GET['act'] : 'buy';

//事例工具
$cart=CartTool::getCart();
$goods=new goodsModel();
if($act=='buy'){//我认为你想买东西
    $goods_id = isset($_GET['goods_id']) ? $_GET['goods_id']+0 : 0;
    $num = isset($_GET['num']) ? $_GET['num'] : 1;

    if($goods_id){//if is true ,add to cart
        $g=$goods->find($goods_id);
        //丢到购物车里
        if(!empty($g)){
            $cart->upCart($goods_id,$g['goods_name'],$g['shop_price'],$num);
        }
//       if($cart->upCart($goods_id,$g['goods_name'],$g['shop_price'],$num)){
//                echo 'ok';
//               print_r($cart->getAllGoods());
//                echo "<hr/>";
//                echo $cart->getNum();
//                echo "<hr/>";
//                echo $cart->getMon();
//                echo "<hr/>";
//                echo $cart->getInt();
//       }else{
//           echo 'no';
//           echo "<hr/>";
//           print_r($cart);
//       }

    }
    print_r($allItems=$cart->getAllGoods());
    echo "<hr/>";
    print_r($items=$goods->getCartGoods($allItems));
//    print_r($item=$goods->getCartGoods($allItems));
//    foreach ($allItems as $k=>$v){
//       foreach ($item as $kk=>$vv){
//           if($k==$vv['goods_id']){
//               $allItems[$k]+=$vv;
//           }
//       }
//    }
    echo "<hr/>";
//    print_r($allItems);
//    foreach ($items as $k=>$v){
//        foreach ($allItems as $kk=>$vv){
//            if($kk==$v['goods_id']){
//                $items[$k]+=$vv['num'];
//           }
//        }
//    }
    //print_r($items);
    echo "<hr/>";
    print_r($total=$cart->getMon());
    $market_total=0;
    foreach ($items as $v){
        $market_total+=$v['market_price'];
    }
    echo "<hr/>";
    print_r($market_total);
    $discount=$market_total-$total;
    //print_r($allItems['price']);
    //$total=array_sum($allItems['price']);
    //exit;
    include (ROOT.'./view/front/jiesuan.html');
    exit;
}
//echo "<hr/>";
//print_r($cart->getAllGoods());
//echo "<hr/>";
//echo $cart->getNum();
//echo "<hr/>";
//echo $cart->getMon();
//echo "<hr/>";
//echo $cart->getInt();



//include (ROOT.'./view/front/jiesuan.html');