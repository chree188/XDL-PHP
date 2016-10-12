<!--
PHP面向对象

三大特性:封装/继承/多态

1.final
    修饰 类 和 方法
    类不能被继承,方法不能被重写

2.static
    修饰 属性 方法
    静态属性/静态方法.
    可以在类 没有被实例化的情况下使用.
    静态方法内部,不允许出现动态的内容$this

3.设计模式 单例(单态)
    一个类只能允许存在一个对象
    实现步骤:
    1).不让进: 使类不能被实例化.
    2).留后门: 设置静态方法.
    3).给对象: 静态方法里实例化该类.
    4).判初夜: 判断是否第一次产生该类的对象.
    5).设静态: 静态方法里要使用静态属性.

4.const 定义常量
    既可以在外部,也可以在内部.

5.instanceof
    判断某对象,是否属于某个类的实例

6.clone
    对象的引用赋值 $a = clone $b
    魔术方法 __clone().当克隆一个对象时,自动触发
-->