<?php 
header("content-type:text/html;charset=utf-8");

/*
封装性
    把成员属性或方法,设置为非公有,就成为封装性
    3P
    public     公有的
    private    私有的
    protected  受保护的
    访问的含义:读写(取值/赋值)
*/

//定义一个妹子
	class Meizi
	{
	    public $name;
	    private $age = 18;
	    public $size;
	
	    public function getAge()
	    {
	        echo '我的年龄是:'.$this->age;
	    }
	
	    private function getSize()
	    {
	        echo '我的size是:'.$this->size;
	    }
	
	    public function askSize()
	    {
	        if ($this->size > 'D') {
	            $this->getSize();
	        } else {
	            echo '臭流氓!';
	        }
	        
	    }
	}

//得到妹子
$mv = new Meizi;

//给妹子初始化
$mv->name = '金莲';
// $mv->age = 18;//不能访问私有的属性
$mv->size = 'A';

//问题1 :  我们想看就看 不合理  没有任何隐私
//问题2 :  我们想改就改 不合理  无法限制其行为

//输出妹子的信息
echo '美女的名字:'.$mv->name.'<br>';
// echo '美女的年龄:'.$mv->age.'<br>';//不能访问私有的属性
echo '美女的胸围:'.$mv->size.'<br>';

//获取妹子的年龄
$mv->getAge();

echo '<hr>';
// $mv->getSize();//不能访问私有的方法

//问size:
$mv -> askSize();