<?php
namespace Common\Controller;
use Think\Controller;

class BaseController extends Controller{
	protected function getlogin(){//获得登录信息
		$user=session("user");
		if($username==NULL){
			$this->ajaxReturn("error");
		}else{
			return $this;
		}
	}
	protected function reqLoginmember(){//获取当前登录会员资料
		$user=session("user");
		unset($user["password"],$user["username"]);
		return $user;
	}
	protected function reqLogin(){//需要登录时候
		return $this->getlogin();
	}
}