<?php if (!defined('THINK_PATH')) exit();?><header>
<meta http-equiv="content-type" content="text/html" charset="utf-8" />
<link type="text/css" rel="stylesheet" href="/thinkphp2/Public/Css/index.css"/>
<link type="text/css" rel="stylesheet" href="/thinkphp2/Public/Static/bootstrap/css/bootstrap.css"/>
<link type="text/css" rel="stylesheet" href="/thinkphp2/Public/Css/cart.css"/>
<script type="text/javascript" src="/thinkphp2/Public/Static/jquery-1.11.1.js"></script>
<script type="text/javascript" src=
"/thinkphp2/Public/Js/bootstrap.js"></script>
<script type="text/javascript" src="/thinkphp2/Public/Js/goods.js"></script>
<script type="text/javascript" src="/thinkphp2/Public/Js/jquery.cityselect.js"></script>
<nav class="navbar navbar-default" role="navigation">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="<?php echo U('Home/Index/index');?>">手表网</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="<?php echo U('Admin/Index/index');?>">后台管理</a></li>
      </ul>
      <form class="navbar-form navbar-left" role="search">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="牌子或系列">
        </div>
        <button type="submit" class="btn btn-default">搜索</button>
      </form>
      <ul class="nav navbar-nav navbar-right">
		<li><?php if($_SESSION['username'] == $username ): ?><li><a href="<?php echo U('Home/User/login');?>">登录</a></li>
 	    		<li><a href="<?php echo U('Home/User/register');?>">注册</a></li>
  				<li><a href="<?php echo U('Home/User/logout');?>">注销</a></li>
 			<?php else: ?>
 				<li><a href="#">欢迎，<?php echo ($_SESSION['username']); ?>用户</a></li>
 				<li><a href="<?php echo U('Home/User/logout');?>">注销</a> </li><?php endif; ?>
		</li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">我的购物车 <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="<?php echo U('Home/Goods/myCart');?>">我的订单</a></li>
            <li><a href="#">去结算</a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
</header>

	<ol class="breadcrumb">
  		<li><a href="#">首页</a></li>
  		<li><a href="#">CASIO</a></li>
  		<li class="active">BABY-G系列</li>
	</ol>


	<div class="contain">
		<div class="row">
			<div class="col-md-4">
				<div class="thumbnail">
					<img src="/thinkphp2/Public/Img/<?php echo ($good_info["title"]); ?>.jpg" alt="G_SHOCK1">
				</div>
			</div>
			<div class="col-md-8">
				<div class="page-header"  id="summary">
					<h3><input id="goodName" type="hidden" value="<?php echo ($good_info["title"]); ?>" /><?php echo ($good_info["title"]); ?></h3>
					<input id="goodId" type="hidden" value="<?php echo ($good_info["id"]); ?>" />
				</div>
				<div class="panel panel-default">	
					<div class="panel-body">
						<label><input id="goodPrice" type="hidden" value="<?php echo ($good_info["outPrice"]); ?>"><h4>价格:￥<?php echo ($good_info["outPrice"]); ?></h4></label>
						<div  id="city2">
								<h4 class="col-sm-2" for="rName">所在地区：</h4>
    							<div class="col-sm-2">
									<select class="prov form-control"></select>
								</div>
								<div class="col-sm-2">
									<select class="city form-control " disabled="disabled"></select>
								</div>
								<div class="col-sm-2">
									<select class="dist form-control" disabled="disabled"></select>
								</div>
    					</div>
    				</div>
					<div class="panel-body">		
						<div class="select-good-num">
							<h4 style="float:left;">数量：</h4>
							<input id="numDown" type="button" value="-"/>
							<input id="goodNum" type="text" value="1"/>
							<input id="numUp" type="button" value="+"/>
							<input id="addToCart" type="button" class="btn btn-success" value="加入购物车" />
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>