<?php
namespace Home\Controller;
use Think\Controller;
class GoodsController extends Controller {
    public function goods(){
        $goodsM=D('Admin/Goods');
        if(!I('goods_id')){//如果丢进去的id为空的话直接跳回首页
            redirect(U('Home/Index/index'));
            exit;
        }else{
            $goodsInfo=$goodsM->find(I('goods_id'));
        }
        //print_r($goodsInfo['cat_id']);exit;
        $this->his($goodsInfo);
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
    //历史记录
    protected function his($row){
        if(isset($row['goods_name'])) {//有时会丢个空的进去不明所以，所以做个判断
            $history = session('?history') ? session('history') : array();
            if(isset($history[$row['goods_id']])){
                unset($history[$row['goods_id']]);
            }
            $g = array();
            $g['goods_name'] = $row['goods_name'];
            $g['shop_price'] = $row['shop_price'];
            $history[$row['goods_id']] = $g;//因为是键值，所以不会重复！
            if (count($history) > 5) {
                $key = key($history);
                unset($history[$key]);
            }

//        if(empty($history[$key]['goods_name'])){
//            unset($history[$key]);
//        }
            session('history',$history);
        }
    }
    //购物车
    public function car(){
        $goodsInfo=D('Admin/Goods')->where('goods_id='.I('goods_id'))->find();
        $carT=\Home\Tool\CartTool::getIns();
        $carT->add($goodsInfo['goods_id'],$goodsInfo['goods_name'],$goodsInfo['shop_price']);
        //var_dump($carT->item);
        //echo '<hr/>';
        //var_dump(session('kaka'));
       $this->redirect('Home/Order/checkout','添加成功');
    }
}