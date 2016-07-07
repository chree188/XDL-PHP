<?php
	require("uploadfile.php");
	
	foreach($_FILES['pic']['name'] as $k=>$v){
		$arr[$k]['name'] = $v;
		$arr[$k]['type'] = $_FILES['pic']['type'][$k];
		$arr[$k]['tmp_name'] = $_FILES['pic']['tmp_name'][$k];
		$arr[$k]['error'] = $_FILES['pic']['error'][$k];
		$arr[$k]['size'] = $_FILES['pic']['size'][$k];
	}

	foreach($arr as $upfile){
		$path = "./uploads";
		$typelist = array("image/jpg","image/png","image/gif","image/jpeg");
		$pic = uploadfile($path,$upfile,$typelist);

		if(!$pic['error']){
			echo $pic['info']."<br>";
		}else{
			echo "文件上传成功,新的文件名为: ".$pic['info']."<br>";
		}
	}