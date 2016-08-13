<?php 
	include '../init.php';

	// 接收 执行标志
	$bz = $_GET['bz'];
	$id = $_GET['id'];

	$user_list = $_POST;

	switch ($bz) {
		case 'add':
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
				$sql = 'select tel from user where tel ='.$user_list['tel'];
				if(query($sql)){
					notice('您输入的帐户已存在, 请重新输入...');
				}
				

				

				$filename = up_img(key($_FILES), ROOT.'uploads/');

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

				$field_key .= '`regtime`, `icon`';
				$field_value .= time().', "'.$filename.'"  ' ;

				$sql = 'insert into user('.$field_key.')  values('.$field_value.')';
				
				$result = zsg($sql);
				if($result){
					notice('添加用户成功，正在使劲跳转...','index.php');
				}else{
					notice('输入的账户已存在，请重新输入...');
				}
			break;
		case 'edit':
				$field = '';
				//判断表单是否为空，空跳过
				foreach($user_list as $k => $v){
				// 表单不为空
				if(!empty($v)){
					// 判断密码是否一致
					// 密码加密
					if($k == 'pwd'){
						if( $v != $user_list['repwd']){
							notice('两次密码不一致');
						}
						$v = md5($v);
					}

					// 拼接sql语句 
					if($k !='repwd'){
						$field .= '`'.$k.'` = "'.htmlentities($v).'",';
					}
				}

			}
			//  update 表名 set  `字段名`='字段值', .... where 
			if(   $_FILES[key($_FILES)]['error']    ){
				$field = rtrim($field,',');
			}else{
				// 上传了图片, 返回一个新的文件名
				$filename = up_img(key($_FILES), ROOT.'uploads/');
				// echo $filename;exit;
				$field  .= ' `icon` = "'.$filename.'"  ';
			}
			$sql = 'update user set '.$field.' where id='.$user_list['id'];

			// echo $sql;exit;
			
			if(zsg($sql)){
				notice('编辑成功, 正在前往用户列表....','index.php');
			}else{
				notice('编辑失败,请重新来过');
			}
			break;
		case 'del':
			// 写sql语句 执行sql
			$sql = "delete from user where id={$_GET['id']}";
			// echo $sql;exit;
			if(zsg($sql)){
				notice('删除成功, 正在前往用户列表....','index.php');
			
			}else{
				notice('删除失败,请重新来过');
			}
			break;

			case 'status':
			// 写sql语句 执行sql
	
				$status = $_GET['status']==1?2:1;

				$sql = 'update user set `status` = '.$status .' where id = '.$id;

				if(zsg($sql)){
					header('location:'.$_SERVER['HTTP_REFERER']);
				}else{
					notice('更新失败');
				}

			break;
		default:
				
			break;
	}

 ?>