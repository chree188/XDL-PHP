<?php 
header("content-type:text/html;charset=utf-8");

// php操作mysql 之 使用mysql模块
// 5.5以上版本运行 会报错:
// 语法建议 过时的:MySQL扩展已被废弃,推荐使用mysqli或PDO

// 连接数据库 得到资源
$link = mysql_connect('localhost','root','zwt12345') or die("连接失败");
// var_dump($link);

mysql_select_db('s50');// 选择数据库
mysql_set_charset('utf8');// 设置字符集

//SQL
$sql = "select * from user";
// 执行SQL 得到结果集资源
$result = mysql_query($sql);

//遍历得到数据
$list = array();
if($result && mysql_num_rows($result) > 0){
    while($row = mysql_fetch_assoc($result)){
        $list[] = $row;
    }
}

mysql_free_result($result);//施放结果集资源
mysql_close();//关闭数据库连接

//查看结果
var_dump($list);
