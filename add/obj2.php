<?php
class Human{
	public $name='kl';
	public function who(){
		echo $this->name;
	}
}
$kalong=new Human();
$kalong->who();
echo '<hr>';
class Human2{
	public $money=1000;
}
$ct=new Human2();
echo $ct->money;
echo '<hr>';
class Human3{
	private $money1=1999;
	public $mmm;
	public function showMo(){
//		echo $this->money1=300;
		$this->mmm=$this->money1;
	}
}
$zgj=new Human3();
echo $zgj->showMo();
echo $zgj->mmm;
$zgj->mmm=555;
echo $zgj->mmm;
echo '<br/>';
?>