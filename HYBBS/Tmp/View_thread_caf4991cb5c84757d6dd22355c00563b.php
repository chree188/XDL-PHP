<?php !defined('HY_PATH') && exit('HY_PATH not defined.'); ?>
<!DOCTYPE html>
<html>
  	<head>
	    <meta charset="utf-8">
	    <title>HYBBS后台管理系统</title>
	    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	    <meta name="description" content="">
	    <meta name="author" content="">

		<link rel="shortcut icon" href="<?php echo WWW;?>favicon.ico">
        <link href="<?php echo WWW;?>public/admin/bootstrap/css/bootstrap.min.css" rel="stylesheet">

		<!-- Font Awesome -->
		<link href="<?php echo WWW;?>public/css/font-awesome.min.css" rel="stylesheet">

		<link href="<?php echo WWW;?>public/css/alert.css" rel="stylesheet">

		<!-- Simplify -->
		<link href="<?php echo WWW;?>public/admin/css/simplify.min.css" rel="stylesheet">


        <script type="text/javascript">
            var www="<?php echo WWW;?>";
            var exp="<?php echo EXP;?>";
        </script>

  	</head>

<div class="wrapper">
    <header class="top-nav">
    <div class="top-nav-inner">
        <div class="nav-header">
            <button type="button" class="navbar-toggle pull-left sidebar-toggle" id="sidebarToggleSM">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <ul class="nav-notification pull-right">
                <li>
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-cog fa-lg"></i></a>
                    <span class="badge badge-danger bounceIn">1</span>
                    <ul class="dropdown-menu dropdown-sm pull-right user-dropdown">
                        <li class="user-avatar">
                            <img src="<?php echo WWW;?><?php echo $user['avatar']['b'];?>" alt="" class="img-circle">
                            <div class="user-content">
                                <h5 class="no-m-bottom"><?php echo $user['user'];?></h5>
                                <div class="m-top-xs">
                                    <a href="<?php echo WWW;?>" class="m-right-sm">返回网站首页</a>
                                    <a href="<?php echo WWW;?>admin<?php echo EXP;?>out">退出</a>
                                </div>
                            </div>
                        </li>
                        <li>
                            <a href="<?php echo WWW;?>admin">
                                后台主页
                                <span class="badge badge-danger bounceIn animation-delay2 pull-right">1</span>
                            </a>
                        </li>

                        <li class="divider"></li>
                        <li>
                            <a href="<?php echo WWW;?>admin<?php echo EXP;?>op">网站设置</a>
                        </li>
                    </ul>
                </li>
            </ul>

            <a href="index" class="brand">
                <i class="fa fa-yc"></i><span class="brand-name">HY BBS</span>
            </a>
        </div>
        <div class="nav-container">
            <button type="button" class="navbar-toggle pull-left sidebar-toggle" id="sidebarToggleLG">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <ul class="nav-notification">
                <li class="search-list">
                    <div class="search-input-wrapper">
                        <div class="search-input">
                            <input type="text" class="form-control input-sm inline-block">
                            <a href="#" class="input-icon text-normal"><i class="ion-ios7-search-strong"></i></a>
                        </div>
                    </div>
                </li>
            </ul>
            <div class="pull-right m-right-sm">
                <div class="user-block hidden-xs">
                    <a href="#" id="userToggle" data-toggle="dropdown">
                        <img src="<?php echo WWW;?><?php echo $user['avatar']['b'];?>" alt="" class="img-circle inline-block user-profile-pic">
                        <div class="user-detail inline-block">
                            <?php echo $user['user'];?>
                            <i class="fa fa-angle-down"></i>
                        </div>
                    </a>
                    <div class="panel border dropdown-menu user-panel">
                        <div class="panel-body paddingTB-sm">
                            <ul>

                                <li>
                                    <a href="<?php echo WWW;?>">
                                        <i class="fa fa-inbox fa-lg"></i><span class="m-left-xs">返回首页</span>
                                        
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo WWW;?>admin<?php echo EXP;?>out">
                                        <i class="fa fa-power-off fa-lg"></i><span class="m-left-xs">退出后台</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div><!-- ./top-nav-inner -->
</header>


    <aside class="sidebar-menu fixed">
	<div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 100%;"><div class="sidebar-inner scrollable-sidebar" style="overflow: hidden; width: auto; height: 100%;">
		<div class="main-menu">
			<ul class="accordion">
				<li class="menu-header">
					Main Menu
				</li>
				<li class="bg-palette1 <?php echo $menu_action['index'];?>">
					<a href="<?php echo WWW;?>admin">
						<span class="menu-content block">
							<span class="menu-icon"><i class="block fa fa-home fa-lg"></i></span>
							<span class="text m-left-sm">首页</span>
						</span>
						<span class="menu-content-hover block">
							首页
						</span>
					</a>
				</li>
				<li class="bg-palette4 <?php echo $menu_action['op'];?>">
					<a href="<?php echo WWW;?>admin<?php echo EXP;?>op">
						<span class="menu-content block">
							<span class="menu-icon"><i class="block fa fa-cog fa-lg"></i></span>
							<span class="text m-left-sm">全局设置</span>
						</span>
						<span class="menu-content-hover block">
							全局设置
						</span>
					</a>
				</li>
				<li class="bg-palette2">
					<a href="<?php echo WWW;?>">
						<span class="menu-content block">
							<span class="menu-icon"><i class="block fa fa-desktop fa-lg"></i></span>
							<span class="text m-left-sm">网站首页</span>
						</span>
						<span class="menu-content-hover block">
							网站首页
						</span>
					</a>
				</li>
				<li class="openable bg-palette3 <?php echo $menu_action['forum'];?>">
					<a href="#">
						<span class="menu-content block">
							<span class="menu-icon"><i class="block fa fa-list fa-lg"></i></span>
							<span class="text m-left-sm">板块分类</span>
							<span class="submenu-icon"></span>
						</span>
						<span class="menu-content-hover block">
							板块分类
						</span>
					</a>
					<ul class="submenu bg-palette4">
						<li><a href="<?php echo WWW;?>admin<?php echo EXP;?>forum" title="板块分类列表管理"><span class="submenu-label">分类管理</span></a></li>
						<li><a href="<?php echo WWW;?>admin<?php echo EXP;?>forumg" title="板块分类 版主列表编辑"><span class="submenu-label">分类版主</span></a></li>
						<li><a href="<?php echo WWW;?>admin<?php echo EXP;?>forum_json" title="板块用户组列表权限控制"><span class="submenu-label">分类用户组权限</span></a></li>

					</ul>
				</li>
				<li class="openable bg-palette4 <?php echo $menu_action['user'];?>">
					<a href="#">
						<span class="menu-content block">
							<span class="menu-icon"><i class="block fa fa-users fa-lg"></i></span>
							<span class="text m-left-sm">用户管理</span>
							<span class="submenu-icon"></span>
						</span>
						<span class="menu-content-hover block">
							用户管理
						</span>
					</a>
					<ul class="submenu"  style="display: none;">
						<li><a href="<?php echo WWW;?>admin<?php echo EXP;?>user"><span class="submenu-label">用户管理</span></a></li>
						<li><a href="<?php echo WWW;?>admin<?php echo EXP;?>usergroup"><span class="submenu-label">用户组</span></a></li>

					</ul>
				</li>
				<li class="bg-palette1 <?php echo $menu_action['thread'];?>" >
					<a href="<?php echo WWW;?>admin<?php echo EXP;?>thread">
						<span class="menu-content block">
							<span class="menu-icon"><i class="block fa fa-tags fa-lg"></i></span>
							<span class="text m-left-sm">文章管理</span>

						</span>
						<span class="menu-content-hover block">
							文章管理
						</span>
					</a>
				</li>
				<li class="bg-palette2 <?php echo $menu_action['view'];?>">
					<a href="<?php echo WWW;?>admin<?php echo EXP;?>view">
						<span class="menu-content block">
							<span class="menu-icon"><i class="block fa fa-paint-brush fa-lg"></i></span>
							<span class="text m-left-sm">外观&模板</span>

						</span>
						<span class="menu-content-hover block">
							外观模板
						</span>
					</a>
				</li>
				<li class="bg-palette3 <?php echo $menu_action['code'];?>">
					<a href="<?php echo WWW;?>admin<?php echo EXP;?>code">
						<span class="menu-content block">
							<span class="menu-icon"><i class="block fa fa-code fa-lg"></i></span>
							<span class="text m-left-sm">插件</span>

						</span>
						<span class="menu-content-hover block">
							插件
						</span>
					</a>
				</li>

				

			</ul>
		</div>
		<div class="sidebar-fix-bottom clearfix">
			<div class="user-dropdown dropup pull-left">
				<a href="#" class="dropdwon-toggle font-18" data-toggle="dropdown"><i class="ion-person-add"></i>
				</a>
				<ul class="dropdown-menu">
					<li>
						<a href="inbox">
							Inbox
							<span class="badge badge-danger bounceIn animation-delay2 pull-right">1</span>
						</a>
					</li>
					<li>
						<a href="#">
							Notification
							<span class="badge badge-purple bounceIn animation-delay3 pull-right">2</span>
						</a>
					</li>
					<li>
						<a href="#" class="sidebarRight-toggle">
							Message
							<span class="badge badge-success bounceIn animation-delay4 pull-right">7</span>
						</a>
					</li>
					<li class="divider"></li>
					<li>
						<a href="#">Setting</a>
					</li>
				</ul>
			</div>
			<a href="lockscreen" class="pull-right font-18"><i class="ion-log-out"></i></a>
		</div>
	</div><div class="slimScrollBar" style="width: 0px; position: absolute; top: 0px; opacity: 0.4; display: none; border-radius: 7px; z-index: 99; right: 1px; height: 651px; background: rgb(0, 0, 0);"></div><div class="slimScrollRail" style="width: 0px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; opacity: 0.2; z-index: 90; right: 1px; background: rgb(51, 51, 51);"></div></div><!-- sidebar-inner -->
</aside>

    <div class="main-container">

    <style>

    .table-striped>tbody>tr{
            cursor: pointer;
    }
    </style>
        <div class="padding-md">
           <form method="get">
             
              <div class="form-group">
                  <label>筛选分类</label>
                   <select class="form-control" name="forum">
                        <option value="-1">选择分类下的主题</option>
                        <?php foreach ($forum as $v): ?>
                        <option value="<?php echo $v['id'];?>" <?php if (isset($sforum)): ?><?php if ($sforum == $v['id']): ?>selected = "selected" <?php endif ?><?php endif ?>><?php echo $v['name'];?></option>
                        <?php endforeach ?>
                    </select>
                  
              </div>
              <div class="form-group">
                  
                  <button type="submit" class="btn btn-success btn-sm">筛选</button>
                  
              </div>
              
                  
              
          
          </form>

          <div class="row">
                <div class="col-md-3">
                    <div class="widget-stat clearfix">
                        <span class="stat-icon bg-info bounceIn animation-delay3"><i class="fa fa-comment"></i></span>
                        <div class="stat-info">
                            <small class="text-muted text-upper">主题数量</small>
                            <span><?php echo $count['thread'];?></span>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="widget-stat clearfix">
                        <span class="stat-icon bg-success bounceIn animation-delay3"><i class="fa fa-comments"></i></span>
                        <div class="stat-info">
                            <small class="text-muted text-upper">评论数量</small>
                            <span><?php echo $count['post'];?></span>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="widget-stat clearfix">
                        <span class="stat-icon bg-danger bounceIn animation-delay3"><i class="fa fa-comment-o"></i></span>
                        <div class="stat-info">
                            <small class="text-muted text-upper">今日发表主题</small>
                            <span><?php echo $count['day_thread'];?></span>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="widget-stat clearfix">
                        <span class="stat-icon bg-warning bounceIn animation-delay3"><i class="fa fa-comments-o"></i></span>
                        <div class="stat-info">
                            <small class="text-muted text-upper">今日发表评论</small>
                            <span><?php echo $count['day_post'];?></span>
                        </div>
                    </div>
                </div>
            </div>
            <form action="" method="post">
            <input type="hidden" name="gn" value="del">
            <div class="table-responsive">
            
            <table class="table table-striped table-bordered m-top-md" id="dataTable">
    			<thead>
        			<tr class="bg-dark-blue">
                        <th>
                            <div class="custom-checkbox">
                              <input type="checkbox" id="chkx" onclick="if($(this).is(':checked'))$('.checkboxx').prop('checked','checked'); else $('.checkboxx').attr('checked',false);">
                              <label for="chkx"></label>
                            </div>
                        </th>
        				<th>文章ID</th>
        				<th>分类&FID</th>
        				<th>作者&UID</th>
                        <th>标题</th>
                        <th>发表时间</th>
                        <th>浏览次数</th>
                        <th>评论数量</th>
                        <th>顶</th>
                        <th>踩</th>
                        <th>置顶</th>
                        <th>操作</th>
        			</tr>
    				</thead>
    				<tbody>
              <?php foreach ($data as $v): ?>
              <tr>
                  <td>
                    <div class="custom-checkbox">
                      <input name="id[]" value="<?php echo $v['id'];?>" class="checkboxx" type="checkbox" id="chk<?php echo $v['id'];?>">
                      <label for="chk<?php echo $v['id'];?>"></label>
                    </div>
                  </td>
                  <td><?php echo $v['id'];?></td>
                  <td><?php echo forum($forum,$v['fid'],'name'); ?><small class="badge badge-success badge-square bounceIn animation-delay2 m-left-xs pull-right"><?php echo $v['fid'];?></small></td>
                  <td><?php echo $v['user'];?><small class="badge badge-success badge-square bounceIn animation-delay2 m-left-xs pull-right"><?php echo $v['uid'];?></small></td>
                  <td><?php echo $v['title'];?></td>
                  <td><?php echo date("Y-m-d H:i:s",$v['atime']); ?></td>
                  <td><?php echo $v['views'];?></td>
                  <td><?php echo $v['posts'];?></td>
                  <td><?php echo $v['goods'];?></td>
                  <td><?php echo $v['nos'];?></td>
                  <td><?php if ($v['top']==1): ?><span class="label label-success">板块置顶</span><?php elseif ($v['top']==2): ?><span class="label label-info">全站置顶</span><?php else: ?>无<?php endif ?></td>
                  <td>
                      <a target="_blank" href="<?php echo WWW.URL('thread','',EXP.$v['id']); ?>" class="btn btn-success btn-xs" >修改</a>
                      <a target="_blank" href="<?php echo WWW.URL('thread','',EXP.$v['id']); ?>" class="btn btn-danger btn-xs">查看</a>
                  </td>
              </tr>
              <?php endforeach ?>
    				</tbody>
    			</table>
            </div>
            <div class="smart-widget-body">
                <div class="row">
                <div class="col-md-12">
                    <div class="checkbox inline-block">
                        <div class="custom-checkbox">
                            <input type="checkbox" name="del_post" id="inlineCheckbox1" class="checkbox-red" checked="">
                            <label for="inlineCheckbox1"></label>
                        </div>
                        <div class="inline-block vertical-top">
                            删除主题下所有评论
                        </div>
                    </div>
                    <div class="checkbox inline-block">
                        <div class="custom-checkbox">
                            <input type="checkbox" name="del_file" id="inlineCheckbox2" checked="">
                            <label for="inlineCheckbox2"></label>
                        </div>
                        <div class="inline-block vertical-top">
                            删除主题下所有附件
                        </div>
                    </div>
                    <!-- <div class="checkbox inline-block">
                        <div class="custom-checkbox">
                            <input type="checkbox" id="inlineCheckbox3" class="checkbox-purple" checked="">
                            <label for="inlineCheckbox3"></label>
                        </div>
                        <div class="inline-block vertical-top">
                            Checkbox 3
                        </div>
                    </div>
                    <div class="checkbox inline-block">
                        <div class="custom-checkbox">
                            <input type="checkbox" id="inlineCheckbox4" class="checkbox-blue" checked="">
                            <label for="inlineCheckbox4"></label>
                        </div>
                        <div class="inline-block vertical-top">
                            Checkbox 4
                        </div>
                    </div>
                    <div class="checkbox inline-block">
                        <div class="custom-checkbox">
                            <input type="checkbox" id="inlineCheckbox5" class="checkbox-yellow" checked="">
                            <label for="inlineCheckbox5"></label>
                        </div>
                        <div class="inline-block vertical-top">
                            Checkbox 5
                        </div>
                    </div>
                    <div class="checkbox inline-block">
                        <div class="custom-checkbox">
                            <input type="checkbox" id="inlineCheckbox6" class="checkbox-grey" checked="">
                            <label for="inlineCheckbox6"></label>
                        </div>
                        <div class="inline-block vertical-top">
                            Checkbox 6
                        </div>
                    </div> -->
                </div>
                <div class="col-md-12">
                    <button class="btn btn-danger">删除 (不可恢复)</button>
                </div>
            </div>

        </div>
        </form>
        <div class="smart-widget-body">
          <a href="<?php if ($pageid==1): ?>javascript:void(0);<?php else: ?><?php echo WWW;?>admin<?php echo EXP;?>thread?pageid=<?php echo $pageid-1;?><?php echo $fj;?><?php endif ?>" class="btn btn-success marginTB-xs" <?php if ($pageid==1): ?>disabled<?php endif ?>><i class="fa fa-angle-double-left m-left-xs"></i> 上一页</a>
          <a href="<?php if ($pageid==$page_count): ?>javascript:void(0);<?php else: ?><?php echo WWW;?>admin<?php echo EXP;?>thread?pageid=<?php echo $pageid+1;?><?php echo $fj;?><?php endif ?>" style="float:right" class="btn btn-success marginTB-xs" <?php if ($pageid==$page_count): ?>disabled<?php endif ?>>下一页<i class="fa fa-angle-double-right m-left-xs"></i></a>
        </div>

        
        <div class="smart-widget">
                        <div class="smart-widget-header">
                            帖子分类批量修改  (合并版块)
                          
                        </div>
                        <div class="smart-widget-inner">
                        
                            
                            <div class="smart-widget-body">
                                <form method="post" action="" class="form-horizontal no-margin form-border">
                                    <input type="hidden" name="gn" value="move">
                                   <div class="form-group">
                                        <label class="col-lg-2 control-label"></label>
                                        <div class="col-lg-10">
                                            <span>如果下面没显示你最新的板块. 请刷新一下论坛缓存!</span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">将这个分类的文章</label>
                                        <div class="col-lg-10">
                                            <select name="move_f1" class="form-control">
                                                <?php foreach ($forum as $v): ?>
                                                <option value="<?php echo $v['id'];?>"><?php echo $v['name'];?></option>
                                                <?php endforeach ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">移动到这个分类</label>
                                        <div class="col-lg-10">
                                            <select name="move_f2" class="form-control">
                                                <?php foreach ($forum as $v): ?>
                                                <option value="<?php echo $v['id'];?>"><?php echo $v['name'];?></option>
                                                <?php endforeach ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-2 control-label"></label>
                                        <div class="col-lg-10">
                                            <div class="checkbox inline-block">
                                                <div class="custom-checkbox">
                                                    <input type="checkbox" name="move_check" class="checkbox-red" id="inlineCheckbox3" >
                                                    <label for="inlineCheckbox3"></label>
                                                </div>
                                                <div class="inline-block vertical-top">
                                                    确定操作
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-2 control-label"></label>
                                        <div class="col-lg-10">
                                            <button class="btn btn-success" >移动</button>
                                        </div><!-- /.col -->
                                    </div><!-- /form-group -->
                                </form>
                            </div>
                        </div><!-- ./smart-widget-inner -->
                    </div>
            
    		
    

        
    </div>
</div>
<!-- Le javascript
	    ================================================== -->
	    <!-- Placed at the end of the document so the pages load faster -->

	    <!-- Jquery -->
		<script src="<?php echo WWW;?>public/js/jquery.min.js"></script>

	    <!-- Bootstrap -->
	    <script src="<?php echo WWW;?>public/admin/bootstrap/js/bootstrap.min.js"></script>


	    <!-- Slimscroll -->
		<script src='<?php echo WWW;?>public/admin/js/jquery.slimscroll.min.js'></script>

		<!-- Simplify -->
		<script src="<?php echo WWW;?>public/admin/js/simplify.js"></script>

		<script src="<?php echo WWW;?>public/js/sweet-alert.min.js"></script>

		<script>
			$(function()	{
				$('#lockScreen').modal({
					show: true,
					backdrop: 'static'
				})
			});
		</script>
  	</body>
</html>


