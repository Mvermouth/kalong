<?php
class catModel extends Model{
	protected $table='category';
	protected $pk="cat_id";
	public function add($data){
		return $this->db->autoExecute($this->table,$data,'insert',null);
	}
//	public function select(){
//		$sql="select cat_id,cat_name,intro,parent_id from category";
//		return $this->db->getAll($sql);
//	}
	//get cat tree
	public function getcatTree($arr,$id,$level=0){
		$tree=array();
		foreach($arr as $v){
			if($v['parent_id']==$id){
				$v['level']=$level;
				$tree[]=$v;
				$tree=array_merge($tree,$this->getcatTree($arr,$v['cat_id'],$level+1));
			}
		}
		return $tree;
	}
	//查看儿子
	public function getson($cat_id){
		$sql="select * from ".$this->table." where parent_id=".$cat_id;
		return $this->db->getAll($sql);
	}
	//家谱树
	public function gettree($cat_id){
		$tree=array();
		$cats=$this->select();
		while($cat_id>0){
			foreach($cats as $v){
				if($v['cat_id']==$cat_id){
					$tree[]=$v;
					$cat_id=$v['parent_id'];
				}
			}
		}
		return $tree;
	}
	//取出一行。根据主键
//	public	function find($cat_id){
//		$sql="select * from ".$this->table." where cat_id=".$cat_id;
//		return $this->db->getRow($sql);
//	}
	//删除
	public function del1($cat_id=0){//不好屏蔽掉改了名字
//		static $i=0;
//		$child=$this->find($cat_id);
//		if($this->db->affect_rows()){
//			$i++;
//		}
//		if(!$child){
//			exit("删除成功".$i);
//		}
//		$parent=$this->select();
//		$sql="delete from ".$this->table." where cat_id=".$cat_id;
//		$this->db->query($sql);
//		foreach($parent as $v){
//			while($child['cat_id']==$v['parent_id']){
//				$sql="delete from ".$this->table." where cat_id=".$v['cat_id'];
//				$this->del($v['cat_id']);
//				$this->db->query($sql);
//			}
//		}
		$sql = 'delete from ' . $this->table . ' where cat_id=' . $cat_id;
        $this->db->query($sql);

        return $this->db->affect_rows();
		//遗留问题 递归全部删除
		
//		$child=$this->find($cat_id);
//		$sql="select * from ".$this->table." where parent_id=".$cat_id;
//		$son=$this->db->query($sql);
//		$parent=$this->select();
//		$sql = 'delete from ' . $this->table . ' where cat_id=' . $cat_id;	
//		$this->db->query($sql);		
//		if(!empty($son)){
//			foreach($parent as $v){
//				while($child['cat_id']==$v['parent_id']){
//					foreach(){
//						return $this->del($v['cat_id']);
//					}
//				}
//			}
//		}
	}
	//编辑
//	public function update($data){
//		  $this->db->autoExecute($this->table,$data,'update',' where cat_id='.$data['cat_id']);
//		  return $this->db->affect_rows();
//	}
}
?>
