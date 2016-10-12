<?php
header("content-type:text/html;charset=utf-8");

/*
 克隆对象
  使用克隆:$u2 = clone $u1;
  对象的引用赋值的特性 
 */
 
/* $a = 100;
 $b = &$a;
 $b = 200;
 echo $a;*/
 
 class User
 {
 	public $name = 'AAAA';
 }

 $u1 = new User();
 echo $u1->name;
 
 echo '<hr>';
 $u2 = clone $u1;
 $u2->name = 'BBBB';
 echo $u1->name;
