<?php	
header("content-type:text/html;chatset=utf-8");

/*
 const 常量
    const 只能接受 标量
    不能在函数内部/循环内/if语句内

define(常量名,常量值,是否区分大小写);
    值只能是 标量 和 null
    值可以有 运算 或者是函数的执行结果
    不能在类的内部使用(待验证...)

区别:
    const定义常量,不能有运算(函数等..),且必须处于最顶端,因为const实在文件编译时就定义好了常量
    而define() 是一个函数,只有在被调用的时候才有去定义常量,值为标量或null,且可以产生运算.
 */
 
 /*define('DDS','大屌丝');
echo DDS.'<br>';

const HDS = '高级屌丝';
echo HDS.'<br>';

var_dump(defined('HDS'));
echo '<hr>';*/

// define('AA',array(1,2,3,4,5));//PHP7.0 以后可以定义数组!!!!
define('BB',1+2);
define('CC',max(1,5,99));

echo BB.'<br>';
echo CC.'<br>';

echo '<hr>';
const DD = 1+1;
echo DD.'<br>';

// const EE = array(1,2,3,9);
// const FF = max(1,2,3,99);
// if (true) {
//     const GG = 100;
// }
