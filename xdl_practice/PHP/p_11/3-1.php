<?php
//1.创建画布,准备颜色
$hImg = imagecreatetruecolor(400, 400);
$color = imagecolorallocate($hImg, 255, 0, 0);
$bg = imagecolorallocate($hImg, 245, 245, 245);

//2.绘画
imagefill($hImg, 0, 0, $bg);
// imagechar($hImg,5,200,200,'AB',$color);
// imagecharup($hImg,5,200,200,'A',$color);
// imagestring($hImg,5,200,200,'I love you',$color);
// imagestringup($hImg,5,200,200,'i love you',$color);

/*
 1.画布资源
 2.字体大小
 3.角度
 4. x 坐标
 5. y 坐标
 6. 颜色
 7. 字体文件的位置
 8. 内容
 */
imagettftext($hImg, 30, 45, 200, 200, $color, './msyhbd.ttf', '我会回来的');

//3.输出
header('Content-type:image/jpeg');
imagejpeg($hImg);

//4.释放资源
imagedestroy($hImg);
