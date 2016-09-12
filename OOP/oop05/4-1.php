<?php
/**
 * Created by PhpStorm.
 * User: hui
 * Date: 2016/9/12
 * Time: 14:56
 */

header("content-type:text/html;charset=utf-8");

/*__invoke()
    把对象当作函数去调用时,自动触发
    1.类似于tostring
    2.把对象当作函数去调用.
*/

class A
{
    public function __invoke()
    {
        echo '啊,我被调用了<br>';
    }
}

$p = new A();
$p();   //把对象当作函数一样去调用