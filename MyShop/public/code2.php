<?php
    /*验证码*/
   
    //1.创建画布
    $hImg = imagecreatetruecolor(150,50);
    
    //2.绘画
    imagefill($hImg,0,0,getColor($hImg,true));
    $str = "345678abcdefghijkmnprstuvwxyABCDEFGHIJKLMNPQRSTUVWYX";
    $code = substr(str_shuffle($str),0,4);
    
    for($i=0;$i<4;$i++){
        imagettftext($hImg,18,rand(-30,30),$i*30+20,rand(20,50),getColor($hImg),'./arialbd.ttf',$code[$i]);
    }
	
    //3.输出
    header('Content-type:image/jpeg');
    imagejpeg($hImg);
    
    //4.释放资源
    imagedestroy($hImg);
    
    
    /**
    * 功能: 返回随机颜色
    * 参数: $hImg 画布资源
    *       可选项 给true 返回浅颜色
    *       否则, 返回深颜色
    */
    function getColor($hImg,$flag=false)
    {
        
        if($flag){ 
            //返回浅颜色
            return imagecolorallocate($hImg,rand(127,255),rand(127,255),rand(127,255));
        }else{
            //返回深颜色
            return imagecolorallocate($hImg,rand(0,127),rand(0,127),rand(0,127));
        }
    }