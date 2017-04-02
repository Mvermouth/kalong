<?php
namespace Admin\Controller;
use Think\Controller;
class GoodsController extends Controller {
    public $goodsM;
    public function __construct(){
        parent::__construct();
        $this->goodsM=D('Goods');
    }

    public function goodsadd(){
        $catM=D('Admin/Cat');
        $this->assign('gettree',$catM->gettree());
        if(IS_POST){
            //$this->goodsM->field('goods_name,goods_sn');
            //if(!$res=$this->goodsM->field('goods_name,goods_sn')->create()){//只可以通过2个
            if(!$res=$this->goodsM->create()){
                echo $this->goodsM->getError();
                exit('no');
            }else{
                $upload = new \Think\Upload();// 实例化上传类
                $upload->maxSize   =     3145728 ;// 设置附件上传大小
                $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
                $upload->rootPath  =     './Public/Upload/'; // 设置附件上传根目录
                $upload->savePath  =     ''; // 设置附件上传（子）目录
                // 上传文件
                $info   =   $upload->upload();
                if(!$info) {// 上传错误提示错误信息
                    $this->error($upload->getError());
                }else{// 上传成功
//                    $this->success('上传成功！');
                    $image = new \Think\Image();
                    //$img_name=$info['img_path']['savepath'].$info['img_path']['savename'];
                    $img_path='./Public/Upload/'.$info['img_path']['savepath'].$info['img_path']['savename'];
                    $thumb_img='./Public/Upload/thumb/'.$info['img_path']['savename'];
                    $image->open($img_path);
                   //exit;
                    // 按照原图的比例生成一个最大为150*150的缩略图并保存为thumb.jpg
                    $image->thumb(200, 200)->save($thumb_img);
                    //exit;
                    $res['img_path']=$img_path;
                    $res['thumb_img']=$thumb_img;
                   //print_r($res);
//                    $this->goodsM->img_path=$img_path;
                }
//exit;
                if(empty($res['goods_sn'])){
                    $res['goods_sn']=$this->goodsM->getGoodsSn();
                }
                if($this->goodsM->add($res)){
                    $this->redirect('Admin/Goods/goodsadd');
                }
            }
        }
        $this->display();
    }
    public function goodslist(){
        $p=I('p')? I('p') : 1;
        //$User = M('User'); // 实例化User对象
        // 进行分页数据查询 注意page方法的参数的前面部分是当前的页数使用 $_GET[p]获取
        $list = $this->goodsM->order('goods_id')->page($p.',2')->select();
        $this->assign('goodslist',$list);// 赋值数据集
        $count      =$this->goodsM->count();// 查询满足要求的总记录数
        $Page       = new \Think\Page($count,2);// 实例化分页类 传入总记录数和每页显示的记录数
        $show       = $Page->show();// 分页显示输出
        $this->assign('page',$show);// 赋值分页输出
        $this->display(); // 输出模板

//        $this->assign('goodslist',$this->goodsM->select());
//        $this->display();
    }
    public function del(){
        $this->goodsM->delete(I('get.goods_id'));
        $this->redirect('Admin/Goods/goodslist');
    }
}