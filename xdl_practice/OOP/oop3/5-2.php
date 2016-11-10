<?php	
header("content-type:text/html;charset=utf-8");

/*
 * 继承的特点
 * */
 
 	class A{}
	class B{}
	
//	无法继承多个父类
//	class C extends A,B{}
	
//	一个子类只能有一个父类
	class D extends A{}
	
//	一个父类  可以被多个子类继承
	class E extends B{}
	class F extends B{}
	class G extends B{}
