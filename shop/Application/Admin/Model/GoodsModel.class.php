<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/3/30
 * Time: 11:08
 */
namespace Admin\Model;
use Think\Model;
class GoodsModel extends Model{
    public function Goods(){//表名
      $gs=$this->field('goods_name,goods_id,shop_price')->order('goods_id desc')->limit(0,5)->select();
      return $gs;
    }
}