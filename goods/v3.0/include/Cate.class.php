<?php
class Cate extends Model{
	protected $table='cate';
	public function add($data){
		$this->db->autoExecute($this->table,$data,'insert',null);
	}
}
?>