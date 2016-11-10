<?php	
header("content-type:text/html;charset=utf-8");

//定义一个妹子
class Meizi
{
	public $name;
	public $age;
	public $size;
	
	public function getAge()
	{
		echo '我的年龄是:'.$this->age;
	}
}

//得到一个妹子
$mv = new Meizi();

//初始化妹子
$mv->name = '金莲';
$mv->age = 18;
$mv->size = 'F';

//问题1	妹子的年龄  我们想看就看  不合理
//问题2	妹子的尺寸  我们想问就问  不合理

echo '美女的名字:'.$mv->name.'<br>';
echo '美女的年龄:'.$mv->age.'<br>';
echo '美女的尺寸:'.$mv->size.'<br>';
//获取妹子的年龄
$mv->getAge();
