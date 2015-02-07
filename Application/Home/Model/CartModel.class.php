<?php
namespace Home\Model;
use Think\Model;
class CartModel extends Model{
	public function addToCart($uid,$good_id,$good_num,$good_price,$good_name){
		$arr=array("good_id"=>$good_id,"good_num"=>$good_num,"good_price"=>$good_price,"good_name"=>$good_name);
		$data=unserialize($this->getCart($uid));
		
		$is_repeat=false;
		foreach ($data as $k=>$v){
			if($v["good_id"]==$good_id){
					$data[$k]["good_num"]==$good_num;
					$data[$k]["good_price"]==$good_price;
					$data[$k]["good_name"]==$good_name;
					$is_repeat=true;
					break;
			}
		}
		if(!$is_repeat){
				$data[]=$arr;
		}
		$data=serialize($data);//把商品序列化
		$ndata=array();
		$ndata["uid"]=$uid;
		$ndata["update_time"]=time();
		$ndata["gid"]=$good_id;
		$ndata["info"]=$data;
		$checkRepeat=$this->where("gid=$good_id")->getField("info");
		if(isset($checkRepeat)){
		 	$this->where("gid=$good_id")->save($ndata);
		}else{
			$this->add($ndata,array(),true);//TRUE”把同一条更新，把uid设成唯一索引
			//echo $this->getLastSql();
		 }
	}
	public function getCart($uid){
		return $this->where("id='{$uid}'")->getField("info");
	}
	public function getCartlist($uid){
			$cart=M('Cart');
			$goods=M('Goods');
			$list=$cart->where("uid='$uid'")->getField('gid',true);
			//$goodName=$goods->where("id=$list")->getField('title',true);
			$detail=$cart->where("uid='$uid'")->getField('info',true);
			foreach($detail as $k=>$v){
				$result[$k] = unserialize($detail[$k]);
			}
			//$a=json_encode($result);
			// echo $this->getLastSql();
			return array("list"=>$list,"result"=>$result);
			
	}
}