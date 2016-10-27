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

    <style>
    .gallery-list .gallery-item {
        position: relative;
        display: inline-block;
        
      
    }
    .gallery-list .gallery-item .gallery-wrapper .gallery-title.action{
        background-color: #2baab1;
    }
    .gallery-list .gallery-item .gallery-wrapper .gallery-overlay .gallery-action.action {
        background-color: #2baab1;
    }
    </style>
    <div class="main-container">
        <div class="padding-md">
            <h2 class="header-text no-margin">
				外观 & 模板 
                <form action="<?php echo WWW;?>admin" method="post" style="display:inline-block" class="form-horizontal no-margin form-border">
                <input name="one1" type="hidden" value="on">
                <button class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> 清理缓存</button>
                </form>
                
			</h2>
            <div class="gallery-filter m-top-md">
				<ul class="clearfix">
					<li class="active"><a href="<?php echo WWW;?>admin<?php echo EXP;?>view">我的</a></li>
					<li><a href="<?php echo WWW;?>admin<?php echo EXP;?>viewol">线上</a></li>
                    
                    <li class="pull-right active"><a href="#" onclick="$('#gn1').val('add');;$('#zti').text('新建模板')" data-toggle="modal" data-target="#normalModal1"><i class="fa fa-plus"></i> 制作模板</a></li>

				</ul>
			</div>



            <form method="post" id="form">
            <div class="modal fade in" id="normalModal1" aria-hidden="false">
			  	<div class="modal-dialog">
			    	<div class="modal-content">
			      		<div class="modal-header">
			        		<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
			        		<h4 class="modal-title" id="zti">新建模板</h4>
			      		</div>
			      		<div class="modal-body" id="md1">
                            
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">模板名</label>
                                        <input type="text" name="name" class="form-control input-sm">
                                    </div>
                                </div><!-- /.col -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">英文名</label>
                                        <input type="text" name="name2" class="form-control input-sm">
                                    </div>
                                </div><!-- /.col -->
                            </div><!-- /.row -->
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label">作者名</label>
                                        <input type="text" name="user" class="form-control input-sm">
                                    </div>
                                </div><!-- /.col -->
                            </div><!-- /.row -->
                            <div class="form-group">
                                <label class="control-label">模板描述</label>
                                <textarea class="form-control" name="mess" placeholder="" rows="3" ></textarea>
                            </div>
                            <h4 class="header-text">可选结构 (你可以跳过这步)</h4>
                            <div class="form-group">
                                <label class="control-label">必装插件</label>
                                <div id="lib">

                                    <div class="lib1"></div>
                                </div>
                            </div>
                            <div class="input-group">
                                <input type="text" id="text" class="form-control"  placeholder="请输入插件英文名">
                                <span class="input-group-btn">
                                    <button class="btn btn-success" type="button" onclick="add_lib()">按插件英文名-添加</button>
                                </span>
                            </div>
                            
        
                        
			      		</div>
			      		<div class="modal-footer">
                            <button type="button" class="btn btn-success" onclick="create_viee()">建立</button>
			        		

			      		</div>

			    	</div>
			  	</div>
			</div>
            </form>
            
            <div class="row m-top-md" id="list">
            <?php foreach ($data as $key => $v): ?>
            
                <div class="col-sm-6 col-md-4 col-lg-3 col-xs-12">
                    <div class="panel">
                        <div class="panel-body no-padding">
                            <div class="owl-carousel no-controls owl-theme owl-loaded">
                                <div class="owl-stage-outer owl-height" style="padding-left: 0px; padding-right: 0px;height: 200px;overflow: hidden; ">
                               
                                <span style="background:url('<?php echo WWW;?>View/<?php echo $v;?>/back.png');display: inline-block;width: 100%;height: 100%;background-position: center 0;background-repeat: no-repeat;background-size: cover;-webkit-background-size: cover;-o-background-size: cover;background-color: #404040;">
                                    
                                </span>
                                    <!-- <img src="<?php echo WWW;?>View/<?php echo $v;?>/back.png"> -->
                                </div>
                            </div>
                        </div>
                        <div class="panel-footer bg-white">
                            <div class="h3 text-success">
                                <?php echo $qj[$key]['name'];?> - <?php echo $v;?> 
                            </div>
                            <span class=" block" style="color: purple;font-size:14px">
                                作者:<?php echo $qj[$key]['user'];?> <span style="color: darkcyan;">版本:<?php echo $qj[$key]['version'];?></span>
                            </span>
                            <span class=" block" style="margin-top:5px">
                                <?php echo $qj[$key]['mess'];?>
                            </span>
                            <?php if ($qj[$key]['code']): ?>
                            <hr>
                            <label>使用模板-必装插件</label>
                            <div id="lib1">
                                <?php foreach (explode(",",$qj[$key]['code']) as $vv): ?>
                                <span class="label label-<?php if (is_plugin_dir($vv)): ?>success<?php else: ?>danger<?php endif ?>"><?php echo $vv;?></span>
                                <?php endforeach ?>
                                
                                <div style="clear: both;"></div>
                            </div>
                            <?php endif ?>
                            <hr>
                            <div class="clearfix">
                                <a class="btn btn-<?php if (strcasecmp(THEME_NAME,$v) == 0): ?>danger disabled<?php else: ?>success <?php endif ?>" href="<?php echo WWW;?>admin<?php echo EXP;?>view<?php echo EXP;?>edit<?php echo EXP;?><?php echo $v;?>" <?php if (strcasecmp(THEME_NAME,$v) == 0): ?>disabled<?php endif ?>>
                                    <i class="fa fa-check fa-lg"></i> <?php if (strcasecmp(THEME_NAME,$v) == 0): ?>已启用<?php else: ?>应用模板<?php endif ?>
                                </a>

                                <?php if (is_file(VIEW_PATH . $v . '/conf.html')): ?><a class="btn btn-warning" href="<?php echo WWW;?>admin<?php echo EXP;?>view<?php echo EXP;?>op<?php echo EXP;?><?php echo $v;?>">配置</a><?php endif ?>
                          
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>
            </div>


        </div>
    </div>

</div>
<style type="text/css">
.lib1{
        clear: both;
    }
    #lib,#lib1{
        min-height: 30px;
    border: 1px solid #DDD;
    padding: 10px;
    }
    
    #lib .label,#lib1 .label{
        margin-right: 10px;
        margin-bottom: 10px;
            float: left;
    }
    .lte{
            font-style: normal;
    }


</style>
<script type="text/javascript">
    function add_lib(){
        if($("#text").val()=='')
            return;
        $(".lib1").before('<span class="label label-success"><i class="lte">'+$("#text").val()+'</i> &nbsp;<i class="fa fa-close" onclick="$(this).parent().remove()"></i></span>');
        $("#text").val('');
    }
    function create_viee(){
        var code = $("#form").serialize();
        code+="&code=";
        $("#lib .lte").each(function(){
            code+=$(this).text()+",";
        });
        $.post(window.location.pathname,code,function(e){
            if(e.error)
                window.location.reload()
            else
                alert(e.info);
        },'json');
    }

</script>
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

