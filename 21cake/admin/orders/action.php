<?php 
	include '../init.php';

	$bz = $_GET['bz'];

	$order_list = $_POST;

	switch ($bz) {
		case 'status':
				// 先接收 当前用户的id
		// var_dump($_GET);exit;
				$id = $_GET['id'];

				$status = $_GET['status'];
				if($status==1){
					$status=2;
				}

				$sql = 'update orders set `status` = '.$status .' where id = '.$id;
				

				if(zsg($sql)){
					header('location:'.$_SERVER['HTTP_REFERER']);
				}else{
					notice('状态更新失败');
				}

			break;

		case 'isReceive':
				// 先接收 当前用户的id
		// var_dump($_GET);exit;
				$id = $_GET['id'];

				$isReceive = $_GET['isReceive']==1?2:1;

				$sql = 'update orders set `isReceive` = '.$isReceive .' where id = '.$id;

				if(zsg($sql)){
					header('location:'.$_SERVER['HTTP_REFERER']);
				}else{
					notice('状态更新失败');
				}

			break;

		case 'isPay':
				// 先接收 当前用户的id
		// var_dump($_GET);exit;
				$id = $_GET['id'];

				$isPay = $_GET['isPay']==1?2:1;

				$sql = 'update orders set `isPay` = '.$isPay .' where id = '.$id;

				if(zsg($sql)){
					header('location:'.$_SERVER['HTTP_REFERER']);
				}else{
					notice('状态更新失败');
				}

			break;

		// case 'orderWay':
		// 		// 先接收 当前用户的id
		// // var_dump($_GET);exit;
		// 		$id = $_GET['id'];

		// 		$isPay = $_GET['orderWay']==1?2:1;

		// 		$sql = 'update orders set `orderWay` = '.$orderWay .' where id = '.$id;

		// 		if(zsg($sql)){
		// 			header('location:'.$_SERVER['HTTP_REFERER']);
		// 		}else{
		// 			notice('状态更新失败');
		// 		}

		// 	break;


		case 'del':
			$oid =$_GET['oid'];
			var_dump($oid);
			$sql = 'delete from ordersGood where oid='.$oid;
			$sql2 = 'delete from orders where id='.$oid;
			echo $sql2;
			$result1=zsg($sql);
			$result2=zsg($sql2);

			if($result1 && $result2){
					header('location:'.$_SERVER['HTTP_REFERER']);
				}else{
					notice('删除失败');
				}

	}
 ?>