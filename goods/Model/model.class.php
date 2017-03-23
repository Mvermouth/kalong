<?php
//相当于路由？
class Model{
	protected $table=null;
	protected $db=null;
	protected $pk=null;
	protected $field=array();
    protected $_valid = array();
    protected $error = array();
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
    /*
       格式 $this->_valid = array(
                   array('验证的字段名',0/1/2(验证场景),'报错提示','require/in(某几种情况)/between(范围)/length(某个范围)','参数')
       );

       array('goods_name',1,'必须有商品名','requird'),
       array('cat_id',1,'栏目id必须是整型值','number'),
       array('is_new',0,'in_new只能是0或1','in','0,1')
       array('goods_breif',2,'商品简介就在10到100字符','length','10,100')

   */
    public function _validate($data) {
        if(empty($this->_valid)) {
            return true;
        }

        $this->error = array();

        foreach($this->_valid as $k=>$v) {
            switch($v[1]) {
                case 1:
                    if(!isset($data[$v[0]])) {
                        $this->error[] = $v[2];
                        return false;
                    }

                    if(!isset($v[4])){
                        $v[4]='';
                    }

                    if(!$this->check($data[$v[0]],$v[3],$v[4])) {
                        $this->error[] = $v[2];
                        return false;
                    }
                    break;
                case 0:
                    if(isset($data[$v[0]])) {
                        if(!$this->check($data[$v[0]],$v[3],$v[4])) {
                            $this->error[] = $v[2];
                            return false;
                        }
                    }
                    break;
                case 2:
                    if(isset($data[$v[0]]) && !empty($data[$v[0]])) {
                        if(!$this->check($data[$v[0]],$v[3],$v[4])) {
                            $this->error[] = $v[2];
                            return false;
                        }
                    }
            }
        }

        return true;

    }

    public function getErr(){
        return $this->error;
    }

    protected function check($value,$rule='',$parm='') {
        switch($rule) {
            case 'require':
                return !empty($value);

            case 'number':
                return is_numeric($value);

            case 'in':
                $tmp = explode(',',$parm);
                return in_array($value,$tmp);
            case 'between':
                list($min,$max) = explode(',',$parm);
                return $value >= $min && $value <= $max;
            case 'length':
                list($min,$max) = explode(',',$parm);
                return strlen($value) >= $min && strlen($value) <= $max;
            case 'email':
                // 判断$value是否是email,可以用正则表达式,但现在没学.
                // 因此,此处用系统函数来判断
                return (filter_var($value,FILTER_VALIDATE_EMAIL) !== false);
            default:
                return false;
        }
    }
    //返回id
    public function insert_id(){
        return $this->db->insert_id();
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