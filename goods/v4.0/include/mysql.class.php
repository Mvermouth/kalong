<?php
//单例化
class mysql extends db{
	
	protected static $getins=null;
	
	private $h;
	private $u;
	private $p;
	private $dbname;
	private $charset;
	private $conn;
	private $conf;
	//注如参数
//	$this->h='localhost';
//	$this->u='root';
//	$this->p='root';

//构造函数
	 private function __construct(){
	 		$this->conf=Conf::getins();
//			$this->h='localhost';
//			$this->u='root';
//			$this->p='root';
			$this->charset=$this->conf->charset;
			$this->dbname=$this->conf->dbname;
			$this->connect($this->conf->localhost,$this->conf->usename,$this->conf->password);
			$this->choose($this->dbname);
			$this->setchat($this->charset);
	}
	
	public static function getins(){
		if(self::$getins instanceof self){//这就是单例
			return self::$getins;
		}else{
			self::$getins=new self();
			return self::$getins;
		}
	}

	//连接服务器
	public function connect($h,$u,$p){
		$conn=mysql_connect($h,$u,$p);
		$this->conn=$conn;
	}
	//选库
	public function choose($dbname){
		$sql=mysql_select_db($dbname);
		$this->query($sql);
	}
	//字符j
	public function setchat($charset){
		$sql=mysql_set_charset($charset);//不能用引号！！！，但是不用错误日记又看不到
		//$sql='set names'.$charset;
		$this->query($sql);
	}
	
	//发送查询
	public function query($sql){
		Log::write($sql);
		return mysql_query($sql,$this->conn);
		
	}
	/*
	 	查询多行数据
	 	$sql select语句
	 	return 数组或者bool
	 * */
	public  function getAll($sql){
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
	/*
	 	查询单行数据
	 * */
	public  function getRow($sql){
		$res=$this->query($sql);
		if(!$res){
			return false;
		}
		return mysql_fetch_assoc($res);
	}
	//单个数据
	public  function getOne($sql){
		$res=$this->query($sql);
		if(!$res){
			return false;
		}
		$row=mysql_fetch_row($res);
		return $row[0];
	}
	//自动执行insert和update语句
	//$this->autoExecute('user',array('usename'=>'kalong','email'=>'498@qq.com'),'insert');
	public  function autoExecute($table,$arr,$model='insert',$where='where 1 limit 1'){
		//$sql=""
		if(!is_array($arr)){
			return false;
		}
		if($model=='insert'){
			$sql='insert into '.$table."(";
			foreach($arr as $k=>$v){
				$sql.=$k.",";
			}
			$sql=rtrim($sql,",");
			$sql.=")";
			$sql.=" values('";
			foreach($arr as $k=>$v){
				$sql.=$v."','";
			}
			$sql=rtrim($sql,",'");
			$sql.="')";
		}else if($model=='update'){
			//return false;
			$sql="update ".$table." set ";
			foreach($arr as $k=>$v){
				$sql.=$k."='".$v."',";
			}
			$sql=rtrim($sql,',');
			$sql.=" ".$where;
			
		}
		return $this->query($sql);
	}
}



?>