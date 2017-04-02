<?php
namespace Home\Controller;
use Think\Controller;
class CatController extends Controller {
    public function cat(){
        $goodsM=D('Admin/Goods');
        $count= $goodsM->where('cat_id='.I('cat_id'))->count();
        $Page       = new \Think\Page($count,2);
        $show       = $Page->show();// 分页显示输出
        //print_r(I('p'));exit;
//        if(!I('p')){
//            $this->redirect('Home/Cat/cat/cat_id/'.I('cat_id'), array('p' => 1));
//        }
        $catM=D('Admin/Cat');
        //左侧导航
        $this->assign('tree',$catM->gettree());
        //商品列表
        $this->assign('goodslist',$goodsM->where('cat_id='.I('cat_id'))->limit($Page->firstRow.','.$Page->listRows)->select());
        //分页
        $this->assign('page',$show);
        $this->assign('count',$count);
        //print_r($goodsM->where('cat_id='.I('cat_id'))->limit($Page->firstRow.','.$Page->listRows)->select());
        $this->display();
    }
}