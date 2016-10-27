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
        width: 33%;
        padding: 2px;
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
            <div class="smart-widget">
        		<div class="smart-widget-header">
        			板块列表
                    
                    <div class="form-group pull-right" >
                        <div class="custom-checkbox">
                            <input type="checkbox" name="chk1" id="chk1">
                            <label for="chk1"></label>
                        </div>
                        删除分类时，是否删除该分类下的所有文章，评论。慎重勾选
                    </div>
                    <div class="form-group pull-right" >
                        <div class="custom-checkbox">
                            <input type="checkbox" name="chk2" id="chk2">
                            <label for="chk2"></label>
                        </div>
                        
                    </div>

        		</div>
        		<div class="smart-widget-inner">
        			
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
                        $("#edit3").val('-1');
                        $(obj).find('td').each(function(e){

                            $("#edit"+(i++)).val($(this).text());
                            //console.log($(this).text());
                            if(i==7){
                                if($(this).text() == '')
                                $("#edit6").val('-1');
                            }
                            

                            if(i==1){
                                $("#iid").val($(this).text());
                            }


                        })
                    }
                    function del_forum(id){
                        if(!confirm("确定删除?")){
                            return;
                        }
                        var del =false;
                        if($("#chk1").is(':checked') && $("#chk2").is(':checked'))
                            del = true;
                        $.post("<?php echo WWW;?>admin<?php echo EXP;?>forum",{gn:3,id:id,del:del},function(e){
                            if(e.error)
                                window.location.reload();
                        },'json');
                    }
                    </script>

                			<div class="smart-widget-body">
                                <div class="table-responsive">
                				<table class="table table-striped">
                		      		<thead>
                		        		<tr>
                			          		<th>分类ID</th>
                			          		<th>分类名称</th>
                                            <th>分类别名</th>
                                            <th title="用于模板使用">分类字体颜色</th>
                                            <th title="用于模板使用">分类背景颜色</th>
                                            <th>板块描述HTML</th>
                                            
                			          		<th>父分类ID</th>
                			          		<th>父分类名称</th>
                                            <th>额外操作</th>
                                            <th>上传图标</th>
                		        		</tr>
                		      		</thead>
                		      		<tbody>

                			        	<?php foreach ($data as $v): ?>
                                        <tr onclick="edit_forum(this)">
                                            <td><?php echo $v['id'];?></td>
                                            <td><?php echo $v['name'];?></td>
                                            <td><?php echo $v['name2'];?></td>
                                            <td><div style="background: <?php echo $v['color'];?>;float: left;width: 20px;height: 20px;display: inline-block;border-radius: 4px;margin-right:5px"></div><?php echo $v['color'];?></td>
                                            <td><div style="background: <?php echo $v['background'];?>;float: left;width: 20px;height: 20px;display: inline-block;border-radius: 4px;margin-right:5px"></div><?php echo $v['background'];?></td>
                                            <td><pre style="width:200px;max-height:200px"><?php echo $v['html'];?></pre></td>
                                            <?php $tmp=false; ?>

                                            <?php foreach ($data1 as $vv): ?>

                                                <?php if ($v['fid'] == $vv['id']): ?>
                                                    <td><?php echo $vv['id'];?></td>
                                                    <td><?php echo $vv['name'];?></td>
                                                    <?php $tmp=1; ?>

                                                <?php endif ?>
                                            <?php endforeach ?>
                                            <?php if (!$tmp): ?>
                                            <td></td><td></td>

                                            <?php endif ?>
                                            <td><button onclick="del_forum(<?php echo $v['id'];?>)" class="btn btn-danger btn-xs">删除分类</button></td>
                                            <td>
                                                <img class="pull-left" width="30" height="30" src="<?php echo WWW;?>upload/forum<?php echo $v['id'];?>.png" onerror="onerror='';this.src='<?php echo WWW;?>upload/de.png'">
                                                <form action="<?php echo WWW;?>admin<?php echo EXP;?>forumupload" method="post" enctype="multipart/form-data">
                                                    <input type="hidden" name="forum" value="<?php echo $v['id'];?>">
                                                    <input type="file" name="photo" onchange="$(this).parent().submit()">   

                                                </form>
                                            </td>

                                        </tr>
                                        <?php endforeach ?>
                			      	</tbody>
                			    </table>
                                </div>



                    </div>
        		</div><!-- ./smart-widget-inner -->
        	</div>
            <div class="smart-widget-body">


				<a href="<?php if ($pageid==1): ?>javascript:void(0);<?php else: ?><?php echo WWW;?>admin<?php echo EXP;?>forum?pageid=<?php echo $pageid-1;?><?php endif ?>" class="btn btn-success marginTB-xs" <?php if ($pageid==1): ?>disabled<?php endif ?>><i class="fa fa-angle-double-left m-left-xs"></i> 上一页</a>

				<a href="<?php if ($pageid==$page_count): ?>javascript:void(0);<?php else: ?><?php echo WWW;?>admin<?php echo EXP;?>forum?pageid=<?php echo $pageid+1;?><?php endif ?>" style="float:right" class="btn btn-success marginTB-xs" <?php if ($pageid==$page_count): ?>disabled<?php endif ?>>下一页<i class="fa fa-angle-double-right m-left-xs"></i></a>


			</div>
            <div class="alert alert-success alert-custom alert-dismissible" role="alert">
		    	<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
		    	<i class="fa fa-check-circle m-right-xs"></i><strong>注意事项!</strong> 你所看到的 -1 都是代表 无父分类 的意思
		    </div>
            <div class="row">
            <div class="col-md-6">
                <div class="smart-widget m-top-lg widget-dark-blue">
    				<div class="smart-widget-header">
    					添加分类
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
    		                    <p>注意如果你的分类不想继承,作为子分类,请不要更改 父分类ID的-1, -1值代表无继承 无父</p>
    		                </section>
    						<form  method="post">
                                <input type="hidden" name="gn" value="1">
    							<div class="form-group">
    								<label for="">分类ID</label>
    								<input type="text" name="id" class="form-control" AUTOCOMPLETE="off">
    							</div><!-- /form-group -->
    							<div class="form-group">
    								<label for="">板块名称</label>
    								<input type="text" name="name" class="form-control" AUTOCOMPLETE="off">
    							</div>
                                <div class="form-group">
                                    <label for="">板块别名</label>
                                    <input type="text" name="name2" class="form-control" AUTOCOMPLETE="off">
                                    注意: 不可以全部数字 . (建议使用字母别名, 不建议使用中文以及特殊符号)
                                </div>
                                <div class="form-group">
                                    <label for="">字体颜色</label>
                                    <input type="text" name="color" class="form-control" >
                                    用于对某些模板的独立性颜色控制 可使用 #FFF rgb 以及 rgba
                                </div>
                                <div class="form-group">
                                    <label for="">背景颜色</label>
                                    <input type="text" name="background" class="form-control">
                                    用于对某些模板的独立性颜色控制 可使用 #FFF rgb 以及 rgba
                                </div>
                                <div class="form-group">
                                    <label for="">板块描述 (支持HTML)</label>
                                    <textarea name="html" class="form-control"></textarea>
                                </div>
                                <div class="form-group">
    								<label for="">父分类ID</label>
    								<input type="text" name="fid" class="form-control"  value="-1" AUTOCOMPLETE="off">
    							</div><!-- /form-group -->


    							<button type="submit" class="btn btn-success btn-sm">提交</button>
    						</form>
    					</div>
    				</div><!-- ./smart-widget-inner -->
    			</div>
            </div>
            <div class="col-md-6">
                <div class="smart-widget m-top-lg widget-dark-blue">
    				<div class="smart-widget-header">
    					编辑分类 (请点击上面的分类)
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
    		                    <p>不建议更改分类ID,因为当你的某些文章已经使用此分类, 你一旦更改分类ID 那么文章将找不到此分类方法,会导致错误!</p>
    		                </section>
    						<form  method="post">
                                <input type="hidden" name="gn" value="2">
                                <input type="hidden" id="iid" name="iid" value="">
                                <div class="form-group">
    								<label for="">分类ID (不建议更改)</label>
    								<input name="id" id="edit0" type="text" class="form-control" AUTOCOMPLETE="off">
    							</div><!-- /form-group -->
    							<div class="form-group">
    								<label for="">板块名称</label>
    								<input name="name" id="edit1" type="text" class="form-control" AUTOCOMPLETE="off">
    							</div>
                                <div class="form-group">
                                    <label for="">板块别名</label>
                                    <input name="name2" id="edit2" type="text" class="form-control" AUTOCOMPLETE="off">
                                </div>
                                <div class="form-group">
                                    <label for="">字体颜色</label>
                                    <input type="text" id="edit3" name="color" class="form-control" >
                                    用于对某些模板的独立性颜色控制 可使用 #FFF rgb 以及 rgba
                                </div>
                                <div class="form-group">
                                    <label for="">背景颜色</label>
                                    <input type="text" id="edit4" name="background" class="form-control">
                                    用于对某些模板的独立性颜色控制 可使用 #FFF rgb 以及 rgba
                                </div>
                                <div class="form-group">
                                    <label for="">板块描述 (支持HTML)</label>
                                    <textarea name="html" id="edit5" class="form-control"></textarea>
                                </div>
    
                                <div class="form-group">
    								<label for="">父分类ID</label>
    								<input name="fid" id="edit6" type="text" class="form-control" AUTOCOMPLETE="off">
    							</div><!-- /form-group -->

    							<button type="submit" class="btn btn-success btn-sm">提交</button>
    						</form>
                            <div style="margin-top:10px" class="alert alert-danger alert-custom alert-dismissible" role="alert">
                		    	<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                		    	<i class="fa fa-check-circle m-right-xs"></i><strong>注意事项!</strong> 如果你发现修改失败,请刷新此页面再修改
                		    </div>
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

