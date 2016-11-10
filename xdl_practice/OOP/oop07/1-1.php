<?php
/**
 * Created by PhpStorm.
 * User: hui
 * Date: 2016/9/14
 * Time: 14:07
 */

/*
 * 复习   封装/继承/多态
 *
 * 一.封装性
 *  1.什么是封装
 *      将成员属性或方法 设置为非公有
 *  2.封装后 特点
 *      无法在外部调用
 *      通过$this 内部调用
 *  3.属性的封装
 *      实现 访问控制
 *  4.方法的封装
 *      可读性/重用性
 *  5.访问被封装的属性
 *      1).定义公共方法
 *      2).使用魔术方法
 *
 * 二.继承性
 *  1.什么是继承性
 *      一个子类可以继承一个父类,如果子类继承父类,子类就具有了父类的属性和方法
 *  2.继承的格式
 *      class 子类 extends 父类{ code... }
 *  3.继承的特点
 *      1).单继承:一个子类只能有一个父类.
 *      2).子类可以重写父类属性和方法.
 *      3).访问修饰符只能改的更开放.
 *  4.重写时,可以调用父类的方法:parent::方法名()
 *
 * 三.多态性
 *  不同的对象 做相同的事情,得到不同的结果
 *  1.抽象方法:没有方法体的方法
 *      abstract function funName();
 *  2.抽象类:不能被实例化,它是给你定义标准的
 *      abstract class classname{}
 *      使用:要新定义类 继承抽象类,并重写抽象类里 所有的抽象方法.
 *  3.接口:接口用来定义标准,不能被实例化,可多继承
 *      interface classname{}
 *      实现(继承)接口,要使用 implements.且必须重写接口中 所有方法
 *
 * 四.异常处理
 *  1.异常的语法
 *      try {
 *          throw new Exception();
 *      } catch(Exception $e) {
 *          //系统的异常类Exception
 *          $e->getMessage();
 *          $e->getCode();
 *          $e->getFile();
 *          $e->getLine();
 *      }
 *  2.自定义异常类 继承Exception
 *  3.处理多种异常
 *      写多个catch来接收.
 *      不是同时抛出多个异常.抛出一个就中断执行了
 *  4.自动接收异常
 *      set_exception_handler('funName');
 *      function funName($e){
 *          echo $e->getMessage()
 *      }
 *  5.类和对象的函数
 *      more...
 */