<?php
/*
	
	修复 - 未读数量不准确
	修复 - 后台配置 配置手机模板 提示帮助
	后台 - 优化在线升级
	
	优化 - 申请APP KEY 不再需要IP

	框架 - 日志文件改为php后缀 并只允许 管理员查看
	框架 - 但凡使用AJAX访问, 出现语法错误 则使用AJAX错误消息

*/
if(version_compare(PHP_VERSION,'5.3.0','<'))die('You Need PHP Version > 5.3.0 !  You PHP Version = ' . PHP_VERSION);


define('HYBBS_V','1.4.0.19');
define('INDEX_PATH' , str_replace('\\', '/', dirname(__FILE__)).'/');

define('DEBUG'      ,(is_file(INDEX_PATH . 'DEBUG'))?false:true);
define('PLUGIN_ON'  ,true);
define('PLUGIN_ON_FILE',true);
require INDEX_PATH . 'HY/HY.php';