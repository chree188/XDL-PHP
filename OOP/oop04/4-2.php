<?php
/**
 * Created by PhpStorm.
 * User: hui
 * Date: 2016/9/8
 * Time: 18:09
 */

header("content-type:text/html;charset=utf-8");
/*
static 静态的
    定义:用于修饰属性和方法,不能修饰类
    修饰的属性:静态属性
    修饰的方法:静态方法 亦可使用动态的方法去调用(不建议)
在外部访问静态属性/方法:
    类名::$属性名
    类名::方法名();
在内部访问静态属性/方法:
    self::$属性名
    self::方法名()
如果一个方法内部 没有动态的内容,默认把该方法当作静态方法(即使没有static关键字)
静态方法中,不允许出现动态的内容$this(非静态)
*/

class Person
{
    public static $name = '安娜';
    private static $age = 18;

    public static function demo()
    {
        echo '啊,我司静态方法!<br>';
    }

    /**
     * @return int
     */
    public static function getAge()
    {
        return self::$age;  //在内部访问静态属性
    }

//  普通方法
    public function fun1()
    {
        echo '啊,我司fun1<br>';
    }
    public static function fun2()
    {
        echo '俺是fun2<br>';
//        var_dump($this);
    }
}

//$p = new Person();
//$p->demo(); //不建议
//echo 'name:'.$p->name.'<br>';   //动态的

echo '姓名:'.Person::$name.'<br>';
Person::demo();

echo '<hr>';
//echo 'AGE:'.Person::$age;   //被3p限制
echo '年龄:'.Person::getAge();

echo '<hr>';
$p = new Person();
$p->fun1();
//Person::fun1();

echo '<hr>';
Person::fun2();