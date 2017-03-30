<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/3/30
 * Time: 10:51
 */
namespace Admin\Controller;
use Think\Controller;
class GoodsController extends Controller {

    public function index(){
        $use=D('Goods');
        $gs=$use->Goods();
        $this->assign('goods',$gs);
        $this->assign('num',5);
        if($_GET) {
            $use->goods_name=$_GET['goods_name'];
            $use->shop_price=$_GET['shop_price'];
          // print_r($use);
            if($use->add()){
                $this->success('新增成功', 'index',1);
                //$this->redirect('Admin/Goods',5, '页面跳转中...');
                echo '1';
                $this->shujv();
            }else{
                echo '2';
            }

            //$a=array();
        }
        $this->display();
    }
    public function Goods(){
        $url=U('Admin/Goods/index');
        $this->assign('url',$url);
        $this->display();
    }
    public function shujv(){
        echo 'i am shujv';
    }
    public function goodsadd(){
        $this->display();
    }
    public function goodslist(){
        $this->display();
    }
}