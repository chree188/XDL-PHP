<?php	

	require("uploadfile.php");
	
	$path="./uploads/";
	@$upfile=$_FILES['pic'];
	$typelist=array("image/jpg","image/png","image/gif","image/jpeg");
	
	$pic=uploadfile($path, $upfile,$typelist);
	
	if(!$pic['error']){
		echo $pic['info'];
	}else{
		echo"文件上传成功，新的文件名为：".$pic['info'];
	}
