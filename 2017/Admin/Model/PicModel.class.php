<?php
namespace Admin\Model;
use Think\Model;
class PicModel extends Model{
    protected  $_auto =array(
        //array(完成字段1,完成规则,[完成条件,附加规则]),
        array('update_time','time',3,'function'),
    );
}