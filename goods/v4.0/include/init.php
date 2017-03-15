<?php
//初始化文件

/*
 	初始化当前的路径
 	1.h换成正斜线是win+linux都支持正，linux不支持反
 	2.根目录ROOT，ROOT是文件夹的名字路径，一定要配好，不然conf.class.php回有小问题，暂时不知道为什么会这样
 * */
//echo substr(str_replace('\\','/',__FILE__),0,-8);
defined('ACC')||exit("no quanli");
define('ROOT',dirname(dirname(str_replace('\\','/',__FILE__))).'/');
//echo ROOT;
//引入conf.class.php文件
//require(ROOT.'include/db.class.php');
//require(ROOT.'include/Conf.class.php');
//require(ROOT.'include/Log.class.php');
require(ROOT.'include/lib_base.class.php');
//require(ROOT.'include/mysql.class.php');
//require(ROOT.'Model/Model.class.php');
//$conf=Conf::getins();//静态方法生成实例;
//自动加载
function __autoload($class){
	if(strtolower(substr($class,-5))=='model'){
		require(ROOT.'Model/'.$class.'.class.php');
	}else{
		require(ROOT.'include/'.$class.'.class.php');
	}
}
//echo strtolower(strpos($class,-5);



//作用
	/*
	  1.过滤参数，用递归的方式过滤 get post cookie
	 * 
	 * 
	 * 
	 * */
$_GET=_addslashes($_GET);
$_POST=_addslashes($_POST);	
$_COOKIE=_addslashes($_COOKIE);	
	
	
	
	
//设置报错级别
/*
  error_reporting() //使用该函数可以设置在脚本运行时的级别。 如果没有设置可选参数 level， error_reporting() 仅会返回当前的错误报告级别。
 * 
 * */
define('DEBUG',true);
//如果开启调试模式
if(defined('DEBUG')){
	error_reporting(E_ALL); // 报告所有 PHP 错误
}else{
	error_reporting(0);// 关闭所有php错误
}
?>