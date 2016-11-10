<?php
header("content-type:text/html;charset=utf-8");

//数据库操作类

class Model
{
	public $link;	//链接标识
	public $tabName;	//用于存储表名
	
//	初始化数据库连接
	public function __construct($tabName){
//		返回对象 存储为link练级属性
		$this->link = mysqli_connect(HOST, USER, PWD, DB);
		mysqli_set_charset($this->link, CHAR);
		$this->tabName = $tabName;	//接收实例化时传入的表名
	}
	
//	增删改查
	public function select(){
		$sql = "SELECT * FROM {$this->tabName}";
		$result = mysqli_query($this->link, $sql);
		$list = array();	//存储查询结果
		if ($result && mysqli_num_rows($result) > 0) {
//			拿全部数据 返回二维数组
			$list = mysqli_fetch_all($result,MYSQL_ASSOC);
			return $list;
		} else {
			return FALSE;	//查询失败
		}
	}
	
	public function add(){}
	public function del(){}
	public function update(){}
	
//	销毁资源
	public function __destruct(){
		mysqli_close($this->link);
	}
}
