<?php 
/*对象
    世间万物皆对象
    客观存在的任何一个实体 都是一个对象
类
    对相同或相似对象的抽象描述
类与对象的关系
    现有类 才有对象  通过类实例化出来对象

类的定义格式
    [修饰符] class 类名{
        [成员属性]
            不能重复定义
            可以有默认值
            默认值不能是变量
            默认值不能有运算
            默认值可以是常量
            值可以是任意类型
        [成员方法]
            与函数一致
            可以直接使用成员属性
    }

成员属性的作用:
    如果在多个方法之间,要进行数据传递,就需要用到属性
成员方法的作用:
    给类提供功能,让对象有事情可做.

类的实例化
    new 每次new 都会得到一个新的对象
        使用new 的时候,会自动调用构造方法

对象成员的访问
    ->  成员访问符
        $obj->name;  (name不能加$,如果加了可变变量)
        $obj->say();

伪变量
    $this  代表的是对象  表示的是自己
    成员方法不能在外部访问成员属性,但是可以通过$this在内部访问自己的属性.

构造方法  __construct()
    使用new关键字 得到对象的时候,自动调用,一般用于初始化.
    1.与类名相同 的方法
    2.PHP特有的 __construct()

析构方法  __destruct()
    对象被销毁的时候自动调用.
    用于写遗言

=
    取别名  不会产生新的对象
==
    只要两个对象是同一个类的实例,并且所有的属性及值 都相同则相等.
===
    判断两个对象是不是同一个对象
 */
 
 /*
//变量的引用传值
$a = 10;
//相当于 $num = $a 
function test(&$num)
{
    $num = 20;
}
test($a);
echo $a;*/


	class Person
	{
	    public $name = 'jack';
	}
	$p = new Person;
	
	// $obj = $p 等同于取别名
	function test($obj)
	{
	    $obj->name = 'Tom';
	    //函数内 并没有产生新的对象.
	}

test($p);
echo $p->name;
//对象的特性: 引用传值
