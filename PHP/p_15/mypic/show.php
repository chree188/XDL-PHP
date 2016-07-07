<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>在线相册</title>
</head>
<body>
	<?php
		//载入导航页面
		include("menu.php");
	?>
	<table width="600px" border="1px">
		<tr>
			<th>名称</th>
			<th>图片</th>
			<th>描述</th>
			<th>发布时间</th>
			<th>大小</th>
			<th>操作</th>
		</tr>
		<?php
				//1 读取数据库里面的文件 
				$picinfo = file_get_contents("picinfo.db");
				//清除右边的##
				$picinfo = rtrim($picinfo,"##");
				//2 string变成 array
				$list = explode("##",$picinfo);//拆一条一条的记录 
				echo "<pre>";
				// var_dump($picinfo);
				
				if($picinfo){
					//3 array变成string
					foreach($list as $k=>$v){
						// $v还是一个string,要变成数组
						$info = explode("**",$v) ;//拆每天记录中的 一条条的信息 
						echo "<pre>";
						print_r($info);//查看单条记录 里面的所有信息
						echo "<tr>";
						echo "<td><a href='./uploads/m_{$info[6]}'>{$info[0]}</a></td>";
						echo "<td><img src='./uploads/s_{$info[6]}'></td>";
						echo "<td>{$info[1]}</td>";
						echo "<td>{$info[2]}</td>";
						echo "<td>{$info[4]}</td>";
						echo "<td>
								<a href='del.php?id={$k}&picname={$info[6]}'>删除</a> 
								<a href='down.php?oldname={$info[3]}&newname={$info[6]}&type={$info[5]}&size={$info[4]}'>下载</a>

								</td>";
						echo "</tr>";
				}

				}

		?>

	</table>
	
</body>
</html>