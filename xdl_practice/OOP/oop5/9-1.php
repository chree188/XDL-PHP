<?php
header("content-type:text/html;charset=utf-8");

/*PHP的类型约束
	只能用来约束  参数的类型.且只能约束为  数组或对象*/
	
/*C语言
char name = 'yanyan';
int num = 10;*/

//约束参数必须是数组
function test(array $a)
{
	var_dump($a);
}
//test(12);
test(array(1,2,3,4));

echo '<hr>';
class A{}
class B{}
class C extends A{}

//指定约束的类名
function demo(A $params)
{
	var_dump($params);
}

demo(new A());
demo(new C());
demo(new B());