
### Trait		(php5.4	新特性)

#### 1 Trait的概述
	Trait是PHP5.4中的新特性,是PHP多重继承的一种解决方案.
	例如,需要同时继承两个 abstract Class,
	这将会是件很麻烦的事情,Trait就是为了解决这个问题.
	
#### 2 Trait的简单使用
	格式:
		trait 名字 {成员属性和方法}
	特点:
		1.不能被实例化,不能有常量.
		2.在类中  使用use来引入其  实现价值.

#### 3 多个Trait的引用
		use A,B
		
#### 4 Trait之间的嵌套
		一个trait可以由多个trait组成.
		在trait中 可以使用use 混入其它trait进来.
		
#### 5 Trait的属性
		在trait中  可以定义属性  并在class中可以使用.
		但在使用时 不允许重复定义该属性.
		
#### 6 Trait的方法优先级
		class中	如果有和trait重名的方法 则覆盖.
		继承时 trait方法  会覆盖重写父类里面的重名方法.
		
#### 7 Trait的修饰符
		如果 trait方法中  存在static. 可以用动态或静态方式去调用.
		静态属性:只能用静态的方式去调用.
		
#### 8 Trait冲突
		A::demo insteadof B,C;	代替
		使用  as  给方法起别名