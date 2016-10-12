<?php
/**
 * Created by PhpStorm.
 * User: hui
 * Date: 2016/9/8
 * Time: 19:38
 */

header("content-type:text/html;charset=utf-8");
/*
const 常量
    const 只能接受静态标量
    不能在if/函数中/循环内 使用const定义常量
define('常量名','常量值',是否区分大小写)
    值只能 标量和null
    值可以有运算或函数调用
    不能在内的内部定义

const定义常量,不能有动态运算(函数).必须写在文件的最顶端,因为它是在编译时就定义好的
而define()是一个函数,只在调用时才会定义一个常量
*/

define('DDS','大屌丝');
echo DDS.'<br>';

const HDS = '高级屌丝';
echo HDS.'<br>';
var_dump(defined('HDS'));

echo '<hr>';
//define('AA',array(1,2,3,9));    //php7.0 里可以定义数组
define('BB',1+2);
define('CC',min(1,2,3,99));

const DD = 1+1;
echo DD.'<br>';

const EE = array(1,2,3,5);
//const FF = min(1,2,3,99);
/*if (true) {
    const GG = 56;
}*/

