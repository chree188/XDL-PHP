<?php session_start();	?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>session实现购物车实例</title>
</head>
<body>
	<center>
		<?php include("menu.php");?>
		<h3>查看购物车</h3>
		<table width="600px" border="1px">
			<tr>
				<th>ID</th>
				<th>商品名</th>
				<th>价格</th>
				<th>数量</th>
				<th>小计</th>
				<th>操作</th>
			</tr>
			<?php	
//				查看购物车 $_SESSION['shoplist'] 购物车是一个多维array
				if(@$_SESSION['shoplist']){
					foreach($_SESSION['shoplist'] as $k=>$v){
					echo "<tr>";
						echo "<td>{$k}</td>";
						echo "<td>{$v['name']}</td>";
						echo "<td>{$v['price']}</td>";
						echo "<td>{$v['num']}</td>";
						echo "<td>".($v['price']*$v['num'])."</td>";
						echo "<td><a href='cartaction.php?a=del&id={$k}'>删除</a></td>";
					echo "</tr>";
					}
				}
			?>
		</table>
	</center>
	<hr align="center" width="80%">

	</center>
</body>
</html>