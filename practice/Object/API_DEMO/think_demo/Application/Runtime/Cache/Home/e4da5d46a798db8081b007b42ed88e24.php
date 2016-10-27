<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="cn">
<head>
  <meta charset="UTF-8">
  <title>PHP发送邮件服务</title>
  <link rel="stylesheet" href="/practice/Object/API_DEMO/think_demo/Public/Dist/Css/bootstrap.min.css">
</head>
<body>


    <div class="container">
        <div class="page-header">
           <h1 class="">
              测试邮件发送
              <small>PHPMailer</small>
           </h1>
        </div>


        <div class="row">
          <div class="col-md-8">
            <form class="form form-horizontal" method="post" action="<?php echo U('index');?>">
          <div class="control-group">
            <div class="col-md-8 col-md-offset-4">
              <h3>服务器信息</h3>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label col-md-4">SMTP服务器地址:</label>
            <div class="controls col-md-6">
              <input type="text" name="host" placeholder="SMTP Server..." value="smtp.126.com" class="form-control">
            </div>
          </div>
          <div class="control-group">
            <label class="control-label col-md-4">服务器端口:</label>
            <div class="controls col-md-6">
              <input type="text" name="port" placeholder="SMTP Port..." value="25" class="form-control">
            </div>
          </div>
          <div class="control-group">
            <label class="control-label col-md-4">用户名:</label>
            <div class="controls  col-md-6">
              <input type="text" name="username" placeholder="Email Address" value="nian_he@126.com" class="form-control">
            </div>
          </div>
          <div class="control-group">
            <label class="control-label col-md-4">密码:</label>
            <div class="controls  col-md-6">
              <input type="password" name="password" placeholder="Password" class="form-control">
            </div>
          </div>
          <div class="control-group">
            <label class="control-label col-md-4">是否启用SSL:</label>
            <div class="checkbox col-md-6">
              <input type="radio" name="ssl" value="ssl" class=""> 是
              <input type="radio" name="ssl" value="" checked class=""> 否
            </div>
          </div>
          <!-- ########################################################################## -->
          <div class="control-group">
            <div class="col-md-8 col-md-offset-4">
              <h3>邮件信息</h3>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label col-md-4">主题:</label>
            <div class="controls col-md-6">
              <input type="text" name="subject" placeholder="Subject" class="form-control">
            </div>
          </div>
          <div class="control-group">
            <label class="control-label col-md-4">收件人:</label>
            <div class="controls col-md-6">
              <input type="text" name="sendTo" placeholder="MialTo" class="form-control">
            </div>
          </div>
          <div class="control-group">
            <label class="control-label col-md-4">邮件内容:</label>
            <div class="controls col-md-6">
                <textarea name="body" rows="5" placeholder="Please input contents..." class="form-control"></textarea>
            </div>
          </div>
          <div class="control-group">
            <div class="controls col-md-8 col-md-offset-4">
              <button type="submit" class="btn btn-default btn-lg">Send</button>
            </div>
          </div>
        </form>
          </div>
        </div>

    </div>



</body>
</html>