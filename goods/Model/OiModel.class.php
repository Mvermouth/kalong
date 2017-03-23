<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/3/23
 * Time: 14:36
 */
defined('ACC')||exit('no acc');
class OiModel extends Model{
    protected $table='orderinfo';
    // protected $db=sword;
    protected $pk='order_id';
    protected $field=array();
    protected $_valid=array(
        array('reciver',1,'收货人必须存在','require'),
        array('pay',1,'必须选择支付方式','in','4,5'),
        array('email',1,'email非法','email')
        //array('password',1,'密码不能为空','require')
    );

}