<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/4/14
 * Time: 11:10
 */
header("Content-type:text/html;charset=utf-8");
set_time_limit(0);
ob_start();
echo str_repeat(' ',4000).'<br/>';
ob_flush();
flush();
require ('conn.php');
while(true){
    echo str_repeat(' ',4000);
    $sql='select * from msg where res="admin" and is_r=0 limit 1';
    $result=$mysqli->query($sql);
    $row = $result->fetch_assoc();
    if(empty($row)){

    }else{
        //echo strip_tags($row['res'].'说:'.$row['content']).'<br/>';
        $row['content']=strip_tags($row['content']);
        $msg=json_encode($row);
        //$msg=
        echo "<script type='text/javascript'>";
        echo "parent.window.getMsg($msg)";
        echo "</script>";
    }
    $sql='update msg set is_r=1 where id='.$row['id'];//把msg设置为已读;
    $result=$mysqli->query($sql);
    ob_flush();
    flush();
    sleep(1);
}