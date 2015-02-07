<?php
namespace Home\Model;
use Think\Model;
class UserModel extends Model {
	protected $patchValidate = true;//批量验证
	protected $_validate=array(//自动验证
	   array('username','/^[\d\w_]{4,20}$/','用户名的长度是4到20，且只能是英文数字'),
	   array('password','/^(.){4,16}$/','密码长度在4-16位，必须是英文或数字'),
	   array('password2','password','确认密码不正确',0,'confirm'), 
	   array('username','','帐号名称已经存在！',0,'unique',1), 
	);
	protected $_auto= array(//自动完成
	   array('password','md5',3,'function'),
	   array('ip','get_client_ip',1,'function'),
	   array('last_time','time',3,'function'),
	   //array('create_time','time',1,'function'),
	);
    public function register($data){
		$info=array();
        /*if($data['password']!=$data['password2']|| ''==$data['password2']){
		    $info=array(
              'status' =>0,
               'info'=>'两次密码不一致',
            );
		     return $info ;
		}		
		if(!preg_match("/^([a-zA-Z_-]){4,20}$/",$data['username'])){
			$info=array(
              'status' =>0,
               'info'=>'用户名的长度是4到20，且只能是英文',
            );
			return $info;
		}		
		if($this->where("username='".$data['username']."'")->select()){
			$info=array(
              'status' =>0,
               'info'=>'用户名已注册',
            );
			return $info;
			//return '';	
		}*/
		$data_arr['username']=$data['username'];
		$data_arr['password']=md5($data['password']);
		$data_arr['password2']=md5($data['password2']);
		$data_arr['ip']=$_SERVER["REMOTE_ADDR"];
		$data_arr['last_time']=time();
		//$data_arr['create_time']=time();
		//print_r($this->create($data_arr,1));
		if(!$this->create()){			
			return $this->getError();
		}else{
			$this->add();
			$info=array(
              'status' =>1,
               'info'=>'注册成功',
            );
			return $info;
		}		
		//dump($data_arr);
		/*
		if(M('user')->add($data_arr)>0){
			$info=array(
              'status' =>1,
               'info'=>'注册成功',
            );
			return $info;
		}else{
			$info=array(
              'status' =>0,
               'info'=>'注册失败',
            );
			return $info;
		}
		*/
    }
	public function login($user_name,$user_pwd,$user_verify){
		$info=array();
		$user_pwd=md5($user_pwd);
		if(!$user_name||!$user_pwd){
		    $info=array(
			   'status' =>0,
               'info'=>'用户名不存在或密码错误，请先注册',
			 );
			 return $info;
		}
		$user_info=$this->where("username='{$user_name}'&&password='{$user_pwd}'")->find();
		//dump($user_info);	//有这条语句就不能把信息反馈到页面
		session("userid",$user_info['id']);
		// $this->assign("userid",session("userid"));
		if($user_info){
			$info=array(
			   'status' =>1,
               'info'=>'登录成功'
			 );
			 return $info;			 
		}else{
			$info=array(
			   'status' =>0,
               'info'=>'用户名不存在密码错误，登录失败',
			 );
			 return $info;
		}
		}
	
}	
	
	
?>