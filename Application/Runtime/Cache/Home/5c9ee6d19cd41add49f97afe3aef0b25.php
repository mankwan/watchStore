<?php if (!defined('THINK_PATH')) exit();?><html>
<head>
<meta http-equiv="content-type" content="text/html" charset="utf-8" />
<script src="/thinkphp2/Public/Static/jquery.min.js"></script>
<link type="text/css" rel="stylesheet" href="/thinkphp2/Public/Css/user.css"/>
<script>
$(function(){
	$('#toLogin').click(function(){
		//var $username=$('#username').val();
		//var $userpwd=$('#userpwd').val();
		var form_attr =$('#login_form').serialize();
		var $action =$('#login_form').attr('action');
		$.post($action,form_attr,function(data){
			//console.log(data);
			$('#loginInfo').html(data.info);//data.info在页面提示信息
			if(data.info=="登录成功"){
				alert(data.info);
				location.href="../Index/index";
				//$().attr("");
			}else{
				alert(data.info);
			}
		});
	})
})
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
  <div class="r-text"><center>如有账户，请登录</center></div>
  <div id="loginInfo"></div>

<form action="<?php echo U('Home/User/login');?>" method="post" id="login_form"> 
<table>
<tr>
<td>用户名:</td><td><input id="username" type="text" name="username"/></td>
</tr>
<tr>
<td>密码:</td><td><input id="password" type="password" name="password" /></td>
</tr>
<tr>
<td colspan="2"><input type="checkbox"  name="keep" value="yes">在电脑上记住用户名
</td>
</tr>
<tr>
<td>验证码：</td><td><input id="verify" type="text" name="verify">
</td>
<tr>
<td colspan="2"><img id="verifyImg" src="<?php echo U('Home/User/verify');?>" onClick="this.src=this.src"/></td>
<tr>
<td><input id="toLogin" type="button" value="确定登录" /></td>
<td><input type="reset" value="重新填写"  /></td>
</tr>
<tr>
<td><a href="register.html"><input type="button" value="注册" /></a></td>
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