<?php
//相当于路由？
class Model{
	protected $table=null;
	protected $db=null;
	protected $pk=null;
	protected $field=array();
	public function __construct(){
		$this->db=mysql::getins();
	}
	//在父类写所有表都回用到的增删改差
	//增
	public function add($data){
		return $this->db->autoExecute($this->table,$data,'insert',null);
	}
	//删 个人感觉这个不写
	public function del($id){
		$sql = 'delete from ' . $this->table . ' where '.$this->pk."=" . $id;
        $this->db->query($sql);
        return $this->db->affect_rows();
	}
	//改
	public function update($data,$id){
		$this->db->autoExecute($this->table,$data,'update','where '.$this->pk."=".$id);
		return $this->db->affect_rows();
	}
	//查
	public function select(){
		$sql="select * from ".$this->table;
		return $this->db->getAll($sql);
	}
	//一条
	public function find($id){
		$sql="select * from ".$this->table." where ".$this->pk."=".$id;
		return $this->db->getRow($sql);
	}
    //自动过虐获取列明
    public  function  getdesc(){
        $data=array();
        $data2=array();
        $sql="desc ".$this->table;
        $res=$this->db->query($sql);
        if(!$res){
            return false;
        }
        while($row=mysql_fetch_assoc($res)){
            $data[]=$row;
        }
        foreach ($data as $v){
            $data2[]=$v['Field'];
        }
        $this->field=$data2;
        return $this->field;
    }
	//把传来的数组清除掉不用的单元留下与表对应的单元
    //思路：循环数组分别判断其key是否是表的字段
    /**
     * @param array $array
     * @return array
     */
    public function _facade($array=array()){
	    $data=array();
	    foreach ($array as $k => $v){
	        if(in_array($k,$this->field)){
                $data[$k]=$v;
            }
        }
        return $data;
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