
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
			<div id='body'>
				<table border=1 width=900 height=150>
					<tr>
						<td>头像</td> <td><img width=196 height=136 src='./public/images/pic/sm_<?php echo $_SESSION['qtx'];?>'></img></td>
					</tr>
					<tr>
						<td>用户名:</td> <td><?php echo "{$m['uname']}";?></td>
					</tr>
					<tr>
						<td>性别:</td> <td><?php $sex = ['w'=>'女','m'=>'男','x'=>'妖']; echo "{$sex[$m['sex']]}";?></td>
					</tr>
					
					<tr>
						<td>地址:</td> <td><?php echo "{$m['addr']}";?></td>
					</tr>
				</table>
			
			</div>
		</div>
	</div>
<?php
	include ("./view/base/base.html");
?>
</body>
</html>