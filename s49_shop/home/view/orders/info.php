<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="./public/css/info.css">  
</head>
<body>
	<?php
	include ("./view/head/head.php");
	echo "<br/><br/>";
	?>
	<div class='ddt'>
		<div class='ddt1'><img src="./public/images/6.jpg"></div>
		<div class='ddt2'><img src="./public/images/45.png"></div>
	</div>
	<div class='ddt3'>填写并核对订单信息</div><br/>
	<!--   分割     -->
	<div class='ddzt'>
		<div class='ddzt3'>
			<h3 class='ddzt1'>收货人信息</h3>
			<div class='ddzt2'><a href="">新增收货地址</a></div>
		</div>

		<div class='ddzt7'><img src="./public/images/z.png"></div><br/>
		<!--   分割     -->
		<div class='fgh'>
			<form action="./index.php?c=orders&a=commit" method='POST'>
				收货人: <br/><input required type="text" name="rec" id=""><br/><br/>
				地址: <br/><input required type="text" name="addr" id=""><br/><br/>
				电话:<br/> <input required type="text" name="tel" id=""><br/><br/>
				用户留言:<br/><br/><textarea name="umsg" id="" cols="30" rows="3"></textarea><br/><br/>
				<input type="submit"  value='提交' style="width:100px; height:20px;">
			</form>
		</div><br/>
	</div><br/>
	<?php
	include ("./view/base/base.html");
	?>
</body>
</html>