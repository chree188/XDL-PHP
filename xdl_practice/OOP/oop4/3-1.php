<?php	
header("content-type:text/html;charset=utf-8");

/*
 * 作用:
 * 	1.一定程度上可以提高安全性
 * 	2.可读性
 * */
 
 	class User
 	{
 		final public function login($user,$pass)
		{
//			验证用户的账号密码
			if($user == 'admin' && $pass == '123456'){
				echo 'login success!';
			}else{
				echo 'login error!';
			}
		}
 	}

 	class User2 extends User
 	{
 		public function login($user,$pass)
		{
			echo 'login success!';
		}
 	}

 	$u = new User2();
	$u->login('1', '2');
