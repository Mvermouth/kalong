<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/4/15
 * Time: 13:49
 */
//echo json_encode(array('tes'=>'tess'));
require ('./conn.php');
set_time_limit(0);
$res=$_COOKIE['use'];
//echo json_encode(array('tes'=>$res));
//exit;
$sql="select * from msg where res = '$res' and is_r=0 limit 1";
//echo json_decode($res);
//$res=$_POST['res'];
while(true){
   $info=$mysqli->query($sql);
   $inf=$info->fetch_assoc();
   if(!empty($inf)) {
       echo json_encode($inf);
       $sql='update msg set is_r=1 where id='.$inf['id'];
       $mysqli->query($sql);
       exit;
   }
    sleep(1);
}



