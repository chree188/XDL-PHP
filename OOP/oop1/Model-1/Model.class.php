<?php

//数据库操作类
	class Model
	{
		public $link;	//连接标识
		public $tabName;	//用于存储表名
		
//		初始化数据库连接
		public function __construct($tabName)
		{
			$this->link = mysqli_connect(HOST, USER, PWD, DB);
			mysqli_set_charset($this->link, CHAR);
			$this->tabName = $tabName;	//接收实例化时,传递的表名
		}
		
		public function select()
		{
			$sql = "select * from {$this->tabName}";
			$result = mysqli_query($this->link, $sql);
			$list = array();
			if($result && mysqli_num_rows($result)>0){
				$list = mysqli_fetch_all($result,MYSQL_ASSOC);
				return $list;
			}else{
				return FALSE;
			}
		}
		public function add(){}
		public function del(){}
		public function update(){}
		
//		销毁资源
		public function __destruct()
		{
			mysqli_close($this->link);
		}
	}
