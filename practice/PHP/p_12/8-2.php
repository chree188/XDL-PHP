<?php	
//	自定义删除目录的函数deldir()
	
	function deldir($path){
//		1.打开目录
		$dir=opendir($path);
//		2.遍历目录 删除
		while (false!==($f=readdir($dir))) {
			if($f=="."||$f==".."){
				continue;
			}
			$ff=rtrim($path,"/")."/".$f;
			
			if(is_file($ff)){
				@unlink($ff);
			}
			if(is_dir($ff)){
				deldir($ff);
			}
		}
//		3.关闭目录
		rmdir($path);
		closedir($dir);
	}
	
//	deldir("./other");
