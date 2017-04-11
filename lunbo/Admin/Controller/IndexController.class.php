<?php
namespace Admin\Controller;

use Think\Controller;

class IndexController extends Controller{
    public function index(){
        //print_r($_POST);
        $this->display();
    }

    public function picAdd(){
        $PicM = D('Admin/Pic');
        if (IS_POST) {
            $upload = new \Think\Upload();// 实例化上传类
            $upload->maxSize = 3145728;// 设置附件上传大小
            $upload->exts = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
            $upload->rootPath = './Public/Upload/'; // 设置附件上传根目录
            $upload->savePath = ''; // 设置附件上传（子）目录
            // 上传文件
            $info = $upload->upload();
            if (!$info) {// 上传错误提示错误信息
                $this->error($upload->getError());
            } else {// 上传成功
                //$image = new \Think\Image();
                $img_path = './Public/Upload/' . $info['img_path']['savepath'] . $info['img_path']['savename'];
                $PicM->img_path= $img_path;
                if($PicM->add()){
                    $this->redirect('Admin/Index/piclist');
                }
            }
        }
    }

    public function piclist(){
        $PicM = D('Admin/Pic');
        //print_r($PicM->where('is_on=1')->select());
        $this->assign('piclist',$PicM->where('is_on=1')->select());
        $this->display();
    }
    public function picDel(){
        $PicM = D('Admin/Pic');
        if(I('pic_id')){
            $PicM->find(I('pic_id'));
            $PicM->is_on=0;
            if($PicM->save()){
                $this->redirect('Admin/Index/piclist');
            }
        }
    }
}