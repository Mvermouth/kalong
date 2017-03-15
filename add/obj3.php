<?php
class Human{
	public function __construct(){
		echo 'wawawa';
	}
	private $height=160;
	public $jiu='jiujiujiu';
	private $fly='fff';
	public function cry(){
		echo '555555555~~<br/>';
	}
	protected $tall=111;
	public	function flysky(){
		echo $this->fly;
	}
}
class Stu extends Human{
	private $fly='22';
	public function show(){
		echo $this->tall;
	}
	public function par(){
		//echo parent :: $height;
	}
}
class layer extends Stu{
	
}
$ct=new Stu();
$zuxian=new Human();
$ct->cry();
$ct->show();
$ct->flysky();
echo '<br/>';
echo $ct->jiu;
echo $zuxian->jiu;
$ct->jiu='bbbbbb';
echo '<br/>';
echo $ct->jiu;
echo $zuxian->jiu;
echo '<br/>';
$kalong=new layer();
$kalong->show();
echo '<br/>';
$ct->par();
echo '<br/>';
//sql fengzhuang
class Mysql{
	private $host;
	private $user;
	private $password;
	private $dbName; //库名
	private $charset;
	private $conn;
	
	public function __construct(){
		//应该用配置文件
			$this->host='localhost';
			$this->user='root';
			$this->password='root';
			$this->dbName='test';
			$this->charset='utf-8';
			$this->connect($this->host,$this->user,$this->password);//lianjie
			$this->choose($this->dbName);//xuan ku
			$this->setchar($this->charset);//zi fu ji
			
	}
	//负责连接
	private function connect($h,$u,$p){
		$conn=mysql_connect($h,$u,$p);
		$this->conn=$conn;
	}
	//choose
	public function choose($db){
		//$sql = 'use'.$db;
		$sql=mysql_select_db($db);
		$this->query($sql);
	}
	//zifuji
	public function setchar($char){
		$sql='set names'.$char;
		$this->query($sql);
	}
	//负责sql查询
	public function query($sql){
		return mysql_query($sql,$this->conn);
	}
	//负责获取多行多列的select查询结果
	public function getAll($sql){
		$data=array();
		$res=$this->query($sql);
		if(!$res){
			return false;
		}
		while($row=mysql_fetch_assoc($res)){
			$data[]=$row;
		}
		return $data;
	}
	//获取一行的结果
	public function getRow($sql){
		$resone=$this->query($sql);
		if(!$resone){
			return false;
		}
		return mysql_fetch_assoc($resone);
	}
	//获取一个结果
	public function getOne($sql){
		$res=$this->query($sql);
		if(!$res){
			return false;
		}
		$row=mysql_fetch_row($res);
		return $row[0];
	}
	public function close(){
		mysql_close($this->conn);
	}
}

$mysql= new Mysql();
print_r($mysql);
$sql="insert into user values(5,'xxl',95)";
echo '<hr/>';
if($mysql->query($sql)){
	echo 'ok';
}else{
	echo 'no ok';
}
echo '<br/>';
$sql="select * from user";
$arr=$mysql->getAll($sql);
print_r($arr);
echo '<br/>';
$sql="select * from user where uid=1";
print_r($mysql->getOne($sql));
//print_r($one);
//$data=array();
//	//print_r($res);
//	if($res&&mysql_num_rows($res)>0){
//		while($arr=mysql_fetch_assoc($res)){
//			$data[]=$arr;
//		}
//	}	
//	print_r($data);
?>