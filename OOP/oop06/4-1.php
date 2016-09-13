<?php
/**
 * Created by PhpStorm.
 * User: hui
 * Date: 2016/9/13
 * Time: 14:55
 */

header("content-type:text/html;charset=utf-8");

//声明函数 实现两数相除
function demo($a,$b)
{
//    除数不能为0
    if ($b == 0) {
//        抛出异常
        throw new Exception('除数不能为0!',250);
    }
    return $a / $b;
}

//异常的过程
try{
    echo demo(100,0);
} catch (Exception $e) {
    echo '异常信息:'.$e->getMessage().'<br>';
    echo '异常号:'.$e->getCode().'<br>';
    echo '异常文件:'.$e->getFile().'<br>';
    echo '异常行号:'.$e->getLine().'<br>';
    echo $e.'<br>'; //__tostring()
    var_dump($e->getTrace());   //信息跟踪
    echo $e->getTraceAsString().'<br>'; //信息跟踪(字串输出)
}