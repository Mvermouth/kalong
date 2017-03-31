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
    public function gettree(){
        return $this->select();
    }
}