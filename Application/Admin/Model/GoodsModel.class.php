<?php
namespace Admin\Model;
use Think\Model;
class GoodsModel extends Model{
	protected $patchValidate = true;
	protected $_validate=array(
		array('title','/^(.){0,30}$/','名称在30个字内',self::EXISTS_VALIDATE),
		array('inPrice','number','必须是数字',self::EXISTS_VALIDATE ),
		array('outPrice','number','必须是数字',self::EXISTS_VALIDATE),
		array('remain','number','必须是数字',self::EXISTS_VALIDATE),
	);
	protected $_auto=array(
		array('create_time','time',self::MODEL_INSERT,'function'),
		array('update_time','time',self::MODEL_BOTH,'function'),
		//array('usename','getGoodsByUname',self::MODEL_INSERT,'callback'),
	);
	public function addGoods($data){
		$info=array();	
		//print_r($data);
		//$file=$upload->upload();
		//$data['photo']=$file[0]['savename'];
		//dumpt($data['photo']);
		if(!$this->create($data)){			
			return $this->getError();
		}else{
			$this->add();
			$info=array(
              'status' =>1,
              'info'=>'新增商品成功',
            );
			return $info[status];
		}
	}
	public function getGoodslist(){
			$goods=M('Goods');
			$page=I("p",1,"int");
			$limit=5;
			$list=$goods->order('create_time DESC ')->page($page.',5')->select();
			//$user->assign('list',$list);
			$count=$goods->count();
			$Page=new \Think\Page($count,$limit);
			$show=$Page->show();
			//$user->assign('page',$show);
			return array("lists"=>$list,"page"=>$show);
	}
	public function getGoodsByUname(){
		return $_SESSION['username'];
	}
	public function delete(){
		if(IS_GET){
			$uid=I("id",0,'int');
			$result=M('Goods')->where("id='{$uid}'")->delete();
			return $result;
		}
	}
	public function edit($id,$data){
		$data[update_time]=time();
		return $this->where("id='$id'")->save($data);
		
	}
	public function getGoodsById($id){
		return $this->where("id='{$id}'")->find();
	}
}