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
}
print_r(CartTool::getCart());