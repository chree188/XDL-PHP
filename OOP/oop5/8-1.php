<?php	
header("content-type:text/html;charset=utf-8");

/*对象的串行化
	__sleep() 睡觉
		串行化时  自动调用
		需要返回一个数组,数字内可以制定保留的属性名字
		作用:
			1.保存对象,日后使用
			2.清理掉 不需要保存的属性数据
			
	__wakeup() 醒来
		在反串行化时  自动调用
		作用:
			1.给属性重新赋值
			2.重新初始化:重新连接数据库/重新打开资源*/
			
class Person
{
	private $name;
	private $age;
	public function __construct($name,$age)
	{
		$this->name = $name;
		$this->age = $age;
	}
	public function __sleep()
	{
		echo '啊,我被睡了<br>';
		return array('name','age');
	}
	public function __wakeup()
	{
		echo '啊,我醒了!<br>';
		$this->age = 21;
	}
}

$p = new Person('静静',20);
var_dump($p);

//将对象串行化
$info = serialize($p);
echo $info;

echo '<hr>';
//将对象以字串的形式存到文件里面
var_dump(file_put_contents('./data.info', $info));


//十个月之后
//读取文件中内容
$m = file_get_contents('./data.info');
//将字串形式的存储内容 反串行化 回 对象类型
$obj = unserialize($m);
var_dump($obj);