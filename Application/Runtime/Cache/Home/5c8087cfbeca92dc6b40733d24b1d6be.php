<?php if (!defined('THINK_PATH')) exit();?><header>
<meta http-equiv="content-type" content="text/html" charset="utf-8" />
<link type="text/css" rel="stylesheet" href="/thinkphp2/Public/Css/index.css"/>
<link type="text/css" rel="stylesheet" href="/thinkphp2/Public/Static/bootstrap/css/bootstrap.css"/>
<link type="text/css" rel="stylesheet" href="/thinkphp2/Public/Css/cart.css"/>
<script type="text/javascript" src="/thinkphp2/Public/Static/jquery-1.11.1.js"></script>
<script type="text/javascript" src=
"/thinkphp2/Public/Js/bootstrap.js"></script>
<script type="text/javascript" src="/thinkphp2/Public/Js/goods.js"></script>
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
	


	<div class="contain">
      <div class="row">
      	<div class="col-md-2"> </div>
		<div class="col-md-8">
			<ul class="progress-1">
				<li class="step-1">1.我的购物车</li>
				<li class="step-2">2.填IE核对订单信息</li>
				<li class="step-3">3.成功提交</li>
			</ul>
		</div>
		<div class="col-md-2"></div>
	  </div>
	</div>
	<div class="contain">
		<div class="col-md-2"> </div>
		<div class="col-md-8">
			<table class="table table-striped table-hover">		
			<center><h3>我的购物车</h3></center>
			<thead >
				<th><input type="checkbox" id="checkall" name="checkall" >全选</th>	
				<th>商品</th>
				<th>价格</th>
  				<th>数量</th>
				<th>操作</th>
			</thead>
			<?php if(is_array($cart_list["result"])): foreach($cart_list["result"] as $key=>$cl): ?><tr class="success">
				<td class="col-md-1"><input type="checkbox" class="checkone" name="<?php echo ($cl[0][good_id]); ?>"></td>
				<td class="col-md-6"><img src="/thinkphp2/Public/Img/<?php echo ($cl[0][good_name]); ?>.jpg" alt="G_SHOCK1" style="width:10%">
				<span><?php echo ($cl[0][good_name]); ?></span></td>
				<td><input class="good_price" id="goodPrice<?php echo ($cl[0][good_id]); ?>" value="<?php echo ($cl[0][good_price]); ?>" name="<?php echo ($cl[0][good_price]); ?>" type="hidden">￥<?php echo ($cl[0][good_price]); ?></td>
				<!-- <td><?php echo ($cl[0][good_num]); ?></td> -->
				<td><div class="select-good-num">
					<form >
						<input  class="numDown" name="<?php echo ($cl[0][good_id]); ?>"  type="button" value="-"/>
						<input class="input-mini" id="goodNum<?php echo ($cl[0][good_id]); ?>" type="text" value="<?php echo ($cl[0][good_num]); ?>"/>
						<input class="numUp" name="<?php echo ($cl[0][good_id]); ?>" type="button" value="+"/>
					</form>
				</div></td>
				<td>删除</td>
			 </tr><?php endforeach; endif; ?>
			</table>
			<div id="cart_total" >
				<h4>总价格：</h4>
				<div id="total_price" class="col-md-2">
				</div>
				<div id="confirm" class="col-md-4">
					<a href="<?php echo U('Goods/checkCart',array('id'=>$gl['id']));?>" class="btn btn-success" role="button">确定</a> 
				</div>
			</div>
		</div>
	</div>