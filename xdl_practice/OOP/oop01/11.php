<?php	
header("content-type:text/html;charset=utf-8");

//定义一个URL信息操作类
class Url
{
	public $url;	//url属性
	
//	构造方法,给url属性赋初始化值
	public function __construct($url){
		$this->url = $url;
	}
	
//  方法一：返回url的文件名：如a.php  index.html
	public function getFileName(){
		preg_match('/\/([^\/]+\.[a-z]+)[^\/]*$/',$this->url,$match);
		echo 'url的文件名: '.$match[1].'<br>';
	}

//  方法二：返回url的协议名  如http  ftp

//  方法三：返回url的主机名：
	public function getMainName(){
	}
//  方法四：返回url的文件后缀名
	public function getName(){
		$path=parse_url($this->url);
		$str=explode('.',$path['path']);
		echo 'url的文件后缀名: '.$str[1].'<br>';
	}

}

$demo = new Url('http://melike.imwork.net/loveToGirlfriend/index.php');
$demo->getFileName();
$demo->getMainName();
$demo->getName();

