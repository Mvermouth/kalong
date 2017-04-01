<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/3/31
 * Time: 15:41
 */
namespace Admin\Model;
use Think\Model;
class GoodsModel extends Model{
    //自动完成
    protected  $_auto =array(
        //array(完成字段1,完成规则,[完成条件,附加规则]),
        array('update_time','time',3,'function'),
    );
    protected $_validate =array(
        //array(验证字段1,验证规则,错误提示,[验证条件,附加规则,验证时间]),
        array('goods_name','3,6','反正就是名字不对',1,'length',3),
        array('goods_sn','testsn','反正951就是cuo',1,'callback',3),
        array('shop_price','testsp','反正222就是cuo',1,'function',3),
    );
    //protected $insertFields='goods_name';
    public function testsn(){
       return I('goods_sn')==951 ? false : true;
    }
}