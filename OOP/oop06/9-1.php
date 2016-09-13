<?php
/**
 * Created by PhpStorm.
 * User: hui
 * Date: 2016/9/13
 * Time: 16:46
 */

header("content-type:text/html;charset=utf-8");

/*
 * 类与对象的相关函数
 * 1.class_exists(className)
 * 2.get_class_methods(className/obj)
 * 3.get_class_vars(className)
 * 4.get_object_vars(obj)
 * 5.get_class(obj)
 * 6.get_parent_class(className/obj)
 * 7.method_exists(className/obj,'methodname')
 * 8.property_exists(className/obj,'attrname')
 * 9.is_a(obj,'className')
 * 10.get_declared_classes()
 * 11.stdClass()
 */

class A
{
    public $name;
    public $age;
    protected $sex;
    private $class;

    public function fun1(){}
    public function fun2(){}
    private function fun3(){}
    protected function fun4(){}
}
class B extends A{}
class C{}

//实例化
$a = new A();
$b = new B();
$c = new C();
var_dump($a);

//判断某个类是否存在
echo 'class_exists(className):<br>';
var_dump(class_exists('A'));
var_dump(class_exists('B'));
var_dump(class_exists('F'));
//var_dump(class_exists('F',false));  //false不会触发自动加载类 __autoload()
echo '<hr>';

//获取类 或对象中的所有公有方法
echo 'get_class_methods(className/obj):<br>';
var_dump(get_class_methods('A'));
var_dump(get_class_methods($c));
var_dump(get_class_methods($b));
echo '<hr>';

//获取类中 所有的共同属性
