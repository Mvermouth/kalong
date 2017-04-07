<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/4/7
 * Time: 9:32
 */
namespace Home\Tool;
/*
 * 抽象类
 * 1增加 减少
 * 2删除
 * 3物品数量
 * 4种类数
 * 5总价
 * 6计算清空
 *
 * */
abstract class ACartTool{
    //增加
    abstract public function add($goods_id,$goods_name,$shop_price);
    //减少 如果-到0则删除
    abstract public function decr($goods_id);
    //删除某个商品
    abstract public function del($goods_id);
    //shangpin数量 return array
    abstract public function items();
    //种类数 return int
    abstract public function  calcType();
    //商品个数
    abstract public function calcCnt();
    //总计
    abstract public function allMoney();
    //clear
    abstract public function clear();
}

class CartTool extends ACartTool{
    public $item=[];
    //静态属性
    public static $ins=null;
    //单例要保护起来 不能继承
    final protected function __construct(){
        $this->item=session('?kaka') ? session('kaka') : [];
    }
    final protected function __clone(){

    }

    //单例模式
    public static function getIns(){
        if(self::$ins===null){
            self::$ins=new self();
        }
        return self::$ins;
    }

    //增加
    public function add($goods_id,$goods_name,$shop_price){
        if(isset($this->item[$goods_id])){
            $this->item[$goods_id]['num'] += 1;
        }else{
            $goods=[];
            $goods['goods_name']=$goods_name;
            $goods['shop_price']=$shop_price;
            $goods['num']=1;
            $this->item[$goods_id]=$goods;
        }
    }
    //减少 如果-到0则删除
    public function decr($goods_id){
        if(isset($this->item[$goods_id])){
            $this->item[$goods_id]['num'] -= 1;
        }
        if($this->item[$goods_id]['num']==0){
            $this->del($goods_id);
        }
    }
    //删除某个商品
    public function del($goods_id){
        unset($this->item[$goods_id]);
    }
    //列出购物车所有商品 return array
    public function items(){
        return $this->item;
    }
    //种类数 return int
    public function  calcType(){
        return count($this->item);
    }
    //商品个数
    public function calcCnt(){
        $n=0;
        foreach($this->item as $k=>$v){
            $n+=$v['num'];
        }
        return $n;
    }
    //总计
    public function allMoney(){
        $n=0;
        foreach($this->item as $k=>$v){
            $n+=($v['num']*$v['shop_price']);
        }
        return $n;
    }
    //clear
    public function clear(){
        $this->item=[];
    }
    public function __destruct(){
       session('kaka',$this->item);
    }
}