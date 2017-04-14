<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/4/14
 * Time: 10:43
 * 连数据库
 */
$mysqli = new mysqli("localhost", "root", "root", "test");
if(!$mysqli)  {
    echo"database error";
}else{
    //echo"php env successful";
}
//$sql = "SELECT * FROM user";
//$result = $mysqli->query($sql);
//$row = $result->fetch_assoc();
//echo $row["name"];
//$mysqli->close();
//$mysqli = new mysqli("localhost", "root", "root", "test");
//$sql = "SELECT * FROM user";
//$result = $mysqli->query($sql);
//$row = $result->fetch_assoc(); // 从结果集中取得一行作为关联数组
//echo $row["password"];
///* free result set */
//$result->free();
//
///* close connection */
//$mysqli->close();