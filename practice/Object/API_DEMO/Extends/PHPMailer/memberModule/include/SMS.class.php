<?php

/*
	//使用示例：
	header("Content-Type:text/html;charset=utf-8");
	$user_id=0;		//请修改为你的user_id
	$user_key='';	//请修改为你的user_key
	$sms=new SMS($user_id,$user_key);
	$str='测试';
	$result=$sms->send('13888888888',$str);
	if($result){
		echo '发送成功';
	}else{
		echo $sms->getError();
	}
//*/


/**
 * 手机短信发送
 * 使用Crul需要修改服务器中php.ini文件的设置，找到php_curl.dll去掉前面的";" 重启apache服务即可
 * 分钟配额为：1000 次/分钟 。 超过分钟配额服务禁用。
 * 向同一手机号发送短信， 最小时间间隔为15 秒。
 * 一次最多都只能发65个汉字(英文字母也只能发65个)。
 * @author ZouYiliang <it9981@gmail.com>
 * @version 20121230
 */
class SMS{
	private $curl=null;
	private $uid=null;//用户id
	private $key=null;//用户key
	private $error=null;//错误消息
	private $server='http://it266.sinaapp.com/sendsms.php';//服务器url

	public function __construct($uid,$key){
		$this->uid=$uid;
		$this->key=$key;

		$this->curl = curl_init($this->server);
		curl_setopt($this->curl, CURLOPT_HEADER, 0 ); // 过滤HTTP头
		curl_setopt($this->curl,CURLOPT_RETURNTRANSFER, 1);// 显示输出结果
		curl_setopt($this->curl,CURLOPT_POST,true); // post传输数据
	}

	public function __get($name){
		if($name=='error'){
			return $this->error;
		}
	}

	public function setServer($server){
		$this->server=$server;
	}

	public function getError(){
		return $this->error;
	}

	//发送短信
	//成功返回true，失败返回false
	public function send($mobile,$content){
		$para=array(
			'uid'=>$this->uid,
			'key'=>$this->key,

			'mobile'=>$mobile,
			'content'=>$content,
		);

		curl_setopt($this->curl,CURLOPT_POSTFIELDS,$para);// post传输数据
		$responseText = curl_exec($this->curl);
		//var_dump( curl_error($this->curl) );//如果执行curl过程中出现异常，可打开此开关，以便查看异常内容

		if($responseText=='1'){
			return true;
		}
		$this->error=$responseText;
		return false;
	}

	public function __destruct(){
		curl_close($this->curl);
	}

}
