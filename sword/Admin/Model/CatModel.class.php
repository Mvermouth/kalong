<?php
/**
 * Created by PhpStorm.
 * User: LL
 * Date: 2017/3/30
 * Time: 21:23
 */
namespace Admin\Model;
use Think\Model;
class CatModel extends Model{
    public $catlist;
    public function __construct(){
        parent::__construct();
        $this->catlist=$this->select();
    }

    public function gettree($p=0,$lv=0){
        $t=array();
       foreach($this->catlist as $k=>$v){
           if($v['parent_id']==$p){
               $v['lv']=$lv;
               $t[]=$v;
               //print_r($t);
               //$this->gettree($v['cat_id']);
               $t=array_merge($t, $this->gettree($v['cat_id'],$lv+1));
           }
       }
       return $t;
    }
    public function getson($id){
       return $this->where('parent_id='.$id)->find();
    }
}