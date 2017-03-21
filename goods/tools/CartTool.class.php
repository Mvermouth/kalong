<?php
/**
 * Created by PhpStorm.
 * User: LL
 * Date: 2017/3/20
 * Time: 20:03
 * 购物车类
 */
//只能有一个事例 session+单例
//功能分析：判断商品在否，增删改差 商品数量+1-1

//依赖session必须要session start！！
session_start();
class CartTool{
    private static $inc=null;
    private $items=array();
    //public $sign=0;
    final protected function __construct(){
        //防止篡改之类的
        //test
        //$this->sign=mt_rand(100000,999999);
    }
    final protected function __clone(){
        //
    }

    //单例
    protected static function getInc(){
        if(!(self::$inc instanceof self)){
            self::$inc=new self();
        }
        return self::$inc;
    }
    //把购物车单例放到session里
    public static function getCart(){
        if(!isset($_SESSION['cart']) || !($_SESSION['cart']) instanceof self){
            $_SESSION['cart']=self::getInc();
        }
        return $_SESSION['cart'];
    }
    //添加商品
    public function upCart($id,$goods_name,$shop_price,$num=1){
        $item=array();
        $item['name']=$goods_name;
        $item['price']=$shop_price;
        $item['num']=$num;
        $this->items[$id]=$item;
    }
    //修改数量
    //$id是商品主键
    public function modNum($id,$num=1){
        if(!$this->haveitem($id)){
            return false;
        }
        $this->items[$id]['num']=$num;
    }
    //商品数量增加一
    public function incNum($id){
        if($this->haveitem($id)){
            $this->items[$id]['num']+=1;
        }
    }
    //-1
    public function incNum($id){
        if($this->haveitem($id)){
            $this->items[$id]['num']-=1;
        }
        //if is 0 从购物车删除
        if($this->items[$id]['num']<1){
            $this->delItem($id);
        }

    }
    //删除
    public function delItem($id){
        unset($this->items[$id]);
    }





    //判断是商品是否存在
    public function haveitem($id){
        return array_key_exists($id,$this->items);
    }
    //购物车商品种类
    public function getInt(){
        return count($this->items);
    }

    //清空购物车
    public function clear(){
        //$_SESSION['cart']=array();
        $this->items=array();
    }
}
//CartTool::upCart(1,'kk',23.4,1);
//print_r(CartTool::getCart());
$car=CartTool::getCart();
if($_GET['test']=='add'){
    $car->upCart(1,'kk',23.4,1);
    echo 'ok';
}else if($_GET['test']=='cle'){
    $car->clear();
}else{
    print_r($car);
}