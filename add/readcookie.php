<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/3/15
 * Time: 16:31
 */
print_r($_COOKIE);
echo '<br/>';
if(!$_COOKIE['user']){
    echo '你没有权力';
}else{
    echo $_COOKIE['user'];
}
