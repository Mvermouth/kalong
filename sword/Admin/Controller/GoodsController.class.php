<?php
namespace Admin\Controller;
use Think\Controller;
class GoodsController extends Controller {
    public $goodsM;
    public function __construct(){
        parent::__construct();
        $this->goodsM=D('Goods');
    }

    public function goodsadd(){
        if(IS_POST){
            //$this->goodsM->field('goods_name,goods_sn');
            if(!$res=$this->goodsM->field('goods_name,goods_sn')->create()){//只可以通过2个
                echo $this->goodsM->getError();
                exit('no');
            }else{
                if($this->goodsM->add($res)){
                    $this->redirect('Admin/Goods/goodsadd');
                }
            }
        }
        $this->display();
    }
    public function goodslist(){
        $this->assign('goodslist',$this->goodsM->select());
        $this->display();
    }
}