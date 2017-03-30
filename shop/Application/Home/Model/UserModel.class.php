<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/3/29
 * Time: 14:19
 */
namespace Home\Model;
use Think\Model;
class UserModel extends Model{
    public function User(){
        //echo "i am xxxModel";
        $arr=array('name'=>'kal','age'=>13);
        if($this->add($arr)){
            echo "ok";
        }
    }
}