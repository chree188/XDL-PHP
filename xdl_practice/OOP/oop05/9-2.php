<?php
/**
 * Created by PhpStorm.
 * User: hui
 * Date: 2016/9/12
 * Time: 19:26
 */

header("content-type:text/html;charset=utf-8");

/*对象的串行化
    serialize() 串行化
    unserialize() 反串行化

__sleep() 睡
    在串行化时 自动触发
    需要返回一个数组,其值为要保留的属性的名字
    作用:
        1.保存对象,日后使用
        2.清理掉不需要的属性值

__wakeup() 醒来
    在反串行化 自动触发
    作用:
        1.给属性 赋值新值
        2.重新初始化:重新连接数据库,重新打开目录
*/

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
        echo '我被反串行化了!<br>';
        $this->age = 21;
    }
}

//实例化
$p = new Person('晴晴',20);
var_dump($p);

//给对象 进行串行化操作
$info = serialize($p);
echo $info;
var_dump(file_put_contents('./data.info',$info));

echo '<hr>';
//一年之后
$m = file_get_contents('./data.info');
echo $m;
$obj = unserialize($m);
var_dump($obj);
