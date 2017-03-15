<?php
define('ACC',true);
include('../include/init.php');
//处理上品信息
$data=array();
$_POST['goods_weight']=$_POST['goods_weight']*$_POST['weight_unit'];
print_r($_POST);
$data=$_POST;
print_r($data);
$data['add_time']=time();
//$data['goods_name']=trim($_POST['goods_name']);
//if($data['goods_name']==''){
//	echo "商品不能为空";
//	exit;
//}
//print_r($_POST);
//$data['goods_name']=trim($_POST['goods_name']);
//$data['goods_sn']=trim($_POST['goods_sn']);
//$data['cat_id']=$_POST['cat_id']+0;
//$data['shop_price']=$_POST['shop_price']+0;
//$data['market_price']=$_POST['market_price']+0;
//$data['goods_desc']=$_POST['goods_desc'];
//$data['goods_weight']=$_POST['goods_weight']*$_POST['weight_unit'];
//$data['is_best']=isset($_POST['is_best'])? 1:0;
//$data['is_new']=isset($_POST['is_new']) ? 1:0;
//$data['is_hot']=isset($_POST['is_hot']) ? 1:0;
//$data['is_on_sale']=isset($_POST['is_on_sale']) ? 1:0;
//$data['keywords']=trim($_POST['keywords']);
//$data['goods_brief']=trim($_POST['goods_brief']);
//$data['add_time']=time();
//print_r($data);

$goods=new goodsModel();
$upto=new UpTool();
$upto->setsize(1);
//$upto->setexl('pdf');
$res=$upto->up('ori_img');
if($res){
    echo "<br/>";
    //$path=end(explode('goods',$res));
    $data['ori_img']=$res;
    echo "ok";
}else{
    echo 'no ok';
    echo $upto->geterror();
}



echo "<hr/>";

print_r($goods->getdesc());
//生成缩略图 原式地址，缩略地址，大小
////加上绝对路径
if($res) {
    $newori_img = ROOT . $res;
    echo "<hr/>" . '地址1';
    print_r($newori_img);
//缩略地址
    echo "<hr/>" . '地址2';
    print_r($goods_img = dirname($newori_img) . '/goods_' . basename($newori_img));
    if (ImageTool::cmin($newori_img, 300, 400, $goods_img)) {
        $data['goods_img'] = str_replace(ROOT, '', $goods_img);
        echo '中等图处理成功';
    } else {
        echo '图片处理失败中等图';
        return false;
    }

    $thumb_img = dirname($newori_img) . '/thumb_' . basename($newori_img);
    if (ImageTool::cmin($newori_img, 160, 220, $thumb_img)) {
        $data['thumb_img'] = str_replace(ROOT, '', $thumb_img);
        echo '小图处理成功';
    } else {
        echo '图片处理失败小图';
        return false;
    }
}
echo "<hr/>";
//自动生成商品唯一序列好
if(empty($data['goods_sn'])){
    $data['goods_sn']=$goods->createSn();
}
//自动过虐
$data=$goods->_facade($data);
echo "<hr/>";
print_r($data);
//$data['goods_weight']=$_POST
//exit;
if($data['goods_name']==''){
	echo "商品不能为空";
	exit;
}
if($goods->add($data)){
	echo "ok";
}else{
	echo "no";
}
?>