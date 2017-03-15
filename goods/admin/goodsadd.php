<?php
define('ACC',true);
require("../include/init.php");
$cat=new catModel();
//$catlist=$cat->select();
//print_r($catlist);
//print_r($cat->getcatTree($catlist,0,0));
//$catlist=array_merge($catlist,$cat->getcatTree($catlist,0,0));
$catlist=$cat->getcatTree($cat->select(),0,0);
include(ROOT.'view/admin/templates/goodsadd.html');
?>