<?php
function say(){
	echo '111';
}
class Human{
	public function say(){
		echo 'hello';
		echo '<br/>';
	}
	public function say2(){
		echo 'no hello';
		echo '<br/>';
		$this->say();
	}
}
$kalong=new Human();
$kalong->say2();
say();
echo '<br/>';
//构造函数
class Human2{
	public function __construct($name,$gender){
		$this->name=$name;
		$this->gender=$gender;
	}
	public $gender;
	public $name;
}
$liu=new Human2('lyf','woman');
echo $liu->name;
//构造函数的传参并影响对象
//class
echo '<br/>';
class Human3{
	public $name=null;
	public $gender=null;
	public function __construct(){
		echo 'i am con <br/>';
	}
	public function __destruct(){
		$this->hello();
	}
	public function hello(){
			echo 'die';
	}
}
$cc=new Human3();
$cc=9;
echo '<hr/>';
class Human4{
	public function __destruct(){
		echo 'sile';
	}
	public $wen='i am wen';
}
$kk=new Human4();
echo $kk->wen;
$kk->wen='i am not wen';
echo $kk->wen;
$aa=$bb=$cc=$kk;//共同一个内存的
echo $bb->wen;
unset($kk);
echo '<hr/>';
echo $bb->wen;
echo '<hr/>';
?>