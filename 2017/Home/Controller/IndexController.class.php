<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
        $picM=D('Admin/Pic');
        $this->assign('banner',$picM->where('is_on=1 and tc_id=1 and area_id=1')->order('pic_id desc')->limit(0,3)->select());
        $this->assign('new',$picM->where('is_on=1 and tc_id=2 and area_id=2')->order('pic_id desc')->limit(0,10)->select());
        $this->display();
    }
}