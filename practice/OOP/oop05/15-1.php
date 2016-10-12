<?php
/**
 * Created by PhpStorm.
 * User: hui
 * Date: 2016/9/12
 * Time: 21:28
 */

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
        echo "插入U盘...<br>";
    }
    public function install()
    {
        echo '正在安装U盘驱动...<br>';
    }
}

//USB 鼠标
class Mouse extends USB
{
    public function in()
    {
        echo '插入USB鼠标...<br>';
    }
    public function install()
    {
        echo '正在安装USB鼠标驱动...<br>';
    }
}

//USB 风扇
class Fan extends USB
{
    public function in()
    {
        echo '插入USB风扇...<br>';
    }
    public function install()
    {
        echo '正在给USB风扇供电...<br>';
    }
}

//实例化三个USB设备
$u = new Upan();
$m = new Mouse();
$f = new Fan();

//多态的应用
class MainBoard
{
//    USB插口操作
    public function useUSB(USB $obj)
    {
        $obj->in();
        $obj->install();
    }
}

//实际使用设备
$mb = new MainBoard();
$mb->useUSB($f);
$mb->useUSB($u);
$mb->useUSB($m);