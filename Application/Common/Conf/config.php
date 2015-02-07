<?php
return array(
	//'配置项'=>'配置值'
	'SHOW_PAGE_TRACE'=>true,
	'DB_TYPE'=>'mysql',
	'DB_HOST'=>'localhost',
	'DB_Name'=>'thinkphp2',//数据库名
	'DB_USER'=>'zhou',
	'DB_PWD'=>'zhou',
	'DB_PORT'=>'3306',
	'DB_PREFIX'=>'tp_',//表的前缀名
	'DB_CHARSET'=>'utf-8',
	//'SHOW_PAGE_TRACE'=>true,
	//'DEFAULT_THEME'=>'my',
	//'THEME_LIST'=>'your,my'
	'TMPL_PARSE_STRING'=>array(
	'__STATIC__'=>__ROOT__.'/Public/Static',
	'__IMG__'=>__ROOT__.'/Public/Img',
	'__CSS__'=>__ROOT__.'/Public/Css',
	'__JS__'=>__ROOT__.'/Public/Js',

	// $config=array(
	// 	'maxSize' => 3145738,
	// 	'savePath' =>'./Public/Img',
	// 	'exts' =>array('jpg','png','gif','jpeg'),
	// 	'autoSub' =>true,
	// 	'subName' =>array('date','Ymd'),
	// ),
	)

);
?>