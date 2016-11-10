<?php 
	include '../init.php';

	// 接收 执行标志
	$bz = $_GET['bz'];

	$user_list = $_POST;

	switch ($bz) {
		case 'add':
				// 判断传输值是否为空
			if(!$_POST['username'] || !$_POST['name'] || !$_POST['passwd'] || !$_POST['repasswd'] || !$_POST['phone']){		//带*号必填项不能为空
				notice('带<b>*</b>不能为空','add.php');
			}

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
				if($_FILES['icon']['size'] != 0){
					$filename = up_img(key($_FILES), ROOT.'uploads/');
				}

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
			$field = '';
			// 判断表单是否为空, 空的话跳过, 不为空 判断密码一致, 拼接sql语句
			foreach($user_list as $k => $v){
				// 表单不为空
				if(!empty($v)){
					// 判断密码是否一致
					// 密码加密
					if($k == 'passwd'){
						if( $v != $user_list['repasswd']){
							notice('两次密码不一致');
						}
						$v = md5($v);
					}

					// 拼接sql语句 
					if($k !='repasswd'){
						$field .= '`'.$k.'` = "'.htmlentities($v).'",';
					}
				}

			}
			//  update 表名 set  `字段名`='字段值', .... where 
			if(   $_FILES[key($_FILES)]['error']    ){
				$field = rtrim($field,',');
			}else{
				// 上传了图片, 返回一个新的文件名
				$filename = up_img( key($_FILES),  ROOT.'uploads/' );
				$field  .= ' `icon` = "'.$filename.'"  ';
			}
			$sql = 'update admin set '.$field.' where id='.$user_list['id'];
			
			if(zsg($sql)){
				notice('编辑成功, 正在前往用户列表....','index.php');
			}else{
				notice('编辑失败,请重新来过');
			}
			break;
		case 'del':
				// 先接收 当前用户的id 判断数据库有无图片路径，有则根据路径删除所有图片
				$id = $_GET['id'];
				$sql = 'select icon from admin where id ='.$id;
				$result = query($sql);
				unlink(img_url($result[0]['icon']));
				unlink(img_url($result[0]['icon'],50));
				unlink(img_url($result[0]['icon'],240));
				unlink(img_url($result[0]['icon'],360));

				$sql = 'delete from admin where id='.$id;

				if(zsg($sql)){
					header('location:'.$_SERVER['HTTP_REFERER']);
				}else{
					notice('删除失败');
				}
			break;
		case 'status':
				// 先接收 当前用户的id
				$id = $_GET['id'];

				$status = $_GET['status']==1?2:1;

				$sql = 'update admin set status = '.$status .' where id = '.$id;

				if(zsg($sql)){
					header('location:'.$_SERVER['HTTP_REFERER']);
				}else{
					notice('状态更新失败');
				}

			break;
		default:
			# code...
			break;
	}

 ?>