<?php
/*
==========================================
* BorenPHP 4.0 - 无GD库的验证码 v1.0
==========================================
+ 无GD库支持时可使用的验证码
==========================================
* Copyright (c) 2012 伯仁网络 All rights reserved.
* Author: YinHailin
* $Id: CodeNoGD.php 1 2013-11-09 01:44:41Z YangRenqiang $
==========================================
*/

/* 验证码配置 */
$imagePath = '../Common/Code/e/';// 图片文件路径 后面没有'/'
$imageExt ="bmp";// 图片文件扩展名
$imageList = array();
if ($handle = opendir($imagePath)) { 
	while (($file = readdir($handle)) !== false) { 
		$filename = explode(".",$file);
		$imageList[] = $filename[0];
		unset($filename);
	}
	closedir($handle);
	unset($imageList[0]);
	unset($imageList[1]);
}

$code = $imageList[array_rand($imageList)];
$imageFile = $imagePath.$code.'.'.$imageExt;
Session_start();
$_SESSION['CheckCode'] = $code;
echo $imageFile;
