<?php
/**
 * Created by PhpStorm.
 * User: hui
 * Date: 2016/9/12
 * Time: 21:08
 */
header("content-type:text/html;charset=utf-8");

/*多态性
    子类继承父类,可以重写 父类的方法和属性.
    一个类 可以有多个子类,不同的子类之间,
    就会具有了不同的状态(属性/方法),这就是多态.

    不同的对象做相同的事情,得到不同的结果.
*/

//妹子 与 大屌丝或高富帅 约会的场景
//妹子类 约会时有被 kiss的方法

class Meizi
{
    public function meet(Hanzi $obj)
    {
        $obj->kiss();
    }
}

//指定汉子的标准
interface Hanzi
{
    public function kiss();
}

//DDS 类
class DDS implements Hanzi
{
    public function kiss()
    {
        echo '我司屌丝,我亲了妹子>>>>>>';
        echo '啪!';
    }
}

//GFS 类
class GFS implements Hanzi
{
    public function kiss()
    {
        echo '我司富帅,我亲了妹子>>>>>>';
        echo '啪!啪!啪!';
    }
}

//实例化妹子
$mm = new Meizi();

//多态性
$mm->meet(new DDS());
echo '<hr>';
$mm->meet(new GFS());