<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/4/2
 * Time: 16:42
 */
namespace Home\Model;
use Think\Model;
class UserModel extends Model{
    protected $_validate =array(
        //array(验证字段1,验证规则,错误提示,[验证条件,附加规则,验证时间]),
        array('usename','3,6','反正就是名字不对',1,'length',3),
        array('password','6,12','反正就是密码错',1,'length',3),
        //array('shop_price','testsp','反正222就是cuo',1,'function',3),
        //array('goods_sn','goods_sn','sn错了,已经存在',1,'unique',3),
    );
}