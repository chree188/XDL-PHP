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
            <form method="get">
                <input type="hidden" name="gn" value="1" />
                <div class="form-group">
                    <label>搜索用户 (或邮箱)</label>
                    <input name="user"  type="text" class="form-control" value="<?php if (isset($skey)): ?><?php echo $skey;?><?php endif ?>" placeholder="关键字 - 不搜索请留空">
                </div>
                <div class="form-group">
                    <label>筛选用户组</label>
                    <select class="form-control" name="usergroup">
                        <option value="0">选择用户组</option>
                        <?php foreach ($usergroup as $v): ?>
                        <option value="<?php echo $v['id'];?>" <?php if (isset($sgroup)): ?><?php if ($sgroup == $v['id']): ?>selected = "selected" <?php endif ?><?php endif ?>><?php echo $v['name'];?></option>
                        <?php endforeach ?>
                    </select>
                    
                </div>
                <div class="form-group">
                    
                    <button type="submit" class="btn btn-success btn-sm">筛选</button>
                    
                </div>
                
                    
                
            
            </form>
            <style>

            .table-striped>tbody>tr{
                    cursor: pointer;
            }
            </style>
            <script>
            (function(){

            });
            function edit_forum(obj){
                var i=0;
                $("#edit0").val('');
                $("#edit1").val('');
                $("#edit2").val('-1');
                $(obj).find('td').each(function(e){

                    $("#edit"+(i++)).val($(this).attr("data"));




                })
            }
            function deluser(id,obj){ //删除用户
                if(!confirm("确定删除?")){
                    return;
                }

                $(obj).attr("disabled",true);
                $.post(window.location.pathname,{id:id,gn:4},function(e){
                    $(obj).removeAttr("disabled");
                    if(e.error){
                        $(obj).parent().parent().remove();
                    }

                },'json');
            }
            </script>
            <div class="row">
                <div class="col-md-3">
                    <div class="widget-stat clearfix">
                        <span class="stat-icon bg-info bounceIn animation-delay3"><i class="fa fa-users"></i></span>
                        <div class="stat-info">
                            <small class="text-muted text-upper">站点用户数量</small>
                            <span><?php echo $user_count;?></span>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="widget-stat clearfix">
                        <span class="stat-icon bg-success bounceIn animation-delay3"><i class="fa fa-user-plus"></i></span>
                        <div class="stat-info">
                            <small class="text-muted text-upper">今日注册</small>
                            <span><?php echo $day_count;?></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-striped table-bordered m-top-md" id="dataTable">
    				<thead>
    					<tr class="bg-dark-blue">
    						<th>用户ID</th>
    						<th>用户名称</th>
                            <th>用户组 ID</th>
    						<th>Email</th>
                            <th>文章数量</th>
                            <th>评论数量</th>
                            <th>注册时间</th>
                            <th>金币</th>
                            <th>积分</th>
                            <th>粉丝</th>
                            <th>关注</th>
                            <th>已用文件空间(kb)</th>
                            <th>已用聊天空间(b)</th>
                            <th>操作</th>
    					</tr>
    				</thead>
    				<tbody>
                        <?php foreach ($data as $v): ?>
                        <tr onclick="edit_forum(this)">
                            <td data="<?php echo $v['id'];?>"><?php echo $v['id'];?></td>
                            <td data="<?php echo $v['user'];?>"><?php echo $v['user'];?></td>
                            <td data="<?php echo $v['group'];?>"><?php echo $v['group'];?>,<?php echo $usergroup[$v['group']]['name'];?></td>
                            <td data="<?php echo $v['email'];?>"><?php echo $v['email'];?></td>
                            <td><?php echo $v['threads'];?></td>
                            <td><?php echo $v['posts'];?></td>
                            
                            <td><?php echo empty($v['atime'])?'史前生物':date("Y-m-d H:i:s",$v['atime']) ?></td>
                            <td data="<?php echo $v['gold'];?>"><?php echo $v['gold'];?></td>
                            <td data="<?php echo $v['credits'];?>"><?php echo $v['credits'];?></td>
                            <td data="<?php echo $v['follow'];?>"><?php echo $v['follow'];?></td>
                            <td data="<?php echo $v['fans'];?>"><?php echo $v['fans'];?></td>
                            <td data="<?php echo $v['file_size'];?>"><?php echo $v['file_size'];?></td>
                            <td data="<?php echo $v['file_size'];?>"><?php echo $v['chat_size'];?></td>
                            <td>
                                <button type="button" onclick="deluser(<?php echo $v['id'];?>,this)" class="btn btn-danger btn-xs">删除</button>
                            </td>
                        </tr>
                        <?php endforeach ?>


    				</tbody>
    			</table>
            </div>
            <div class="smart-widget-body">


				<a href="<?php if ($pageid==1): ?>javascript:void(0);<?php else: ?>?pageid=<?php echo $pageid-1;?><?php echo $fj;?><?php endif ?>" class="btn btn-success marginTB-xs" <?php if ($pageid==1): ?>disabled<?php endif ?>><i class="fa fa-angle-double-left m-left-xs"></i> 上一页</a>

				<a href="<?php if ($pageid==$page_count): ?>javascript:void(0);<?php else: ?>?pageid=<?php echo $pageid+1;?><?php echo $fj;?><?php endif ?>" style="float:right" class="btn btn-success marginTB-xs" <?php if ($pageid==$page_count): ?>disabled<?php endif ?>>下一页<i class="fa fa-angle-double-right m-left-xs"></i></a>


			</div>
            <div class="alert alert-danger alert-custom alert-dismissible" role="alert">
		    	
		     	<i class="fa fa-times-circle m-right-xs"></i> <strong>警告!</strong> 删除用户特殊警告： 当你删除以为用户时，他的所有文章，评论，附件，文件，图片，聊天记录，好友粉丝等。管他的一切都会被删除。而且无法恢复他的数据！
		    </div>
            <div class="row">
            <div class="col-md-6">
                <div class="smart-widget m-top-lg widget-dark-blue">
    				<div class="smart-widget-header">
    					添加用户
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
                            <h2>说明</h2>
                            <section>
    		                    <p></p>
    		                </section>
    						<form  method="post">
                                <input type="hidden" name="gn" value="2">

    							<div class="form-group">
    								<label for="">用户名</label>
    								<input type="text" name="user" class="form-control" >
    							</div>
                                <div class="form-group">
    								<label for="">邮箱</label>
    								<input type="email" name="email" class="form-control" >
    							</div>
                                <div class="form-group">
    								<label for="">密码</label>
    								<input type="text" name="pass" class="form-control" >
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
    					编辑用户
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
                            <h2>说明</h2>
                            <section>
    		                    <p>在上面点击一个用户,在此编辑保存即可!</p>
    		                </section>
    						<form  method="post">
                                <input type="hidden" name="gn" value="3">
                                <input type="hidden" name="id" id="edit0">

    							<div class="form-group">
    								<label for="">用户名</label>
    								<input name="user" id="edit1" type="text" class="form-control" >
    							</div>
                                <div class="form-group">
    								<label for="">用户组 ID</label>
    								<input name="group" id="edit2" type="text" class="form-control" >
    							</div>
                                <div class="form-group">
    								<label for="">邮箱</label>
    								<input name="email" id="edit3" type="email" class="form-control" >
    							</div>
                                <div class="form-group">
    								<label for="">密码</label>
    								<input name="pass" id="" type="text" class="form-control">
    							</div>
                                <div class="form-group">
                                    <label for="">金币</label>
                                    <input name="gold" id="edit7" type="text" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="">积分</label>
                                    <input name="credits" id="edit8" type="text" class="form-control">
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

