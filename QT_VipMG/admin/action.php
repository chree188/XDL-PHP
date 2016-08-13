<?php 
	include 'init.php';

	$bz = $_GET['bz'];

	switch($bz){
		case 'login':
			// 接收页面传送过来的值
				$admin_list = $_POST;

				// 判断传输值 是否为空
				foreach($admin_list as $v){
					if( empty( $v ) ){
						notice('帐户和密码不能为空, 正在前往登录页面...');

					}
				}

				// 判断帐户是否存在
				$sql = 'select username from admin where username = "'.$admin_list['username'].'"';

				if( !query($sql) ){
					notice('您输入的帐户不存在, 正在返回登录界面');
				}

				// 判断验证码是否正确
				if( strcasecmp( $_SESSION['v_code'] ,$admin_list['v_code']  )  != 0){
					notice('验证码有误....');
				}

				// 判断密码是否正确
				$sql = 'select id,username from admin where username="'.$admin_list['username'].'" and passwd="'.md5($admin_list['passwd']).'"';
				$result = query($sql);
				if(!$result){
					notice('您的密码有误,请重新输入...');
				}
				
				// 判断管理员类型
				$sql= 'select state from admin where username="'.$admin_list['username'].'" and state = 1';
				if(!query($sql)){
					notice('登录成功,欢迎您:'.$admin_list['username'].' 正在拼命加载中....','index2.php');
				}
				
				// 判断管理员状态
				$sql= 'select status from admin where username="'.$admin_list['username'].'" and status = 1';
				if(!query($sql)){
					notice('您的帐户已被冻结, 请联系管理员...');
				}

				$_SESSION['admin']['id'] = $result[0]['id'];
				$_SESSION['admin']['username'] = $result[0]['username'];
				unset($_SESSION['v_code']);
				notice('登录成功,欢迎您:'.$admin_list['username'].' 正在拼命加载中....','index.php');
			break;
		case 'logout':
				unset($_SESSION['admin']);
				notice('退出成功, 正在前往登录界面...','login.php');
			break;
	}

	
 ?>