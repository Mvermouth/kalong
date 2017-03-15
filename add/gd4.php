<?php
/**
 * Created by PhpStorm.
 * User: LL
 * Date: 2017/3/9
 * Time: 19:56
 */
//图片中文验证ma  imagettftext
$im=imagecreatefromjpeg('./r/20231.jpg');
$color=imagecolorallocate($im,0,0,255);
imagettftext($im,35,30,100,125,$color,'./font/STHUPO.TTF','哈哈哈');
header('content-type:image/jpeg');
imagejpeg($im);
imagedestroy($im);
//随机中文怎么弄  4e00 9fa0