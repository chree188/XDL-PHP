<?php	
//	自定义删除目录的函数dedir
	
	function deldir($path){
//		1.打开目录
		$dir=opendir($path);
//		2.遍历目录 删除
		while (false!==($f=readdir($dir))) {
			if($f=="."||$f==".."){	//跳过.和..
				continue;
			}
			$ff=rtrim($path,"/")."/".$f;	//路径拼接
			//执行删除
			
			if(is_file($ff)){	//判断是否为文件
				@unlink($ff);	//删除文件
			}
			if(is_dir($ff)){	//判断
				deldir($ff);
			}			
		}
//		3.关闭目录
		rmdir($path);
		closedir($dir);
	}
	
	deldir("./mydir");
