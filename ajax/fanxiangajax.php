<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/4/14
 * Time: 9:48
 * Liaotiao 聊天
 */
//死循环
set_time_limit(0);
ob_start();//打开
//echo str_repeat(' ',4000).'<br/>';
ob_flush();
flush();
$i=0;
while(true){
//  set_time_limit(0);
    echo str_repeat(' ',4000);
    echo $i++.'<br/>';
    ob_flush();//把内容发给apc
    //告诉apc 强迫websever把内容发给浏览器
    flush();//刷新输出缓冲
    sleep(1);
}