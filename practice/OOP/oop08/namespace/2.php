<?php
/**
 * Created by PhpStorm.
 * User: hui
 * Date: 2016/9/18
 * Time: 14:28
 */

//呵呵
namespace dds;

header("content-type:text/html;charset=utf-8");

function var_dump()
{
    echo '哈哈<br>';
}

var_dump(); //自定义的函数
\var_dump(123); //系统的函数
echo '<hr>';
\dds\var_dump();    //绝对调用