
	<?php
	include ("./view/sns/head.php");
	?>
		<div class='grzxy'>
			<div class='grzxy1'>
				<a href='#'><img src="./public/images/41.png"></a>&nbsp;
				<a href='#'><img src="./public/images/42.png"></a>&nbsp;
				<a href='#'><img src="./public/images/43.png"></a>&nbsp;
				<a href='#'><img src="./public/images/44.png"></a>&nbsp;
			</div>
			<div class='grzxy2'>
				<?php
					$sex = ['w'=>'女','m'=>'男','x'=>'妖'];
					echo "<form action='./index.php?c=sns&a=doedit&id={$m['uid']}' method='POST' enctype=multipart/form-data>";
						echo "<div>用户名 :<input class='b1' type='text' name='uname' value=''></div>";
						echo "<div>性 &nbsp;别:<input class='b1' type='text' name='sex' value=''></div>";
						echo "<div>地 &nbsp;址:<input class='b1' type='text' name='addr' value=''></div>";
						echo "<div>密 &nbsp;码:<input class='b1' type='password' name='upwd' value=''></div>";
						echo "<div>确认密码:<input class='b1' type='password' name='upwd1' value=''></div>";
						echo "<div><input id='b1' type='submit' value='修改信息'/></div>";
						
					echo "</form>";
				?>
			</div>
		</div>
	</div>
<?php
	include ("./view/base/base.html");
?>
</body>
</html>