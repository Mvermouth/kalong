<?php
	//抽xiang
abstract class Fly{
	public abstract function engine();
	public abstract function balance();
}
//继承抽象
abstract class Monketking extends Fly{
	public function engine(){
		echo '火药';
	}
	//还没完成，还是抽象的;
}
//完成抽象
class Windy extends Monketking{
	public function engine(){
		echo '超级火药';
	}
	public function balance(){
		echo '翅膀';
	}
	public function start(){
		$this->engine();
		for($i=0;$i<3;$i++){
			$this->balance();
			echo '飞飞';
		}
	}
}
$kalong=new Windy();
$kalong->start();
//
define('kalong','man');
class Human{
	public static function show(){
		echo kalong;
	}
	const HEAD=2;
}
Human::show();//静态方法
echo Human::HEAD;
echo '<br/>';
echo __file__;
echo __line__;
echo __DIR__ ;
echo "<hr/>";
class Mon{
	public function say(){
		echo '~~~';
	}
	final public function tell(){
		echo 'hello';
	}
}
 class Monkey extends Mon{
 	//final 不能覆盖
// 	public function tell(){
// 		echo 'no hello';
// 	}
 }
$pl=new Monkey();
//$pl->tell();
echo "<hr/>";
//$ar1=array();
$ar2=array("age"=>"213","fe"=>"2424","wgff"=>"141","name"=>"911151");
$arr1=array("age"=>"213","lan"=>"1414","weigth"=>"2","name"=>"951");
//print_r($arr1);
print_r(array_intersect($arr1,$ar2));
echo "<hr/>";
class ceshi{
	public static function haha(){
		echo '1';
	}
}
ceshi::haha();
echo "<hr/>";

?>