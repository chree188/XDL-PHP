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

<!-- 好友系统资源文件 -->
  <link href="<?php echo WWW;?>public/css/friend.css?var=<?php echo HYBBS_V;?>" rel="stylesheet">
  <script src="<?php echo WWW;?>public/js/friend.js?var=<?php echo HYBBS_V;?>"></script>

  <script src="<?php echo WWW;?>public/js/sweet-alert.min.js"></script>
  <link href="<?php echo WWW;?>public/css/alert.css" rel="stylesheet">
  
<div class="dashboard-header">
	<p class="sub-title">
		用户中心 - HYBBS
	</p>
	
</div>
<div class="dashboard-wrapper select-index">
	<div class="briefly">
		<ul>
			
			<li class="post">
			<div class="visual">
				<i class="fa fa-tasks"></i>
			</div>
			<div class="number">
				<?php echo $data['threads'];?><span>文章作品</span>
			</div>
			<div class="more">
				<a href="<?php echo WWW.URL('my',$data['user'],EXP.'thread'); ?>">查看更多<i class="fa fa-arrow-circle-right"></i></a>
			</div>
			</li>
			<li class="photo">
			<div class="visual">
				<i class="fa fa-heart"></i>
			</div>
			<div class="number">
				0<span>我的收藏</span>
			</div>
			<div class="more">
				<a href="<?php echo WWW.URL('my',$data['user'],EXP.'thread'); ?>">查看更多<i class="fa fa-arrow-circle-right"></i></a>
			</div>
			</li>
			<li class="credit">
			<div class="visual">
				<i class="fa fa-money"></i>
			</div>
			<div class="number">
				<?php echo $data['gold'];?><span>我的金钱</span>
			</div>
			<div class="more">
				<a href="<?php echo WWW.URL('my',$data['user'],EXP.'thread'); ?>">查看更多<i class="fa fa-arrow-circle-right"></i></a>
			</div>
			</li>
			<li class="comments">
			<div class="visual">
				<i class="fa fa-comments"></i>
			</div>
			<div class="number">
				<?php echo $data['posts'];?><span>评论留言</span>
			</div>
			<div class="more">
				<a href="<?php echo WWW.URL('my',$data['user'],EXP.'post'); ?>">查看更多<i class="fa fa-arrow-circle-right"></i></a>
			</div>
			</li>
			
		</ul>
	</div>
	
	<div class="summary">
		<div class="box">
			<div class="title">
				最近发布
			</div>
			<ul>
                <?php foreach ($thread_data as $v): ?>
				<li><a href="<?php echo WWW.URL('thread','',EXP.$v['id']); ?>" target="_blank"><?php echo $v['title'];?></a></li>
                <?php endforeach ?>

			</ul>
		</div>
		<div class="box">
			<div class="title">
				最近评论
			</div>
			<ul>
                <?php foreach ($post_data as $v): ?>
				<li><a href="<?php echo WWW.URL('thread','',EXP.$v['tid']); ?>" target="_blank"><?php echo $v['content'];?></a></li>
                <?php endforeach ?>

			</ul>
		</div>
	</div>
	
	<div class="fast-navigation">
		<div class="nav-title">
			快捷菜单
		</div>
		<ul>
			
			<?php if (IS_LOGIN): ?>
			<?php if (NOW_UID != $data['id']): ?>
			<li><a href="javascript:void(0);" onclick="new_chat('<?php echo $data['user'];?>','',444,465,<?php echo $data['id'];?>,'<?php echo $data['user'];?>','<?php echo $data['avatar']['b'];?>','<?php echo $data['ps'];?>')" style="color:#368bbf"><i class="fa fa-send"></i>聊天</a></li>
			<li><a href="javascript:void(0);" onclick="friend(<?php echo $data['id'];?>,this)" style="color:#c12397"><i class="fa fa-<?php if ($data['friend_state']): ?>star<?php else: ?>star-o<?php endif ?>"></i><span id="star"><?php if ($data['friend_state']): ?>取消关注<?php else: ?>关注<?php endif ?></span></a></li>
			<?php endif ?>
			<?php endif ?>
			<li><a href="<?php echo WWW;?>"><i class="fa fa-home"></i>网站首页</a></li>

			<li>
			<a href="<?php echo WWW.URL('post',''); ?>">
			<i class="fa fa-pencil-square-o"></i>发布文章</a></li>

			<?php if (NOW_UID == $data['id']): ?>
			<li><a href="<?php echo WWW.URL('my',$data['user'],EXP.'file'); ?>"><i class="fa fa-file-o"></i>我的文件</a></li>
			<li><a href="<?php echo WWW.URL('my',$data['user'],EXP.'op'); ?>"><i class="fa fa-cog"></i>修改资料</a></li>
			
			<li><a href="<?php echo WWW;?>user<?php echo EXP;?>out"><i class="fa fa-power-off"></i>注销登录</a></li>
			<?php endif ?>
			
		</ul>
	</div>
	
</div>

<script type="text/javascript">
function friend(uid,obj){
    friend_state(uid,function(b,m){
        
        if(m){
        	$(".fa-star-o").addClass("fa-star");
            $(".fa-star-o").removeClass("fa-star-o");
        	
            
            $("#star").text("取消关注");
        }
        else{

            $(".fa-star").addClass("fa-star-o");
            $(".fa-star").removeClass("fa-star");
            $("#star").text("关注");
        }
    })
}
function friend_state(uid,callback){
	$.ajax({
		url: www+'friend'+exp+'friend_state',
		type:"POST",
		cache: false,
		data:{
			uid:uid,
		},
		dataType: 'json'
	}).then(function(e) {
		callback(e.error,e.id);
	}, function() {
		swal("失败", "请尝试重新提交", "error");
	});
}
</script>


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
	<style type="text/css">
	.lt-dlg-box *{
		    font: 500 .875em PingFang SC,Lantinghei SC,Microsoft Yahei,Hiragino Sans GB,Microsoft Sans Serif,WenQuanYi Micro Hei,sans;
	}
	</style>

</div>
</div>
</div>
</div>
</div>
	
	
    </body>
</html>

