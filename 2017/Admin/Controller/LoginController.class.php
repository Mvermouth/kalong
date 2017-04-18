<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/4/18
 * Time: 16:49
 */
namespace Admin\Controller;
use Think\Controller;
class LoginController extends Controller{
    public function login(){
        $vipM=D('Admin/Vip');
        if(IS_POST){
          if($vipM->where('u_name="'.I('u_name').'"and pass="'.I('pass').'"')->select()){
                session(array('name'=>'session_id','expire'=>10));
                session('name','vip');
                $this->redirect('Admin/Index/index');
          }else{
              exit('gun');
          }
        }
        $this->display();
    }
}