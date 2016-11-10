<?php
	header('Content-type:text/html;charset=utf8');
    error_reporting(0);
	//处理请求

	//包含配置文件
	include 'config.php';
	//MySQL操作类
	include 'include/Mysql.class.php';
	//邮件发送
	include 'include/Mail.class.php';
	//手机短信发送
	include 'include/SMS.class.php';

	//当前动作
	$action=$_GET['a'];

	switch ($action) {
		case 'add':
			add();
			break;
		case 'login':
			login();
			break;
		case 'active':
			active();
			break;
		case 'findpwd':
			findpwd();
			break;
	}

	//添加会员
	function add(){

		//有效性验证
		//... 会员名长度，密码强度...

		//激活验证信息
		$validate=uniqid();				//取得不重复的字符串

		$data=array(
			$_POST['user'],			 	// 用户名
			md5($_POST['password']),	// 密码
			$_POST['email'],			// 邮箱
			$_POST['phone'],			// 手机
			$_POST['question'],			// 问题
			md5($_POST['answer']),		// 答案
			$validate					//激活验证信息
		);

		$sql="insert into lamp_member
		(name,password,email,phone,question,answer,validate)
		values (?,?,?,?,?,?,?)";

		//将用户输入的信息，保存到会员表
		$id=Mysql::insert($sql,$data);

		if($id<1){
			die('内部错误，注册失败');
		}

		//echo '注册成功';
		//发送邮件
	$url="http://localhost/API_Extend/Extends/PHPMailer/memberModule/action.php?a=active&key={$validate}&uid={$id}";
		$msg="请点击下面的网址激活<br>\r\n<a href='{$url}'>{$url}</a>";
		$result=Mail::send($_POST['email'],'用户激活邮件',$msg,'在线课测试');

		if($result){
			echo "你好:{$_POST['user']}<br>注册成功，请查收邮件，并激活你的帐户";
		}else{
			echo "你好:{$_POST['user']}<br>注册成功，激活邮件发送失败";
		}


	}


	//会员登录
	function login(){
		$sql="select * from lamp_member where name=?";
		$user=Mysql::find($sql,$_POST['user']);
		if(!$user){
			die('没有此用户');
		}

		//密码验证
		if($user['password']!=md5($_POST['password'])){
			die('密码错误');
		}

		//验证用户是否已激活
		if($user['active']!=1){
			die('用户未激活');
		}

		//成功登录
		session_start();
		$_SESSION['USER']=$user;
		header('Location: index.php');

	}


	//激活用户
	function active(){
		$id=intval($_GET['uid']);

		//查询该用户的激活信息
		$sql="select * from lamp_member where id={$id}";
		$user=Mysql::find($sql);
		if(!$user){
			die('激活链接无效');
		}

		//判断用户是否已激活
		if($user['active']!=0){
			die('此用户不需要激活');
		}

		//通过验证
		if($user['validate']==$_GET['key']){
			//将数据库中状态修改为激活
			$sql="update lamp_member set active=1 where id={$id}";
            //echo $sql;
			$row_count=Mysql::execute($sql);
			if($row_count==1){
				die('激活成功');
			}else{
				die('内部错误，激活失败');
			}
		}


	}

	//找回密码
	function findpwd(){
		//从数据库中，查出该用户的信息
		//验证是否回答正确
		$sql="select * from lamp_member where name=?";
		$user=Mysql::find($sql,$_POST['user']);

		if(!$user){
			die('没有相到此用户');
		}

		if($user['answer']==md5($_POST['answer'])){

			$newpwd=rand(10000000,99999999);


			//用户回答正确
			//发邮件或发短信
			switch ($_POST['type']) {
				case 'email':

					$msg="请好，新密码是{$newpwd}";
					$result=Mail::send($user['email'],'密码找回',$msg,'在线课测试');
					if($result){
						$msg='你好，密码已发送到您邮箱';
					}else{
						$msg='你好，邮件发送失败，您可以选择手机短信重置密码';

					}
					break;
				case 'sms':
					$sms=new SMS(SMS_ID,SMS_KEY);
					$str='你好，新密码是'.$newpwd;
					$result=$sms->send('18219241239',$str);
					if($result){
						$msg= '你好，密码已发送到您手机上';
					}else{
						$msg= '你好，短信发送失败。'.$sms->getError();
					}
					break;
			}

			//邮件或短信发送成功，更新数据库
			if($result){
				$sql="update lamp_member set password=md5('{$newpwd}')
				where id={$user['id']}";
				if(Mysql::execute($sql)){
					echo $msg;
				}

			}else{
				echo $msg;
			}



		}



	}
