<?php
header("content-type:text/html;charset=utf-8");

//定义用户管理的功能模块
class User
{
	public function add(){
		echo '添加用户...<br>';
	}
	public function index(){
		echo '用户列表...<br>';
	}
	public function edit(){
		echo '编辑用户...<br>';
	}
	public function __call($funName,$params){
		echo '<h1>404 NOT FOUND</h1>';
	}
}

$u = new User();
//URL 传参
$action = empty($_GET['a'])?'index':$_GET['a'];

//调用方法
$u->$action();
