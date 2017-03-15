<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/3/9
 * Time: 15:57
 */
//验证码  有字的图片
//造图片  写字哦 imagestring

$im=imagecreatetruecolor(50,25);
$red=imagecolorallocate($im,255,0,0);
$str=substr(str_shuffle('qpwoeincowesmaoijfw596645'),0,4);
imagestring($im,4,0,0,$str,$red);
//header('content-type:image/png');
header("Content-type:image/png");
imagepng($im);
imagedestroy($im);

