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
    <p class="sub-title">您已发布
        <span><?php echo $data['threads'];?></span>篇文章作品<a href="<?php echo WWW;?>post"><span class="new-post-btn">写文章</span></a></p>
</div>

<div class="dashboard-wrapper select-posts">
	<article class="panel panel-default archive" role="main">
        
        <?php foreach ($thread_data as $v): ?>
        
    	<article class="archive clr">
    	<h3>
    	       <a href="<?php echo WWW.URL('thread',$v['id'],''); ?>" title="as dasd"><?php echo $v['title'];?></a>
    	</h3>
    	<div class="archive-excerpt">
    		<p>
    			<?php echo $v['summary'];?>
    		</p>
    	</div>
    	<div class="postlist-meta">
    		<div class="postlist-meta-time">
    			<i class="fa fa-clock-o"></i>&nbsp;<?php echo humandate($v['atime']) ?>
    		</div>

    		<div class="postlist-meta-category">
    			<i class="fa fa-folder-open"></i>&nbsp;<a href="<?php echo WWW.URL('forum',$v['fid'],''); ?>" rel="category tag"><?php echo $forum[$v['fid']]['name']; ?></a>
    		</div>

            <?php if (!empty($v['img'])): ?>
            <div class="postlist-meta-category">
                <i class="fa fa-image"></i>&nbsp;<a href="#" rel="category tag">图片数量: <?php echo count(explode(',',$v['img'])) ?></a>
            </div>
            <?php endif ?>

            <?php if ($v['files']): ?>
            <div class="postlist-meta-category">
                <i class="fa fa-file"></i>&nbsp;<a href="#" rel="category tag">附件数量: <?php echo $v['files'];?></a>
            </div>
            <?php endif ?>
            <?php if ($v['posts']): ?>
            <div class="postlist-meta-category">
                <i class="fa fa-send"></i>&nbsp;<a href="#" rel="category tag">评论数量: <?php echo $v['posts'];?></a>
            </div>
            <?php endif ?>

           

    		<div class="postlist-meta-like like-btn" style="float:right;">
    			<i class="fa fa-thumbs-o-down"></i>&nbsp;<span><?php echo $v['nos'];?></span>&nbsp;
    		</div>
    		<div class="postlist-meta-collect collect-btn collect-no" style="float:right;">
    			<i class="fa fa-thumbs-o-up"></i>&nbsp;<span><?php echo $v['goods'];?></span>&nbsp;
    		</div>
            <div class="postlist-meta-collect collect-btn collect-no" style="float:right;">
                <i class="fa fa-fire"></i>&nbsp;<span><?php echo $v['views'];?></span>&nbsp;
            </div>
    	</div>
    	</article>
        
        <?php endforeach ?>
        
        <div class="pagination">
            <?php if ($pageid!=1): ?>
    		<span class="pg-item">

                <a class="page-numbers" href="<?php echo WWW.URL('my',$data['user'],EXP.'thread'.EXP.($pageid-1)); ?>">上一页</a>
            </span>
            <?php endif ?>
            <?php $tmp = ($data['threads']%10) ?(intval($data['threads']/10)+1) : intval($data['threads']/10) ; ?>
            <?php for ($i=($pageid-5 < 1) ? 1 : $pageid -5; $i< (($pageid + 5 > $tmp) ? $tmp+1 : $pageid + 5) ; $i++): ?>


            <span class="pg-item ">
                <<?php if ($pageid == $i): ?>span<?php else: ?>a<?php endif ?> class="page-numbers <?php if ($pageid == $i): ?>current<?php endif ?>" href="<?php echo WWW.URL('my',$data['user'],EXP.'thread'.EXP.($i)); ?>">
                    <?php echo $i;?>
                </<?php if ($pageid == $i): ?>span<?php else: ?>a<?php endif ?>>
            </span>
            <?php endfor ?>
            <?php if ($pageid!=$page_count): ?>
            <span class="pg-item" <?php if ($pageid==1): ?>disabled<?php endif ?>>
                <a class="next page-numbers" href="<?php echo WWW.URL('my',$data['user'],EXP.'thread'.EXP.($pageid+1)); ?>">下一页</a>
            </span>
            <?php endif ?>
    	</div>
        
	</article>
    
</div>
</div>
</div>
</div>
</div>
</div>
	
	
    </body>
</html>

