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
				if($user_list['pwd'] !=  $user_list['repwd'] ){
					notice('两次密码不一致');
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