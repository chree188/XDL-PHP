<?php
/**
 * Created by PhpStorm.
 * User: hui
 * Date: 2016/9/12
 * Time: 19:46
 */

header("content-type:text/html;charset=utf-8");

/*类型约束
只能用来约束 参数的类型,且只能约束为 数组/对象*/

function test(array $a)
{
    var_dump($a);
}

//test(123);
test([1,2,3,4,5]);

echo '<hr>';
//约束对象
class A{}
class B{}
class C extends A{}
//指定约束类为对象(A类的对象),传入类名A
//可是用于 本类 及 子类
function demo(A $param)
{
    var_dump($param);
}

demo(new A());
//demo(new B()); //NO
demo(new C());
//demo(1234); //NO