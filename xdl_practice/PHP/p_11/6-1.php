<?php
    /*图片水印*/
   
    //1.创建画布
    $hImg = imagecreatefromjpeg('./images/3.jpg'); //大美女
    $water = imagecreatefrompng('./images/1.png'); //水印图片
    
    $srcW = imagesX($water); //水印图片的宽
    $srcH = imagesY($water); //水印图片的宽
    
    //2.绘画
    // imagettftext($hImg,30,0,30,330,getColor($hImg),'./msyhbd.ttf','我想要她');
    
    /*
       目标资源,原资源,目标x,目标y,要复制的x点,要复制的y点,到目标后的宽,到目标后的高,要复制的宽,要复制的高
       dst,src,dstX,dstY,srcX,srcY,dstW,dstH,srcW,srcH
    */
    imagecopyresampled($hImg,$water,0,0,0,0,$srcW,$srcH,$srcW,$srcH);
    
    
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