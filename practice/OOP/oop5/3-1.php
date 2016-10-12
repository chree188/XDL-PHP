<?php
header("content-type:text/html;charset=utf-8");

/*__invoke()
 把对象当做函数一样去调用时,自动触发
 作用:
 1.类似于__tostring.
 2.把对象当函数去使用.
 */

class A {
	public function __invoke() {
		echo '啊!我被调用了!!!<br>';
	}

}

$p = new A();
$p();
