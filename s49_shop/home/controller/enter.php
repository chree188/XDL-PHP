<?php
	
	
	function __construct(){
	
	
		include './model/index_model.php';
		
		$_GET['a']();

	}
	//显示首页
	function index()
	{
		
		$_GET['tblname']='shop_type';
		$_GET['pk']='tid';
		
		include './view/enter/enter.php';
	}

	//验证登录
	function dologin()
	{
		
		$_GET['tblname']='shop_users';
		$_GET['pk']='uid';
		
		
		$_POST['upwd'] = md5($_POST['upwd']);

        $condition = " where uname='{$_POST['uname']}' and upwd='{$_POST['upwd']}'";
       // echo '<pre>';
	   // print_r($_SESSION['code']);die;
        if(strtolower($_SESSION['yzm'])!=strtolower($_POST['yzm']))
        {
            echo "<script>alert('请输入正确的验证码');window.location.href='./index.php?c=enter&a=index';</script>";
			
        }
        
		
       
		// if($_POST['uname'] == $name && $_POST['pwd'] == $pwd){
			// $_SESSION['uname'] = $_POST['uname']; 
		// }
        if(select($condition)){
            $_SESSION['flag'] = true;
            $_SESSION['uname']=$_POST['uname'];
			echo '登录成功!3秒跳转登录界面...';
			 echo "<meta http-equiv=refresh content='2,./index.php?c=index&a=index' />";
            // echo "<meta http-equiv=refresh content='0,./index.php?c=index&a=index' />";
			
            return;
        }
        echo "<script>alert('密码错误');window.location.href='./index.php?c=enter&a=index';</script>";
    }