<?php
    /*错误的级别*/
    // error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING & ~E_ERROR);
    // ini_set('display_errors','Off'); //临时关闭错误显示
    gettype($a);   
    //Notice: Undefined variable: a in s50\php_10\7.php on line 4
    // 提示  未定义变量 a
    gettype();
    // Warning: gettype() expects exactly 1 parameter
    // 警告 期望一个精确的参数
    gettype1();
    // Fatal error: Call to undefined function gettype1()
    // 致命的错误: 调用了一个未定义的函数
    // echo 'aaaaaa';
    
    // echo ini_get('error_log');
   
  