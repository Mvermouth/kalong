<?php
//控制器
define('ACC',true);
require('../include/init.php');
$cat=new catModel();
//$catlist=$cat->select(); 
$catlist=$cat->getcatTree($cat->select(),0,0);
//print_r($catlist);

include(ROOT.'view/admin/templates/catelist.html');
?>