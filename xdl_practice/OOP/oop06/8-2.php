<?php
/**
 * Created by PhpStorm.
 * User: hui
 * Date: 2016/9/13
 * Time: 16:40
 */

header("content-type:text/html;charset=utf-8");

//系统错误以异常的形式抛出
//自定义一个错误处理
set_error_handler('systemError');

function systemError($error,$errstr,$errfile,$errline)
{
    throw new Exception($error.':'.$errstr.':'.$errfile.':'.$errline);
}

//声明一个回调函数
function autoException($e)
{
    echo $e->getMessage();
}
//自动接收异常
set_exception_handler('autoException');

echo $b;    //系统错误

/*try{
    echo $a;    //系统错误
} catch (Exception $e) {
    echo $e->getMessage();
}*/