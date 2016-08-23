<?php !defined('HY_PATH') && exit('HY_PATH not defined.'); ?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>注册 <?php echo $conf['title2'];?></title>

<link href="<?php echo WWW;?>View/hy_user/css/login.css" rel="stylesheet">
<link href="<?php echo WWW;?>public/css/alert.css" rel="stylesheet">
<!--[if (gte IE 9)|!(IE)]><!-->
<script src="<?php echo WWW;?>public/js/jquery.min.js"></script>
<!--<![endif]-->
<!--[if lte IE 8 ]>
<script src="<?php echo WWW;?>public/js/jquery1.11.3.min.js"></script>
<![endif]-->
<script src="<?php echo WWW;?>public/js/sweet-alert.min.js"></script>

</head>
<body>
	<div class="main">
		<div class="login-form">
			<h1 style="padding-top:30px">用户注册</h1>

			<form id="form">
				
				<label for="user" style="margin-top:0">账户</label>
				<input type="text" name="user" class="text" value=""/>
				<label for="user" style="margin-top:0">邮箱</label>
				<input type="text" name="email" class="text" value=""/>
				<label for="user" style="margin-top:0">密码</label>
				<input type="password" name="pass1" value=""/>
				<label for="user" style="margin-top:0">确定密码</label>
				<input type="password" name="pass2" value="" />
				
				<div class="submit">
					<input id="login" type="submit" value="注 册" >
				</div>
				

				<p><a href="<?php echo WWW;?>user<?php echo EXP;?>login">已有账号登录</a></p>
			</form>
		</div>

	</div>

<script>
$(function(){
    $('#form').submit(function() {return false;});
    $("#login").click(function(){
        var postdata = $('#form').serialize();
        
        $.post("<?php echo WWW;?>user<?php echo EXP;?>add", postdata,  function(e){
        	
            if(e.error){
                if(e.url !='' && e.url != 'NULL' && e.url != 'null')
                    window.location.href=e.url;
                else
                    window.location.href="<?php echo WWW;?>";
            }else{
            	swal(e.error ? "注册成功 - 正在为你登录" : "注册失败", e.info, e.error ? "success" : "error");
            }
            
        },'json');
        

    })

});
</script>
</body>
</html>
