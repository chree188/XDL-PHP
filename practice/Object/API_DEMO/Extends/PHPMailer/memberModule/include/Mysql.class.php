<?php
/**
 * MySQL操作帮助类
 */

/*
//数据库服务器
define('DB_HOST','localhost');
//用户名
define('DB_USER','root');
//密码
define('DB_PASS','root');
//数据库
define('DB_NAME','test');
*/

class Mysql{
	public static $errorInfo;
	public static $sql;
	public static $link;

	public static function connect(){
		self::$link=@mysql_connect(DB_HOST,DB_USER,DB_PASS);
		if(mysql_errno()!=0){
			self::$errorInfo=mysql_error();
			return false;
		}

		mysql_select_db(DB_NAME);
		mysql_set_charset('utf8');
		return true;
	}

	//执行sql，返回受影响行数(INSERT，UPDATE 或者 DELETE 所影响到的行数)
	function execute($sql,$data=null){
		if(!self::connect())return false;

		self::parseSql($sql,$data);

		$result=mysql_query(self::$sql);
		if($result){
			$rowCount=mysql_affected_rows(self::$link);
		}
		@mysql_close(self::$link);
		return $rowCount;
	}

	/**
	 * 执行INSERT 语句
	 * @param $sql 执行的sql语句
	 * @return 自增id
	 */
	public static function insert($sql,$data=null){
		if(!self::connect())return false;

		self::parseSql($sql,$data);

		$result=mysql_query(self::$sql);
		if($result){
			$insert_id=mysql_insert_id(self::$link);
		}
		@mysql_close(self::$link);
		return $insert_id;
	}

	//查询单条记录
	function find($sql,$data=null){
		$list=self::select($sql,$data);
		return $list[0];
	}

	//查询，返回二唯数组(select)
	function select($sql,$data=null){
		if(!self::connect())return false;
		self::parseSql($sql,$data);
		$arr=array();

		$result=mysql_query(self::$sql);
		if($result && mysql_num_rows($result)>0){
			while($row=mysql_fetch_assoc($result)){$arr[]=$row;}
		}
		@mysql_free_result($result);
		@mysql_close(self::$link);
		return $arr;
	}

	//解析sql中的问号
	function parseSql($sql,$data){

		if(is_null($data)){
			self::$sql=$sql;
			return;
		}

		//检测有多少个问号
		$count=substr_count($sql,'?');

		if(is_string($data)){
			$data=array($data);
		}

		if($count != count($data)){
			return false;
		}

		//一次替换一个问号
		for($i=0;$i<$count;$i++){
			$sql=preg_replace('/\?/',"'".mysql_escape_string($data[$i])."'",$sql,1);
		}
		self::$sql=$sql;

	}
}
