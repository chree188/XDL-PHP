<?php
$config = array(
	'TMPL_PARSE_STRING' => array(
		'__STATIC__' => __ROOT__ . '/Public/Static',
		'__IMG__' => __ROOT__ . '/Public/' . APP_NAME . '/images',
		'__CSS__' => __ROOT__ . '/Public/' . APP_NAME . '/css',
		'__JS__' => __ROOT__ . '/Public/' . APP_NAME . '/js',
	),
	//用于异位或加密的KEY
	'ENCTYPTION_KEY' => 'taibuluoHelloW',
	//自动登录保存时间
	'AUTO_LOGIN_TIME' => time() + 3600 * 24 * 7,	//一个星期
	/* 自定义配置与函数 */
	//'LOAD_EXT_CONFIG'=>'function',
	'LOAD_EXT_FILE' => 'functions',
	//url模式
	'URL_MODEL' => 2,
	//URL 区分大小写
	'URL_CASE_INSENSITIVE' => TRUE,
	//URL 伪静态
	'URL_HTML_SUFFIX' => 'html',
	//VAR_FILTERS参数，对GET POST系统变量会进行过滤
	'VAR_FILTERS' => 'htmlspecialchars',
	//开启表单验证
	'TOKEN_ON' => false,
	
/*	//令牌验证的表单隐藏字段名称
	'TOKEN_NAME' => '__hash__',
	//令牌哈希验证规则 默认MD5
	'TOKEN_TYPE' => 'md5',
	//令牌验证出错是否重置令牌
	'TOKEN_RESET' => true,
*/
	//开启路由
	'URL_ROUTER_ON' => false,
	// 配置路由 简化URL
	'URL_ROUTE_RULES' => array(
		'study/:id\d' => 'study/detail',//简化泰学习详情页链接
		'travel/:id\d' => 'travel/detail',//简化泰好玩详情页链接
		'discuss/:id\d' => 'discuss/detail',//简化泰讨论详情页链接
	),

);
return array_merge(include './Conf/config.php', $config);
?>