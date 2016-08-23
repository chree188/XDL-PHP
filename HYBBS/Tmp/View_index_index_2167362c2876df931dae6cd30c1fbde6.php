<?php !defined('HY_PATH') && exit('HY_PATH not defined.'); ?>
<?php $view_inc = get_view_inc("hy_boss") ?>
<!DOCTYPE html>
<html lang="zh-cn">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="renderer" content="webkit" />
	<meta name="viewport" content="width=device-width, user-scalable=yes" />
	<title><?php echo $title;?><?php echo $conf['title2'];?></title>
	<meta name="keywords" content="<?php echo $conf['keywords'];?>">
	<meta name="description" content="<?php echo $conf['description'];?>">
	<link rel="shortcut icon" href="<?php echo WWW;?>favicon.ico">
	<link rel="stylesheet" href="<?php echo WWW;?>View/hy_boss/css/app.css?var=<?php echo HYBBS_V;?>"><!-- 
	<link rel="stylesheet" href="<?php echo WWW;?>View/hy_boss/css/remodal.css">
	<link rel="stylesheet" href="<?php echo WWW;?>View/hy_boss/css/remodal-default-theme.css"> -->

	<script>
	var www = "<?php echo WWW;?>";
	var exp = "<?php echo EXP;?>";
	</script>
	<!--[if (gte IE 9)|!(IE)]><!-->
	<script src="<?php echo WWW;?>public/js/jquery.min.js"></script>
	<!--<![endif]-->
	<!--[if lte IE 8 ]>
	<script src="<?php echo WWW;?>public/js/jquery1.11.3.min.js"></script>
	<![endif]-->
	<script src="<?php echo WWW;?>View/hy_boss/js/jquery.darktooltip.js"></script>
	<script src="<?php echo WWW;?>public/js/app.js?var=<?php echo HYBBS_V;?>"></script>
	<link href="<?php echo WWW;?>public/css/alert.css?var=<?php echo HYBBS_V;?>" rel="stylesheet">
	<script src="<?php echo WWW;?>View/hy_boss/js/app.js?var=<?php echo HYBBS_V;?>"></script>
	<!-- 好友系统资源文件 -->
	<link href="<?php echo WWW;?>public/css/friend.css?var=<?php echo HYBBS_V;?>" rel="stylesheet">
	<script src="<?php echo WWW;?>public/js/friend.js?var=<?php echo HYBBS_V;?>"></script>
	
	<?php if (IS_LOGIN): ?>
	<script>
	$(document).ready( function(){
		$(".menu-box").click(function(){
			$(".friend-box").toggleClass('friend-box-a');
		});
	});
	</script>
	<?php endif ?>
	<style type="text/css">
	<?php if ($view_inc['width']): ?>
		.container{
			width:<?php echo $view_inc['width'];?>;
		}
	<?php endif ?>
	<?php if ($view_inc['css']): ?>
		<?php echo $view_inc['css'];?>
	<?php endif ?>
	</style>
</head>
<body>

<div class="navbar select-disabled shadow" <?php if ($view_inc['menu_fix']): ?>style="position: fixed;width: 100%;z-index:1000"<?php endif ?>>
	<div class="container clearfix">
		<div class="menu horizontal pull-left nav-menu">
			<a href="<?php echo WWW;?>"><?php echo $conf['logo'];?></a>
			
			<?php if ($view_inc['menu_forum']): ?>
				<?php foreach ($forum as $v): ?>
					<a href="<?php echo WWW.URL('forum','',EXP.$v['id']) ?>"><?php echo $v['name'];?></a>
				<?php endforeach ?>
			<?php endif ?>

			<?php if (!empty($view_inc['diy_link'])): ?>
			
				<?php $tmp = explode("\r\n",$view_inc['diy_link']) ?>
				
				<?php foreach ((array)$tmp as $v): ?>
					<?php $tmp1 = explode(",",$v) ?>
					<a href="<?php echo $tmp1[0];?>"  <?php if ($tmp1[2]==1): ?>target="_blank"<?php endif ?>><?php echo $tmp1[1];?></a>
					
				<?php endforeach ?>
			<?php endif ?>

		</div>
		
		
		<div class="menu horizontal nav-account">
			
			<?php if ($view_inc['max']): ?>
			<a href="#" id="setWidth" class="icon-enlarge2"> 宽屏</a>
			<?php endif ?>
		<?php if (!IS_LOGIN): ?>
			<a href="<?php echo WWW;?>user<?php echo EXP;?>add" class="js-popup-register">注册</a>
			<a href="<?php echo WWW;?>user<?php echo EXP;?>login" class="js-popup-login">登录</a>
		<?php else: ?>
			<a href="javascript:void(0);" pos="left" class="menu-box" pos="bottom"><img style="border-radius:50%;vertical-align: middle;" width="40" height="40" src="<?php echo WWW;?><?php echo $user['avatar']['b'];?>">
			
			<span class="xx " style="<?php if (!$user['mess']): ?>display:none<?php endif ?>"><?php echo $user['mess'];?></span>
			
			</a>
		<?php endif ?>
			
		</div>
	</div>
</div>
<?php if ($view_inc['menu_fix']): ?><div style="height:84px"></div><?php endif ?>


<div class="container">
	<div id="main">
		
		
		<div class="wrap-box t-list">
			<div class="head with-btns">
			
				<span class="Select">
					<select class="Select-input FormControl">
						<option value="<?php echo WWW;?>" <?php if (isset($_GET['HY_URL'][0])): ?><?php if ($_GET['HY_URL'][0] != 'btime'): ?>selected<?php endif ?><?php endif ?>>最新主题</option>
						<option value="<?php echo WWW.URL('btime',''); ?>" <?php if (isset($_GET['HY_URL'][0])): ?><?php if ($_GET['HY_URL'][0] == 'btime'): ?>selected<?php endif ?><?php endif ?>>最新回复</option>
					</select>
					<script type="text/javascript">
			        $(".FormControl").change(function(){
			            window.location.href = $(this).val();
			        })
			        </script>
			        <img src="<?php echo WWW;?>View/hy_boss/sort.png" class="Select-caret">
		        </span>
				<a href="<?php echo WWW.URL('post',''); ?>" class="btn large pull-right"><img src="<?php echo WWW;?>View/hy_boss/Write.png" style="width: 12px;margin-right: 8px;">发表新主题</a>
				
			</div>
			<div class="list">
				
				<?php foreach ($top_list as $v): ?>
				<div class="item">
					<a href="<?php echo WWW.URL('my',$v['user']); ?>" target="_blank">
					<img pos="right" src="<?php echo WWW;?><?php echo $v['avatar']['b'];?>" width="50" height="50" uid="<?php echo $v['uid'];?>" class="circle pull-left js-info">
					
					</a>
					<div class="middle text">
						<h4 class="title">
						<a style="<?php if ($v['top']==2): ?>font-weight: bold;color: #09C;<?php endif ?>" href="<?php echo WWW.URL('thread','',EXP.$v['id']); ?>" ><?php if ($v['top']==2): ?><span class="qzd">全站置顶</span><?php endif ?><?php echo $v['title'];?></a>
						</h4>
						<div class="meta">
							<a href="<?php echo WWW.URL('my',$v['user']); ?>" class="author" target="_blank"><?php echo $v['user'];?></a>·&nbsp;&nbsp;发表于 <?php echo humandate($v['atime']); ?>&nbsp;&nbsp;<?php if (isset($v['buser'])): ?>·&nbsp;&nbsp;<?php echo $v['buser'];?> &nbsp;&nbsp;·&nbsp;&nbsp;最后回复 <?php echo humandate($v['btime']); ?><?php endif ?>
						</div>
					</div>

					<?php if ($v['posts']): ?>
					<a href="<?php echo WWW.URL('thread','',EXP.$v['id']); ?>" class="comment" ><span class="badge <?php if (($v['btime']+1800) > NOW_TIME): ?>badge-success<?php endif ?>"><?php echo $v['posts'];?></span></a>
					<?php endif ?>
				</div>
				<?php endforeach ?>
				<?php foreach ($data as $v): ?>
				<div class="item">
					<a href="<?php echo WWW.URL('my',$v['user']); ?>" target="_blank">
					<img pos="right" src="<?php echo WWW;?><?php echo $v['avatar']['b'];?>" width="50" height="50" uid="<?php echo $v['uid'];?>" class="circle pull-left js-info">
					</a>
					<div class="middle text">
						<h4 class="title">
						<a style="color: #09c;" href="<?php echo WWW.URL('forum','',EXP.$v['fid']); ?>">[ <?php echo forum($forum,$v['fid'],'name'); ?> ]</a> <a href="<?php echo WWW.URL('thread','',EXP.$v['id']); ?>" > <?php echo $v['title'];?></a>
						</h4>
						<div class="meta">
							<a href="<?php echo WWW.URL('my',$v['user']); ?>" class="author" target="_blank"><?php echo $v['user'];?></a>·&nbsp;&nbsp;发表于 <?php echo humandate($v['atime']); ?>&nbsp;&nbsp;<?php if (isset($v['buser'])): ?>·&nbsp;&nbsp;<?php echo $v['buser'];?>&nbsp;&nbsp;·&nbsp;&nbsp;最后回复 <?php echo humandate($v['btime']); ?><?php endif ?>
						</div>
					</div>
					<?php if ($v['posts']): ?>
					<a href="<?php echo WWW.URL('thread','',EXP.$v['id']); ?>" class="comment" ><span class="badge <?php if (($v['btime']+1800) > NOW_TIME): ?>badge-success<?php endif ?>"><?php echo $v['posts'];?></span></a>
					<?php endif ?>
				</div>
				<?php endforeach ?>
				
			</div>
		</div>
		
		<div class="h-20"></div>
		<div class="wrap-box">
			
			<a href="<?php if ($pageid==1): ?>javascript:void(0);<?php else: ?><?php echo WWW.URL($type,$pageid-1); ?><?php endif ?>"  class="btn bg-primary <?php if ($pageid==1): ?>disabled<?php endif ?>" >上一页</a>
			<a  href="<?php if ($pageid==$page_count): ?>javascript:void(0);<?php else: ?><?php echo WWW.URL($type,$pageid+1); ?><?php endif ?>" class="btn bg-primary large pull-right <?php if ($pageid==$page_count): ?>disabled<?php endif ?>" >下一页</a>
			
		</div>
	</div>
	<div id="right-bar">
	
	<div class="widget-docs-search shadow">
		<div class="inner">
			<form method="get" action="<?php echo WWW;?>search" style="margin-bottom:0;position: relative;">
			<input type="text" name="key" value="" class="h-scanfin">
			<button class="icon-search h-scanf"></button>
			</form>
		</div>
	</div>
	
</div>

</div>


<div id="footer">

	<span class="beian">HYBBS © 2016. All Rights Reserved.</span>
	<a href="<?php echo WWW;?>"><?php echo $conf['logo'];?></a>
	<br>
	<span class="beian" style="margin-left:0">
	Powered by </span><a href="http://bbs.hyphp.cn/">HYBBS</a>
	<span class="beian" style="margin-left:0">
	Runtime:<?php echo number_format(microtime(1) - $GLOBALS['START_TIME'], 4); ?>s
	</span>
	<span class="beian" style="margin-left:0">
	Mem:<?php echo round((memory_get_usage() - $GLOBALS['START_MEMORY'])/1024); ?>Kb
	</span>
	<span class="beian" style="margin-left:0">程序版本 <?php echo HYBBS_V;?></span>
	

</div>
<?php if (IS_LOGIN): ?>
<div class="friend-box">
	<div style="
	position: absolute;
    left: 0;
    top: 0;
    color: #a2a2a2;
    padding: 1px 10px 5px 10px;
    font-size: 21px;
    border: solid 2px #4c4c4c;
    margin: 10px;
    line-height: 21px;
    border-radius: 5px;cursor: pointer;" onclick="$('.friend-box').toggleClass('friend-box-a')">×</div>
	<div class="friend-info-box">
		<img src="<?php echo WWW;?><?php echo $user['avatar']['b'];?>">
		<h2><?php echo $user['user'];?> </h2>
		
<p>
	<span class="badge badge-purple bounceIn animation-delay2" style="
    font-size: 14px;
    font-weight: 400;background: cadetblue;"><?php echo $usergroup[NOW_GROUP]['name'];?></span>
</p>
		<p>
		<a href="<?php echo WWW.URL('my',$user['user']); ?>">个人中心</a>
		<span>|</span>
		<a href="<?php echo WWW;?>user<?php echo EXP;?>out">退出账号</a>
		</p>
		<p>
		
		<?php if ($user['group'] == C('ADMIN_GROUP')): ?>

		<a href="<?php echo WWW;?>admin">管理后台</a>
		<?php endif ?>
		</p>
	</div>
	<script type="text/javascript">
	<?php if (IS_LOGIN): ?>
	window.hy_user = "<?php echo NOW_USER;?>";
	window.hy_avatar = www + "<?php echo $user['avatar']['a'];?>";
	<?php else: ?>
	window.hy_user = '';
	window.hy_avatar = '';
	<?php endif ?>
	$(function(){
		load_friend();
	})
	</script>
	<div class="friend-div-box">
		<input type="text" class="friend-text" placeholder="Search">
		<img src="<?php echo WWW;?>View/hy_friend/cog.png" style="padding-top: 7px;padding-left: 7px;font-size: 18px;display: inline-block;"></span>
	</div>
	<div class="friend-title">
		关注列表
	</div>
	<div class="friend-div-box">
		<ul class="friend-ul" id="friend-1">
			<li><a onclick="new_chat('title','ssss',444,465,0,'系统','View/hy_friend/bell.png','系统消息')" class="clearfix">
			<img src="<?php echo WWW;?>View/hy_friend/bell.png" class="img-circle" alt="user avatar">
			<div class="chat-detail m-left-sm">
				<div class="chat-name">系统</div>
				<div class="chat-message">系统消息</div>
			</div>
			<div class="chat-status">
			<span class="friend-zx"></span>
			</div>
			<div class="chat-alert">
				<span id="friend-span-0" class="badge badge-purple bounceIn animation-delay2 friend-hide">0</span></div></a></li>
		</ul>
	</div>
	<div class="friend-title">
		粉丝列表
	</div>
	<div class="friend-div-box">
		<ul class="friend-ul" id="friend-3">
			
		</ul>
	</div>
	<div class="friend-title">
		陌生人
	</div>
	<div class="friend-div-box">
		<ul class="friend-ul" id="friend-0">
			
		</ul>
	</div>

</div>
<?php endif ?>
</body>
</html>

