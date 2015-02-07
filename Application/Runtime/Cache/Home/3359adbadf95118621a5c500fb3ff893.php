<?php if (!defined('THINK_PATH')) exit();?><html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>register</title>
<script src="/thinkphp2/Public/Static/jquery.min.js"></script>
<link type="text/css" rel="stylesheet" href="/thinkphp2/Public/Css/user.css"/>
<script>
//用js拦截表单
$(function(){
	$('#submit').click(function(){
		var $uname=$('#username').val();
		var $upwd=$('#password').val();
		var $upwd2=$('#password2').val();
		var $action =$('#register_form').attr('action');
		$.post($action,{username:$uname,password:$upwd,password2:$upwd2},function(data){
			//console.log(data);
			$('#notice').html(data.info);//data.info在页面提示信息
			if(!data.info){
				alert("注册失败");
				$('#notice').html('');
				$('#notice').html('');
				$('#notice').html('');
				if(data['username']){
				$('#notice').html(data['username']);
			}
			if(data['password']){
				$('#notice').html(data['password']);			
			}
			if(data['password2']){
				$('#notice').html(data['password2']);			
			}
			}else{
			    alert("注册成功");
			    window.location.href='../Index/index.html';	
			}
		},'json');
	})
})
function changeVerify(){
	document.getElementById("verifyImg").src="<?php echo U('Home/User/verify');?>";
}
</script>
</head>
<body>
<header>
<div id="header" class="head-box">
 <div class="logo">
 <img src="/thinkphp2/Public/Img/cat.jpg" />
 </div>
 <div class="title">Welcome<span>手办网</span></div>
</div>
</header>


<div class="box">
  <div class="l-img"></div>
  <div class="r-content">
  <div class="r-text"><center>新用户注册</center></div>
  <div id="notice"></div>
<form id="register_form" action="<?php echo U('Home/User/register');?>" method="post"> 
<table>
<tr>
<td>用户名:</td><td><input id="username" type="text" name="username"/></td>
</tr>
<tr>
<td>密码:</td><td><input id="password" type="password" name="password" /></td>
</tr>
<tr>
<td>确认密码:</td><td><input id="password2" type="password" name="password2" /></td>
</tr>
<tr>
<td>验证码：</td><td c><input id="verify" type="text" name="verify">
</td>
<tr>
<td colspan="2"><img id="verifyImg" src="<?php echo U('Home/User/verify');?>" onClick="changeVerify()"/></td>
</tr>
<tr>
<td><input id="submit" type="button" value="确定并注册"/></td>
<td><input id="reset" type="button" value="重新填写"  /></td>
</tr>
</table>
</form>
  </div>
</div>

<footer>
<div class="foot-box">
  <div class="foot-text">BY MenKwan</div>
  <div class="foot-img"></div>
</div>

</footer>
</body>
</html>