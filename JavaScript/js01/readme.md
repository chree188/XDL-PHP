扩展:
    找对象,改属性
1.获取页面中的一个元素
    document.getElementById()
    获取元素写在  元素的后面.

2.获取或设置 元素的 CSS属性
    element.style.backgroundColor = '';
    element.style.color = '';

3.元素的属性 (所有元素都具有属性)
    style
    innerHTML  (双标签才有)
    HTML元素 具有什么属性 ,当他变为对象时 .属性自动变为对象的属性.
    img  src/width/height.....

------------

web  开发

前端
    HTML        数据展示,负责内容.
    CSS         页面美化,负责是样式.
    JavaScript  页面特效,与用户交互,负责行为.
后端
    php  java  asp.net  ruby  python  node.js(服务器推送,高并发) ....

1. javascript 简介
    1.1 什么是javascript
        1.1.1 概念： javascript是 基于对象 和 事件驱动 并具有相对安全性的 客户端 脚本 语言
        1.1.2 发展简史：
            ① Nombas公司1992年开发 嵌入式脚本语言 C-- 后改名 ScriptEase
            ② Netscape公司 1995年发布LiveScript 后改名javascript1.0 
            ③ 三足鼎立  NetScape推出javascript1.1后，Microsoft推出Jscript, 加上 ScriptEase
            ④ 标准化 1997javascript1.1 作为草案 提交给 ECMA（欧洲计算机制造商协会） 。由来自 Netscape、Sun、
                微软、Borland 和其他一些对脚本编程感兴趣的公司的程序员组成的 TC39 锤炼出了 ECMA-262，该标准
                定义了名为 ECMAScript 的全新脚本语言。
        1.1.3 组成： 核心（ECMAScript） 文档对象模型（DOM）  浏览器对象模型（BOM）
        1.1.4 客户端浏览器上执行的脚本 JavaScript   VBScript    applet（需要安装JDK）
        1.1.5 ECMAScript核心: JavaScript   ActionScript  ScriptEase
        1.1.6 扩展：     node.js  服务端开发（apache+php）
                               手机app：  phonegap框架
        1.1.7 课程 内容：   
            javascript 基本语法
            javascript 定义函数和对象 数组
            javascript 内置对象
            事件
            BOM
            HTML DOM
            XML DOM
            Ajax
            JQuery  类库

        1.1.8 浏览器
            IE    IE6  7  8     /  IE9+
            非IE  Chrome firefox  opera  Safari ...
            
    1.2 javascript的特点
        ①.javascript是一种脚本编程语言，也是一种解释性语言
        ②.javascript的语法结构与C++、java十分类似
        ③.javascript是一种基于对象的语言 
        ④.javascript具有跨平台性。
        ⑤.安全性与简单性
        ⑥ 基于对象（真正的对象 封装 继承 多态）
    1.3 javascript 和 java的区别
        雷锋和雷峰塔
        
    1.4 javascript 程序运行开发环境
        1.NetScape.3.0 以上版本和IE3.0 以上版本
        2.用于编辑HTML的字符编辑器
        
    1.5 javascript 优点与局限
        1.5.1 优点
            ①使用javascript在客户端进行验证，节省服务器资源  
            ②方便的操控页面中的各个对象，使网页更加友好
            ③使多种任务仅在客户端就可以完成而不需要网络和服务器的参与，从而支持分布式的运算和处理
        1.5.2 局限
            ①兼容性
            ②javascript不能打开，读写和保存计算机上的文件

2. javascript基本语法
    2.1 在HTML中使用javascript
        ① 写在script标签内
        ② 外部文件导入 script标签导入 <script src="script.js"></script> 标签内不能写代码
        ③ 通过事件 写在标签内 <tag onclick="code...."></tag>
        
    2.2 基本语法
        2.2.1 区分大小写  
            PHP不区分大小写：函数  方法   类名 
            PHP区分大小写：   变量  常量
            JS 所有的一切 都区分大小写
        2.2.2 标示符   
            不能以数字开头的 数字、字母、下划线、$
            
    2.3 注释
            单行注释：  //
            多行注释：  /*  */
        
    2.4 语句（指令结束符）
        ; 或者 换行
    
    2.5 关键字和保留字
        break       else        new     var
        case        finally     return      void
        catch       for     switch   while
        ······
        abstract    enum        int     short
        ······
        
    2.4 变量
        var 变量名 = 值;
        var 变量1=值1,变量2=值2，变量3=值3;
        var 变量1 = 变量2 = 变量3 = 值;
        
    2.5 数据类型 typeof()  返回一个值或变量 的数据类型
        基本类型
            String(字串)  Number(数值类型)  Boolean(布尔型)
        复合类型
            Ojbect(对象)  Array(数组)
        特殊类型
            Null(空)  undefined(未定义)  function(函数)

        2.5.1 数据类型 typeof()返回变量的类型

        2.5.2 字符串类型
            定义字符串  ""  ''
            不论是单引号还是双引号都可以解析转义字符，都不能解析变量
            字符串连接符 +
        2.5.2 数值类型
            ① 整数类型   十进制   十六进制   八进制
            ② 浮点型      科学计数法   浮点数的精度问题
            ③ 数值范围 5e324 ~ 1.7976931348623157e+308  超过范围回自动转换成 infinity(正无穷) -infinity(负无穷)
               可以使用 *isFinity() 验证是不是无穷  超出范围不能参与运算
            ④ NaN类型  Not a Number
                 ① NaN与任何数字操作，结果都是NaN
                 ② NaN与任何数都不相等，包括自己
                 ③ 函数 isNaN() 判断是否是NaN
            ⑤ Number类型转换
                特点： 1，如果是布尔值，true和false分别转换为1和0
                       2，数字，本色演出
                       3， null  -> 0
                       4， undifined  -> NaN
                       5,  字符串：
                            a.“11”会变成11，“011”会变成11
                            b.“1.1”会变成1.1
                            c.“0xf”会变成相同大小的十进制整数值
                            d.  如果字符串是空的，则将其转换为0
                            e.  如果字符串包含除上述格式之外的字符，则将其转换成NaN
                            f. '12e2' => 1200
            ⑥ ParseInt类型转换
                特点：1. 数字开头的字符串，忽略后面的字母
                       2. 0x开头回转换成十六进制， 0不可以
                        3. 科学计数法无法行,忽略后面的字母
                        4.空字符串 NaN
                        5. null true false NaN
                        
            ⑦ parseFloat类型转换
                特点：1, 第一个小数点有效，第二个无效
                      2. 数字开头的字符串，忽略后面的字母
                      3, 科学计数法有效
                      4， 16进制转换为0
                      5 八进制 ，忽略前面的0， 无法换算八进制
        2.5.3 其他数据类型
        2.5.3 隐式数据类型转换
            ①数字类型： 在字符串环境下 隐身转换为字符串 在布尔环境下
            ②字符串类型 在数字环境下，可以隐式转换为字符串中的数字或NaN；在布尔环境下，可以隐式转换为true。
            ③空字符串：在数字环境下可以隐式转换为0；在布尔环境下可以隐式转换为false;
            ④字符串”true“：在数字环境下可以隐式转换位1；布尔为true
            ⑤.字符串“false”：数字环境为0，布尔位false
            ⑥null：在字符串环境下，转换为“null”；数字环境下，转换为0，布尔环境下，转为false
            ⑦NaN：在字符串环境下可以隐式转换为“NaN”;布尔环境下，转换为false
            ⑧undefined：字符串环境下，转换为“undefined”，数字环境下，转为NaN，布尔下，转为false
            ⑨true：字符串转为“true”，数字环境下转为1
            10false：字符串转为“false”，数字环境下转为0
    2.6 运算符
        2.6.1 算术运算符：
            1.加法运算符     +
            2.减法运算符     -
            3.乘法运算符     *
            4.除法运算符     /
            5.模运算符        %
            6.负号运算符     -
            7.正号运算符     +
            8.递增运算符     ++
            9.递减运算符     --
        2.6.2  关系运算符
            1.相等运算符     ==
            2.等同运算符     ===
            3.不等运算符     ！=
            4.不等同运算符    ！==
            5.小于运算符     <
            6.大于运算符     >
            7.小于或等于运算符  <=
            8.大于或等于运算符      >=
            9.in运算符
            判断一个值是否属于某个数组或者一个属性是否属于一个对象
            10.instanceof
            判断一个对象的实例是否属于某个对象
            11.字符串运算符   +连字符
            12.赋值运算符    =
        2.6.3 逻辑运算符：
            1.逻辑与   &&
            2.逻辑或   ||
            3.逻辑非   ！
        2.6.4 其他运算符：
            1.条件运算符     ?:
            2.new运算符        new 对象类型
            3.void运算符   
            void运算符可以让操作数进行运算，但是却舍弃运算之后的结果。
            4.typeof运算符
            说明操作数是什么类型。 typeof(a)
        5.对象属性存取运算符 
            我们使用.来调用和设置对象的属性或者方法 d.name  .
        6.delete运算符
            delete运算符可以用来删除变量、对象的属性、或数组中的元素。delete运算符返回的是布尔值类型。
            delete 对象名      delete 变量名
            delete 对象名.属性
            delete 数组[索引]   
        7.逗号运算符
            var a = 1;
            var b = 2;
            c = a+b , d = a-b;
            8.this运算符   
            this代表的是当前对象。与php的$this的道理一样。   
            
    2.7 语句
        a.while语句
        b.do…while语句
        c.for语句
        d.for…in语句
        e.break语句
        f.continue语句
        g.with语句    



