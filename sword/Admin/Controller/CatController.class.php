<?php
namespace Admin\Controller;
use Think\Controller;
class CatController extends Controller {
    public function cateadd(){
        $catM=D('Cat');
        if(IS_POST){
            echo 1;
            print_r($_POST);
            $catM->add($_POST);
            // exit;
        }else{
            echo 2;
            //exit;
        }
        $this->display();
    }
    public function cateedit(){
        $this->display();
    }
    public function catelist(){
        $this->display();
    }
}