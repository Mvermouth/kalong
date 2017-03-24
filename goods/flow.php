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
$allItems=$cart->getAllGoods();
$cat=new catModel();
$catlist=$cat->getcatTree($cat->select(),0,0);

if($act=='buy'){//我认为你想买东西
    $goods_id = isset($_GET['goods_id']) ? $_GET['goods_id']+0 : 0;
    $num = isset($_GET['num']) ? $_GET['num'] : 1;

    if($goods_id){//if is true ,add to cart
        $g=$goods->find($goods_id);
        //丢到购物车里
        if(!empty($g)){
            $cart->upCart($goods_id,$g['goods_name'],$g['shop_price'],$num);
        }
        //如果已经下家
        if($g['is_delete']==1||$g['is_on_sale']==0){
            $msg="这个商品不能购买";
            include (ROOT.'./view/front/msg.html');
            exit;
        }

        //如果库存不够
        if($g['goods_number'] < $allItems[$goods_id]['num']){
            $cart->itemMax($goods_id,$g['goods_number']);
            $msg='库存不够拉';
            include (ROOT.'./view/front/msg.html');
            exit;
        }

    }
    $allItems=$cart->getAllGoods();
    if(empty($allItems)){
        header('location:index.php');
    }
    //得到商品信息
    $items=$goods->getCartGoods($allItems);

    //价格
    $total=$cart->getMon();
    $market_total=0;
    foreach ($items as $v){
        $market_total+=$v['market_price']*$v['num'];
    }
    $discount=$market_total-$total;
    //exit;
    include (ROOT.'./view/front/jiesuan.html');
    exit;
}else if($_GET['act']=='clear'){
    $cart->clearCart();
    $msg='已经清空';
    include (ROOT.'./view/front/msg.html');
    exit;
}else if($_GET['act']=='tijiao'){
    $allItems=$cart->getAllGoods();
    if(empty($allItems)){
        header('location:index.php');
    }
    //得到商品信息
    $items=$goods->getCartGoods($allItems);
    //print_r($items);
    //价格
    $total=$cart->getMon();
    $market_total=0;
    foreach ($items as $v){
        $market_total+=$v['market_price']*$v['num'];
    }
    $discount=$market_total-$total;
    include (ROOT.'./view/front/tijiao.html');
    exit;
}else if($act=='done'){//important
    //从表单读取送货地址，手机等信息
    //从购物车读取商品信息         然后gezi写入各表
    //
    //print_r($_POST);
    $data=$_POST;
    //写入时间
    $data['add_time']=time();
    $oi=new OiModel();
    if(!$oi->_validate($data)){//验证信息是否合法
        $msg=implode(',',$oi->getErr());
        include (ROOT.'./view/front/msg.html');
        exit;
    }
    //写入总金额
    $data['order_money']=$cart->getMon();
    $order_money=$cart->getMon();
    //写入order_sn
    $order_sn=$oi->getOrderSn();
    $data['order_sn']=$order_sn;
    //用户名写入
    $data['use_id']=isset($_SESSION['use_id']) ? $_SESSION['use_id'] :0;
    $data['usename']=isset($_SESSION['usename']) ? $_SESSION['usename'] :0;
    //商品过虐
    $oi->getdesc();
    $res=$oi->_facade($data);
    if(!$oi->add($res)){
        $msg='写入失败';
        include (ROOT.'./view/front/msg.html');
        exit;
    }
    $order_id=$oi->insert_id();
   //echo '写入1陈功';
    //写入详细商品表
    $allItems=$cart->getAllGoods();//得到所有商品
    $og=new OgModel();
    $cnt=0;
    foreach($allItems as $k=>$v){
        $data=array();



        $data['order_id']=$order_id;
        $data['order_sn']=$order_sn;
        $data['goods_name']=$v['name'];
        $data['goods_id']=$k;
        $data['goods_number']=$v['num'];
        $data['shop_price']=$v['price'];
        $data['subtotal']=$v['num']*$v['price'];
//        print_r($data);
//        echo '<hr/>';
//        echo '<hr/>';
//        echo '<hr/>';
        if($og->addOg($data)){
            $cnt++;
        }


        //商品数量减少 库存要清空
    }
//    echo '<hr/>';
//    echo $cnt;
//    echo '<hr/>';
//    echo count($allItems);
//    echo '<hr/>';
    if($cnt!==count($allItems)){//如果不是全部成功就撤销订单
        $oi->invoke($order_id);
        $msg="订单入库失败";
        include (ROOT.'./view/front/msg.html');
        exit;
    }
    $cart->clearCart();
    //$msg="订单写入陈功";
//    $cat=new catModel();
//    $catlist=$cat->getcatTree($cat->select(),0,0);
    include (ROOT.'./view/front/order.html');
    exit;
}
