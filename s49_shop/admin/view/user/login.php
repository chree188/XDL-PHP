<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <link href="./public/css/admin_login.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div class="admin_login_wrap">
    <h1>后台管理</h1>
    <div class="adming_login_border">
        <div class="admin_input">
            <form action="./index.php?c=user&a=dologin" method="post">
                <ul class="admin_items">
                    <li>
                        <label for="user">用户名：</label>
                        <input type="text" name="uname" value="admin" id="user" size="40" class="admin_input_style" />
                    </li>
                    <li>
                        <label for="pwd"> 密 码 ：</label>
                        <input type="password" name="upwd" value="admin" id="pwd" size="40" class="admin_input_style" />
                    </li>
                    <li>
                        <label for="pwd">验证码：</label>
                        <input type="text" name="yzm" value="admin" id="pwd" size="40" class="admin_input_style" /><img src='./public/code.php'  title="点 我 刷 新 呦"  style="cursor:pointer" onclick="this.src=this.src+'?i='+Math.random()" />
                    </li>
                    <li>
                        <input type="submit" tabindex="3" value="提交" class="btn btn-primary" />
                    </li>
                </ul>
            </form>
        </div>
    </div>
</div>
</body>
</html>