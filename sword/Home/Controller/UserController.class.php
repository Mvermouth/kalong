<?php
namespace Home\Controller;
use Think\Controller;
class UserController extends Controller {
    //登陆
    public function login(){
        if(IS_POST){
            $usename=I('post.usename');
            $password=I('post.password');
            $UserM=D('User');
            //验证验证码
            $Verify = new \Think\Verify();
            if(!$Verify->check(I('post.code'))){
                $this->error('验证码错误');
            }
            $useinfo=$UserM->where(['usename'=>$usename])->find();
            if(!$useinfo){
                $this->error('没有这个人');
            }
            if(md5($password.$useinfo['salt'])!==$useinfo['password']){
                $this->error('密码错误');
            }else{//设置cookie
                cookie('useid',$useinfo['password']);
                cookie('usename',$useinfo['usename']);
                //加密对照;
                $COK=encrypt($useinfo['usename'].$useinfo['password'].C('COO_KIE'));
                cookie('key',$COK);
                $this->success('登陆成功',U('Home/Index/index'));
            }
        }
//        $Verify = new \Think\Verify();
//        $Verify->entry();
        $this->display();
    }
    //生成验证码
    public function code(){
            ob_clean();
        $config =    array(
            'fontSize'    =>    30,    // 验证码字体大小
            'length'      =>    4,     // 验证码位数
            'useNoise'    =>    false, // 关闭验证码杂点
            'imageH'=>100,
            'expire'=>180,
        );
        $Verify = new \Think\Verify($config);
        $Verify->entry();
    }
    public function msg(){
        $this->display();
    }
    //注册
    public function reg(){
        $UserM=D('User');
        if(IS_POST){
            if (!$UserM->create()){//自动把数据丢给属性字段
                // 如果创建失败 表示验证没有通过 输出错误提示信息
                exit($UserM->getError());
            }else{
                // 验证通过 可以进行其他数据操作
                $s=$this->salt();
                $UserM->salt=$s;
                $UserM->password=md5($UserM->password.$s);
                //exit;
                $UserM->add();
            }
        }

        $this->display();
    }
    public function salt(){
        $str='abcdefghijllmnopqr-stuvwxyz123456789*%#0';
        return substr(str_shuffle($str),0,8);
    }
}