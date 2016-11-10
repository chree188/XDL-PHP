<?php 
header("content-type:text/html;charset=utf-8");

/*
面向对象的三大特性:  封装/继承/多态
*/

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

//得到妹子
$mv = new Meizi;

//给妹子初始化
$mv->name = '金莲';
$mv->age = 18;
$mv->size = 'F';

//问题1 :  我们想看就看 不合理  没有任何隐私
//问题2 :  我们想改就改 不合理  无法限制其行为

//输出妹子的信息
echo '美女的名字:'.$mv->name.'<br>';
echo '美女的年龄:'.$mv->age.'<br>';
echo '美女的胸围:'.$mv->size.'<br>';

//获取妹子的年龄
$mv->getAge();

