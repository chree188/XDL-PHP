<?php	
header("content-type:text/html;charset=utf-8");

/*多态性
	多种状态.
	子类继承父类,可以重写父类方法和属性.
	一个类 可以有多个子类,不同的子类之间,就可以以具有不同状态的 属性值和方法体,这就是多态
	不同的对象 做相同的事情,得到不同的结果*/

//妹子 与 大屌丝或高富帅 约会的场景
class Meizi
{
	public function meet(Hanzi $obj)
	{
		$obj->kiss();
	}
}

//制定汉子标准
interface Hanzi
{
	public function kiss();
}

//DDS类
class DDS implements Hanzi
{
	public function kiss()
	{
		echo '我是屌丝,我亲了妹子>>>.';
		echo '啪!';
	}
}

//GFS 类
class GFS implements Hanzi
{
	public function kiss()
	{
		echo '我是高富帅,我亲了妹子>>>.';
		echo '啪啪啪!';
	}
}

//实例化妹子
$mm = new Meizi();

//多态性:不同的对象 做相同的事情,得到不同的结果.
$mm->meet(new DDS());
echo '<hr>';
$mm->meet(new GFS());
