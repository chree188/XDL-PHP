<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>session实现购物车实例</title>
</head>
<body>
	<center>
		<?php include("menu.php");?>
		<form action="shopaction.php?a=add" method="post">
			<table width="600px" border="1px">
				<tr>
					<th>序号</th>
					<th>ID</th>
					<th>图片</th>
					<th>商品名称</th>
					<th>单价</th>
					<th>库存量</th>
					<th>操作</th>
				</tr>
				<?php	
					include'dbconfig.php';
					$link = @mysqli_connect(HOST,USER,PASS) or die("数据库连接失败");
					mysqli_set_charset($link,"utf8");
					mysqli_select_db($link,DBNAME);
					$sql = "select * from goods order by concat(id)";
					$result = mysqli_query($link,$sql);
					$i = 0;
			while($row = mysqli_fetch_assoc($result)){
				$i++;
$str = <<<swUse
				<tr onMouseOut="this.style.backgroundColor='#ffffff'" 
				onMouseOver="this.style.backgroundColor='#edf5ff'">
		<td align="center" valign="middle" class="borderright borderbottom num">{$i}</td>
        <td align="center" valign="middle" class="borderright borderbottom">{$row['id']}</td>
        <td align="center" valign="middle" class="borderright borderbottom"><img src='./uploads/s_{$row['picname']}'></td>
        <td align="center" valign="middle" class="borderright borderbottom"><a href='./uploads/m_{$row['picname']}'>{$row['goods']}</a></td>
        <td align="center" valign="middle" class="borderright borderbottom">{$row['price']}</td>
        <td align="center" valign="middle" class="borderright borderbottom">{$row['store']}</td>
        <td align="center" valign="middle" class="borderbottom">
        <a href="shopaction.php?a=add&id={$row['id']}" target="mainFrame" onFocus="this.blur()" class="add">加入购物车</a>
        </td>
      </tr>
swUse;
	echo $str;
			}
			//6 关闭数据库 释放结果集 
			mysqli_close($link);
			mysqli_free_result($result);
		?>
			</table>
		</form>
	</center>
	<hr align="center" width="80%">

	</center>
</body>
</html>