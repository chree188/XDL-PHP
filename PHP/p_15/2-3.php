<?php	
	echo "<pr>";
	require("uploadfile.php");
	foreach($_FILES as $upfile){
		$path="./uploads";
		$typelist=array("image/jpg","image/png","image/git","image/jpeg");
		$pic=uploadfile($path, $upfile,$typelist);
		if(!$pic['error']){
			echo $pic['info']."<br>";
		}else{
			echo "文件上传成功,新的文件名为:".$pic['info']."<br>";
		}
	}
