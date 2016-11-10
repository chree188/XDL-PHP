<?php	
//	5.目录文件大小求和函数
	
//	求和函数
	$sum=0;
	for ($i=0; $i < 10; $i++) { 
		$sum+=$i;	//数字$i的大小累加求和
	}
	
	echo $sum;
	echo "<hr>";
	
//	目录大小的求和的功能
	$path="./mydir";
	
//	1.打开目录
	$dir=opendir($path);
//	2.遍历目录
	$sum=0;
	
	while (false!==($f=readdir($dir))) {
		if($f=="."||$f==".."){
			continue;
		}
		$ff=rtrim($path,"/")."/".$f;
		$sum+=filesize($ff);	//文件大小
	}
	
	echo $sum;
//	3.关闭目录
	closedir($dir);
	echo "<hr>";
	
	/*
	 * dirsize() 自定义文件大小求和函数
	 * @param string #path 文件目录路径
	 * @return int $sum 文件求和大小
	 * */
	 
	 	function dirsize($path){
//	 		1.打开目录
			$dir=opendir($path);
//			2.遍历目录
			$sum=0;
			while (false!==($f=readdir($dir))) {
				if($f=="."||$f==".."){
					continue;
				}
				$ff=rtrim($path,"/")."/".$f;
				
				if(is_file($ff)){	//判断$ff是否是文件
					$sum+=filesize($ff);	//文件大小
				}
				
				if(is_dir($ff)){	//判断$ff是否是目录
					$sum+=dirsize($ff);	//如果是目录 使用自定义求和函数
				}
			}
			return $sum;
//			3.关闭目录
			closedir($dir);
	 	}
		
		echo dirsize("./mydir");
		echo "<hr>";
		echo dirsize("./other");
