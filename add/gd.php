<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/3/9
 * Time: 15:09
 * gd库
 * gd_2.dl
 */
//print_r(gd_info());
//典型流程


//创建画布
$weight=300;
$height=200;
$im=imagecreatetruecolor($weight,$height);
print_r($im);
//创建颜色
$color=imagecolorallocate($im,123,123,123);
//画图画
    //最简单泼墨  imagefill 填充
    //res x y color
imagefill($im,0,0,$color);
//保存
imagepng($im,'./01.png');
//销毁
imagedestroy($im);


