<?php
    /*验证码*/
   
    //1.创建画布
    $hImg = imagecreatetruecolor(400,400);
    
    //2.绘画
    imagefill($hImg,0,0,getColor($hImg,true));
    // bool imagearc ( resource $image , int $cx , int $cy , int $w , int $h , int $s , int $e , int $color )
    // imagearc($hImg,200,200,250,250,0,360,getColor($hImg));
    $pt = [10,10,200,200,100,300];
    imagefilledpolygon($hImg,$pt,3,getColor($hImg));
   
   
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