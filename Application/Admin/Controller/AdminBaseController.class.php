<?php
namespace Admin\Controller;
use common\Controller\BaseController;

class AdminController extends BaseController{
	//需要登录，没有登录就跳转到登录页面
	public function reqLogin(){
		$user=session("username");
		if($user==NULL){
			$this->redirect('Home/View/User/login');
		}else{
			return $this;
		}
	}
	
}