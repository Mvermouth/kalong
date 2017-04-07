<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/4/7
 * Time: 15:05
 */
namespace Home\Model;
use Think\Model;
class OrderinfoModel extends Model{
    //自动完成
    protected  $_auto =array(
        //array(完成字段1,完成规则,[完成条件,附加规则]),
        array('add_time','time',3,'function'),
    );
    public function getSn(){
        $OiM=D('Orderinfo');
        return $OiM->where('order_sn='.date('Ymd').mt_rand(1000,9999)) ? date('Ymd').mt_rand(1000,9999) : $this->getSn();
        //return $goodsM->where('goods_sn='.date('Ymd').mt_rand(10000,99999)) ? date('Ymd').mt_rand(10000,99999): $this->getGoodsSn();
        //return $order_sn;
    }
}