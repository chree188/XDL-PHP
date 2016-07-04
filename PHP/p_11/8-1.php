<?php
    /*图片缩放*/
   
    //1.创建画布
    $hImg = imagecreatefromjpeg('./images/3.jpg'); //大美女
    $foot = imagecreatetruecolor(170,151); //创建空白画布
    
    $girlW = imagesX($hImg); //大美女的宽
    $girlH = imagesY($hImg); //大美女的高
    
    //2.绘画
   
    /*
        大美女的 249,799  170  151
       目标资源,原资源,目标x,目标y,要复制的x点,要复制的y点,到目标后的宽,到目标后的高,要复制的宽,要复制的高
       dst,src,dstX,dstY,srcX,srcY,dstW,dstH,srcW,srcH
    */
    imagecopyresampled($foot,$hImg,0,0,0,0,170,151,$girlW,$girlH);
    
    
    //3.输出
    header('Content-type:image/jpeg');
    imagejpeg($foot);
    
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