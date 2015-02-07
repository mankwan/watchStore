<?php
namespace Admin\Controller;
//use common\Controller\BaseController;
use  Think\Controller;
class UserController extends Controller{
	public function index(){
		header("Location:lists");
		$this->display;		
	}
	public function lists(){
		//$this->ajaxReturn(D('User')->getUserlist($data));
		$user_list=D('User')->getUserlist();
		$this->assign('user_list',$user_list);
		$result=D('User')->delete();	
		if($result){
			$this->success('删除成功','User/lists');
		}	
		$this->display();		
	}
}