<?php if (!defined('THINK_PATH')) exit();?><html>
<head>
<meta http-equiv="content-type" content="text/html" charset="utf-8" />
<link type="text/css" rel="stylesheet" href="/thinkphp2/Public/Css/index.css"/>
<link type="text/css" rel="stylesheet" href="/thinkphp2/Public/Static/bootstrap/css/bootstrap.css"/>
<script type="text/javascript" src="/thinkphp2/Public/Static/jquery.min.js"></script>
<script type="text/javascript" src=
"/thinkphp2/Public/Js/bootstrap.js"></script>
</head>
<body>
<header>
<script type="text/javascript">
</script>
<div id="header" class="head-box">
	<?php if($_SESSION['username'] == $username ): ?><div class="lr"> 
  <a href="<?php echo U('Home/User/login');?>">登录</a>
  <a href="<?php echo U('Home/User/register');?>">注册</a>
  <a href="<?php echo U('Home/User/logout');?>">注销</a>  
 </div>
 <?php else: ?>
 <div class="lr">
 <a href="#">欢迎，<?php echo ($_SESSION['username']); ?>用户</a>
 <a href="<?php echo U('Home/User/logout');?>">注销</a> 
</div><?php endif; ?>
 <div class="shopCar">
 <img src="/thinkphp2/Public/Img/shopCar.png" width="50px" height="50px" />
 </div>
</div>

</header>




 
<div>
    <ul class="nav nav-pills" role="tablist">
      <li role="presentation" class="active"><a href="#">商品分类</a></li>
      <li role="presentation"><a href="#">首页</a></li>
      <li role="presentation"><a href="#">促销</a></li>
      <li role="presentation"><a href="#">留言</a></li>
    </ul>
</div>


</body>
</html>