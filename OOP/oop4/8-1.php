<?php	
header("content-type:text/html;charset=utf-8");

/*
  instanceof  
   		 它是一个运算符,判断某个对象是否是某个类 或 该类的子类 的实例   true/false
 */
 
 class A{}
 class B{}
 class C extends A{}
 
 $a = new A();
 $b = new B();
 $c = new C();
 
 if($a instanceof A){
 	echo '$a是A的实例';
 }else{
 	echo '$a不是A的实例';
 }

 echo '<hr>';
 if($b instanceof A){
 	echo '$b是A的实例';
 }else{
 	echo '$b不是A的实例';
 }

 echo '<hr>';
 if($c instanceof A){
 	echo '$c是A的实例';
 }else{
 	echo '$c不是A的实例';
 }
