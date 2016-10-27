<?php 
	include '../init.php';

	// 接收 执行标志
	$bz = $_GET['bz'];

	$goods_list = $_POST;

	switch ($bz) {
		case 'add':
				// 判断传输值是否为空
				foreach($goods_list as $v){
					if( empty($v)){
						notice('表单不能为空');
					}
				}

				// 判断文件是否上传成功, 失败则直接退出
				if(  key($_FILES) == null || $_FILES[key($_FILES)]['error'] > 0   ){
					notice('上传文件过大或者其他原因, 请上传图片...');
				}

				// 拼接sql语句
				$field_key = '';
				$field_value = '';
				foreach($goods_list as $k => $v){
					$field_key .= ' `'.$k.'` ,   ';
					$field_value .= ' "'.htmlentities($v).'", ';
				}

				$field_key .= '`addtime`';
				$field_value .= time();

				$sql = 'insert into goods('.$field_key.')  values('.$field_value.')';

				$ins_id = zsg($sql);
				// 成功添加商品, 则再添加图片
				if($ins_id){
					// 上传商品图片, 返回图片名
					$filename = up_img(key($_FILES), ROOT.'uploads/');

					$sql = 'insert into goodsImg(`gid`,`icon`,`face`) values("'.$ins_id.'","'.$filename.'",1)';
					zsg($sql);
					notice('成功添加商品','index.php');
				}else{
					notice('添加商品失败');
				}


		case 'goodsdetail':
				// var_dump($goods_list);exit;
				$name = $goods_list['gname'];
				$sql = 'select id from goods where name ="'.$name.'"';
				
				$result = query($sql);

				$gid = $result[0]['id'];

		
				// 拼接sql语句
				$field_key = '';
				$field_value = '';
				foreach($goods_list as $k => $v){
					$field_key .= ' `'.$k.'` ,   ';
					$field_value .= ' "'.htmlentities($v).'", ';
				}

				$field_key .= '`gid`';
				$field_value .= $gid;

				$sql = 'insert into goodsdetail('.$field_key.')  values('.$field_value.')';


				$ins_id = zsg($sql);
				
				if($ins_id){
					notice('成功添加商品详情','index.php');
				}else{
					notice('添加商品详情失败');
				}

			break;


		case 'edit':
			$field = '';
			// 判断表单是否为空, 空的话跳过, 不为空 判断密码一致, 拼接sql语句
			foreach($goods_list as $k => $v){
				// 表单不为空
				if(!empty($v)){

						$field .= '`'.$k.'` = "'.htmlentities($v).'",';
					}
				}

			
			//  update 表名 set  `字段名`='字段值', .... where 
			
				$field = rtrim($field,',');
			
			
			$sql = 'update goods set '.$field.' where id='.$_GET['id'];
			if(zsg($sql)){
				notice('编辑成功, 正在前往商品列表....','index.php');
			}else{
				notice('编辑失败,请重新来过');
			}
			break;


		case 'del':
				// 删除图片, 不仅删数据库里的图片名, 还要删除文件夹的里的图片
				$id = $_GET['id'];
				

				$sql ='select `icon` from goodsImg where gid='.$id;
				$img = query($sql);
				$img = $img[0]['icon'];


				$sql='select `addtime` from goods where id='.$id;
				$date = query($sql);
				$date = $date[0]['addtime'];

				
				

				$save_path='D:/wampserver/wamp/www/XM1/lamp_shop/uploads/';
					$dir = $save_path;
					$dir .= date('Y',$date).'/';
					$dir .= date('m',$date).'/';
					$dir .= date('d',$date).'/';
					
					// var_dump($img);
					
					unlink($dir.$img);



				$sql = 'delete from goodsImg where gid='.$id;

				if(zsg($sql)){
					header('location:'.$_SERVER['HTTP_REFERER']);
				}else{
					notice('删除失败');
				}

				$sql = 'delete from goods where id='.$id;
				if(zsg($sql)){
					header('location:'.$_SERVER['HTTP_REFERER']);
				}else{
					notice('删除失败');
				}

			break;

		case 'delimg':
				$id = $_GET['id'];
				
				$sql ='select `icon`,`face` from goodsImg where id='.$id;
				$result = query($sql);
				if(!$result[0]['face']==1){
					$img = $result[0]['icon'];

					$filepath =	ROOT.'uploads/';
					$filepath .= substr($img,0,4).'/';
					$filepath .= substr($img,4,2).'/';
					$filepath .= substr($img,6,2).'/';

					unlink($filepath.$img);
					
						
						// var_dump($img);
					$sql = 'delete from goodsImg where id='.$id;

					if(zsg($sql)){
						header('location:'.$_SERVER['HTTP_REFERER']);
					}else{
						notice('删除失败');
					}
					
				}else{
					notice('封面不能删除','index.php');
				}
				

			break;


		case 'face':
				// 先接收 当前用户的id
				$id = $_GET['id'];
				$gid = $_GET['gid'];

				$sql = 'update goodsImg set `face` = 2 where gid = '.$gid;

				if(zsg($sql)){
					$sql = 'update goodsImg set `face` = 1 where id='.$id;
					zsg($sql);
					header('location:'.$_SERVER['HTTP_REFERER']);
				}else{
					notice('状态更新失败');
				}
				break;





		case 'add_img':
				// 接收商品的id
				$gid = $_POST['gid'];

				// 判断文件是否上传成功, 失败则直接退出
				if(  key($_FILES) == null || $_FILES[key($_FILES)]['error'] > 0   ){
					notice('上传文件过大或者其他原因, 请上传图片...');
				}

				// 上传商品图片, 返回图片名
				$filename = up_img(key($_FILES), ROOT.'uploads/');

				$sql = 'insert into goodsImg(`gid`,`icon`)  values("'.$gid.'","'.$filename.'")';

				if(zsg($sql)){
					notice('添加成功');
				}else{
					notice('添加失败');
				}

				break;


		case 'isup':
			//	先接受当前用户的id
			$id = $_GET['id'];
			$up = $_GET['up']==1?2:1;
			$sql = 'update goods set `up` = '.$up .' where id = '.$id;
			if(zsg($sql)){
					header('location:'.$_SERVER['HTTP_REFERER']);
				}else{
					notice('状态更新失败');
				}
			break;


		case 'ishot':
			//	先接受当前用户的id
			$id = $_GET['id'];
			$hot = $_GET['hot']==2?1:2;
			$sql = 'update goods set `hot` = '.$hot.' where id = '.$id;
			if(zsg($sql)){
					header('location:'.$_SERVER['HTTP_REFERER']);
				}else{
					notice('状态更新失败');
				}
			break;


		case 'del-comment':
			$id = $_GET['id'];
			$sql = 'delete from goodscomment where id = '.$id;
			if(zsg($sql)){
					notice('删除成功');
				}else{
					notice('删除失败');
				}
			break;
	
	}

 ?>