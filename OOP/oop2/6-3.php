<?php 
header("content-type:text/html;charset=utf-8");

/*
__isset() 判断对象中 是否存在某个属性
    当对非公有属性 调用isset()或empty()时,__isset()魔术方法会被自动调用
__unset()
    大能够对非公有属性调用 unset()会被自动调用
*/

	class A
	{
	    //私有属性无法在外部访问
	    public $name = '葫芦娃';
	    private $age = 5;
	    private $sex = '男';
	
	    public function __unset($key)
	    {
	        echo 'unset!!'.$key;
	        unset($this->$key);
	    }
	
	    public function __isset($key)
	    {
	        echo '我被isset了'.$key;
	        return isset($this->$key);
	    }
	
	    public function __set($key,$value)
	    {
	        $this->$key = $value;
	    }
	
	    public function __get($key)
	    {
	        return $this->$key;
	    }
	}

//实例化
$a = new A;
var_dump($a);

// var_dump(isset($a->name));
// var_dump(isset($a->age));
// var_dump(empty($a->sex));

echo '<hr>';
unset($a->age);

var_dump($a);
