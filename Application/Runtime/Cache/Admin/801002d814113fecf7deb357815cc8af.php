<?php if (!defined('THINK_PATH')) exit();?><html>
<head>
<meta http-equiv="Content-Type" content="text/html" charset=utf-8>
<link rel="stylesheet" type="text/css" href="/thinkphp2/Public/Static/bootstrap/css/bootstrap.css" />
<link rel="stylesheet" type="text/css" href="/thinkphp2/Public/Css/admin.css" />
<script type="text/javascript" src="/thinkphp2/Public/Static/jquery.min.js"></script>
<script type="text/javascript" src=
"/thinkphp2/Public/Js/bootstrap.js"></script>

<script type="text/javascript">
$(function(){
  $('#submitGood').click(function(){
    var $title=$('#title').val();
    var $inPrice=$('#inPrice').val();
    var $outPrice=$('#outPrice').val();
    var $remain=$('#remain').val();
    var $action=$('#newGood').attr('action');
    $.post($action,{title:$title,inPrice:$inPrice,outPrice:$outPrice,remain:$reamin},function(data){
      $('#notice').html(data.info);
        if(!data.info){
          alert("增加商品失败");      
        }else{
          alert("增加商品成功");
        }
    });
  })
})
</script>

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
      <a class="navbar-brand" href="<?php echo U('Home/Index/index');?>">商城</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active" name="adminIndex"><a href="#">后台主页</a></li>
        <li ><a href="<?php echo U('User/lists');?>" name="userlist">会员</a></li>
        <li><a href="<?php echo U('Goods/GoodsLists');?>">商品</a></li>
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



<div class="container-fluid">
  <div class="row">
	<div class="pull-left col-md-3 left"> 	  	
		
	<ul>
		<li>商品管理</li>
		<ul>
			<li><a href="<?php echo U('Goods/GoodsLists');?>">商品列表</a></li>
			<li><a href="<?php echo U('Goods/GoodsAdd');?>">新增商品</a></li>
		</ul>
	</ul>

	</div>	
	<div class="pull-middle col-md-9 middle ">
	   
	 <div id="notice"></div>
	<form role="form" id="newGood" action="<?php echo U('Goods/GoodsAdd');?>" enctype="multipart/form-data" method="post" >
		<h3><center>新增的商品</center></h3>
		<div class="form-group">			
			<input type="text" class="form-control" name="title" id="title" placeholder="商品名称">
		</div>
		<div class="form-group">
		  <div class="input-group">			
			<div class="input-group-addon">￥</div>
			<input type="text" class="form-control" name="inPrice" id="inPrice" placeholder="商品进货价">
		  </div>
		</div>
		<div class="form-group">
		  <div class="input-group">			
			<div class="input-group-addon">￥</div>
			<input type="text" class="form-control" name="outPrice" id="outPrice" placeholder="商品售价">
		  </div>
		</div>
		<div class="form-group">
			<input type="text" class="form-control" name="remain" id="remain" placeholder="商品存货量">
		</div>
<!-- 		<div class="form-group">
			<div class="input-group">
				<div class="input-group-addon">图片的名称</div>
				<input type="text" class="form-control" name="photo" />
			</div>
			<input type="file" name="photo" id="name" />		  
		</div> -->
		<div class="form-group">			
			<input type="text" class="form-control" name="type" id="type" placeholder="商品类型">
		</div>
		<div class="form-group">
		  <label class="radio-inline">
			<input type="radio" name="isOnSale" id="isOnsale" value="1">上架
		  </label>
		  <label class="radio-inline">
			<input type="radio" name="isOnSale" id="isOnsale" value="0">下架
		  </label>
	    </div>
		<button id="submitGood" type="submit" class="btn btn-default">确定</button>
	</form>
	
	
  </div>
  </div>
</div>

<div class="container-fluid">
    <div class="row">
      
       底部
      
    </div>
</div>