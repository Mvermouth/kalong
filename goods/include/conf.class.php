<?php
defined('ACC')||exit("no quanli");
//配置文件读写类
class Conf{
	protected static $ins=null;
	protected $data=array();
	final protected function __construct(){
		//读取配置文件，并丢进$data;
		include(ROOT.'include/config.inc.php');
		$this->data=$_CFG;
	}
	final protected function __clone(){//防止赋值
		
	}
	//负责判断
	public static function getins(){
		if(self::$ins instanceof self){//这就是单例
			return self::$ins;
		}else{
			self::$ins=new self();
			return self::$ins;
		}
	}
	//用魔术方法读取data的信息
	public function __get($key){
		if(array_key_exists($key,$this->data)){
			return $this->data[$key];
		}else{
			return null;
		}
	}
	//用魔术变量在运行的时候，动态增加或改变配置选项
	public function __set($key,$values){//2ge参数
		$this->data[$key]=$values;
	}
}
//echo 1;
//$conf=Conf::getins();//静态方法生成实例;
//print_r($conf);
//var_dump($conf);
//echo $conf->localhost;
//$conf->ccc='dddd';
//echo $conf->ccc;
?>