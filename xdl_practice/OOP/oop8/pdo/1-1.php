
1.PHP连接mysql的方式
    1. MySQL 方式
    2. Mysqli 方式
    3. 数据库抽象层 PDO

2.实例化PDO  DSN: mysql:host=localhost;dbname=xx

3.设置PDO的连接属性 : 是否自动提交/SQL错误处理方式/返回结果集的形式

4.PDO的增删改查
    exec() 返回受影响行数 用于增删改
    query() 返回PDOStatement的实例 用于查询

5.查询时的结果处理
    fetch() 单条数据/一维数组
    fetchAll() 所有数据/二维数组
    使用foreach遍历PDOStatement对象

6.PDO对象
    setAttribute()
    getAttribute()
    exec()
    query()
    lastIsertId()

7.PDOStatement对象
    fetch()
    fetchAll()
    rowCount()
