<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/4/1
 * Time: 16:26
 */
function che(){
    return encrypt(cookie('usename').cookie('useid').C('COO_KIE'))===cookie('key');
}
function encrypt($mes){
    return md5($mes);
}