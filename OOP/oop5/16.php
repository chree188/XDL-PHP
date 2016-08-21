<?php
header("content-type:text/html;charset=utf-8");

//定义PCI标准
abstract class PCI
{
	abstract public function in();
	abstract public function out();
}

//显卡
class XK extends PCI
{
	public function in()
	{
		echo '打开片子...<br>';
	}
	public function out()
	{
		echo '播放片子...好看<br>';
	}
}

//网卡
class WK extends PCI
{
	public function in()
	{
		echo '连接互联网...<br>';
	}
	public function out()
	{
		echo '正在加载片子...<br>';
	}
}

//声卡
class SK extends PCI
{
	public function in()
	{
		echo '片子声源输入...<br>';
	}
	public function out()
	{
		echo '正在播放声音...好听<br>';
	}
}

//实例化PCI设备
$x =  new XK();
$w = new WK();
$s = new SK();

//多态的应用
class MainBoard
{
	public function usePCI(PCI $obj)
	{
		$obj->in();
		$obj->out();
	}
}

//设备测试
$mb = new MainBoard();

//使用PCI设备
$mb->usePCI($w);

$mb->usePCI($x);

$mb->usePCI($s);
