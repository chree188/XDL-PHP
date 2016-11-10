1.复习 抽象类/接口/多态
1.抽象方法
    abstract function funName();
    没有方法体的方法
2.抽象类
    abstract class classname{}
    特点
    不能被实例化,它是给你定义标准的
    使用:
    要新定义类继承抽象类,并且重写抽象类里 所有的抽象方法.

3.interface 接口的定义
    interface classname{}
    特点
    1.接口用来定义标准,不能被实例化
    2.接口中 只允许有 抽象方法 和 常量
    3.实现(继承)接口,要使用 implements.必须重写接口中 所有方法
    4.一个类可以继承多个接口

4.多态
    不同的对象 做相同的事情,得到不同的结果
5.自动加载类
    __autoload($classname){}
6.串行化/序列化
    serialize()
    unserialize()
7.类型约束
    方法或函数 的参数
