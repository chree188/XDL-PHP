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
            <h2 class="header-text no-margin">
				插件 
			</h2>
            <div class="gallery-filter m-top-md" style="margin:10px 0">
				<ul class="clearfix">
					<li><a href="<?php echo WWW . URL('admin','code'); ?>">我的</a></li>
					<li class="active"><a id="gg" href="<?php echo WWW . URL('admin','codeol'); ?>">线上</a></li>
                    <li><a href="<?php echo WWW;?>admin<?php echo EXP;?>code_op">插件优先级</a></li>
                    
				</ul>
			</div>
          
            <h2 class="header-text no-margin" style="margin-bottom: 10px !important;">
                待更新
            </h2>
            <div id="list2" class="row">
        
            </div>
            <h2 class="header-text no-margin" style="margin-bottom: 10px !important;">
                新插件
            </h2>
            <div id="list1" class="row">
        
            </div>
            <h2 class="header-text no-margin" style="margin-bottom: 10px !important;">
                已下载
            </h2>
            <div id="list" class="row">

            </div>
            <script>
            var json = (<?php echo $data;?>);
            window.jsonx = null;
            function get_jsonp(){
                var obj = '#list';
                var html= '';
                $.get("<?php echo WWW;?>admin<?php echo EXP;?>get_code_json",function(e){
                    console.log(e.error);
                    if(!e.error){
                        swal('错误',e.data,'error');
                        return;
                    }
                    e = e.data;
                    window.jsonx = e;

                    
                    $("#gg").text("线上("+e.length+")");

                    for(o in e){

                        var tmp = '<a onclick="mod(\''+e[o].icon+'\',\''+e[o].name+'\','+o+',\''+e[o].ab+'\',\''+e[o].name2+'\',\''+e[o].user+'\',\''+e[o].name2+'\',true)" class="btn btn-xs btn-success"  data-toggle="modal" data-target="#normalModal">下载</a>';
                        for(oo in json){
                            e[o].yv = '未安装';
                            obj = "#list1";
                            if(json[oo].name == e[o].name2){
                                
                                tmp = '<a class="btn btn-xs btn-danger" disabled>已下载</a>';
                                e[o].yv = json[oo].version;
                                
                                obj = "#list";
                                if(json[oo].version != e[o].version){

                                    obj = "#list2";
                                    tmp = '<a  onclick="mod(\''+e[o].icon+'\',\''+e[o].name+'\','+o+',\''+e[o].ab+'\',\''+e[o].name2+'\',\''+e[o].user+'\',\''+e[o].name2+'\',false)" class="btn btn-xs btn-info" data-toggle="modal" data-target="#normalModal" onclick="$(\'#name2\').val(\''+e[o].name2+'\')">更新插件</a>';


                                }
                                break;
                                
                            }

                            
                        }
                        html = '<div class="col-sm-4"><div class="panel"><div class="panel-body"><a href="#" class="pull-left m-right-sm"><img width="50" height="50" src="<?php echo APP_WWW;?>app/'+e[o].name2+'/';
                        html+=e[o].icon;
                        html+='"></a><div class=" m-left-sm"><strong class="font-14 block">';
                        html+=e[o].name;
                        html+=' <!--<label class="badge badge-success">'+e[o].name2+'</label>--></strong><small style="color: purple" class="text-muted">作者: ';
                        html+=e[o].user;
                        html+='<strong style="color: darkcyan;"> &nbsp;最新版本:'+e[o].version+'</strong>';
                        html+='<strong style="color: darkcyan;"> &nbsp;本地版本:'+e[o].yv+'</strong>';
                        html+='</small><div class="seperator"></div><p class="m-bottom-none">';
                        html+=e[o].ab;
                        html+='</div>'+tmp+'</div></div></div>';
                        $(obj).append(html);

                    }

                },'json');
            }
            function add_text(a){
                window.pre.append(a+"\r\n");
            }
            

            window.onload = function(){
                <?php if (APP_KEY == ''): ?>
                return swal('授权失败','请在 后台-全局设置-授权码,输入授权KEY','error');
                <?php endif ?>
                get_jsonp();
                $("#re").click(function(){
                    window.pre = $('<pre id="code" style="width: 100%;padding: 10px;display: block;background: #000;color: chartreuse;font-size: 16px;"></pre>')
                    $("#tmpimg").html(window.pre);
                    add_text("更新插件 : "+$("#name2").text());
                    $.ajax({
                        url:'<?php echo WWW;?>admin<?php echo EXP;?>codeol',
                        type:'post',
                        data:{
                            gn:'get_down',
                            name:$("#name").val()
                        },
                        dataType:'json',
                        success:function(e){
                            if(e.error){
                                add_text("成功获取插件下载地址.");
                                add_text("正在尝试下载...");
                                $.ajax({
                                    url:'<?php echo WWW;?>admin<?php echo EXP;?>codeol',
                                    type:'post',
                                    data:{
                                        gn:'update',
                                        name:$("#name").val(),
                                        www:e.data
                                    },
                                    dataType:'json',
                                    success:function(e){
                                        if(e.error){
                                            add_text("插件更新完成");
                                            setTimeout(function(){
                                                window.location.reload()
                                            },1000)
                                        }else{
                                            add_text("终止安装, 原因: " +e.data);
                                        }
                                    },
                                    error:function(){
                                        add_text("终止安装, 原因: 本地服务器出错 Error = 2");
                                    }
                                });


                            }else{
                                add_text("终止安装, 原因: " +e.data);
                            }
                        },
                        error:function(){
                            add_text("终止安装, 原因: 本地服务器出错 Error = 1");
                        }
                    });



                });
                $("#down").click(function(){
                    window.pre = $('<pre id="code" style="width: 100%;padding: 10px;display: block;background: #000;color: chartreuse;font-size: 16px;"></pre>')
                    $("#tmpimg ").html(window.pre);


                    add_text("下载插件 : "+$("#name2").text());
                    $.ajax({
                        url:'<?php echo WWW;?>admin<?php echo EXP;?>codeol',
                        type:'post',
                        data:{
                            gn:'get_down',
                            name:$("#name").val()
                        },
                        dataType:'json',
                        success:function(e){
                            if(e.error){
                                add_text("成功获取插件下载地址.");
                                add_text("正在尝试下载...");
                                $.ajax({
                                    url:'<?php echo WWW;?>admin<?php echo EXP;?>codeol',
                                    type:'post',
                                    data:{
                                        gn:'down',
                                        name:$("#name").val(),
                                        www:e.data
                                    },
                                    dataType:'json',
                                    success:function(e){
                                        if(e.error){
                                            add_text("插件安装完成");
                                            setTimeout(function(){
                                                window.location.reload()
                                            },1000)
                                        }else{
                                            add_text("终止安装, 原因: " +e.data);
                                        }
                                    },
                                    error:function(){
                                        add_text("终止安装, 原因: 本地服务器出错 Error = 2");
                                    }
                                });


                            }else{
                                add_text("终止安装, 原因: " +e.data);
                            }
                        },
                        error:function(){
                            add_text("终止安装, 原因: 本地服务器出错 Error = 1");
                        }
                    });
                    

                });
            }
            function mod(icon,title,oo,mess,name,user,name2,bool){
                //var arr = image.split(',');
                var html = '';
                if(bool){
                    $("#tmpimg").html('<div title="图片尺寸与真实不一致!" id="image" class="owl-carousel no-controls"></div>');
                    
                    for(var o in window.jsonx[oo].image_list){
                        html+='<div class="item" style="height:300px"><img style="width: 100%;height: 100%;" src="<?php echo APP_WWW;?>app/'+name2+'/'+jsonx[oo].image_list[o]+'" alt=""></div>';
                    }
                    $("#down").show();
                    $("#re").hide();
                }else{
                    $("#down").hide();
                    $("#re").show();
                    var tmp = $('<div id="previre"></div>');

                    
                    tmp.html(jsonx[oo].description)
                    tmp.css('height',"200px");
                    tmp.css('overflow-y',"scroll");
                    tmp.css('padding',"10px");
                    $("#tmpimg").html(tmp);
                    
                }
                $("#down_icon").attr('src','<?php echo APP_WWW;?>app/'+name2+'/'+icon);
                $("#ms").text(mess)
                $("#image").html(html);
                $(".modal-p1,#name2").text(title);
                $("#name").val(name);
                $("#suser").text("作者: "+user);

                $('.owl-carousel').owlCarousel({
				    items:1,
				    loop:true,
				    autoplay:true,
					autoplayTimeout:2000,
					autoplayHoverPause:true,
				    stagePadding:0,
				    smartSpeed:450,
				    dots: false
				});

            }

            </script>


            
            <input type="hidden" name="name"  value="" id="name">
            <input type="hidden" name="name2" value="" id="name2">
            <div class="modal fade in" id="normalModal" aria-hidden="false">
			  	<div class="modal-dialog">
			    	<div class="modal-content">
			      		<div class="modal-header">
			        		<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
			        		<h4 class="modal-title" id="zti">下载插件 - <span class="modal-p1"></span></h4>
			      		</div>
			      		<div class="modal-body" id="md1">
                            <div class="panel">
                            <div class="panel-body">
                            	<a href="#" class="pull-left m-right-sm">
                                    <img id="down_icon" width="50" height="50">

                                </a>
                            	<div class=" m-left-sm">
                            		<strong class="font-14 block modal-p1" ></strong><small class="text-muted"  id="suser"></small>
                            		<div class="seperator">
                            		</div>
                            		<p class="m-bottom-none" id="ms">
                            			
                            		</p>
                            	</div>
                            </div>
                            </div>


                            <div id="tmpimg">
                            <div id="image" class="owl-carousel no-controls">

                            </div>
                            </div>




			      		</div>
			      		<div class="modal-footer">
			        		<button type="button" class="btn btn-danger" data-dismiss="modal">取消</button>
			        		<button type="submit" class="btn btn-success" id="down">确定下载</button>
                            <button type="submit" class="btn btn-success" id="re" style="display:none">更新</button>
			      		</div>
			    	</div>
			  	</div>
			</div>
            


        </div>
    </div><!-- ENd box  -->

</div>
</div>

<style>
.owl-carousel .animated{-webkit-animation-duration:1000ms;animation-duration:1000ms;-webkit-animation-fill-mode:both;animation-fill-mode:both}.owl-carousel .owl-animated-in{z-index:0}.owl-carousel .owl-animated-out{z-index:1}.owl-carousel .fadeOut{-webkit-animation-name:fadeOut;animation-name:fadeOut}@-webkit-keyframes fadeOut{0%{opacity:1}100%{opacity:0}}@keyframes fadeOut{0%{opacity:1}100%{opacity:0}}.owl-height{-webkit-transition:height 500ms ease-in-out;-moz-transition:height 500ms ease-in-out;-ms-transition:height 500ms ease-in-out;-o-transition:height 500ms ease-in-out;transition:height 500ms ease-in-out}.owl-carousel{display:none;width:100%;-webkit-tap-highlight-color:transparent;position:relative;z-index:1}.owl-carousel .owl-stage{position:relative;-ms-touch-action:pan-Y}.owl-carousel .owl-stage:after{content:".";display:block;clear:both;visibility:hidden;line-height:0;height:0}.owl-carousel .owl-stage-outer{position:relative;overflow:hidden;-webkit-transform:translate3d(0px,0,0)}.owl-carousel .owl-controls .owl-dot,.owl-carousel .owl-controls .owl-nav .owl-next,.owl-carousel .owl-controls .owl-nav .owl-prev{cursor:pointer;cursor:hand;-webkit-user-select:none;-khtml-user-select:none;-moz-user-select:none;-ms-user-select:none;user-select:none}.owl-carousel.owl-loaded{display:block;padding: 5px;    background: #DDD;}.owl-carousel.owl-loading{opacity:0;display:block}.owl-carousel.owl-hidden{opacity:0}.owl-carousel .owl-refresh .owl-item{display:none}.owl-carousel .owl-item{position:relative;min-height:1px;float:left;-webkit-backface-visibility:hidden;-webkit-tap-highlight-color:transparent;-webkit-touch-callout:none;-webkit-user-select:none;-moz-user-select:none;-ms-user-select:none;user-select:none}.owl-carousel .owl-item img{display:block;width:100%;-webkit-transform-style:preserve-3d}.owl-carousel.owl-text-select-on .owl-item{-webkit-user-select:auto;-moz-user-select:auto;-ms-user-select:auto;user-select:auto}.owl-carousel .owl-grab{cursor:move;cursor:-webkit-grab;cursor:-o-grab;cursor:-ms-grab;cursor:grab}.owl-carousel .owl-rtl{direction:rtl}.owl-carousel .owl-rtl .owl-item{float:right}.no-js .owl-carousel{display:block}.owl-carousel .owl-item .owl-lazy{opacity:0;-webkit-transition:opacity 400ms ease;-moz-transition:opacity 400ms ease;-ms-transition:opacity 400ms ease;-o-transition:opacity 400ms ease;transition:opacity 400ms ease}.owl-carousel .owl-item img{transform-style:preserve-3d}.owl-carousel .owl-video-wrapper{position:relative;height:100%;background:#000}.owl-carousel .owl-video-play-icon{position:absolute;height:80px;width:80px;left:50%;top:50%;margin-left:-40px;margin-top:-40px;background:url(owl.video.play.png) no-repeat;cursor:pointer;z-index:1;-webkit-backface-visibility:hidden;-webkit-transition:scale 100ms ease;-moz-transition:scale 100ms ease;-ms-transition:scale 100ms ease;-o-transition:scale 100ms ease;transition:scale 100ms ease}.owl-carousel .owl-video-play-icon:hover{-webkit-transition:scale(1.3,1.3);-moz-transition:scale(1.3,1.3);-ms-transition:scale(1.3,1.3);-o-transition:scale(1.3,1.3);transition:scale(1.3,1.3)}.owl-carousel .owl-video-playing .owl-video-play-icon,.owl-carousel .owl-video-playing .owl-video-tn{display:none}.owl-carousel .owl-video-tn{opacity:0;height:100%;background-position:center center;background-repeat:no-repeat;-webkit-background-size:contain;-moz-background-size:contain;-o-background-size:contain;background-size:contain;-webkit-transition:opacity 400ms ease;-moz-transition:opacity 400ms ease;-ms-transition:opacity 400ms ease;-o-transition:opacity 400ms ease;transition:opacity 400ms ease}.owl-carousel .owl-video-frame{position:relative;z-index:1}
</style>
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

<script src="<?php echo WWW;?>public/admin/js/owl.carousel.min.js"></script>
