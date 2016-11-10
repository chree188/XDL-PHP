<?php
header("content-type:text/html;charset=utf-8");

/*错误处理:
	1.错误级别
	2.错误的配置
		php.ini display_errors = off;
		error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
	3.自定义错误
		set_error_handler('funName');
	4.错误日志
		log_errors = On	
		
PHP异常处理
	处理逻辑错误(可预期的错误)
	如果抛出异常,throw之后的代码会终止执行
	try外面的代码,不受影响*/
	
try{
//	正常的过程
	echo "睁眼.<br>";
//	异常过程
	if(true){
//		echo '啊,我睁不开眼了,继续睡...<br>';
//		exit;
//		抛出异常
//		使用关键字throw(抛)
		throw new Exception('我,睁不开眼了,继续睡....<br>');
	}
	echo "下床.<br>";
	echo "洗脸.<br>";
	echo "刷牙.<br>";
	echo "吃饭.<br>";
}catch(Exception $e){
	echo $e->getMessage();	//获取异常信息
}

echo "我是try外部的代码!!!";
