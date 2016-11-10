<?php
header("content-type:text/html;charset=utf-8");

/*
 * 对象:
 * 	世间万物皆对象
 * 	客观存在的任何一个实体都是一个对象
 * 类:
 * 	对相同或相似对象的一个抽象的描述
 * 类与对象的关系:
 * 	先有类再有对象,通过类得到对象.我们使用的对象
 * 
 * 类的定义格式:
 * 	[修饰符]  class 类名
 * {
 * 		[成员属性]
 * 		[成员方法]
 * }
 * */

 
// 定义一个人类
//类名 :self	parent

class Person
{
	
}

//通过类 得到对象 实例化
$gao = new Person;
var_dump($gao);