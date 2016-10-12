<?php

	//清除cookie里面的信息
	setCookie("users","",time()-1,"/");

	//调整到登录页面
	header("Location:index.php");