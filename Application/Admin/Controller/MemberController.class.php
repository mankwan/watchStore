<?php
namespace Admin\Controller;
use Admin\Controller\AdminBaseController;

class MemberController extends AdminBaseController{
	public function index($page=1){
		if($page<=0){
			$page=1;
		}
		$this->reqLogin();
		$user=$this->reqLoginmember();
		$this->assign('user',$user);
		$this->display();
	}
}