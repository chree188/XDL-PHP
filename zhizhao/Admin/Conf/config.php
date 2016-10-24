<?php
$config = array(
	'TMPL_PARSE_STRING' => array(
		'__STATIC__' => __ROOT__ . '/Public/static',
		'__IMG__' => __ROOT__ . '/Public/' . APP_NAME . '/images',
		'__CSS__' => __ROOT__ . '/Public/' . APP_NAME . '/css',
		'__JS__' => __ROOT__ . '/Public/' . APP_NAME . '/js',
		'__Template__' => __ROOT__ .'/public/' .APP_NAME .'/template'

	),
	
	/* 自定义配置与函数 */
	'LOAD_EXT_FILE'=>'functions',
	
	'URL_HTML_SUFFIX' => '',
	'SHOW_PAGE_TRACE' => false,
);
return array_merge(include './Conf/config.php', $config);
?>