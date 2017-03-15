<?php
defined('ACC')||exit('ACC IS NOT FIND');
class goodsModel extends Model{
	protected $table='goods';
	protected $pk='goods_id';
    protected $field=array();
//	public function add($data){
//		return $this->db->autoExecute($this->table,$data,'insert',null);
//	}
//删除商品 不是真的删除
//is——delete为0
	public function trash($id){
		return $this->update(array('is_delete'=>'1'),$id);
	}
	public function getgoods(){
		$sql="select * from goods where is_delete=0";
		return $this->db->getAll($sql);
	}
	//假装删除的
	public function gettrash(){
		$sql="select * from goods where is_delete=1";
		return $this->db->getAll($sql);
	}

    //创建商品货号
    public function createSn(){
	    $sn='kl'.date('Ymd').mt_rand(10000,99999);
	    $sql='select count(*) from '.$this->table." where goods_sn='" .$sn ."'";
	    return $this->db->getOne($sql) ? $this->createSn():$sn;
    }
}
?>