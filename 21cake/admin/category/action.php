<?php 
	include '../init.php';

	// 接收 执行标志
	$bz = $_GET['bz'];

	$user_list = $_POST;

	switch ($bz) {
		case 'add':
				// 判断传输值是否为空
				foreach($user_list as $v){
					if( $v == ''){
						notice('表单不能为空');
					}
				}
				
				// 判断分类名是否存在
				$sql = 'select name from category where name ='.$user_list['name'];
				if(query($sql)){
					notice('您输入的分类已存在, 请重新输入...');
				}

				$field_key = '';
				$field_value = '';
				// 拼接sql语句
				foreach($user_list as $k => $v){
					$field_key .= ' `'.$k.'` ,';
					$field_value .= ' "'.htmlentities($v).'",';
				}

				$field_key = rtrim($field_key,',');
				$field_value = rtrim($field_value,',');

				$sql = 'insert into category('.$field_key.')  values('.$field_value.')';
				// echo $sql;exit;

				if(zsg($sql)){
					notice('成功添加分类','index.php');
				}else{
					notice('添加分类失败');
				}

			break;
		case 'edit':
			$field = '';
			// 判断表单是否为空, 空的话跳过, 不为空 判断密码一致, 拼接sql语句
			foreach($user_list as $k => $v){
				// 表单不为空
				if(!empty($v)){
					// 拼接sql语句 
					$field .= '`'.$k.'` = "'.htmlentities($v).'",';
				}
			}
			
			$field = rtrim($field,',');
			
			$sql = 'update category set '.$field.' where id='.$user_list['id'];
			
			if(zsg($sql)){
				notice('编辑成功, 正在前往分类列表....','index.php');
			}else{
				notice('编辑失败,请重新编辑');
			}
			break;
		case 'del':
				// 如果有子分类, 就不能删除
				$id = $_GET['id'];

				// 查询是否有子集
				$sql = 'select id from category where pid='.$id;

				if( query($sql) ){
					notice('删除失败, 请先删除子分类');
				}else{
					// 未查到子集, 则删除
					$sql = 'delete from category where id='.$id;
					if( zsg($sql)){
						notice('删除成功');
					}else{
						notice('删除失败');
					}
				}
			break;
			
		case 'display':
				// 先接收 当前用户的id
				$id = $_GET['id'];

				$display = $_GET['display']==1?2:1;

				$sql = 'update category set `display` = '.$display .' where id = '.$id;

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