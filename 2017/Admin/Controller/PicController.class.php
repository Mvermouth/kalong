<?php
namespace Admin\Controller;
use Think\Controller;
class PicController extends Controller {
    public function picadd(){
        session(array());
        if(session('name') && session('name')=='vip' ){
        }else{
            exit('sb');
        }
        $picM=D('Admin/Pic');
        $tcM=D('Admin/Tc');
        $this->assign('tctree',$tcM->getTree());
        $this->assign(areaTree,$tcM->areaTree());
        if(IS_POST){
            //$this->goodsM->field('goods_name,goods_sn');
            //if(!$res=$this->goodsM->field('goods_name,goods_sn')->create()){//只可以通过2个
            if(!$picM->create()){
                echo $picM->getError();
                exit('no');
            }else{
                $upload = new \Think\Upload();// 实例化上传类
                $upload->maxSize   =     3145728 ;// 设置附件上传大小
                $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
                $upload->rootPath  =     './Public/Upload/'; // 设置附件上传根目录
                $upload->savePath  =     ''; // 设置附件上传（子）目录
                // 上传文件
                $info   =   $upload->upload();
                //print_r($info);
                if(!$info) {// 上传错误提示错误信息
                    $this->error($upload->getError());
                }else{// 上传成功
//                    $this->success('上传成功！');
                    $image = new \Think\Image();
                    $img_name=$info['img_path']['savepath'].$info['img_path']['savename'];
                    $img_path='./Public/Upload/'.$info['img_path']['savepath'].$info['img_path']['savename'];
                    //$thumb_img='./Public/Upload/thumb/'.$info['img_path']['savename'];
                    $image->open($img_path);
                    //exit;
                    // 按照原图的比例生成一个最大为150*150的缩略图并保存为thumb.jpg
                    //$image->thumb(200, 200)->save($thumb_img);
                    //exit;
                    $_POST['img_path']=$img_path;
                    //print_r($_POST);
                    //$res['thumb_img']=$thumb_img;
                    //print_r($res);
//                    $this->goodsM->img_path=$img_path;
                }
//exit;
                if($picM->add($_POST)){
                    $this->redirect('Admin/Pic/picadd');
                }
            }
        }
        $this->display();
    }
}