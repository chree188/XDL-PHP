<?php	
//	3.目录里面的文件 放到表格中
	echo "<table width=600px border=1px>";
		echo "<tr>
			<th>文件名</th>	
			<th>文件大小</th>	
			<th>文件类型</th>	
			<th>创建时间</th>	
			<th>修改时间</th>	
			<th>访问时间</th>	
		</tr>";
//	1.打开目录
	$path="./mydir/";
	
	$dir=opendir($path);
	
//	2.遍历目录
	while (FALSE !==($f=readdir($dir))) {
//		屏蔽点和点点
		if($f=="."||$f==".."){
			continue;
		}
	
//	拼接完整的想对路径
	$ff=rtrim($path."/")."/".$f;
//	echo $ff;
	echo "<tr>";
		echo "<td>{$f}</td>";//输出文件名到表格
		echo "<td>".filesize($ff)."</td>";//文件大小
		echo "<td>".filetype($ff)."</td>";//文件类型
		echo "<td>".date("H:i:s",filectime($ff))."</td>";//文件创建时间 c create 
		echo "<td>".date("H:i:s",filemtime($ff))."</td>";//文件类型 m modify修改
		echo "<td>".date("H:i:s",fileatime($ff))."</td>";//文件类型 a active 
		echo "</tr>";
	}
	
	//3 关闭目录 释放资源
	closedir($dir);
	
	echo "</table>";
