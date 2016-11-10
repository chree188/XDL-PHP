<?php
/**
 * Created by PhpStorm.
 * User: hui
 * Date: 2016/9/18
 * Time: 14:59
 */
namespace php;
header("content-type:text/html;charset=utf-8");

//给命名空间区别名
//use \www\s50\oop8 as dds;

use \www\s50\oop8;

require 'fun3.php';

//\www\s50\oop8\User::test();
//dds\User::test();   //使用别名来调用
oop8\User::test(); //使用路径部分的最后名称来调用