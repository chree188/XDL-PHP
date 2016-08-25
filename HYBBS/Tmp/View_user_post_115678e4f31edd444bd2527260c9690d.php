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
<p class="sub-title">您已发表<span><?php echo $data['posts'];?></span>条评论。</p>
<p class="tip">提示：认真填写的点评都有可能被推荐为精彩评论哦。</p>
</div>

<div class="dashboard-wrapper select-comment">
	<ul class="user-msg">
		<!-- <li class="tip">共有 6 条评论，其中 6 条已获准， 0 条正等待审核。</li> -->
        
        <?php foreach ($post_data as $v): ?>
        
		<li>
		<div class="message-content">
			<?php echo $v['content'];?>
		</div>
		<a class="" href="<?php echo WWW.URL('thread',$v['tid'],''); ?>"><?php echo humandate($v['atime']) ?>  发表在  <?php echo $v['title'];?></a></li>
        </li>
        
        <?php endforeach ?>
        
	</ul>
    
    <div class="pagination">
        <?php if ($pageid!=1): ?>
        <span class="pg-item" disabled>
            <a class="page-numbers" href="<?php echo WWW.URL('my',$data['user'],EXP.'post'.EXP.($pageid-1)); ?>">上一页</a>
        </span>
        <?php endif ?>
        <?php $tmp = ($data['posts']%10) ?(intval($data['posts']/10)+1) : intval($data['posts']/10) ; ?>
        <?php for ($i=($pageid-5 < 1) ? 1 : $pageid -5; $i< (($pageid + 5 > $tmp) ? $tmp+1 : $pageid + 5) ; $i++): ?>


        <span class="pg-item ">
            <<?php if ($pageid == $i): ?>span<?php else: ?>a<?php endif ?> class="page-numbers <?php if ($pageid == $i): ?>current<?php endif ?>" href="<?php echo WWW.URL('my',$data['user'],EXP.'post'.EXP.($i)); ?>">
                <?php echo $i;?>
            </<?php if ($pageid == $i): ?>span<?php else: ?>a<?php endif ?>>
        </span>
        <?php endfor ?>
        <?php if ($pageid!=$page_count): ?>
        <span class="pg-item" >
            <a class="next page-numbers" href="<?php echo WWW.URL('my',$data['user'],EXP.'post'.EXP.($pageid+1)); ?>">下一页</a>
        </span>
        <?php endif ?>
    </div>
    
</div>
</div>
</div>
</div>
</div>
</div>
	
	
    </body>
</html>

