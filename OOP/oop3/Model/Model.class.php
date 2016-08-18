<?php

//数据库操作类

	class Model
	{
		private $link = null;	//连接标识
		private $tabName = null;	//用于存储表名
		private $fields = array();	//字段列表
		private $pk;	//主键的名字
		private $keys;	//要查询的字段
		
//		初始化数据库连接
		public function __construct($tabName)
		{
			$this->link = mysqli_connect(HOST,USER,PWD,DB);
			mysqli_set_charset($this->link, CHAR);
			$this->tabName = $tabName;	//接收实例化时,传递的表名
			$this->getField();			//获取当前数据表妹所有的字段
		}
		
//		查询所有数据
		public function select()
		{
			$key = '*';	//默认查询全部
			if(!empty($this->keys)){
				$key = $this->keys;
				$this->keys = null;	//每次清除查询条件
			}
			
			echo $sql = "select {$keys} from {$this->tabName}";
			return $this->query($sql);
		}
		
//		查询单条数据
		public function find($findValue,$findKey = 'id')
		{
			$keys = '*';	//默认查询全部
			if(!empty($this->keys)){
				$keys = $this->keys;
				$this->keys = null;	//每次清除查询条件
			}
			
			$sql = "select {$keys} from {$this->tabName} where {$findKey}='{$findValue}' limit 1";
			$data = $this->query($sql);
//			判断结果是否为空
			if(empty($data)){
				return FALSE;
			}
			return $data[0];
		}
		
//		指定查询条件
		public function field($arr)
		{
//			判断传递的参数是否是数组
			if(!is_array($arr)) return $this;
			
//			过滤非法参数
			foreach($arr as $key => $val){
				if(!in_array($val, $this->fields)){
					unset($arr[$key]);
				}
			}
			
//			如果处理好的参数为空,直接返回自己
			if(empty($arr)) return $this;
			
//			生成SQL条件,存为属性.
			$this->keys = implode(',', $arr);
			
//			返回自己,用于对象链操作
			return $this;
		}
		
//		删除
		public function del($delValue,$delKey = 'id')
		{
			$sql = "delete from {$this->tabName} where {$delKey}='{$delValue}'";
			return $this->execute($sql);
		}
		
//		增加
		public function add($data = array())
		{
//			直接给参数POST不合适
//			判断$data是否为空,在字段列表之中 就保留
			if(empty($data)){
				$data = $_POST;
			}
			
//			筛选POST数据
			foreach($data as $k => $v){
//				如果POST里的$k 在字段列表之中 就保留
				if(in_array($k, $this->fields)){
					$list[$k] = $v;
				}
			}
			
//			生成SQl中的key 和value
			$keys = implode(',', array_keys($list));
			$values = implode("','", array_values($list));
			
			$sql = "insert into {$this->tabName} ({$keys}) values ('{$values}')";
			
		}
	}
