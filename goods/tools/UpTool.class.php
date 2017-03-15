<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/3/7
 * Time: 16:49
 * 单文件上存类
 */
defined('ACC')||exit('no acc');
/*  配置允许的后缀
    大小
    获取文件后缀
    获取文件大小
    判断
    报错机zhi
    随机生成目录+文件名
*/
class UpTool{
    protected $allowFileExl='jpg,png,gif,jpeg,hmp';
    protected $maxSize=1;
    protected $file=null;//装上存文件信息
    protected $errornum=0;
    protected $error=array(
        0=>'ok',
        1=>'上传的文件超过选项限制的值',
        2=>'上传文件的大小超过了 HTML 表单中 MAX_FILE_SIZE 选项指定的值',
        3=>'文件只有部分被上传',
        4=>'没有文件被上传',
        6=>'找不到临时文件夹',
        7=>'文件写入失败。',
        8=>'8de',
        9=>'9de',
        10=>'10de',
        11=>'11de'
    );

    public function up($key){
        if(!isset($_FILES["$key"])){
            return false;
        }
        $f=$_FILES["$key"];
        if($f['error']){
            $this->errornum=$f['error'];
            return false;
        }
        $exl=$this->getExl($f['name']);
        if(!$this->isAllowExl($exl)){
            $this->errornum=8;
            return false;
        }
//        $res=$this->isAllowSize($f['size']);
//        echo "<hr/>";
//        print_r($res);
       // print_r($this->isAllowSize($f['size']));
        if(!$this->isAllowSize($f['size'])){
            $this->errornum=9;
            return false;
        }
        //通过
        $dir=$this->mk_dir();
        if($dir==false){
            $this->errornum=10;
            return false;
        }
        //随机名字
        $newname=$this->randname().'.'.$exl;
        if(!move_uploaded_file($f['tmp_name'],$dir.'/'.$newname)){
            $this->errornum=11;
            return false;
        }
        $dir=$dir.'/'.$newname;
        return str_replace(ROOT,'',$dir);
    }
    /*
     * 获取文件后缀名字
     * */
    protected function getExl($file){
        $tmp=explode('.',$file);
        return end($tmp);
    }
    /*判断是否有 返回bool*/
    protected function isAllowExl($exl){
        return in_array(strtolower($exl),explode(',',strtolower($this->allowFileExl)));
    }
    /*判断大小是否通过*/
    /*返回bool*/
    protected  function  isAllowSize($size){
        //print_r($this->maxSize*1024*1024);
        $s=$this->maxSize*1024*1024;
//        if($size > $s){
//            echo '太大';
//            return false;
//        }else{
//            echo '文件合适';
//        }
        //这样才是 返回bool
        return $size <= $s;
    }
    /*随机文件夹*/
    /*日期文件夹*/
    protected  function mk_dir(){
        $dir=ROOT . 'data/images/'.date('Yn/d');
        if(is_dir($dir)||mkdir($dir,0777,true)){
            return $dir;
        }else{
            return false;
        }
    }
    /*suiji随机文件名字*/
    protected function randname($length=6){
        $str='qpwoeirutyalskdjfhgmznxbcv9630147852';
        return substr(str_shuffle($str),0,$length);
    }
    public  function geterror(){
        return $this->error[$this->errornum];
    }
    //动态设置大小和文件后缀
    public function setsize($n){
        $this->maxSize=$n;
    }
    public function setexl($str){
        $this->allowFileExl=$str;
    }

}