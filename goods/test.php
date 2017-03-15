<?php
/**
 * Created by PhpStorm.
 * User: LL
 * Date: 2017/3/7
 * Time: 20:08
 */
define('ACC',true);
require('./include/init.php');
require(ROOT.'tools/UpTool.class.php');
print_r($_FILES['test']);
$upto=new UpTool();
if($upto->up('test')){
    echo "ok";
}else{
    echo 'no ok';
    echo '<br/>';
    echo $upto->geterror();
}