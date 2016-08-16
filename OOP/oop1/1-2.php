<?php
header("content-type:text/html;charset=utf-8");

/*
 * 对象:
 * 	世间万物皆对象
 * 	客观存在的任何一个实体都是一个对象
 * 类:
 * 	对相同或相似的对象打的一个抽象的描述
 * 类和对象的关系:
 * 	先有类,才有对象. 得到的是对象,我们使用的也是对象
 * 
 * 类的定义格式	PSR规范
 * 		[修饰符] class 类名
 * 		{
 * 			[成员属性]
 * 			[成员方法]
 * 		}
 * 		self parent	this 等关键词不能当做类名
 * */
 
// 定义一个人类
	class Person
	{
		
	}

//	通过类 得到一个对象 实例化
	$gao = new Person;
	var_dump($gao);