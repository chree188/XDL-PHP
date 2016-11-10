<?php
header("content-type:text/html;charset-8");

/*
 static 静态
 定义:
 用于修饰属性和方法 ,不能修饰类.可以在不用实例化类的时候去访问属性和方法
 修饰的属性: 静态属性 只能使用静态的方式去访问
 修饰的方法: 静态方法 可以使用静态方式,亦可以使用动态的方式(不推荐)

 在外部 访问静态属性/方法
 类名::$属性名;
 类名::方法名();
 在内部 访问静态属性/方法
 self::$属性名;
 self::方法名();

 如果,一个方法内部没有动态的内容,默认会把该方法当作静态的方法来处理.

 静态方法内 不允许出现动态的$this. $this就是动态的内容!
 */

class Person {
	public static $name = '小雨';
	private static $age = 18;

	public static function demo() {
		echo '啊,我是静态方法<br>';
	}

	public static function getAge() {
		return self::$age;
	}

	//		普通方法
	public function fun1() {
		echo '我是fun1<br>';
	}

	public static function fun2() {
		echo '我是fun2';
//		var_dump($this);
	}

}

//	实例化
$p = new Person();
//$p->demo();
echo '<hr>';
// echo  'name:'.$p->name.'<br>';//非静态方式访问  不可以
echo 'name:'.Person::$name.'<br>';
Person::demo();

echo '<hr>';
// echo 'age:'.Person::$age.'<br>';//3P依旧风骚!
echo '年龄:'.Person::getAge();

echo '<hr>';
// echo Person::fun1();//静态方式  (不推荐)
Person::fun2();
