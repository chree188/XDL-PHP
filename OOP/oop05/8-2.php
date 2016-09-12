<?php
/**
 * Created by PhpStorm.
 * User: hui
 * Date: 2016/9/12
 * Time: 19:04
 */

header("content-type:text/html;charset=utf-8");

/*对象的串行化
    serialize() 串行化
    unserialize() 反串行化
*/

/*$arr = [1,2,3,'name'=>'yanyan','age'=>18];
$info = serialize($arr);
echo $info;
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