<?php	
header("content-type:text/html;charset=utf-8");

//让系统错误	以异常的形式抛出
//set_error_handler('回调函数的名字');

//定义函数,以异常的形式抛出系统的错误!
function systemError($error,$errstr,$errfile,$errline)
{
	echo '发生了系统级别的错误!!<br>';
//	echo $error.':'.$errstr.':'.$errfile.':'.$errline;
	throw new Exception($error.':'.$errstr.':'.$errfile.':'.$errline);
}

//自动接收异常
set_error_handler('systemError');

//声明回调函数
function autoException($e)
{
	echo '我被调用了!!!';
	echo $e->getMessage();
}
set_exception_handler('autoException');	//注册到系统

echo $hehe;
/*try {
    //制造系统错误
    echo $b;
} catch (Exception $e) {
    echo $e->getMessage();
}
*/