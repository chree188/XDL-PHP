<?php !defined('HY_PATH') && exit('HY_PATH not defined.'); ?>
<!DOCTYPE html>
<html lang="zh-CN">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    
	<title><?php echo $title;?><?php echo $conf['title2'];?></title>
    
    <link href="<?php echo WWW;?>public/css/alert.css" rel="stylesheet">
    <script src="<?php echo WWW;?>public/js/sweet-alert.min.js"></script>
    <style>
    *{
        margin:0;
        padding:0;
    }
    .bj{
    	
            position: fixed;
        top: 0;
        left: 0;
        height: 100%;
        width: 100%;
        z-index: -10;
background: #e5efff;


    }
    *, :after, :before {
    box-sizing: border-box;
}
    </style>
	</head>
  <body>
      <div class="bj"></div>

    

    </div>

<script>
window.onload = function(){
    swal({
        title: "<?php echo $msg;?>",
        type: "<?php echo ($bool) ? "success" : "error" ?>",
        showCancelButton: true,
         confirmButtonColor: "#DD6B55",
         confirmButtonText: "返回上一页",
         cancelButtonText:"返回首页",

     }, function(e){
         if(e){
             history.go(-1);
         }else{
             window.location.href="<?php echo WWW;?>";
         }
     });

}
</script>

  </body>
</html>
