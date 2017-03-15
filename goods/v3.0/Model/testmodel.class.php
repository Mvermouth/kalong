<?php
class testmodel extends Model{
	protected $table='tes';
	public function reg($arr){
		if(!is_array($arr)){
			return false;
		}
		$this->db->autoExecute($this->table,$arr,'insert',null);
	}
}
?>