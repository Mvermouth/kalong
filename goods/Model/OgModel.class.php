<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/3/24
 * Time: 10:40
 */
defined('ACC')||exit('no acc');
class OgModel extends Model{
    protected $table='ordergoods';
    // protected $db=sword;
    protected $pk='og_id';
    protected $field=array();
    public function addOg($data){
       //光写如还不够
        if($res=$this->add($data)) {
            //库存减少
            $sql = 'update goods set goods_number = goods_number - ' . $data['goods_number'] . " where goods_id = " . $data['goods_id'];
            $this->db->query($sql);
            return $res;
        }else {
            return false;
        }
        //购物车清空
    }
}