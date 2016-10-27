<?php 
	include '../init.php';

	// 接收 执行标志
	$bz = $_GET['bz'];

	$user_list = $_POST;
	function addNotice($notice){
					header('location:add.php?notice='.$notice);
					exit;
				}
	function editNotice($notice){
					header('location:add.php?notice='.$notice);
					exit;
				}

	switch ($bz) {
		case 'add':
				// 判断传输值是否为空
				// foreach($user_list as $v){
				// 	if( empty($v)){
				// 		notice('表单不能为空');
				// 	}
				// }

				// 判断密码是否一致

				if(!preg_match('/^1[34578]\d{9}/',$_POST['tel'])){
					addNotice('! 手机号码格式不正确');
				}

				if($user_list['pwd'] !=  $user_list['repwd'] ){
					notice('两次密码不一致');
				}

				if(!preg_match("/^([0-9A-Za-z\\-_\\.]+)@([0-9a-z]+\\.[a-z]{2,3}(\\.[a-z]{2})?)$/i",$user_list['email'])){
					editNotice('! 邮箱格式不正确');
				}
		
				// 判断帐户是否存在
				$sql = 'select tel from user where tel ='.$user_list['tel'];
				if(query($sql)){
					notice('您输入的帐户已存在, 请重新输入...');
				}


				// 上传头像处理
				// var_dump(key($_FILES));
				// var_dump(URL.'uploads/');
				// exit;

				
				// echo $filename;
				// exit;

				// 缩放头像
				// 2016080957a99eedb306a.jpeg
				// ROOT.uploads/2016/08/09/2016080957a99eedb306a.jpeg
				
				// echo $filepath;exit;

				// $filename = upload(key($_FILES), ROOT.'uploads/');

				// $filepath = ROOT.'uploads/';
				// $filepath .= substr($filename,0,4).'/';
				// $filepath .= substr($filename,4,2).'/';
				// $filepath .= substr($filename,6,2).'/';
				// $filepath .= $filename;

				// zoom($filepath,50,50);
				// zoom($filepath,240,240);
				// zoom($filepath,360,360);
				// var_dump($_FILES);exit;
				if( empty($_FILES['icon']['error'])){
				$filename = up_img(key($_FILES), ROOT.'uploads/');}
				// var_dump($filename);
				

				$field_key = '';
				$field_value = '';
				// 拼接sql语句
				foreach($user_list as $k => $v){
					if($k == 'pwd'){
						$v = md5($v);
					}

					if($k != 'repwd'){
						$field_key .= ' `'.$k.'` ,   ';
						$field_value .= ' "'.htmlentities($v).'", ';
					}
				}

				$field_key .= '`regtime`, `icon`';
				$field_value .= time().', "'.$filename.'"  ' ;

				$sql = 'insert into user('.$field_key.')  values('.$field_value.')';
				// var_dump($sql);exit;

				if(zsg($sql)){
					notice('成功添加用户','index.php');
				}else{
					notice('添加用户失败');
				}

			break;


		case 'home':
				# code...
			break;


		case 'edit':
			$field = '';
			// 判断表单是否为空, 空的话跳过, 不为空 判断密码一致, 拼接sql语句
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
				$filename = up_img( key($_FILES),  ROOT.'uploads/' );
				$field  .= ' `icon` = "'.$filename.'"  ';
			}
			$sql = 'update user set '.$field.' where id='.$user_list['id'];
			
			if(zsg($sql)){
				notice('编辑成功, 正在前往用户列表....','index.php');
			}else{
				notice('编辑失败,请重新来过');
			}
			break;


		

		case 'del':
			// 先接收 当前用户的id
				$id = $_GET['id'];
				$icon = $_GET['icon'];
			if(!empty($icon)){
				$a = query('select icon from user where id='.$id);
				$d = query('select regtime from user where id='.$id);
				$i = $a[0]['icon'];
				$D = $d[0]['regtime'];
				$dir .= date('Y',$D).'/';
				$dir .= date('m',$D).'/';
				$dir .= date('d',$D).'/';
				$ROOT = ROOT.'uploads/';

				unlink($ROOT.$dir.$i);
			}
				
				
				// if (!$icon) {
				// 	$filepath = ROOT.'uploads/';
				// 	$filepath .= substr($icon,0,4).'/';
				// 	$filepath .= substr($icon,4,2).'/';
				// 	$filepath .= substr($icon,6,2).'/';
				// 	@unlink($filepath.$icon);
				// 	@unlink($filepath.'50_'.$icon);
				// 	@unlink($filepath.'150_'.$icon);
				// 	@unlink($filepath.'200_'.$icon);
				// }



				// 先通过id 查询头像
				// 如果有头像, 先删除头像
				// 自己写

				$sql = 'delete from user where id='.$id;


				if(zsg($sql)){
					header('location:'.$_SERVER['HTTP_REFERER']);
				}else{
					notice('删除失败');
				}
			break;


		// var_dump($_GET);
		// exit;
	
		// if($v['status']==1){
		// 	$v['status']==2;
			
		// }else{
		// 	$v['status']==1;
		// }
	
		// $sql='update user set status where status='.$v['status'];
		// if (zsg($sql)){
		// 	notice('编辑成功');
		// }else{
		// 	notice('编辑失败');
		// }

		case 'status':
				// 先接收 当前用户的id
				$id = $_GET['id'];

				$status = $_GET['status']==1?2:1;

				$sql = 'update user set `status` = '.$status .' where id = '.$id;

				if(zsg($sql)){
					header('location:'.$_SERVER['HTTP_REFERER']);
				}else{
					notice('状态更新失败');
				}

			break;
	}

			
// 		case 'default':
// 			$id=$_GET['id'];
// 			$sql='delete from user  where id='.$id;
// // var_dump($sql);
// // exit;
// 			if(zsg($sql)){
// 					notice('成功删除用户');
// 				}else{
// 					notice('删除用户失败');
// 				}

			
// 			break;
// 	}

?>