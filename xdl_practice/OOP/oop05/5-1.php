<?php
/**
 * Created by PhpStorm.
 * User: hui
 * Date: 2016/9/12
 * Time: 15:07
 */

header("content-type:text/html;charset=utf-8");

/*__call()
    当调用 不存在的方法时 自动触发
    参1,调用的不存在的静态方法名
    参2,调用的不存在的静态方法的参数

__callStatic()
    当调用 不存在的静态方法时 自动触发
    参1,调用的不存在的静态方法名
    参2,调用的不存在的静态方法的参数
*/
class Person
{
    public  function say()
    {
        echo 'I say....<br>';
    }
    public function eat()
    {
        echo 'I eat...<br>';
    }
    public function __call($funName, $params)
    {
        echo '<pre>';
        echo '啊,我被call了<br>';
        print_r($funName);
        echo '<br>';
        print_r($params);
        echo '</pre>';
    }
    public static function __callStatic($funName, $params)
    {
        echo '<pre>';
        echo '啊,我也被call了<br>';
        print_r($funName);
        echo '<br>';
        print_r($params);
        echo '</pre>';
    }
}

$p = new Person();
$p->say();
$p->eat();
$p->run(1,2,3,4,5);
$p->hehe('嘿嘿','呵呵','哈哈','heiheihei');

Person::daye('我大爷','你大爷','他大爷');