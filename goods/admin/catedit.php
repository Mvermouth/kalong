<?php
define('ACC',true);
include('../include/init.php');
$cat=new catModel();
$cat_id=$_GET['cat_id']+0;
$catinfo=$cat->find($cat_id);
$catlist=$cat->getcatTree($cat->select(),0,0);

include(ROOT.'view/admin/templates/catedit.html');
?>