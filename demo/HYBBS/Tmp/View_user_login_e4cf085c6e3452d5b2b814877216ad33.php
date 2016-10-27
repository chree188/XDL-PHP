<?php !defined('HY_PATH') && exit('HY_PATH not defined.'); ?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>登录 <?php echo $conf['title2'];?></title>

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
			<h1>用户登录</h1>
			<div class="head"><img id="img" src="<?php echo WWW;?>View/hy_user/css/user.png" alt=""/></div>
			
			<form id="form">
				
				<label for="user" style="margin-top:0">账户</label>
				<input type="text" id="user" name="user" class="text" value=""/>
				<label for="pass" style="margin-top:0">密码</label>
				<input type="password" id="pass" name="pass" value=""/>
				
				<div class="submit">
					<input id="login" type="submit" value="登录" >
				</div>
				
				<p><a href="<?php echo WWW;?>user<?php echo EXP;?>add">注册账号 | </a> <a href="<?php echo WWW;?>user<?php echo EXP;?>repass">忘记密码?</a></p>
				
			</form>
		</div>

	</div>


<script>
$(function(){

	$("#user").blur(function(){
		$.get("<?php echo WWW;?>ajax<?php echo EXP;?>useravatar",{user:$(this).val()},function(e){
			$("#img").attr('src',"<?php echo WWW;?>"+e.b)
		},'json');
	});
    $('#form').submit(function() {return false;});
    $("#login").click(function(){
        var postdata = $('#form').serialize();
        
        $.post("<?php echo WWW;?>user<?php echo EXP;?>login", postdata,  function(e){
        	
            if(e.error){
                if(e.url !='' && e.url != 'NULL' && e.url != 'null')
                    window.location.href=e.url;
                else
                    window.location.href="<?php echo WWW;?>";
            }else{
            	swal(e.error ? "登录成功 - 正在为你跳转" : "登录失败", e.info, e.error ? "success" : "error");
            }
            
        },'json');
        
    })




});
</script>
</body>
</html>
