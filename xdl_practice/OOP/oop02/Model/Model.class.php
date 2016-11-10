<?php

//数据库操作类

class Model
{
	private $link;	//链接标识
	private $tabName;	//用于存表名
	private $fields;	//字段列表
	
//	初始化数据库连接
	public function __construct($tabName)
	{
//		返回对象 存为link连接属性
		$this->link = mysqli_connect(HOST, USER, PWD, DB);
		mysqli_set_charset($this->link, CHAR);
		$this->tabName = $tabName;	//接收实例化时传入的表名
		$this->getField();	//自动获取 改表内的所有字段名字
	}
	
//	增删改查
	public function select()
	{
		$sql = "SELECT * FROM {$this->tabName}";
		return $this->query($sql);
	}
	
	public function find($findValue,$findKey = 'id')
	{
		$sql = "SELECT * FROM {$this->tabName} WHERE {$findKey} = '{$findValue}' LIMIT 1";
		return $this->query($sql); 
	}
	
//	删除
	public function del($delValue,$delKey = 'id')
	{
		$sql = "DELETE FROM {$this->tabName} WHERE {$delKey} = '{$delValue}'";
		return $this->execute($sql);
	}
	
	public function add($data = array())
	{
//		直接给参数为POST
//		判断赋值 如果data为空 就用post
		if (empty($data)) {
			$data = $_POST;
		}
//		筛选POST里的数据
		foreach ($data as $k => $v) {
//			如果POST里的$k 在字段列表之中 就保留
			if (in_array($k, $this->fields)) {
				$list[$k] = $v;
			}
		}
//		var_dump($list);
//		生成SQL中的key value条件
		$keys = implode(',', array_keys($list));
		$values = implode("','", array_values($list));
		
		echo $sql = "INSERT INTO {$this->tabName} ($keys) VALUES ('$values')";
		return $this->execute($sql);	//增加返回自增ID 或 false
	}
	
//	修改
	public function update(){
		
	}
	
//	统计条目数
	public function count()
	{
		$sql = "SELECT count(*) total FROM {$this->tabName}";
		$total = $this->query($sql);
		return $total[0]['total'];
	}
	
	/**************************辅助方法*****************************/
	private function query($sql)
	{
//		执行SQL
		$result = mysqli_query($this->link, $sql);
//		判断执行结果
		if ($result && mysqli_num_rows($result) > 0) {
			$list = [];
			$list = mysqli_fetch_all($result,MYSQL_ASSOC);
			mysqli_free_result($result);
			return $list;	//返回查询结果 是个二维数组
		} else {
			return FALSE;	//查询失败 返回false
		}
	}
	
//	增删改	增时返回ID或false	 改删 返回t/f
	private function execute($sql)
	{
//		执行SQL
		$result = mysqli_query($this->link, $sql);
//		处理结果集
		if ($result && mysqli_affected_rows($this->link) > 0) {
			if (mysqli_insert_id($this->link) > 0) {
//				添加时 返回自增ID
				return mysqli_insert_id($this->link);
			} else {
//				删改时  返回true
				return TRUE;
			}
		} else {
//			操作失败			
			return FALSE;
		}
	}
	
//	获取数据表中的所有字段
	private function getField()
	{
//		查询所有字段
		$sql = "DESC {$this->tabName}";
		$list = $this->query($sql);
		$fields = [];
		foreach ($list as $val) {
			$fields[] = $val['Field'];
		}
//		var_dump($fields);
//		给属性赋值
		$this->fields = $fields;
	}
	
//	销毁资源
	public function __destruct()
	{
		mysqli_close($this->link);
	}
}
