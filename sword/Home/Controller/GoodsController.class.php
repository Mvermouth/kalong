<?php
namespace Home\Controller;
use Think\Controller;
class GoodsController extends Controller {
    public function goods(){
        $goodsM=D('Admin/Goods');
        $goodsInfo=$goodsM->find(I('goods_id'));
        //print_r($goodsInfo['cat_id']);exit;
        $fm=$this->bread($goodsInfo['cat_id']);
        //print_r($fm);exit;
        $this->assign('goodsinfo',$goodsInfo);
        $this->assign('mbx',$fm);
        $this->display();
    }
    public function bread($id){
        //print_r($id);
        $catM=D('Admin/Cat');
        //print_r($catM->select());
        $fm=array();
        while ($id>0){
            foreach($catM->select() as $k=>$v){
                if($id=$v['cat_id']){
                    $fm[]=$v;
                    $id=$v['parent_id'];
                    break;
                }
            }
        }
        return $fm;
    }
}