<?php
namespace Home\Model;
use Think\Model;
class GoodsModel extends Model{
	public function getGoodsById($id){
		return $this->where("id='{$id}'")->find();
	}
	public function getGoodslist(){
			$goods=M('Goods');
			$list=$goods->where("type='casio'")->select();
			//$this->assign('list',$list);
			//$user->assign('page',$show);
			return array("list"=>$list);
	}
}