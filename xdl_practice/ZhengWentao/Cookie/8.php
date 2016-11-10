<!--
	作者：zwt0706@126.com
	时间：2016-07-18
	描述：cookie
-->
<?php	
	
//	使用cookie实现网站被访问多少次
	error_reporting(E_ALL);
	$_COOKIE['num'] = empty($_COOKIE['num'])? 0:$_COOKIE['num'];
	$num = $_COOKIE['num']+0;
	echo $num;
	$num++;
	setcookie('num',$num,time()+3600,'/');
