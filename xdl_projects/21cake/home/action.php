<?php 
	include 'init.php';

	$bz = $_GET['bz'];
	function regNotice($notice){
					header('location:reg.php?notice='.$notice);
					exit;
				}
	function editNotice($notice){
					header('location:member-setting.php?notice='.$notice);
					exit;
				}

	switch($bz){
		case 'login':
			// 接收页面传送过来的值
				$user_list = $_POST;

				// 判断传输值 是否为空
				foreach($user_list as $v){
					if( empty( $v ) ){
						notice('帐户和密码不能为空, 正在前往登录页面...');

					}
				}

				if(!preg_match('/^1[34578]\d{9}/',$_POST['tel'])){
					regNotice('! 手机号码格式不正确');
				}

				// 判断帐户是否存在
				$sql = 'select tel from user where tel = "'.$user_list['tel'].'"';

				if( !query($sql) ){
					notice('您输入的帐户不存在, 正在返回登录界面');
				}


				// 判断验证码是否正确
				if( strcasecmp( $_SESSION['v_code'] ,$user_list['v_code']  )  != 0){
					notice('验证码有误....');
				}


				// 判断密码是否正确
				$sql = 'select id,tel,nickname from user where tel="'.$user_list['tel'].'" and pwd="'.md5($user_list['pwd']).'"';
				$result = query($sql);
				if(!$result){
					notice('您的密码有误,请重新输入...');
				}

				// 判断前台用户状态
				$sql= 'select status from user where tel="'.$user_list['tel'].'" and status = 1';
				if(!query($sql)){
					notice('您的帐户已被冻结, 请联系客服妹子...');
				}

				$_SESSION['home']['id'] = $result[0]['id'];
				$_SESSION['home']['nickname'] = $result[0]['nickname'];
				$_SESSION['home']['tel'] = $result[0]['tel'];
		
				notice('登录成功, 正在拼命加载中....','index.php');
			break;

		case 'logout':
				unset($_SESSION['home']);
				unset($_SESSION['cart']);
				notice('退出成功, 正在前往首页...','index.php');
			break;

		case 'reg':
				$user_list = $_POST;
				// 判断传输值是否为空
				foreach($user_list as $v){
					if( empty($v)){
						notice('表单不能为空');
					}
				}

				if(!preg_match('/^1[34578]\d{9}/',$_POST['tel'])){
					regNotice('! 手机号码格式不正确');
				}

				// 判断密码是否一致
				if($user_list['pwd'] !=  $user_list['repwd'] ){
					regNotice('! 两次密码不一致');
				}
		
				// 判断帐户是否存在
				$sql = 'select tel from user where tel ='.$user_list['tel'];
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

				if(zsg($sql)){
					notice('注册成功','login.php');
				}else{
					notice('注册失败');
				}

			break;


		// case 'edit':

		// 	$field = '';
		// 	// 判断表单是否为空, 空的话跳过, 不为空 判断密码一致, 拼接sql语句
		// 	foreach($user_list as $k => $v){
		// 		// 表单不为空
		// 		if(!empty($v)){
		// 			// 判断密码是否一致
		// 			// 密码加密
		// 			if($k == 'pwd'){
		// 				if( $v != $user_list['repwd']){
		// 					notice('两次密码不一致');
		// 				}
		// 				$v = md5($v);
		// 			}

		// 			// 拼接sql语句 
		// 			if($k !='repwd'){
		// 				$field .= '`'.$k.'` = "'.htmlentities($v).'",';
		// 			}
		// 		}

		// 	}
		// 	//  update 表名 set  `字段名`='字段值', .... where 
		// 	if(   $_FILES[key($_FILES)]['error']    ){
		// 		$field = rtrim($field,',');
		// 	}else{
		// 		// 上传了图片, 返回一个新的文件名
		// 		$filename = up_img( key($_FILES),  ROOT.'uploads/' );
		// 		$field  .= ' `icon` = "'.$filename.'"  ';
		// 	}
		// 	$sql = 'update user set '.$field.' where id='.$user_list['id'];
			
		// 	if(zsg($sql)){
		// 		notice('编辑成功, 正在前往用户列表....','index.php');
		// 	}else{
		// 		notice('编辑失败,请重新来过');
		// 	}
		// 	break;


		case 'edit':
			$user_list = $_POST;

			$field = '';
			// 判断表单是否为空, 空的话跳过, 不为空 判断密码一致, 拼接sql语句
			foreach($user_list as $k => $v){
				// 表单不为空

					// 拼接sql语句 
					if($k !='repwd'){
						$field .= '`'.$k.'` = "'.htmlentities($v).'",';
					}
				}

			$field = rtrim($field,',');

			//  update 表名 set  `字段名`='字段值', .... where 
			$sql = 'update user set '.$field.' where id='.$user_list['id'];

			// var_dump($sql);exit;
			
			if(zsg($sql)){
				notice('编辑成功, 正在前往用户列表....','index.php');
			}else{
				notice('编辑失败,请重新来过');
			}
			break;


		case 'cart':
			$id = $_GET['gid'];
			$count = $_GET['count'];
			$stock = $_GET['stock'];
			$type = $_GET['type'];

			if($count < 1 ){
					notice('购买数量有误，请重新输入');
				}

			if($type=='cart'){
					// 判断购买数量是否大于库存



				if($count > $stock){
					notice('库存不足...');
				}

				$sql = 'select g.id, g.name, g.price, g.sales, g.stock, i.icon
						from goods g, goodsImg i
						where g.id = i.gid and face = 1 and g.id = '.$id;

				$goods_list = query($sql)[0];
				$goods_list['count'] = $count;
				

				$_SESSION['cart'][$id] = $goods_list;
				// unset($_SESSION['cart']);
				// var_dump($_SESSION['cart']);
				// exit;
				// unset($_SESSION['cart']);
				// var_dump($_SESSION['cart']);exit;
				header('location:cart.php');
				break;
			}else{
				if($count > $stock){
					notice('库存不足...');
				}

				$sql = 'select g.id, g.name, g.price, g.sales, g.stock, i.icon
						from goods g, goodsImg i
						where g.id = i.gid and face = 1 and g.id = '.$id;

				$goods_list = query($sql)[0];
				$goods_list['count'] = $count;

				$_SESSION['cart'][$id] = $goods_list;
				// var_dump($_SESSION['cart']);
				// exit;
				header('location:cart-checkout.php');
				break;
			}

			
		
		case 'jian':
			$id = $_GET['id'];
			$_SESSION['cart'][$id]['count']--;

			if($_SESSION['cart'][$id]['count'] < 1){
				$_SESSION['cart'][$id]['count'] = 1;
			}

			header('location:'.$_SERVER['HTTP_REFERER']);

			break;

		case 'jia':
			$id = $_GET['id'];
			$_SESSION['cart'][$id]['count']++;

			if($_SESSION['cart'][$id]['count'] > $_SESSION['cart'][$id]['stock']){
				$_SESSION['cart'][$id]['count'] = $_SESSION['cart'][$id]['stock'];
			}

			header('location:'.$_SERVER['HTTP_REFERER']);

			break;

		case 'del':
			unset($_SESSION['cart'][$_GET['id']]);
			header('location:'.$_SERVER['HTTP_REFERER']);
			break;
		case 'del-all':
			unset($_SESSION['cart']);
			header('location:'.$_SERVER['HTTP_REFERER']);
			break;

		case 'orderinfo':
			if(empty($_SESSION['home'])){
				notice('您尚未登录,请先登录...','login.php');
			}

			header('location:cart-checkout.php');

			break;


		case 'buy':
			
			if(empty($_SESSION['home'])){
				notice('您尚未登录,请先登录...','login.php');
			}

			// header('location:cart-checkout.php');
			// uuid  订单编号 
		//	orders表
			$order_list = $_POST;
			$chars = md5(uniqid(mt_rand(), true));  
		    $uuid  = substr($chars,0,8) . '-';  
		    $uuid .= substr($chars,8,4) . '-';  
		    $uuid .= substr($chars,12,4) . '-';  
		    $uuid .= substr($chars,16,4) . '-';  
		    $uuid .= substr($chars,20,12);  

		    $field_key = '';
		    $field_value = '';
		    foreach ($_POST as $k => $v) {
		    	$field_key .= '`'.$k.'`,';
		    	$field_value .= '"'.htmlentities($v).'",';
		    }
		    $id = $_SESSION['home']['id'];
		    $field_key .= '`time`, `uid`,';
		    $field_value .= time().',"'.$id.'",';

		    $field_key .= '`orderNum`';
			$field_value .= '"'.$uuid.'"';

		    $sql = 'insert into orders('.$field_key.')  values('.$field_value.')';
		    echo $sql;
		    $ins_id = zsg($sql);



		    $cart_list = $_SESSION['cart'];
		    // var_dump($cart_list);exit;

		    if($ins_id){

					foreach($cart_list as $k => $v){
						$sales = '';
						$sales = $v['sales'] + $v['count'];
						$sql = 'update goods set sales = '.$sales.' where id ='.$v['id'];
						zsg($sql);
						// var_dump($sql);
						// exit;
					}
			}

		    //ordersGood表
		    $cart_list = $_SESSION['cart'];

		    if($ins_id){

					foreach($cart_list as $k => $v){
						$sql = 'insert into ordersGood(`oid`,`gid`,`price`,`count`,`gname`,`icon`) values("'.$ins_id.'","'.$v['id'].'","'.$v['price'].'","'.$v['count'].'","'.$v['name'].'","'.$v['icon'].'")';
						zsg($sql);
					}



					unset($_SESSION['cart']);
					notice('支付成功,商品马上发出','index.php');
				}else{
					notice('支付失败');
				}

		case 'user-edit':
		$field = '';
		$user_list=$_POST;
		$id = $_SESSION['home']['id'];
			// 判断表单是否为空, 空的话跳过, 不为空 判断密码一致, 拼接sql语句
		foreach($user_list as $v){

			if(!preg_match('/^1[34578]\d{9}/',$_POST['tel'])){
					editNotice('! 手机号码格式不正确');
				}

			if(!preg_match("/^([0-9A-Za-z\\-_\\.]+)@([0-9a-z]+\\.[a-z]{2,3}(\\.[a-z]{2})?)$/i",$_POST['email'])){
					editNotice('! 邮箱格式不正确');
				}

			

			}
// ^(\w)+(\.\w+)*@(\w)+((\.\w+)+)$
			foreach($user_list as $k => $v){
				// 表单不为空
				if(!empty($v)){
					// 判断密码是否一致
					// 密码加密
					// if($k == 'pwd'){
					// 	if( $v != $user_list['repwd']){
					// 		notice('两次密码不一致');
					// 	}
					// 	$v = md5($v);
					// }

					// 拼接sql语句 
					if($k !='repwd'){
						$field .= '`'.$k.'` = "'.htmlentities($v).'",';
					}
				}

			}
			//  update 表名 set  `字段名`='字段值', .... where 
			$field = rtrim($field,',');
			$sql = 'update user set '.$field.' where id='.$id;

			if(zsg($sql)){
				notice('编辑成功, 正在前往用户中心...','user-center.php');
			}else{
				notice('编辑失败,请重新编辑');
			}
			break;


		case 'pwd':
			$user_list = $_POST;
			$id = $user_list['id'];
			$sql = 'select pwd from user where id='.$id;
			$result = query($sql)[0];
			$pwd = $result['pwd'];
			$opwd = md5($user_list['opwd']);
			$npwd = md5($user_list['npwd']);
			$rpwd = md5($user_list['rpwd']);
			
				// 表单不为空
				if($pwd == $opwd){
					if( $opwd == $rpwd ){
						notice('新密码与原密码一致，请重新填写新密码');
					}else{
						if( $npwd==$rpwd ){
							$sql = 'update user set pwd = "'.$npwd.'" where id ='.$id;
						}
					}
				}else{
					notice('原密码密码输入错误，请重新输入');
				}

				if(!empty(zsg($sql))){
							notice('密码修改成功','login.php');
						}
			break;

		case 'icon':
			$id = $_SESSION['home']['id'];
			$filename = up_img(key($_FILES), ROOT.'uploads/');
			header('user-center.php');



				$sql = 'update user set icon ="'.$filename.'" where id='.$id;

				if(zsg($sql)){
					notice('修改头像成功','user-center.php');
				}else{
					notice('修改头像失败');
				}


			break;


		case 'receive':
			$id = $_GET['id'];
			$sql = 'update orders set isReceive = 2 where id='.$id;
			if(zsg($sql)){
					notice('确认收货成功');
				}else{
					notice('确认收货失败');
				}
			break;


		case 'cancel':
			$id = $_GET['id'];
			$sql = 'update orders set cancel = 2 where id='.$id;
			if(zsg($sql)){
					notice('退货退款成功');
				}else{
					notice('退货退款失败');
				}
			break;

		case 'comment':
			$uid = $_SESSION['home']['id'];
			$gid = $_GET['gid'];
			$comment = htmlentities($_POST['comment']);
			$sql = 'select gname, oid, id from ordersGood where gid = '.$gid;
			echo $sql;
			$gname = query($sql)[0]['gname'];
			$oid = query($sql)[0]['oid'];
			$ogid = query($sql)[0]['id'];
			$sql = 'insert into goodsComment (`comment`,`ogid`,`oid`,`gid`,`gname`,`uid`) values ("'.htmlentities($comment).'",'.$ogid.','.$oid.','.$gid.',"'.$gname.'",'.$uid.')';
			if(zsg($sql)){
					notice('评论成功,感谢您的评论');
				}else{
					notice('啊哦,评论失败,再来一次');
				}

			break;

		case 'look':
			$id=$_GET['id'];
			$sql = 'update goods set look = look+1 where id = '.$id;
			zsg($sql);
			header('location:'.URL.'/home/goods-details-pages.php?id='.$id);
			
	
	}
		
	

	
 ?>