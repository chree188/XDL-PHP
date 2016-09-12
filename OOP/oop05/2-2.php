<?php
/**
 * Created by PhpStorm.
 * User: hui
 * Date: 2016/9/12
 * Time: 14:31
 */

header("content-type:text/html;charset=utf-8");

/*__clone() 魔术方法
    在对象被克隆时 自动调用
    1.封装克隆方法 使对象不能被克隆
    2.将属性里 对象值,在克隆时也进行克隆
    3.当对象被克隆时,可以重置或设置 对象的属性
*/

/*class Person
{
//    克隆
    private function __clone()
    {
        echo '我被克隆了!<br>';
    }
}

$p1 = new Person();
$p2 = clone $p1;
*/

class A{public $name = '毛骗';}
class Man
{
    public function __construct($obj)
    {
        $this->obj = $obj;
    }
    public function __clone()
    {
        // TODO: Implement __clone() method.
        $this->obj = clone $this->obj;
    }
}

$m = new Man(new A());
var_dump($m);

$n = clone $m;
var_dump($n);