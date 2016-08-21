<?=
header("content-type:text/html;charset=utf-8");

/*多态性
	接口 interface
	API 应用接口
	使用 interface 关键字 定义接口
		1.接口不能被实例化
		2.接口中 只允许有 抽象方法和常量
		3.抽象方法 必须省略 abstract
		4.定义标准,继承接口.重写接口中的所有的方法
		5.实现(继承)接口,不用使用extends 要使用implements
		6.接口可以实习多继承
	接口与抽象类的区别
		1.接口中的所有的方法必须都是抽象方法,抽象类里可以有普通方法
		2.接口不能有属性,抽象类可以有属性
		3.接口实现多继承,抽象类 不可以多继承*/
		
interface User
{
//	public $name;
	const XDL = '兄弟连';
	public function demo1();
	public function demo2();
	public function demo3();
}

//$u = new User();	//接口不能被实例化
echo User::XDL;

//接口是用来实现的 implements 
class VipUser implements User
{
	public function demo1(){}
	public function demo2(){}
	public function demo3(){}
	public function demo4(){}
}

//接口实现多继承
interface A
{
	public function demo();
	public function test();
}

interface B
{
	public function demo();
	public function fun();
}

class C implements A,B
{
	public function demo(){}
	public function test(){}
	public function fun(){}
}
