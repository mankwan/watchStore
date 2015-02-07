<?php
namespace Admin\Model;
use Think\Model;
class UserModel extends Model{
	public function getUserlist(){
			$user=M('User');
			$page=I("p",1,"int");
			$limit=5;
			$list=$user->order('last_time DESC ')->page($page.',5')->select();
			//$user->assign('list',$list);
			$count=$user->count();
			$Page=new \Think\Page($count,$limit);
			$show=$Page->show();
			//$user->assign('page',$show);
			return array("lists"=>$list,"page"=>$show);
	}
	public function delete(){
		if(IS_GET){
			$uid=I("id",0,'int');
			$result=M('User')->where("id='{$uid}'")->delete();
			return $result;
		}
	}
}