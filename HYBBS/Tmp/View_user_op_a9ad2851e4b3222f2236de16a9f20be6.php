<?php !defined('HY_PATH') && exit('HY_PATH not defined.'); ?>
<!DOCTYPE html>
<html lang="zh-CN">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
	<title><?php echo $title;?><?php echo $conf['title2'];?></title>
	<link href="<?php echo WWW;?>View/hy_user/css/um.css" rel="stylesheet">
  <link href="<?php echo WWW;?>public/css/font-awesome.min.css" type="text/css" rel="stylesheet" />
  <!--[if (gte IE 9)|!(IE)]><!-->
  <script src="<?php echo WWW;?>public/js/jquery.min.js"></script>
  <!--<![endif]-->
  <!--[if lte IE 8 ]>
  <script src="<?php echo WWW;?>public/js/jquery1.11.3.min.js"></script>
  <![endif]-->
  

    
    <script>
    var www = "<?php echo WWW;?>";
    
    var exp = "<?php echo EXP;?>";

    </script>
	</head>
  <body>
      <div class="bj"></div>
      <div id="main-wrap" class="content page dashboard space centralnav">
      	<div id="author-page" class="primary bd clx" role="main">
      		<div class="aside">
    <div class="user-avatar">
        <a href="#">
            <img src="<?php echo WWW;?><?php echo $data['avatar']['a'];?>" class="avatar avatar-200" height="200" width="200"></a>
        <h2><?php echo $data['user'];?></h2>
        <div id="num-info">
            
            <div>
                <span class="num"><?php echo $data['follow'];?></span><span class="text">关注</span>
            </div>
            <div>
                <span class="num"><?php echo $data['fans'];?></span><span class="text">粉丝</span>
            </div>
            <div>
                <span class="num"><?php echo $data['threads'];?></span><span class="text">文章</span>
            </div>
            
        </div>
        <div class="clear">
        </div>
    </div>
    <div class="menus">
        <ul>

            
            <li class="tab-index <?php echo $menu_action['index'];?>">

            <a href="<?php echo WWW.URL('my',$data['user'],''); ?>"><i class="fa fa-tachometer"></i>首页中心</a>
            </li>
            <li class="tab-post <?php echo $menu_action['thread'];?>">
            <a href="<?php echo WWW.URL('my',$data['user'],EXP.'thread'); ?>"><i class="fa fa-cube"></i>我的文章</a>
            </li>
            <li class="tab-comment <?php echo $menu_action['post'];?>">
            <a href="<?php echo WWW.URL('my',$data['user'],EXP.'post'); ?>"><i class="fa fa-comments"></i>帖子评论</a>
            </li>
            <?php if (IS_LOGIN): ?>
            <?php if ($data['id'] == $user['id']): ?>
       
            <li class="tab-profile <?php echo $menu_action['op'];?>">
            <a href="<?php echo WWW.URL('my',$data['user'],EXP.'op'); ?>"><i class="fa fa-cog"></i>编辑资料</a>
            </li>
            <li class="tab-message <?php echo $menu_action['file'];?>">
            <a href="<?php echo WWW.URL('my',$data['user'],EXP.'file'); ?>"><i class="fa fa-file"></i>我的文件</a>
            </li>
            <?php endif ?>
            <?php endif ?>
            
        </ul>
    </div>
    <a href="<?php echo WWW;?>" style="
     bottom: 0;
    position: absolute;
    font-size: 16px;
    padding: 10px;
    left: 0;
"><i class="fa fa-sign-out"></i>返回网站首页</a>
</div>


      		<div class="area">
      			<div class="page-wrapper">
      				<div class="dashboard-main">

<div class="dashboard-header">
<p class="sub-title">个人资料</p>
<p class="tip">Hi，<a title="我的主页" href="<?php echo WWW.URL('my',$data['user'],''); ?>"><?php echo $data['user'];?></a>，请如实填写以下内容，让大家更好的交流互动。</p>
<!-- Page global message -->
</div>

<div class="dashboard-wrapper select-profile">
	<div id="profile">
		<ul class="user-msg">
			<li class="tip"><?php echo $data['user'];?> 来 HYBBS 已经<?php echo diffBetweenTwoDays($data['atime'],NOW_TIME); ?>天了</li>
		</ul>
		
		<table id="author-profile">
		<tbody>

		<tr>
			<td class="title">
				用户名:
			</td>
			<td>
				<?php echo $data['user'];?>
			</td>
		</tr>

		<tr>
			<td class="title">
				个人说明:
			</td>
    		<td>
    		</td>
		</tr>
		</tbody>
		</table>
		<form class="form-horizontal" action="<?php echo WWW.URL('user','edit',''); ?>" method="post" enctype="multipart/form-data">
            <div class="page-header">
				<h3 id="info">修改资料 <small></small></h3>
			</div>
           
			<div class="form-group">
				<label for="display_name" class="col-sm-3 control-label">个性签名</label>
				<div class="col-sm-9">
					<input class="" type="text" name="ps" value="<?php echo $data['ps'];?>"/>
					<span>最大支持40个字符</span>
				</div>
			</div>
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-9">
                    <button type="submit" class="btn btn-success">保存资料</button>
                </div>
            </div>

        </form>

		
        <form class="form-horizontal" action="<?php echo WWW.URL('user','ava',''); ?>" method="post" enctype="multipart/form-data">
            <div class="page-header">
				<h3 id="info">修改头像 <small></small></h3>
			</div>
            <div class="form-group">
				<label class="col-sm-3 control-label">头像</label>
				<div class="col-sm-9">
					<div class="radio">
						<img style="display:block" src="<?php echo WWW;?><?php echo $data['avatar']['a'];?>" class="avatar avatar-80" height="80" width="80"><label>


					</div>

				</div>
			</div>
			<div class="form-group">
				<label for="display_name" class="col-sm-3 control-label">选择头像文件</label>
				<div class="col-sm-9">

					<input class="" type="file" name="photo" />


				</div>
			</div>
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-9">
                    <button type="submit" class="btn btn-success">上传头像</button>
                </div>
            </div>

        </form>
        
		<form action="<?php echo WWW.URL('user','edit',''); ?>" class="form-horizontal" role="form" method="post">
			<div class="page-header">
				<h3>账号安全 <small></small></h3>
			</div>

			<div class="form-group">
				<label class="col-sm-3 control-label">新密码</label>
				<div class="col-sm-9">
					<input type="password" class="form-control" name="pass1">
					<span class="help-block">如果您想修改您的密码，请在此输入新密码。不然请留空。</span>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label">重复新密码</label>
				<div class="col-sm-9">
					<input type="password" class="form-control" name="pass2">
					<span class="help-block">再输入一遍新密码。</span>
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-offset-3 col-sm-9">
					<button type="submit" class="btn btn-success">保存更改</button>
				</div>
			</div>
		</form>
		



	</div>
</div>
</div>
</div>
</div>
</div>
</div>
	
	
    </body>
</html>

