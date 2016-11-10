<?php	
//	自定义删除根目录下空目录的函数deldir()
	function deldir($path){
//		1.打开目录
		$dir=opendir($path);
//		2.遍历目录 删除
		while (false!==($f=readdir($dir))) {
			if($f=="."||$f==".."){	//跳过.和..
				continue;
			}
			$ff=rtrim($path,"/")."/".$f;	//路径拼接
			if(is_dir($ff)){	//判断是否为目录
				if(filesize($ff)==0){
					rmdir($ff);
				}
			}			
		}
//		3.关闭目录
		closedir($dir);
	}
	
	deldir("./other");
