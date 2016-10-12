<?php	
	session_start();
//	实现购物车的添加 删除 清空
	
	$_GET['a'] = empty($_GET['a']) ? '' : $_GET['a'];
	switch($_GET['a']){
		case 'add':	//添加
		$id = $_POST['id'];
		$goods['name'] = $_POST['name'];
		$goods['price'] = $_POST['price'];
		$goods['num'] =	1;
//		这个就是购物车 $_SESSION['shoplist']
		if(empty($_SESSION['shoplist'][$id])){
			$_SESSION['shoplist'][$id] = $goods;
		}else{
			$_SESSION['shoplist'][$id]['num']++;
		}
//		3 实现页面跳转
		header("Location:show.php");
		break;
		
		case 'del':	//删除
//		1 删除购物车里面的商品
		unset($_SESSION['shoplist'][$_GET['id']]);
//		2 实现页面跳转
		header("Location:show.php");
		break;
		
		case 'clear': //清空
//		1 清空购物车里面的商品
		unset($_SESSION['shoplist']);
//		2 实现页面跳转
		header("Location:show.php");
		break;
	}
