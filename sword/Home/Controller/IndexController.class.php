<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
        $catM=D('Admin/Cat');
        $goodsM=D('Admin/Goods');
        $this->assign('tree',$catM->gettree());
        //热销
        $this->assign('glist',$goodsM->where("is_hot=1")->order('goods_id desc')->limit('0,4')->select());
        $this->display();
    }
}