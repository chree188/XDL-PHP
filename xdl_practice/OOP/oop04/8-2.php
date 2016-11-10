<?php
/**
 * Created by PhpStorm.
 * User: hui
 * Date: 2016/9/8
 * Time: 20:30
 */

header("content-type:text/html;charset=utf-8");

/*instanceof 关键字
    判断某个对象是否属于某个类或该类的子类的实例
    返回的true/false*/

class A{}
class B{}
class C extends A{}

$a = new A();
$b = new B();
$c = new C();

if ($a instanceof A) {
    echo '$a 是A的实例';
} else {
    echo '$a 不是A的实例';
}

echo '<hr>';

if ($b instanceof A) {
    echo '$b 是A的实例';
} else {
    echo '$b 不是A的实例';
}

echo '<hr>';

if ($c instanceof A) {
    echo '$c 是A的实例';
} else {
    echo '$c 不是A的实例';
}