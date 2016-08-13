<?php 
	include '../init.php';

	$bz = $_GET['bz'];

	switch($bz){
		//登录用户
		case 'login':
			// 接收页面传送过来的值
				$user_list = $_POST;

				// 判断传输值 是否为空
				foreach($user_list as $v){
					if( empty( $v ) ){
						notice('帐户和密码不能为空, 正在前往登录页面...');

					}
				}

				// 判断帐户是否存在
				$sql = 'select nickname from user where nickname = "'.$user_list['nickname'].'"';
					// echo $sql;exit;
				if( !query($sql) ){
					notice('您输入的帐户不存在, 正在返回登录界面');
				}

				// 判断密码是否正确
				$sql = 'select id,tel,nickname from user where nickname="'.$user_list['nickname'].'" and pwd="'.md5($user_list['pwd']).'"';
				// echo $sql;exit;
				$result = query($sql);
				if(!$result){
					notice('您的密码有误,请重新输入...');
				}

				// 判断前台用户状态
				$sql= 'select status from user where nickname="'.$user_list['nickname'].'" and status = 1';
				// echo $sql;e xit;
				if(!query($sql)){
					notice('您的帐户已被冻结, 请联系客服妹子...');
				}

				$_SESSION['home']['id'] = $result[0]['id'];
				$_SESSION['home']['nickname'] = $result[0]['nickname'];
				$_SESSION['home']['tel'] = $result[0]['tel'];
		
				notice('登录成功, 正在拼命加载中....','../index.php');
			break;
		case 'logout':
				unset($_SESSION['home']);
				notice('退出成功, 正在前往登录界面...','login.php');
			break;
			// 注册用户
		case 'reg':
				$user_list = $_POST;
				// 判断传输值是否为空
				foreach($user_list as $v){
					if( empty($v)){
						notice('表单不能为空');
					}
				}

				// 判断密码是否一致
				if($user_list['pwd'] !=  $user_list['repwd'] ){
					notice('两次密码不一致');
				}
		
				// 判断帐户是否存在
				$sql = 'select nickname from user where nickname ='.$user_list['nickname'];
				// echo $sql;exit;
				if(query($sql)){
					notice('您输入的帐户已存在, 请重新输入...');
				}

				$field_key = '';
				$field_value = '';
				// 拼接sql语句
				foreach($user_list as $k => $v){
					if($k == 'pwd'){
						$v = md5($v);
					}

					if($k != 'repwd'){
						$field_key .= ' `'.$k.'` ,   ';
						$field_value .= ' "'.$v.'", ';
					}


				}

				$field_key .= '`regtime`';
				$field_value .= time() ;

				$sql = 'insert into user('.$field_key.')  values('.$field_value.')';
					echo $sql;exit;
				if(zsg($sql)){
					notice('注册成功','login.php');
				}else{
					notice('注册失败');
				}

			break;
	

	}
 ?>