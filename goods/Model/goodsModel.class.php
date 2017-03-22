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
    //得到最新商品
    public  function  getNewlist($n=5){
       $sql="select goods_id,goods_name,thumb_img,market_price,shop_price from ".$this->table." where is_new=1 order by add_time desc limit ".$n;
       return $this->db->getAll($sql);
    }
    //指定栏目商品
    public function getTarget($cat_id){
        $cate=new catModel();
        $goodsAll=$cate->select();
        $sons=$cate->getcatTree($goodsAll,$cat_id);
        $tree=array($cat_id);
        if(!empty($sons)){
            foreach ($sons as $v){
                $tree[]=$v['cat_id'];
            }
        }
        $tree=implode(',',$tree);
        $sql="select goods_id,goods_name,thumb_img,market_price,shop_price from ".$this->table." where cat_id in(".$tree.") order by add_time desc limit 5";
        $res=$this->db->getAll($sql);
        return $res;
    }
    //找爸爸
    public function getDad($goods_id){
        $sql='select cat_id from '.$this->table." where goods_id=".$goods_id;
        return $this->db->getOne($sql);
    }
    //获取购物车中商品的详细信息
    //params array $items
    public function getCartGoods($items){
//        $ids=array();
       foreach ($items as $k=>$v){
           $sql="select * from ".$this->table." where goods_id = ".$k;
           $row=$this->db->getRow($sql);
           $items[$k]['market_price']=$row['market_price'];
           $items[$k]['thumb_img']=$row['thumb_img'];
           $items[$k]['shop_price']=$row['shop_price'];
           $items[$k]['goods_name']=$row['goods_name'];
       }
       return $items;
       //$ids=array_keys($items);
//       $sql="select * from ".$this->table." where goods_id in (".implode(',',$ids).")";
//        return $this->db->getAll($sql);

    }
}
?>