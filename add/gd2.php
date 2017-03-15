<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/3/9
 * Time: 15:46
 */
//直接打开一张图片 跟canvas差不多
$file='./r/20231.jpg';
$im=imagecreatefromjpeg($file);
//print_r($im);
$color=imagecolorallocate($im,123,123,255);
//画线
imageline($im,0,0,100,100,$color);
imagepng($im,'./111.png');
imagedestroy($im);