<?php
namespace Admin\Controller;
use Think\Controller;
class CatController extends Controller {
    public function cateadd(){
        $catM=D('Cat');
        $this->assign('gettree',$catM->gettree());
        if(IS_POST){
            if($catM->add($_POST)){
                $this->redirect('Admin/Cat/catelist');
            }
        }
        $this->display();
    }
    public function cateedit(){
        $catM=D('Cat');
        $this->assign('catinfo',$catM->find(I('cat_id')));
        $this->assign('gettree',$catM->gettree());
        if(IS_POST){
            if($catM->save($_POST)){
                $this->redirect('Admin/Cat/catelist');
            }
        }
        //IS_POST ? $catM->save($_POST) : '';
        $this->display();
    }
    public function catelist(){
        $catM=D('Cat');
        $cat=$catM->select();
        if($cat){
            $this->assign('catlist',$cat);
        }
        $this->display();
    }
    public function catedel(){
        $catM=D('Cat');
        if($catM->delete(I('cat_id'))) {
            $this->redirect('Admin/Cat/catelist');
        }
        $this->display();
    }
}