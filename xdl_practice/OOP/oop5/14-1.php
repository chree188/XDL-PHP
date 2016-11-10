<?php
header("content-type:text/html;charset=utf-8");

//定义USB标准
abstract class USB
{
	abstract public function in();
	abstract public function install();
}

//U盘
class Upan extends USB
{
	public function in()
	{
		echo 'c插入U盘...<br>';
	}
	public function install()
	{
		echo '正在安装U盘驱动...<br>';
	}
}

//U鼠标
class Mouse extends USB
{
	public function in()
	{
		echo '插入鼠标...<br>';
	}
	public function install()
	{
		echo '正在安装鼠标驱动...<br>';
	}
}

//USB风扇
class Fan extends USB
{
	public function in()
	{
		echo '插入风扇...<br>';
	}
	public function install()
	{
		echo '正在给USB风扇供电...<br>';
	}
}

//实例化USB设备
$u =  new Upan();
$m = new Mouse();
$f = new Fan();

//多态的应用
class MainBoard
{
	public function useUSB(USB $obj)
	{
		$obj->in();
		$obj->install();
	}
}

//设备测试
$mb = new MainBoard();

//使用USB设备
$mb->useUSB($m);

$mb->useUSB($f);

$mb->useUSB($u);
