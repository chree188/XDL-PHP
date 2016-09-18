<?php
/**
 * Created by PhpStorm.
 * User: hui
 * Date: 2016/9/18
 * Time: 15:06
 */
namespace php;
header("content-type:text/html;charset=utf-8");

//导入类
use \www\s50\oop8\User; //导入某个类进来
//use \www\s50\oop8\demo; //不适用于函数

require 'fun3.php';

User::test();   //直接用!

//demo();