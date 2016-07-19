<?php
//个人中心管理者(控制器)
header('Content-type:text/html;charset=utf-8');
function __construct()
{
	//工具
	require "./model/sns_model.php";
   //干事
   $_GET['a']();   
}
function index()
{
	//拿数据
  $orders = getorders();
 //显示数据
 if(empty($_SESSION['uname'])){
   echo "<script>alert('您还未登录，请您先登录！');window.location.href='./index.php?c=enter&a=index'</script>";}
   else 
    require "./view/sns/sns.php";
}
 // function cut()
 //    {
 //        // echo '<pre>';
 //        // print_r($_SESSION[]);
 //       $_SESSION['ooid'] = getorders();
	//    $_GET['tblname'] = 'shop_orders';
	//    $_GET['pk'] = 'oid';
	//    $_GET['id'] = $_GET['oid'];
	//    if(@$_GET['status']){
	//    delete($_GET['oid']);  
	//     echo "<meta http-equiv=refresh content='0,./index.php?c=sns&a=index' >";
	// 	}
	// 	else 
	// 	echo "<script>alert('您的订单已发货，无法取消订单');window.location.href='./index.php?c=sns&a=index'</script>";
		
	// 	}
        // unset($_SESSION['ooid'][$_GET['oid']]);
       
    
 function index1()
{

	$_GET['tblname']='shop_users';
	$_GET['pk']='uid';
	// echo "<pre>";
	// print_r($_SESSION['uname']);die;
	$condition=" where uname='{$_SESSION['uname']}'";
	
	$user=select($condition);
	$m=$user[0];
	// echo "<pre>";
	// print_r($user);die;
    require "./view/sns/sns1.php";
}

function index2()
	{
		$_GET['tblname']='shop_users';
		$_GET['pk']='uid';
	$condition=" where uname='{$_SESSION['uname']}'";
	
	$user=select($condition);
	$m=$user[0];
		include './view/sns/sns2.php';
	
	}

	function doedit()
	{
		$_GET['tblname']='shop_users';
		$_GET['pk']='uid';
		// $user=$_SESSION['userinfo'];
		if($_POST['sex']=='男'){
			$_POST['sex']='m';
		}else{
			$_POST['sex']='w';
		}
		// echo "<pre>";
		// print_r($_POST);
		// print_r($_GET['id']);
		// die;
		
		if($_POST['upwd']!=$_POST['upwd1']){
			echo '两次密码不一致...';
			echo "<meta http-equiv=refresh content='2,./index.php?c=house&a=edit' >";
			return;
		}
		$_POST['upwd']=md5($_POST['upwd']);
		unset($_POST['upwd1']);
		update();
		
		echo '恭喜您!修改成功,重新登录方可显示新资料~~~3秒后跳转...';
		echo "<meta http-equiv=refresh content='3,./index.php?c=index&a=index' >";
		
	}
	
	function order()
	{
		
		$_GET['tblname']='shop_orders';
		$_GET['pk']='oid';
		$order=select();
		// echo '<pre>';
		// print_r($order);die;
		include './view/house/myorder.php';
		
	}
	
	 function status()
		{   
			$_GET['tblname']='shop_orders';
			$_GET['pk']='oid';
			$_POST['status']=$_GET['sta'];
			update();
			echo "<meta http-equiv=refresh content='0,./index.php?c=house&a=order' />";
			 
			
		}


	function tx()
	{
		require "./view/sns/xg.php";
	}
	function dotx()
	{
		// var_dump($_FILES);

		if($_FILES['gpic']['error']=='0'){
             require "../admin/public/fileUpload.php"; //文件上传函数
             require "../admin/public/picZoom.php";   //文件缩放函数
        
            $path = './public/images/pic/';  //上传图片保存的路径
            
       
            $res = fileUpload($path,$_FILES['gpic']); //处理上传的图片
            if($res['flag']){
                $_POST['gpic'] = $res['picname'];
            }

       }
       $_SESSION['qtx'] =  $_POST['gpic'];
       echo "修改成功,3秒后跳转";
       echo "<meta http-equiv=refresh content='2,./index.php?c=sns&a=index1' />";
	}

	
	
	
	