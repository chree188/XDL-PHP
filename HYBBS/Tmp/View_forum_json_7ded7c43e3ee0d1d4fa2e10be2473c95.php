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
        <div class="padding-md">
            
            <h3 class="m-left-xs header-text m-top-lg">板块用户组权限</h3>
            <div class="table-responsive">
            <table class="table table-striped table-bordered m-top-md" id="dataTable">
				<thead>
					<tr class="bg-dark-blue">
						<th>分类ID</th>
						<th>分类名称</th>
                        <th>禁止浏览分类</th>
                        <th>禁止浏览分类主题</th>
                        <th>禁止发帖</th>
                        <th>禁止回复</th>
                        <th>禁止下载附件</th>

					</tr>
				</thead>
				<tbody>

                    <?php foreach ($data as $v): ?>
                    <tr>
                        <td><?php echo $v['id'];?></td>
                        <td><?php echo $v['name'];?></td>
                        <td>

                            <?php foreach ($v['jsonarr']['vforum'] as $vv): ?>
                            <span class="label label-primary"><?php echo $vv;?></span>
                            <?php endforeach ?>
                            <button onclick="$('#gn').val('vforum');$('.modal-body').load(window.location.pathname+'?id=<?php echo $v['id'];?>&gn=vforum')" type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#normalModal">编辑</button>
                        </td>
                        <td>
                            <?php foreach ($v['jsonarr']['vthread'] as $vv): ?>
                            <span class="label label-primary "><?php echo $vv;?></span>
                            <?php endforeach ?>
                            <button onclick="$('#gn').val('vthread');$('.modal-body').load(window.location.pathname+'?id=<?php echo $v['id'];?>&gn=vthread')" type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#normalModal">编辑</button>
                        </td>
                        <td>
                            <?php foreach ($v['jsonarr']['thread'] as $vv): ?>
                            <span class="label label-primary "><?php echo $vv;?></span>
                            <?php endforeach ?>
                            <button onclick="$('#gn').val('thread');$('.modal-body').load(window.location.pathname+'?id=<?php echo $v['id'];?>&gn=thread')" type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#normalModal">编辑</button>
                        </td>
                        <td>
                            <?php foreach ($v['jsonarr']['post'] as $vv): ?>
                            <span class="label label-primary "><?php echo $vv;?></span>
                            <?php endforeach ?>
                            <button onclick="$('#gn').val('post');$('.modal-body').load(window.location.pathname+'?id=<?php echo $v['id'];?>&gn=post')" type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#normalModal">编辑</button>
                        </td>
                      
                        <td>
                            <?php foreach ($v['jsonarr']['downfile'] as $vv): ?>
                            <span class="label label-primary "><?php echo $vv;?></span>
                            <?php endforeach ?>
                            <button onclick="$('#gn').val('downfile');$('.modal-body').load(window.location.pathname+'?id=<?php echo $v['id'];?>&gn=downfile')" type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#normalModal">编辑</button>
                        </td>

                    </tr>
                    <?php endforeach ?>


				</tbody>
			</table>
            </div>

        </div>
    </div>
    <form method="post">
    <input type="hidden" id="gn" name="gn" value="">
    <div class="modal fade in" id="normalModal" aria-hidden="false">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title" id="zti">编辑<span class="modal-p1"></span></h4>
                </div>
                <div class="modal-body">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">取消</button>
                    <button type="submit" class="btn btn-success">确定执行</button>
                </div>
            </div>
        </div>
    </div>
    </form>

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

