<?php 
//订单信息处理Action
header("Content-Type:text/html;charset=utf-8");
	session_start(); //启用会话session
	//1.导入配置文件
	require("../../public/sql/dbconfig.php");
	//2.连接数据库
	$link = @mysql_connect(HOST,USER,PASS)or die('数据库连接失败！');
	//3.选择数据库，设置编码
	mysql_select_db(DBNAME,$link);
	mysql_set_charset("utf8");
	

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
			$sql = "insert into orders values(null,'{$uid}','{$linkman}','{$address}','{$code}','{$phone}','{$addtime}','{$total}',0)";
			//echo $sql;
			mysql_query($sql,$link);
			//获取订单添加成功的自增id（订单号）
			$orderid = mysql_insert_id();
			if($orderid>0){
				//添加订单详情
				foreach($_SESSION['shoplist'] as $shop){
					//拼装订单详情语句
					$sql = "insert into detail values(null,{$orderid},{$shop['id']},'{$shop['goods']}','{$shop['price']}','{$shop['m']}')";
					//执行添加
					mysql_query($sql,$link);
				}
				//销毁session
				unset($_SESSION['shoplist']);
				unset($_SESSION['total']);
				echo "订单处理成功！订单号：".$orderid;
			}else{
				die("订单处理失败！");
			}
			break;
			
		case "edit": //修改订单状态
			break;
			
	}
	
	mysql_close($link);