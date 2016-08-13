<?php 
	include '../init.php';

	// 接收 执行标志
	$bz = $_GET['bz'];

	$user_list = $_POST;

	switch ($bz) {
		case 'add':
				// 判断传输值是否为空
				// foreach($user_list as $v){
				// 	if( empty($v)){
				// 		notice('表单不能为空');
				// 	}
				// }

				// 判断密码是否一致
				if($user_list['passwd'] !=  $user_list['repasswd'] ){
					notice('两次密码不一致');
				}
		
				// 判断帐户是否存在
				$sql = 'select username from admin where username ='.$user_list['username'];
				if(query($sql)){
					notice('您输入的帐户已存在, 请重新输入...');
				}


				// 上传并缩放头像处理

				$filename = up_img(key($_FILES), ROOT.'uploads/');

				$field_key = '';
				$field_value = '';
				// 拼接sql语句
				foreach($user_list as $k => $v){
					if($k == 'passwd'){
						$v = md5($v);
					}

					if($k != 'repasswd'){
						$field_key .= ' `'.$k.'` ,   ';
						$field_value .= ' "'.$v.'", ';
					}
				}

				$field_key .= '`logintime`, `icon`';
				$field_value .= time().', "'.$filename.'"  ' ;

				$sql = 'insert into admin('.$field_key.')  values('.$field_value.')';
//				echo $sql;exit;
				$result = zsg($sql);
				if($result){
					notice('添加用户成功，正在使劲跳转...','index.php');
				}

			break;
		case 'edit':
			# code...
			break;
		case 'del':
			# code...
			break;
		default:
			# code...
			break;
	}

 ?>