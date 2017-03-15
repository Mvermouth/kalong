<?php
//相当于路由？
class Model{
	protected $table=null;
	protected $db=null;
	public function __construct(){
		$this->db=mysql::getins();
	}
}
//class testmodel extends Model{
//	protected $table='tes';
//	public function reg($arr){
//		if(!is_array($arr)){
//			return false;
//		}
//		$this->db->autoExecute($this->table,$arr,'insert',null);
//	}
//}
//echo "deeeeeeeeeeeeeeee";
//$jiu=new testmodel();
//$arr=array('t1'=>'cao','t2'=>'jiuxcao');
//if(!$jiu->reg($arr)){
//	echo "OK";
//}else{
//	echo 'nonono';
//}
?>