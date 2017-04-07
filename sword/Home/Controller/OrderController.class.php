<?php
namespace Home\Controller;
use Think\Controller;
class OrderController extends Controller {
    public function checkout(){
        $this->assign('kache',session('kaka'));
        $carT=\Home\Tool\CartTool::getIns();
        $this->assign('allMoney',$carT->allMoney());
        $this->display();
    }
    public function done(){
        $carT=\Home\Tool\CartTool::getIns();
        $goodsM=D('Admin/Goods');
        $OgM=D('Home/Ordergoods');
        $OiM=D('Orderinfo');
        //var_dump($OiM->getSn());
        //随机sn
        //exit;
        $_POST['order_sn']=$OiM->getSn();
        $_POST['order_money']=$carT->allMoney();
        $this->assign('aMo',$_POST['order_money']);
        $_POST['usename']=cookie('usename') ?  cookie('usename') : 'x';
//        if(!cook('usename')){
//            $_POST['usename']=cook('usename');
//        }
        //$order_id=null;
        //echo 1;
        //$OiM->create() && ($order_id=$OiM->add());
       if(!$OiM->create()){
           echo $OiM->getError();
           exit;
       }
       //echo 2;
       if($res=$OiM->add()){//成功再写入下一个表
           $i=0;
           $Oinfo=$OiM->where('order_id='.$res)->find();
         foreach(session('kaka') as $v){
             $_POST['order_id']=$res;
             $_POST['goods_name']=$v['goods_name'];
             $_POST['goods_number']=$v['num'];
             $_POST['shop_price']=$v['shop_price'];
             $_POST['order_sn']=$Oinfo['order_sn'];
             if(!$OgM->create()){
                 echo $OgM->getError();
                 exit;
             }
             if($OgM->add()){
                 $carT->clear();
                 $i+=1;
             }

         }
       }else{
           exit('no');
       }

//        print_r($carT->item);
//        echo "<hr/>";
//        print_r(session('kaka'));
//        echo "<hr/>";
        //print_r($_POST);
        $this->assign('goods_sn',$Oinfo['order_sn']);
        $this->assign('i',$i);
        $this->display();
    }

}