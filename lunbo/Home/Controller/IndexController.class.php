<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
        $PicM=D('Admin/Pic');
        $p=$PicM->where('is_on=1')->order('pic_id desc')->limit(0,4)->select();
        //print_r($p);
        $num=1;
        $pp=[];
//        echo '<hr/>';
        foreach($p as $v){
            $v['num']=$num;
            $pp[]=$v;
            $num++;
            //print_r($v);
        }
//        echo '<hr/>';
//        print_r($p);
//        echo '<hr/>';
//        print_r($pp);
//        exit;
        $this->assign('pict',$pp);
        $this->display();
    }
}