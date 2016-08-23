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
	<h2>所有文件 <span class="label label-default">曾上传过的所有文件</span></h2>
    <ul class="filelist">
    <?php foreach ($filearr as $v): ?>
    <?php $tmp = substr(strrchr($v, '.'), 1) ;?>

        <li><a href="<?php echo WWW;?>upload/userfile/<?php echo NOW_UID;?>/<?php echo $v;?>" target="_blank"><i class="fa fa-<?php if ($tmp=='jpeg' || $tmp=='jpg' || $tmp=='bmp' || $tmp=='png' || $tmp=='gif'): ?>image<?php elseif ($tmp =='zip' || $tmp =='rar' || $tmp =='7z'): ?>file-zip-o<?php else: ?>file-o<?php endif ?>"></i><?php echo $v;?></a></li>
    <?php endforeach ?>
    </ul>
    <style type="text/css">
    .filelist{
        width: 100%;
        margin-top: 30px
    }
    .filelist li{
    float: left;
        float: left;
    width: 100px;
    height: 150px;
        text-align: center;
        margin-right: 10px
    }
    .filelist li i{
        font-size: 74px;
    }
    .filelist li i{
        margin-bottom: 5px;
    }
    </style>
    <div style="clear:both"></div>
</div>
<div class="dashboard-wrapper select-message">
    <h2>附件列表 <span class="label label-default">曾上传在文章的附件</span></h2>
    <table width="100%" border="0" cellspacing="0" class="table table-bordered orders-table">
        <thead>
            <tr>
                <th scope="col" style="width:20%;">附件名</th>
                <th scope="col">文件大小(M)</th>
                <th scope="col">上传时间</th>
                
            </tr>
        </thead>
        <tbody class="the-list">
            <?php foreach ($Filelist as $v): ?>
            <tr>
              <td><?php echo $v['filename'];?></td>
              <td><?php echo round($v['filesize']/1024/1024,3) ?></td>
              <td><?php echo humandate($v['atime']) ?></td>
            </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>
</div>
</div>
</div>
</div>
</div>
	
	
    </body>
</html>

