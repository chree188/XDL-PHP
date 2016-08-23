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
            <style>
            .table-striped>tbody>tr{
                    cursor: pointer;
            }
            </style>
            <script>
            (function(){

            });
            function del_group(id,obj){
                if(!confirm("确定删除? 删除不能恢复的哦")){
                    return;
                }
                $.post(window.location.pathname,{id:id,gn:4},function(e){
                    
                    if(e.error){
                        $(obj).parent().parent().remove();
                    }

                },'json');

            }
            function edit_forum(obj){
                var i=0;
                $("#edit0").val('');
                $("#edit1").val('');

                $(obj).find('td').each(function(e){
                    if(!i){
                        $("#edit"+(i++)).val($(this).text());

                    }
                    $("#edit"+(i++)).val($(this).text());


                })
            }
            function edit_user(obj,id,type,b){



                $.post(window.location.pathname,{gn:3,id:id,b:b,type:type},function(e){
                    if(e.error){
                        var bb = b ? 0 : 1;
                        if(b){
                            $(obj).attr('onclick',"edit_user(this,"+id+",'"+type+"',"+ bb +")");
                            $(obj).text("禁止");
                            $(obj).removeClass('btn-success').addClass('btn-danger');
                        }else{
                            $(obj).attr('onclick',"edit_user(this,"+id+",'"+type+"',"+ bb +")");
                            $(obj).text("允许");
                            $(obj).removeClass('btn-danger').addClass('btn-success');
                        }

                    }
                },'json')
            }

            </script>
            <div class="alert alert-success alert-custom alert-dismissible" role="alert">
                <i class="fa fa-times-circle m-right-xs"></i> <strong>说明:</strong> 升级积分 -1 说明该用户组是不可升降的! 系统默认的3个用户组请勿修改!
            </div>
            <div class="table-responsive">
            <table class="table table-striped table-bordered m-top-md" id="dataTable" >
				<thead>
					<tr class="bg-dark-blue">
						<th>用户组 ID</th>
						<th>用户组 名称</th>
                        <th>升级所需积分</th>
                        <th title="上传文件储存空间大小">上传空间大小(kb)</th>
                        <th title="聊天记录储存空间大小">聊天空间大小(b)</th>
                        <th>允许发帖</th>
                        <th>允许评论</th>
                        <th>允许@</th>
                        <th>允许上传图片</th>
                        <th>允许删除帖子</th>
                        <th>允许下载附件</th>
                        <th>允许上传附件</th>
                        <th>允许隐藏帖子</th>
                        <th>允许帖子收费</th>
                        <th>免金币购买</th>
                        <th>操作</th>
					</tr>
				</thead>
				<tbody>
                    <?php foreach ($data as $v): ?>
                    <tr onclick="edit_forum(this)">
                        <td><?php echo $v['id'];?></td>
                        <td><?php echo $v['name'];?></td>
                        <td><?php echo $v['credits'];?></td>
                        <td><?php echo $v['space_size'];?></td>
                        <td><?php echo $v['chat_size'];?></td>
                        <td><button type="button" onclick="edit_user(this,<?php echo $v['id'];?>,'thread',<?php echo $v['json']['thread'] ? 1 : 0;?>)" class="btn btn-<?php if ($v['json']['thread']): ?>success btn-xs">允许<?php else: ?>danger btn-xs">禁止<?php endif ?></button></td>
                        <td><button type="button" onclick="edit_user(this,<?php echo $v['id'];?>,'post',<?php echo $v['json']['post'] ? 1 : 0;?>)" class="btn btn-<?php if ($v['json']['post']): ?>success btn-xs">允许<?php else: ?>danger btn-xs">禁止<?php endif ?></button></td>
                        <td><button type="button" onclick="edit_user(this,<?php echo $v['id'];?>,'mess',<?php echo $v['json']['mess'] ? 1 : 0;?>)" class="btn btn-<?php if ($v['json']['mess']): ?>success btn-xs">允许<?php else: ?>danger btn-xs">禁止<?php endif ?></button></td>
                        <td><button type="button" onclick="edit_user(this,<?php echo $v['id'];?>,'upload',<?php echo $v['json']['upload'] ? 1 : 0;?>)" class="btn btn-<?php if ($v['json']['upload']): ?>success btn-xs">允许<?php else: ?>danger btn-xs">禁止<?php endif ?></button></td>
                        <td><button type="button" onclick="edit_user(this,<?php echo $v['id'];?>,'del',<?php echo $v['json']['del'] ? 1 : 0;?>)" class="btn btn-<?php if ($v['json']['del']): ?>success btn-xs">允许<?php else: ?>danger btn-xs">禁止<?php endif ?></button></td>
                        <td><button type="button" onclick="edit_user(this,<?php echo $v['id'];?>,'down',<?php echo $v['json']['down'] ? 1 : 0;?>)" class="btn btn-<?php if ($v['json']['down']): ?>success btn-xs">允许<?php else: ?>danger btn-xs">禁止<?php endif ?></button></td>
                        <td><button type="button" onclick="edit_user(this,<?php echo $v['id'];?>,'uploadfile',<?php echo $v['json']['uploadfile'] ? 1 : 0;?>)" class="btn btn-<?php if ($v['json']['uploadfile']): ?>success btn-xs">允许<?php else: ?>danger btn-xs">禁止<?php endif ?></button></td>
                         <td><button type="button" onclick="edit_user(this,<?php echo $v['id'];?>,'thide',<?php echo $v['json']['thide'] ? 1 : 0;?>)" class="btn btn-<?php if ($v['json']['thide']): ?>success btn-xs">允许<?php else: ?>danger btn-xs">禁止<?php endif ?></button></td>
                         <td><button type="button" onclick="edit_user(this,<?php echo $v['id'];?>,'tgold',<?php echo $v['json']['tgold'] ? 1 : 0;?>)" class="btn btn-<?php if ($v['json']['tgold']): ?>success btn-xs">允许<?php else: ?>danger btn-xs">禁止<?php endif ?></button></td>
                        
                        <td><button type="button" onclick="edit_user(this,<?php echo $v['id'];?>,'nogold',<?php echo $v['json']['nogold'] ? 1 : 0;?>)" class="btn btn-<?php if ($v['json']['nogold']): ?>success btn-xs">允许<?php else: ?>danger btn-xs">禁止<?php endif ?></button></td>
                        <td>
                            <button type="button" onclick="del_group(<?php echo $v['id'];?>,this)" class="btn btn-danger btn-xs">删除</button>
                        </td>
                    </tr>
                    <?php endforeach ?>


				</tbody>
			</table>
            </div>
            <div class="alert alert-danger alert-custom alert-dismissible" role="alert">
		    	<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
		     	<i class="fa fa-times-circle m-right-xs"></i> <strong>警告!</strong> 添加用户组 ID 请勿用 0 零,管理员ID与游客ID 不建议修改! 用户组ID 只允许整数
		    </div>
            <div class="row">
            <div class="col-md-6">
                <div class="smart-widget m-top-lg widget-dark-blue">
    				<div class="smart-widget-header">
    					添加用户组
    					<span class="smart-widget-option">
    						<span class="refresh-icon-animated">
    							<i class="fa fa-circle-o-notch fa-spin"></i>
    						</span>

                            <a href="#" class="widget-collapse-option" data-toggle="collapse">
                                <i class="fa fa-chevron-up"></i>
                            </a>


                        </span>
    				</div>
    				<div class="smart-widget-inner">
    					<div class="smart-widget-body">
                            <h2>注意ID不可重复!</h2>
                            <section>
    		                    <p></p>
    		                </section>
    						<form  method="post">
                                <input type="hidden" name="gn" value="1">

    							<div class="form-group">
    								<label for="">用户组 ID</label>
    								<input type="text" name="id" class="form-control" value="">
                                    <span>如果这个ID与上面的出现重复,请自行修改</span>
    							</div>
                                <div class="form-group">
    								<label for="">用户组 名称</label>
    								<input type="text" name="name" class="form-control" >

    							</div>
                                <div class="form-group">
                                    <label for="">升级所需积分</label>
                                    <input type="text" name="credits" class="form-control" value="-1">
                                    <span>输入 -1 代表该用户组是无法通过积分升级的!</span>
                                </div>
                                <div class="form-group">
                                    <label for="">文件空间大小(kb) 注意单位</label>
                                    <input type="text" name="space_size" class="form-control" value="1024">
                                    <span>"1024" 代表只有 "1M的上传储存空间大小", "1024*(N) = M" 给予多大的空间 . 建议: "51200", 也就是50M </span>
                                </div>
                                <div class="form-group">
                                    <label for="">聊天记录储存空间大小(b) 注意单位</label>
                                    <input type="text" name="chat_size" class="form-control" value="4294967295">
                                    <span>填入 "1024" 代表 1KB, "4294967295" (4G)为最大</span>
                                </div>

    							<button type="submit" class="btn btn-success btn-sm">提交</button>
    						</form>
    					</div>
    				</div><!-- ./smart-widget-inner -->
    			</div>
            </div>
            <div class="col-md-6">
                <div class="smart-widget m-top-lg widget-dark-blue">
    				<div class="smart-widget-header">
    					编辑用户组
    					<span class="smart-widget-option">
    						<span class="refresh-icon-animated">
    							<i class="fa fa-circle-o-notch fa-spin"></i>
    						</span>

                            <a href="#" class="widget-collapse-option" data-toggle="collapse">
                                <i class="fa fa-chevron-up"></i>
                            </a>


                        </span>
    				</div>
    				<div class="smart-widget-inner">
    					<div class="smart-widget-body">
                            <h2>ID : "1" 默认是管理员,不能修改</h2>
                            <section>
    		                    <p></p>
    		                </section>
    						<form  method="post">
                                <input type="hidden" name="gn" value="2">
                                <input type="hidden" name="iid" id="edit0">

    							<div class="form-group">
    								<label for="">用户组 ID</label>
    								<input name="id" id="edit1" type="text" class="form-control" >
    							</div>
                                <div class="form-group">
    								<label for="">用户组 名称</label>
    								<input name="name" id="edit2" type="text" class="form-control" >
    							</div>
                                <div class="form-group">
                                    <label for="">升级所需积分</label>
                                    <input name="credits" id="edit3" type="text" class="form-control" >
                                </div>
                                <div class="form-group">
                                    <label for="">文件空间大小</label>
                                    <input name="space_size" id="edit4" type="text" class="form-control" >
                                </div>
                                <div class="form-group">
                                    <label for="">聊天记录储存空间大小</label>
                                    <input name="chat_size" id="edit5" type="text" class="form-control" >
                                </div>


    							<button type="submit" class="btn btn-success btn-sm">提交</button>
    						</form>

    					</div>
    				</div><!-- ./smart-widget-inner -->
    			</div>
            </div>
            </div>

        </div><!-- ENd box  -->

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

