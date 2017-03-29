<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/3/29
 * Time: 13:53
 * user控制器
 */
namespace Home\Controller;
use Think\Controller;
class UserController extends Controller{
    public function add(){//一个方法对应一个Html文件 方法名对HTML名
        //echo "i am add";
        $a=123;
        $this->assign('a',$a);
        $this->display();
        //echo 1;
    }
    public function User(){
        $b = D('User');//区分大小写
        $b->User();
        //$b->add(['name'=>'kallll','age'=>'102']);//面向过程
//        $b->name='po';//对象的
//        $b->age='23';
//        $b->add();
    }
    public function cha(){
        $c=D('User');
        var_dump($c->where('name="kal"')->order('uid asc')->select());
    }
    public function gai(){
        $g=D('User');
        $g->where('name="kal"')->find();
        $g->name='test';
        $g->save();
    }
    public function shan(){
        $s=D('User');
        $s->where('name="ct"')->delete();
    }
}