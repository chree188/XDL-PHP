<?php 
header("content-type:text/html;charset=utf-8");

/*
__set($key,$value){}
    给非公有属性赋值时  自动调用
    并把属性名/属性值 作为第1/2刚和参数传入
    __set()  必须有两个参数,必须是public
__get($key){}
    使用非公有的属性时  自动触发,并把属性名作为参数传入
    __set()  必须有1个参数,必须是public
*/

	class A
	{
	    //私有属性无法在外部访问
	    private $name = '葫芦娃';
	    private $age = 5;
	    private $sex = '男';
	
	    public function __set($key,$value)
	    {
	        echo '我被SET了!<br>';
	        echo '$key:'.$key.'<br>';
	        echo '$value:'.$value.'<br>';
	        $this->$key = $value;//让赋值生效.
	    }
	
	    public function __get($key)
	    {
	        echo '我被GET了'.$key;
	        return $this->$key;
	    }
	
	    /*//提供一系列公有方法来控制这些私有属性
	    public function setName($name)
	    {
	        $this->name = $name;
	    }
	    public function getName()
	    {
	        return $this->name;
	    }
	
	    //年龄
	    public function setAge($age)
	    {
	        $this->age = $age;
	    }
	    public function getAge()
	    {
	        return $this->age;
	    }
	
	    //性别
	    public function setSex($sex)
	    {
	        $this->sex = $sex;
	    }
	    public function getSex()
	    {
	        return $this->sex;
	    }*/
	}

//实例化
$a = new A;
/*$a->setName('大娃');
echo $a->getName();*/
$a->name = '穿山甲';
$a->age = 99;
$a->sez = '女';

echo '<hr>';
echo $a->name;
echo '<br>';
echo $a->age;
echo '<br>';
echo $a->sex;

