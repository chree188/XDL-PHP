<?php
/**
 * Created by PhpStorm.
 * User: hui
 * Date: 2016/9/18
 * Time: 13:31
 */

/*
1.php连接MYSQL
    1 mysql
    2 mysqli
    3 PDO

2.实例化PDO
    DSN mysql:host=127.0.0.1;bdname=xxx

3.设置链接属性:是否自动提交/SQL错误处理方式/返回的结果集形式

4.PDO增删改查
  exec() 返回受影响的行数 用于增删改
  query() 返回PDOStatements的实例 用于查询

5.查询时 结果集的处理
    fetch() 单条数据/一维数组
    fetchAll() 所有数据/二维数组
    使用foreach遍历PDOS..对象

6.PDO对象
    setAttribute()
    getAttribute()
    exec()
    query()
    lastInsertId()
    prepare()

7.PDOStatements
    fetch()
    fetchAll()
    rowCount()
    bindValue()
    bindParam()
    execute()