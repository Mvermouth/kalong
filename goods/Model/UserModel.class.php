<?php
/**
 * Created by PhpStorm.
 * User: LL
 * Date: 2017/3/14
 * Time: 20:47
 */
defined('ACC')||exit('no acc');
class UserModel extends Model{
    protected $table='user';
   // protected $db=sword;
    protected $pk='use_id';
    protected $field=array();
    protected $_valid=array(
        array('usename',1,'用户名必须存在','require'),
        array('usename',0,'用户名必须在4~16字符','length','4,16'),
        array('email',1,'email非法','require'),
        array('password',1,'密码不能为空','require')
    );

    public function encPassword($p){
        return md5($p);
    }
    //检验用户名是否存在
    public function  chenkUsename($name){
        $sql='select count(*) from '.$this->table.' where usename='.$name;
        return $this->db->getOne($sql);
    }
}