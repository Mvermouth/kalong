<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/4/13
 * Time: 15:02
 * 大文件上存切片
 */
//接收文件合拼
if(!file_exists('./upload/up.jpg')){
    move_uploaded_file($_FILES['part']['tmp_name'],'./upload/up.jpg');//移动改名
}else{
    //合并
    file_put_contents('./upload/up.jpg',file_get_contents($_FILES['part']['tmp_name']),FILE_APPEND);//追加
}
echo 'ok';