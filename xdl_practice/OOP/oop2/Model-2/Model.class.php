<?php

//数据库操作类
	class Model
	{
		private $link = null;	//连接标识
		private $tabName = null;	//用于存储表名
		private $fields = array();	//字段列表
		
//		初始化数据库连接
		public function __construct($tabName)
		{
			$this->link = mysqli_connect(HOST, USER, PWD, DB);
			mysqli_set_charset($this->link, CHAR);
			$this->tabName = $tabName;	//接收实例化时传递的表名
			$this->getField();
		}
		
//		查询所有数据
		public function select()
		{
			$sql = "select * from {$this->tabName}";
			return $this->query($sql);
		}
		
//		查询表单数据
		public function find($findValue,$findKey = 'id')
		{
			$sql = "select * from {$this->tabName} where {$findKey} = '{$findValue}' limit 1";
			return $this->query($sql);
		}
		
//		删除
		public function del($delValue,$delKey = 'id')
		{
			$sql = "delete from {$this->tabName} where {$delKey} = '{$delValue}'";
			return $this->execute($sql);
		}
		
//		增加
		public function add($data = array())
		{
//			直接给参数POST不合适
//			判断$data是否为空,赋值为POST
			if(empty($data)){
				$data = $_POST;
			}
			
//			筛选POST数据
			foreach($data as $k => $v){
//				如果post里的$k 在字段列表之中 就保留
				if(in_array($k, $this->fields)){
					$list[$k] = $v;
				}
			}
			
//			生成SQL中的key和value
			$keys = implode(',', array_keys($list));
			$values = implode("','", array_values($list));
			
			$sql = "insert into {$this->tabName} ({$keys}) values ('{$values}')";
//			执行添加操作,返回自增ID 或者 false
			return $this->execute($sql);
		}
		
//		更改
		public function update(){}
		
//		统计条数数量
		public function count()
		{
			$sql = "select count(*) totel from {$this->tabName}";
			$totel = $this->query($sql);
//			var_dump($totel);
			return $totel[0]['totel'];
		}
		
		/***********************辅助方法********************************/
//		查询
		private function query($sql)
		{
//			执行SQL语句
			$result = mysqli_query($this->link, $sql);
//			判断查询结果
			if($result && mysqli_num_rows($result) > 0){
				$list = array();
				$list = mysqli_fetch_all($result,MYSQL_ASSOC);
				mysqli_free_result($result);
				return $list;	//返回查询结果的二维数组
			}else{
				return FALSE;	//查询失败,返回false
			}
		}
		
//		增删改  删除时返回true/false  增时:自增ID
		private function execute($sql)
		{
//			执行SQL语句
			$result = mysqli_query($this->link, $sql);
//			处理结果集
			if($result && mysqli_affected_rows($this->link) > 0){
//				添加时  返回自增ID
				if(mysqli_insert_id($this->link) > 0){
//					添加时  返回自增ID
					return mysqli_insert_id($this->link);
				}else{
//					删 改时  的操作完成
					return TRUE;
				}
			}else{
//				操作失败
				return FALSE;
			}
		}
		
//		获取数据表内的所以字段
		private function getField()
		{
//			查询表结构
			$sql = "desc {$this->tabName}";
			$list = $this->query($sql);
//			var_dump($list);
			$fields = array();
			foreach($list as $k => $v){
				$fields[] = $v['Field'];
			}
//			var_dump($fields);
//			给属性赋值
			$this->fields = $fields;
		}
		
		
//		销毁资源
		public function __destruct()
		{
			mysqli_close($this->link);
		}
	}
