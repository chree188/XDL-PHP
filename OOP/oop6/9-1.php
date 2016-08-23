<?php	
header("content-type:text/html;charset=utf-8");

//	PHP中的类与对象的相关函数

class A
{
	public $name;
	public $age;
	private $grade;
	protected $sex;
	
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
function __autoload($classname)
{
	echo '啊,我被触发了!';
	var_dump($classname);
}

//判断某个类是否存在
echo "class_exists('classname'):<br>";
var_dump(class_exists('A'));	//1
var_dump(class_exists('B'));	//1
var_dump(class_exists('G'));	//0
var_dump(class_exists('G',false));	//0
echo '<hr>';

//获取类或对象中的所有公有方法
echo "get_class_emthods(类名或对象):<br>";
var_dump(get_class_methods('A'));
var_dump(get_class_methods($b));
var_dump(get_class_methods($c));	//empty array()
echo '<hr>';

//获取类中所有的公有属性
echo "get_class_vars():<br>";
var_dump(get_class_methods('A'));
var_dump(get_class_methods($b));
var_dump(get_class_methods($c));//empty array()
echo '<hr>';

//获取类中所有的公有属性
echo "get_class_vars():<br>";
var_dump(get_class_vars('A'));
// var_dump(get_class_vars($a));
echo '<hr>';

//获取对象中所有的公有属性
echo "get_object_vars():<br>";
// var_dump(get_object_vars('A'));
var_dump(get_object_vars($a));
echo '<hr>';


//返回对象的类名
echo "get_class():<br>";
echo '$a的类名是:'.get_class($a).'<br>';
echo '$b的类名是:'.get_class($b).'<br>';
echo '<hr>';

//返回对象或类的父类名
echo 'get_parent_class():<br>';
echo '$b父类名:'.get_parent_class($b).'<br>';
echo 'B类的父类名:'.get_parent_class('B').'<br>';
echo 'A类的父类名:'.get_parent_class('A').'<br>';
echo '<hr>';

//判断方法是否存在
echo "method_exists(对象或类名, '方法名'):<br>";
var_dump(method_exists('A','fun1'));
var_dump(method_exists($a,'fun1'));
var_dump(method_exists('A','hehe'));
echo '<hr>';

//判断属性是否存在
echo "property_exists(对象或类名, '属性名'):<br>";
var_dump(property_exists('A','hehe'));
var_dump(property_exists($a,'name'));
echo '<hr>';

//is_a(对象, '类名')
var_dump(is_a($a, 'A'));
var_dump(is_a($b, 'A'));
var_dump(is_a($c, 'A'));

//获取所有已经定义的类(包括系统的类)
echo '<pre>';
    // var_dump(get_declared_classes());
    print_r(get_declared_classes());
echo '</pre>';

$h = new stdClass();
$h->name = '猎空';

var_dump($h);
