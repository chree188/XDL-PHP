<?php	
header("content-type:text/html;charset=utf-8");

/*__call()
	当调用不存在的方法时 自动调用
	参1:接收调用不存在方法的 名字
	参2:接收调用不存在方法的 参数列表
	
__callStatic()
	当调用不存在的静态方法时 自动调用
	参1:接收调用不存在静态方法的  名字
	参2:接收调用不存在静态方法的  参列表
	*/
class Person
{
	public function say(){
		echo 'say...<br>';
	}
	public function eat(){
		echo 'eat...<br>';
	}
	public function __call($funName,$params){
		echo '啊,我被call了!<br>';
		echo '<pre>';
			var_dump($funName);
			var_dump($params);
		echo '</pre>';
	}
	public static function __callStatic($funName,$params){
		echo '啊,我也被call了!<br>';
		echo '<pre>';
			var_dump($funName);
			var_dump($params);
	}
}

//实例化
$p = new Person();
$p->say();
$p->eat();

echo '<hr>';
$p->run('小李子','小丸子','小顺子');
$p->yuqi('hehe','haha','heiheihei');

//静态调用不存在的静态方法
person::daya('我大爷','你大爷','他大爷','我们的大爷');
