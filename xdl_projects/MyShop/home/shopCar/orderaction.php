<?php 
//订单信息处理Action
header("Content-Type:text/html;charset=utf-8");
	session_start(); //启用会话session
	//1.导入配置文件
	require("../../public/sql/dbconfig.php");
	//2.连接数据库
	$link = @mysqli_connect(HOST,USER,PASS)or die('数据库连接失败！');
	//3.选择数据库，设置编码
	mysqli_set_charset($link,"utf8");
	mysqli_select_db($link,DBNAME);
	

	//获取参数a的值，并执行对应的操作
	switch($_GET['a']){
		case "add":  //订单信息添加
			//执行订单信息添加
			$odid=$_POST['odid'];	//订单号
			$linkman=$_POST['linkman'];	//联系人
			$address=$_POST['address'];	//收件地址
			$code=$_POST['code'];	//邮编
			$phone=$_POST['phone'];	//手机号
			$uid=$_POST['uid']; //当前登陆者id
			$total=$_POST['total']; //总金额
			$status=$_POST['status']; //订单状态
			$descr=$_POST['descr']; //备注信息
			$addtime=time();
			//拼装订单添加sql语句
			$sql = "insert ignore into orders values(null,'{$odid}','{$uid}','{$linkman}','{$address}','{$code}','{$phone}','{$descr}',null,'{$addtime}','{$total}','{$status}')";
			mysqli_query($link, $sql);			
			//获取订单添加成功的自增id（订单号）
			$orderid = mysqli_insert_id($link);
			if($orderid>0){
				//添加订单详情
				foreach($_SESSION['shoplist'] as $shop){
					//拼装订单详情语句
					$sql = "insert ignore into detail values(null,{$orderid},{$shop['id']},'{$shop['goods']}','{$shop['price']}','{$shop['m']}','{$status}')";
					//执行添加
					mysqli_query($link, $sql);
				}
				//销毁session
				unset($_SESSION['shoplist']);
				unset($_SESSION['total']);
				header("Location:../shopCarCG.php");
				//echo "订单处理成功！订单号：".$orderid;
			}else{
				die("订单处理失败！");
			}
			break;
			
		case "edit": //修改订单状态
			break;
	}
	//is_resource() 检测变量是否为资源类型
	if(is_resource($link)) {	//判断是否为空资源，为空 即关闭数据库连接和释放资源
		mysqli_close($link);	
	}
	if(is_resource($result||$res)) {
		mysqli_free_result($result||$res);	
	}
	
