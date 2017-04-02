<?php
namespace Home\Controller;
use Think\Controller;
class UserController extends Controller {
    public function login(){
        $this->display();
    }
    public function msg(){
        $this->display();
    }
    public function reg(){
        $UserM=D('User');
        if(IS_POST){
            if (!$UserM->create()){
                // 如果创建失败 表示验证没有通过 输出错误提示信息
                exit($UserM->getError());
            }else{
                // 验证通过 可以进行其他数据操作
                $UserM->add();
            }
        }

        $this->display();
    }
}