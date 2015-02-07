<?php
namespace Home\Controller;
use Think\Controller;
//use Think\Controller;
class UserController extends Controller {
    public function index(){
        $this->display();
    }
	public function login(){
		if(IS_POST){
		   $data=I("post.");
		   $_SESSION['username']=$data['username'];
		   $this->assign('username',$_SESSION[username]);
		   $this->ajaxReturn(D('User')->login($data['username'],$data['password'],$data['verify']));
		}else{
		   $this->display();
		}	
	}
	public function register(){
		if(IS_POST){
			$data=I('post.');		
			$this->ajaxReturn(D('User')->register($data));//使用模板Model的register,把方法中return 的东西show 出来
			
		}else{
		    $this->display();
		}
		
		/*
		if(IS_POST){
			$data=I('post.');
		if($data['password']!=$data['password2']|| ''==$data['password2']){
				$this->show( '两次密码不一致');
		}
		if(!preg_match("/^([a-zA-Z_-]){4,20}$/",$data['username'])){
			$this->show('用户名的长度是4到20，且只能是英文');
		}
		//if(count($this->where("username='".$data['username']."'")->select())>0){
		//	$this->show( '已被注册');
		//}
		
		$data_arr['username']=$data['username'];
		$data_arr['password']=$data['password'];
		$data_arr['ip']=$_SERVER["REMOTE_ADDR"];
		$data_arr['last_time']=time();
		dump($data_arr);
		if(M('User')->add($data_arr)>0){
			$this->show('注册成功');
		}else{
			$this->show('注册失败');
		}
		}else{
			$this->display();
		}
		*/
	}
	public function verify(){
	    $Verify= new \Think\Verify();
	    $Verify->entry();
	}
	public function check_verify($code, $id=''){
		$verify = new \Think\Verify();
		return $verify->check($code,$id);
	}
	public function logout(){
		//session("$_SESSION[username]",null);
		if(isset($_SESSION['username'])){
			unset($_SESSION['username']);
			$this->success("登出成功","../Index/index");
		}else{
			$this->error("登出失败");
		}
	}
}