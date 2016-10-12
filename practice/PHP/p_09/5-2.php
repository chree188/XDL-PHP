<?php
/*
 * 	正则表达式
 * */

//	 1.要被匹配的内容

//	2.正则表达式
$ptn_uname = "/^\w{6,12}$/";
//对账号匹配 6-12位
$ptn_upwd = "/^.{6,18}$/";
$ptn_tel = "/^1[^2]\d{9}$/";
$ptn_email = "/\w{1,9}@[\w]+\.\w{1,3}/";

//	3.执行
//	账号
if (!preg_match($ptn_uname, $_POST['uname'])) {
	die('账号不符合要求');
}

//	密码
if (!preg_match($ptn_upwd, $_POST['upwd'])) {
	die('密码不符合要求');
}

//	电话
if (!preg_match($ptn_tel, $_POST['tel'])) {
	die('电话不符合要求');
}

//	邮箱
if (!preg_match($ptn_email, $_POST['email'])) {
	die('邮箱不符合要求');
}
