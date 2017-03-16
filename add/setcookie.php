<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/3/15
 * Time: 16:30
 */

echo '狗牌';
//最多5个参数
setcookie('user','ct');
//第三个参数是时间过多久cookie消失
setcookie('age','12',time()+15);
//第四个参数可以整站有效，指定生效路径