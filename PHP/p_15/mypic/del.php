<?php

	//1 删除信息 
	$pic = rtrim(file_get_contents("picinfo.db"),"##");
	$list = explode("##",$pic);
	// echo "<pre>";
	// print_r($list);
	// exit;
	unset($list[$_GET['id']]);

	if($list){
		file_put_contents("picinfo.db",implode("##",$list)."##");
	}else{
		file_put_contents("picinfo.db","");//$list为空的时候 清空picinfo.db
	}

	


	//2 删除文件

	@unlink("./uploads/".$_GET['picname']);
	@unlink("./uploads/s_".$_GET['picname']);
	@unlink("./uploads/m_".$_GET['picname']);

	//3 跳转到show页面
	header("Location:show.php");