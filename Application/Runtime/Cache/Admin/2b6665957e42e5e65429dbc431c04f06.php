<?php if (!defined('THINK_PATH')) exit();?><html>
<head>
<meta http-equiv="Content-Type" content="text/html" charset=utf-8>
<link rel="stylesheet" type="text/css" href="/thinkphp2/Public/Static/bootstrap/css/bootstrap.css" />
<link rel="stylesheet" type="text/css" href="/thinkphp2/Public/Css/admin.css" />
<script type="text/javascript" src="/thinkphp2/Public/Static/jquery.min.js"></script>
<script type="text/javascript" src=
"/thinkphp2/Public/Js/bootstrap.js"></script>
</head>
<body>
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
      <a class="navbar-brand" href="#">商城</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active" name="adminIndex"><a href="#">后台主页</a></li>
        <li ><a href="<?php echo U('User/lists');?>" name="userlist">会员</a></li>
        <li><a href="<?php echo U('Goods/lists');?>">商品</a></li>
        <li class="dropdown" name="goodlist">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">商品<span class="caret"></span>
          </a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="#">特惠商品</a></li>
            <li><a href="#">最新商品</a></li>
            <li class="divider"></li>
            <li><a href="#">Hi</a></li>
            <li class="divider"></li>
            <li><a href="#">hi</a></li>
          </ul>
        </li>
      </ul>
      <form class="navbar-form navbar-left" role="search">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Search">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
      </form>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#">我的购物车</a></li>
        <li><button type="button" class="btn btn-default navbar-btn">登录</button>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">设置<span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li class="divider"></li>
            <li><a href="#">Separated link</a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

<script type="text/javascript">

</script>

<div class="container-fluid">
  <div class="row">
	<div class="pull-left col-md-3 left"> 	  	
		
	<ul>
		<li>商品管理</li>
		<ul>
			<li><a href="<?php echo U('Goods/Goods');?>">商品列表</a></li>
			<li><a href="<?php echo U('Goods/add');?>">新增商品</a></li>
		</ul>
	</ul>

	</div>	
	<div class="pull-middle col-md-6 middle ">
	   
	<table class="table table-striped table-hover">
	<thead>
		<th>id</th>
		<th>商品名称</th>
		<th>商品价格</th>
		<th>销量</th>
		<th>货存量</th>
		<th>创建时间</th>
		<th>更新时间</th>
		<th>状态</th>
		<th>操作</th>
	</thead>
	<tbody>
		<?php if(is_array($user_list["lists"])): foreach($user_list["lists"] as $key=>$ul): ?><tr>
		<td><?php echo ($ul["id"]); ?></td>
		<td><?php echo ($ul["username"]); ?></td>
		<td><?php echo ($ul["ip"]); ?></td>
		<td><?php echo (date("Y-m-d H:i:s", $ul["last_time"])); ?></td>
		<td><a href="<?php echo U('User/lists',array('id'=>$ul['id']));?>">删除</a></td>	
		</tr><?php endforeach; endif; ?>
	</tbody>
	<tfoot>
		<th colspan="6"><?php echo ($user_list["page"]); ?></th>
	</tfoot>
	
  </div>
  </div>
</div>

<div class="container-fluid">
    <div class="row">
      
	

    </div>
</div>