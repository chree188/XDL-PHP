<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<style>
		*{ margin:0; padding:0;}
		body{margin:0 auto;}
		ul,li{list-style:none;}
		a{text-decoration:none;}
		#you{float:right;margin-right:100px;}
		#denglu{float:left;margin-left:100px;}
		#zuobian{background-color:#E5E5E5;height:30px;font-size:12px;}
		#zuobian ul li{float:left;line-height:30px;margin:0 5px;}
		#zuobian ul li a{color:#757776;}
		#zuobian ul li #zuobian1{color:red;}
		#zuobian #you li{width:57px;float:left;line-height:30px;margin:0 3px;}
	</style>
</head>
<body>
		<div id='zuobian'>
			<ul id='denglu'>
				<li><a>你好，欢迎来到本网站！</a></li>
				<li>
					<?php
			          if(empty($_SESSION['uname'])){
			            echo "<a href='index.php?c=enter&a=index'>[登录]</a>";
			          }else{
			            echo "欢迎 {$_SESSION['uname']} <a href='./index.php?c=index&a=logout'>退出</a>";
			          } 
			        ?>   
				</li>
				<li><a href='index.php?c=login&a=index'>[注册]</a></li>
			</ul>
			<ul id='you'>
				<li><a href='./index.php?c=index&a=index'>首页</a></li>
				<li><a href='./index.php?c=404&a=index'>促销</a></li>
				<li><a href='./index.php?c=404&a=index'>留言板</a></li>
				<li><a href='./index.php?c=cart&a=index'>购物车</a></li>
				<li><a href='./index.php?c=sns&a=index'>个人中心</a></li>
			</ul>
	</div>
</body>
</html>