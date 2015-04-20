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
	


	<div class="contain">
      <div class="row">
      	<div class="col-md-2"> </div>
		<div class="col-md-8">
			<ul class="progress-2">
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
			<div class="page-header">
				<center><h3>填写并核对表单</h3></center>
			</div>
			<div class="panel panel-success">
				<div class="panel-heading">
					<h4>收货人信息</h4>
				</div>
				<div class="panel-body">
					<form class="form-horizontal contact_form" method="post" >
						<div class="form-group">
							<label class="col-sm-2 control-label" for="rName">收货人：</label>
							<div class="col-sm-4">
    							<input class="form-control" id="rName" placeholder="收货人名字" required/>
    						</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label" for="rName">所在地区：</label>
							<!-- 省市联动 -->
    						<div id="city">
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
						<div class="form-group">
							<label class="col-sm-2 control-label" for="address">详细地址：</label>
							<div class="col-sm-4">
    							<input class="form-control" id="address" minlength="5" required>
    						</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label" for="tel">手机号码：</label>
							<div class="col-sm-4">
    							<input type="tel" class="form-control" id="phone" placeholder="" required pattern="^\d{11}$" />
    						</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label" for="email">邮箱：</label>
							<div class="col-sm-4">
    							<input class="form-control" id="email" type="email" placeholder="" required>
    						</div>
						</div>
						<button class="btn btn-success" style="float:right;" type="submit" value="保存"  >保存信息</button>
					</form>
				</div>
			</div>
			<div class="panel panel-success">
				<div class="panel-heading">
					<h4>支付方式</h4>
				</div>
				<div class="panel-body">
					<button id="online" class='btn btn-warning' >在线支付</button>
					<button id="later" class='btn btn-warning' >货到付款</button>
				</div>
			</div>
			<div class="panel panel-success">
				<div class="panel-heading">
					<h4>送货清单</h4>
				</div>
				<div class="panel-body">
					<?php if(is_array($cart_list["result"])): foreach($cart_list["result"] as $key=>$cl): ?><table class="table table-hover" >	
			 	<tr >
					<td class="col-md-6"><img src="/thinkphp2/Public/Img/<?php echo ($cl[0][good_name]); ?>.jpg" alt="G_SHOCK1" style="width:10%">
					<span><?php echo ($cl[0][good_name]); ?></span></td>
					<td><input class="good_price" id="goodPrice<?php echo ($cl[0][good_id]); ?>" value="<?php echo ($cl[0][good_price]); ?>" name="<?php echo ($cl[0][good_price]); ?>" type="hidden">￥<?php echo ($cl[0][good_price]); ?></td>
				<!-- <td><?php echo ($cl[0][good_num]); ?></td> -->
					<td>
						<div class="select-good-num">
							<p>数量：<?php echo ($cl[0][good_num]); ?></p>
						</div>
					</td>
			 	</tr><?php endforeach; endif; ?>
				</table>
				</div>
				<div class="panel-footer">
					<h4 id="shouldPay" style="color:red; float:left;">应付金额：￥<?php echo ($cl[0][good_price]); ?> </h4>&nbsp
					<button class="btn btn-danger" type="submit" data-toggle="modal" data-target="#successAdd">提交订单</button>
				</div>
			</div>
		</div>
	</div>

	<div class="modal fade" id="successAdd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<a type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" >&times;</span></a>
					<h4 class="modal-title" id="myModalLabel">订单提交</h4>
				</div>
				<div class="modal-body">
					<h2><span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
					已成功提交</h2>
				</div>
				<div class="modal-footer">
					<a href="<?php echo U('Index/index');?>" type="button" class="btn btn-primary">确定</a>
				</div>
			</div>
		</div>

	</div>