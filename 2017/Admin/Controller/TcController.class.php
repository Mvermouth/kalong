<?php
namespace Admin\Controller;
use Think\Controller;
class TcController extends Controller {
    public function tcadd(){
//        print_r($_POST);
//        $this->display();
//        exit;
        $tcM=D('Admin/Tc');
        $this->assign(tctree,$tcM->getTree());
        $this->assign(areaTree,$tcM->areaTree());
        if(IS_POST){
            if(!$tcM->create()){
                echo $tcM->getError();
                exit;
            }else{
                if($tcM->add()){
                    $this->redirect('Admin/Tc/tcadd');
                }
            }
        }
        $this->display();
    }
}