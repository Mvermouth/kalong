<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/3/10
 * Time: 10:14
 */
//图片所虐类
//如何知道图片的大小和类型
//所谓水银把小图复制到大图上面并透明
class ImageTool{
    //分析图片
    public static function imageInfo($image){
        //判断图片存在不
        if(!file_exists($image)){
            return false;
        }
        $info=getimagesize($image);
        if($info==false){
            return false;
        }
        //分析矿高
        //print_r($info);
        $img['width']=$info[0];
        $img['height']=$info[1];
        $img['ext']=substr($info['mime'],strpos($info['mime'],'/')+1);
        return $img;
    }
    //加水印  $dst等操作图片  $water水银效果
    //保存在￥savepath 不填就替代哦
    public static function water($dst,$water,$save=null,$alpha=50,$pos=2){
        //echo file_exists($dst);
        if(!file_exists($dst)||!file_exists($water)){
            // echo 'a';
            return false;
        }
        //保证水印不能比待操作图片da
        $dstinfo=self::imageInfo($dst);
        $waterinfo=self::imageInfo($water);
        if($waterinfo['height']>$dstinfo['height']||$waterinfo['width']>$dstinfo['width']){
            // echo 'a';
            return false;
        }
        //读图类型
        $dfun='imagecreatefrom'.$dstinfo['ext'];
        $wfun='imagecreatefrom'.$waterinfo['ext'];
        if(!function_exists($dfun)||!function_exists($wfun)){
            return false;
        }
        //动态创建画布
        $dim=$dfun($dst);
        $wim=$wfun($water);

        //判定位置
        switch($pos){
            case 0:
                $posx=0;
                $posy=0;
                break;
            case 1:
                $posx=$dstinfo['width']-$waterinfo['width'];
                $posy=0;
                break;
            case 2:
                $posx=0;
                $posy=$dstinfo['height']-$waterinfo['height'];
                break;
            case 3:
                $posx=$dstinfo['width']-$waterinfo['width'];
                $posy=$dstinfo['height']-$waterinfo['height'];
                break;
        }
        $dim=$dfun($dst);
        $wim=$wfun($water);
        //水银位置
        switch($pos){
            case 0:
                $posx=0;
                $posy=0;
                break;
            case 1:
                $posx=$dstinfo['width']-$waterinfo['width'];
                $posy=0;
                break;
            case 2;
                $posx=0;
                $posy=$dstinfo['height']-$waterinfo['height'];
            case 3:
                $posx=$dstinfo['width']-$waterinfo['width'];
                $posy=$dstinfo['height']-$waterinfo['height'];
                break;
        }
        imagecopymerge($dim,$wim,$posx,$posy,0,0,$waterinfo['width'],$waterinfo['height'],$alpha);
        //保存
        if(!$save){
            $save=$dst;
            unlink($dst);
        }
        imagecopymerge($dim,$wim,$posx,$posy,0,0,$waterinfo['width'],$waterinfo['height'],$alpha);
        //保存
        //echo $dst;
        if(!$save){
            echo $dstinfo['ext'];
            echo $dst;
            $save=$dst;
            echo $save;
            if(is_string($save)){
                echo 'zhen';
            }else{
                echo 'buzhen';
            }
            unlink($dst);//删除原图
        }
        $createfunc='image'.$dstinfo['ext'];
        $createfunc($dim,$save);

        //释放内存
        imagedestroy($dim);
        imagedestroy($wim);
        return true;

    }
    //生成缩略图 等比例 两边留白
    public static function cmin($image,$width,$height,$save=null){
        $dinfo=self::imageInfo($image);
        if($dinfo==false){
            return false;
        }
        $dimW=$width/$dinfo['width'];
        $dimH=$height/$dinfo['height'];
        if($dimW<$dimH){
            echo 'w';
            $scale=$dimW;
        }else{
            echo 'h';
            $scale=$dimH;
        }
        //创建原式画布
        $dfunc='imagecreatefrom'.$dinfo['ext'];
        $dim=$dfunc($image);
        $whiteim=imagecreatetruecolor($width,$height);
        $color=imagecolorallocate($whiteim,255,255,255);
        imagefill($whiteim,0,0,$color);
        //保存
        //imagepng($whiteim,'./r/01.png');
        //复制并缩略
        $dwidth=(int)$dinfo['width']*$scale;
        $dheight=(int)$dinfo['height']*$scale;
        $paddingx=(int)($width-$dwidth)/2;
        $paddingy=(int)($height-$dheight)/2;
        imagecopyresampled($whiteim,$dim,$paddingx,$paddingy,0,0,$dwidth,$dheight,$dinfo['width'],$dinfo['height']);
        //保存
        if(!$save){
            $save=$image;
            unlink($image);
        }
        $savefun='image'.$dinfo['ext'];
        $savefun($whiteim,$save);
        imagedestroy($dim);
        imagedestroy($whiteim);
        return true;
    }
    //写验证码
    public static function captcha($width=50,$height=25) {
        //造画布
        $image = imagecreatetruecolor($width,$height) ;

        //造背影色
        $gray = imagecolorallocate($image, 200, 200, 200);

        //填充背景
        imagefill($image, 0, 0, $gray);

        //造随机字体颜色
        $color = imagecolorallocate($image, mt_rand(0, 125), mt_rand(0, 125), mt_rand(0, 125)) ;
        //造随机线条颜色
        $color1 =imagecolorallocate($image, mt_rand(100, 125), mt_rand(100, 125), mt_rand(100, 125));
        $color2 =imagecolorallocate($image, mt_rand(100, 125), mt_rand(100, 125), mt_rand(100, 125));
        $color3 =imagecolorallocate($image, mt_rand(100, 125), mt_rand(100, 125), mt_rand(100, 125));

        //在画布上画线
        imageline($image, mt_rand(0, 50), mt_rand(0, 25), mt_rand(0, 50), mt_rand(0, 25), $color1) ;
        imageline($image, mt_rand(0, 50), mt_rand(0, 20), mt_rand(0, 50), mt_rand(0, 20), $color2) ;
        imageline($image, mt_rand(0, 50), mt_rand(0, 20), mt_rand(0, 50), mt_rand(0, 20), $color3) ;

        //在画布上写字
        $text = substr(str_shuffle('ABCDEFGHIJKMNPRSTUVWXYZabcdefghijkmnprstuvwxyz23456789'), 0,4) ;
        imagestring($image, 5, 7, 5, $text, $color) ;

        //显示、销毁
        header('content-type: image/jpeg');
        imagejpeg($image);
        imagedestroy($image);
    }
}
//print_r(imageTool::imageInfo('./r/20231.jpg'));
//$dload='./r/123.jpg';
//$wload='./r/fff.png';

//$res=imageTool::water($dload,$wload,'./r/2023111.jpg',50,2);
//if($res){
//    echo 'OK';
//}else{
//    exit('no');
//}
//echo imageTool::min($dload,123,123);
//$res=imageTool::cmin($dload,100,100,'./r/g.jpg');
//$res1=imageTool::cmin($dload,200,100,'./r/gg.jpg');
//$res2=imageTool::cmin($dload,100,200,'./r/ggg.jpg');
//if($res){
//    echo 'ok';
//}else{
//    echo 'no';
//}