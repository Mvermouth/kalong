<?php
namespace Admin\Model;
use Think\Model;
class TcModel extends Model{
    public $tclist;
    public function __construct(){
        parent::__construct();
        $this->tclist=$this->select();
    }
    protected $_validate=array(
        array('tc_name','1,7','名字不符合要求1-7',1,'length',3),
    );

    //子孙
    public function getTree($p=0,$lv=0){
        $t=array();
        foreach($this->tclist as $k=>$v){
            if($v['parent_id']==$p){
                $v['lv']=$lv;
                $t[]=$v;
                //print_r($t);
                //$this->gettree($v['cat_id']);
                $t=array_merge($t, $this->getTree($v['tc_id'],$lv+1));
            }
        }
        return $t;
    }
    //地区
    public function areaTree($p=0,$lv=0){
        $t=array();
        foreach($this->tclist as $k=>$v){
            if($v['area_id']==$p){
                $v['lv']=$lv;
                $t[]=$v;
                //print_r($t);
                //$this->gettree($v['cat_id']);
                $t=array_merge($t, $this->areaTree($v['tc_id'],$lv+1));
            }
        }
        return $t;
    }

}