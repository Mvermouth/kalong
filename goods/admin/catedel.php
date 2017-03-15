<?php
//栏目删除
//思路，接受cat—id 调用model 删除-》
define('ACC',true);
include('../include/init.php');
$cat_id=$_GET['cat_id']+0;
$cat=new catModel();
$son=$cat->getson($cat_id);
if(!empty($son)){
	exit("有儿子，不能del");
}
//echo $cat->del($cat_id);
echo $cat->del($cat_id) ? "del ok":"no ok";

?>