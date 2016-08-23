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
    
    
    <div class="wrap-box">
      <a href="<?php echo WWW;?>">论坛首页</a>
      
      <?php $tmp_fid = forum($forum,$thread_data['fid'],'fid'); ?>
   
<?php
$tmp_str = '';
  while ($tmp_fid != -1) { 
    $tmp_str='<span class="dhsp"> > </span><a href="' .WWW.URL('forum','',EXP.forum($forum,$tmp_fid,'id')).'">'.forum($forum,$tmp_fid,'name').'</a>'.$tmp_str;
    if(forum($forum,$tmp_fid,'fid') != -1){
      $tmp_fid = forum($forum,$tmp_fid,'fid');
    }else{
      break; 
    }
  }
  echo $tmp_str;
?>


      <span class="dhsp"> > </span> 
      <a href="<?php echo WWW.URL('forum','',EXP.forum($forum,$thread_data['fid'],'id')) ?>"><?php echo forum($forum,$thread_data['fid'],'name'); ?></a>
    </div>
    <div class="h-20"></div>
    
    <div class="wrap-box t-info">
      <div class="head">
        <h1>
          <?php echo $thread_data['title'];?><?php if ($thread_data['state']): ?><span title="禁止回复" style="    color: brown;"> - 已锁定</span><?php endif ?>
        </h1>
        <div class="meta">
          <a href="<?php echo WWW.URL('my',$thread_data['user']); ?>" target="_blank">
            <?php echo $thread_data['user'];?>
          </a>
          &nbsp;&nbsp;·&nbsp;&nbsp;<?php echo humandate($thread_data['atime']); ?>
          &nbsp;&nbsp;·&nbsp;&nbsp;
          <a href="<?php echo WWW.URL('forum',$thread_data['fid']); ?>" >
            
            <?php echo forum($forum,$thread_data['fid'],'name'); ?>
          </a>
        </div>
        <a href="<?php echo WWW.URL('my',$thread_data['user']); ?>" class="avatar" target="_blank">
          <img src="<?php echo WWW;?><?php echo $thread_data['avatar']['b'];?>" pos="left" width="60" height="60" class="circle js-info" uid="<?php echo $thread_data['uid'];?>">
        </a>
      </div>
      <div class="content typo editor-style">
        
        <?php if ($thread_data['show'] && $thread_data['gold_show']): ?>
      	<?php echo $post_data['content'];?>
        <?php else: ?>
          <?php if ($thread_data['gold_show']): ?>
          <blockquote style="color: #B75C5C;font-weight: bold;">
          内容被隐藏,你需要回复主题后才可见.
          </blockquote>
          <?php else: ?>
          <blockquote style="color: #B75C5C;font-weight: bold;">
          主题内容你需要付费可见 <a href="javascript:void(0);" onclick="buy_thread(<?php echo $thread_data['id'];?>,<?php echo $thread_data['gold'];?>)">(点击购买)</a> 售价：<?php echo $thread_data['gold'];?> 金币
          </blockquote>
          <?php endif ?>
        <?php endif ?>
        
      </div>
      <div class="actions">

        <a href="javascript:void(0);" class=""  onclick="tp('thread1',<?php echo $thread_data['id'];?>,this)">
            支持&nbsp;&nbsp;<span style="padding:0"><?php echo $thread_data['goods'];?></span>
        </a>
        <span class="grey">|</span>
        <a href="javascript:void(0);" class="" onclick="tp('thread2',<?php echo $thread_data['id'];?>,this)">
            反对&nbsp;&nbsp;<span style="padding:0"><?php echo $thread_data['nos'];?></span>
        </a>
        <?php if (IS_LOGIN ): ?> 
          <?php $arr = explode(",",forum($forum,$thread_data['fid'],'forumg')); ?>
            <?php if ($thread_data['uid'] == $user['id'] || $user['group'] == C("ADMIN_GROUP") || is_forumg($forum,$user['id'],$thread_data['fid'])): ?>
            <span class="grey">|</span>
            <a class="" href="<?php echo WWW.URL('post','edit',EXP.'id'.EXP.$post_data['id']);  ?>">编辑</a>
          
            <span class="grey">|</span>
            <a href="javascript:void(0);" class="" onclick="del_thread(<?php echo $thread_data['id'];?>,'thread')" >删除主题</a>

            <span class="grey">|</span>
            <a href="javascript:void(0);" class="" onclick="set_state(<?php echo $thread_data['id'];?>,<?php echo $thread_data['state'];?>)" ><?php if ($thread_data['state']): ?>解锁帖子<?php else: ?>锁定帖子<?php endif ?></a>

            <?php endif ?>
            <?php if ($user['group'] == C("ADMIN_GROUP")): ?>
            <span class="grey">|</span>
                <?php if ($thread_data['top'] == 1): ?>

                <a href="javascript:void(0);" class="" onclick="thread_top(<?php echo $thread_data['id'];?>,'off',1)" >取消板块置顶</a>
                <?php else: ?>
                <a href="javascript:void(0);" class="" onclick="thread_top(<?php echo $thread_data['id'];?>,'on',1)" >板块置顶</a>
                <?php endif ?>

            
                <!-- 管理员权限 -->
                <span class="grey">|</span>
                <?php if ($thread_data['top'] == 2): ?>
                <a href="javascript:void(0);" class="" onclick="thread_top(<?php echo $thread_data['id'];?>,'off',2)" >取消全站置顶</a>
                <?php else: ?>
                <a href="javascript:void(0);" class="" onclick="thread_top(<?php echo $thread_data['id'];?>,'on',2)" >全站置顶</a>
                <?php endif ?>

            <?php endif ?>
            <?php if (is_forumg($forum,$user['id'],$thread_data['fid']) ): ?>
                <span class="grey">|</span>
                <?php if ($thread_data['top'] == 1): ?>
                <a href="javascript:void(0);" class="" onclick="thread_top(<?php echo $thread_data['id'];?>,'off',1)" >取消板块置顶</a>
                <?php else: ?>
                <a href="javascript:void(0);" class="" onclick="thread_top(<?php echo $thread_data['id'];?>,'on',1)" >板块置顶</a>
                <?php endif ?>
            <?php endif ?>


          <?php endif ?>



        <!-- <span class="pull-right grey-dark">
          1 人收藏
        </span> -->
      </div>
    </div>
    <?php if ($thread_data['files']): ?>
    <div class="h-20"></div>
    <div class="wrap-box">
    <h2 style="border-bottom: solid #E6E6E6 1px;padding-bottom: 10px;">附件列表</h2>
     <?php foreach ($filelist as $v): ?>
     <?php if ($v['show']): ?>
      <p style="padding:10px 0;font-size:18px">
        <a href="javascript:void(0);" onclick="hy_downfile(<?php echo $v['id'];?>)"><?php echo $v['name'];?></a>
        <i style="color: grey;    font-size: 14px;">&nbsp;&nbsp;文件大小:<?php echo round($v['size']/1024/1024,3); ?>M (下载次数：<?php echo $v['downs'];?>)</i>
        <?php if ($v['gold']): ?>
        <span style="color: brown;"> &nbsp;&nbsp;售价:<?php echo $v['gold'];?></span>
        <?php endif ?>
      </p>
      <?php else: ?>
      <p style="padding:10px 0;font-size:18px">
        <a href="javascript:void(0);" style="color: #c31d1d;">有附件被隐藏,你需要回复后可见</a>
      </p>
     <?php endif ?>
     <?php endforeach ?>
    </div>
    <?php endif ?>

    <div class="h-20"></div>
    <div class="typo comments">
      <div class="wrap-box comment-list">
        <div class="head">
          <?php echo $thread_data['posts'];?> 条回复 &nbsp;
          <span class="grey">|</span>
          &nbsp;直到 <?php echo humandate($thread_data['btime']); ?>
          <span class="grey">|</span>
          <?php echo $thread_data['views'];?> 次浏览
          <div class="pull-right">
            <a href="?order=desc">最新回复</a>
            <span class="grey">|</span>
            <a href="?">最早回复</a>
          </div>
        </div>
		<?php foreach ($PostList as $k => $v): ?>
        <div class="item">
          <a name="reply26"></a>
          <a href="<?php echo WWW.URL('my',$v['user']); ?>" class="avatar" target="_blank">
            <img class="circle js-unveil js-info" uid="<?php echo $v['uid'];?>" pos="right" src="<?php echo WWW;?><?php echo $v['avatar']['b'];?>">
          </a>
          <div class="r">
            <p class="meta">
              <a href="<?php echo WWW.URL('my',$v['user']); ?>" class="author" target="_blank">
                <?php echo $v['user'];?>
              </a>
              <span class="time">
                <?php echo $v['atime_str'];?>
              </span>
              <span class=" pull-right" >
                <a href="javascript:void(0);" class="" onclick="tp('post1',<?php echo $v['id'];?>,this)">
                    支持&nbsp;&nbsp;<span style="padding:0"><?php echo $v['goods'];?></span>
                </a>
                <span class="grey">|</span>
                <a href="javascript:void(0);" class="" onclick="tp('post2',<?php echo $v['id'];?>,this)">
                    反对&nbsp;&nbsp;<span style="padding:0"><?php echo $v['nos'];?></span>
                </a>

                <?php if (IS_LOGIN ): ?>

                    
                    <?php if ($v['uid'] == $user['id'] || $user['group'] == C("ADMIN_GROUP")): ?>
                        <!-- 帖子作者 或者 管理员 -->
                        <span class="grey">|</span>
                        <a class="" href="<?php echo WWW.URL('post','edit',EXP.'id'.EXP.$v['id']);  ?>">编辑</a>
                    <?php endif ?>
                    <?php if ($v['uid'] == $user['id'] || $user['group'] == C("ADMIN_GROUP") || is_forumg($forum,$user['id'],$thread_data['fid'])): ?>
                        <!-- 作者 与 管理员 判断 -->
                        <span class="grey">|</span>
                        <a href="javascript:void(0);" class="" onclick="del_thread(<?php echo $v['id'];?>,'post')" >删除帖子</a>
                    <?php endif ?>
                    
                <?php endif ?>
              </span>

            </p>
            <div class="text typo editor-style">
            
              <?php echo $v['content'];?>
            
            </div>
          </div>

        </div>
        <?php endforeach ?>
      </div>
      <div class="h-20"></div>
      <div class="wrap-box">
      
        <a href="<?php if ($pageid==1): ?>javascript:void(0);<?php else: ?><?php echo WWW.URL('thread',$thread_data['id'],EXP . ($pageid-1)); ?><?php echo X("get.order")?"?order=desc":''; ?><?php endif ?>"  class="btn bg-primary <?php if ($pageid==1): ?>disabled<?php endif ?>" >上一页</a>
			<a href="<?php if ($pageid==$page_count): ?>javascript:void(0);<?php else: ?><?php echo WWW.URL('thread',$thread_data['id'],EXP . ($pageid+1)); ?><?php echo X("get.order")?"?order=desc":''; ?><?php endif ?>" class="btn bg-primary large pull-right <?php if ($pageid==$page_count): ?>disabled<?php endif ?>" >下一页</a>
      
	  </div>
	  <div class="h-20"></div>
      <div class="wrap-box">
      <link href="<?php echo WWW;?>Plugin/Simditor/css/simditor.css" type="text/css" rel="stylesheet">
        <?php if (IS_LOGIN): ?>
            <textarea id="editor"></textarea>

<button type="button" class="btn btn-primary" id="post_post"><i class="am-icon-check"></i> 发 表</button>
<style>
.simditor .simditor-toolbar > ul > li > .toolbar-item {
   
    width: 40px;
    outline: none;
    color: #333333;
    font-size: 15px;
    line-height: 40px;
    vertical-align: middle;
    text-align: center;
    text-decoration: none;
}
.toolbar-item-video img{
      padding-top: 10px;
}
</style>
<?php if (IS_LOGIN): ?>
<script type="text/javascript" src="<?php echo WWW;?>Plugin/Simditor/js/edit.min.js"></script>

<?php $eidt_inc = get_plugin_inc('Simditor');?>
<script>
<?php if (!empty($PostList)): ?>
window.data = {
    items:[
    <?php $tmp_user=array(); ?>
    <?php foreach ($PostList as $k => $v): ?>
        <?php if(isset($tmp_user[$v['user']])){continue;} $tmp_user[$v['user']]=true; ?>
      {
        id:<?php echo $v['uid'];?>,
        name:"<?php echo $v['user'];?>",
        pinyin:"<?php echo $v['user'];?>",
        avatar:"<?php echo WWW;?><?php echo $v['avatar']['c'];?>",
        summary:"<?php if ($eidt_inc['su']): ?>回复 #<?php echo $k+1;?> <?php echo addslashes(preg_replace("/\s/","",mb_substr(strip_tags($v['content']), 0,100))); ?> <?php endif ?>"
        

      
      },
    <?php endforeach ?>
    ],
  };
<?php else: ?>
window.data = {
    items:[
        {
        id:0,
        name:"空",
        pinyin:"kong"
      
      },
    ],
  };
<?php endif ?>



    $(function(){

var edit_bool = function(){};
function edit_init(){
    editor = new Simditor({
      textarea: $('#editor'),
      height: '200',
      upload: {
        url: www+'post'+exp+'upload',
        defaultImage: www+'Public/A/image/image.png',
        params: null,
        fileKey: 'photo',
        connectionCount: 12,
        leaveConfirm: '上传失败?'
      },
      pasteImage:true,
      toolbar: [<?php echo $eidt_inc['toolbar'];?>],
      emoji: {imagePath: www+'Plugin/Simditor/emoji/'},
      allowedTags:[<?php echo $eidt_inc['allowedTags'];?>],
      allowedAttributes: {<?php echo $eidt_inc['allowedAttributes'];?>},
      mention:window.data

      //optional options
    });
}
edit_init();

        $("#post_post").click(function(){
          var _obj = $(this);
        _obj.attr('disabled','disabled');
        _obj.text("提交中...");

           if(editor.body.html().indexOf('class="uploading"') != -1){
              _obj.removeAttr('disabled');
                _obj.text("发 表");
              swal("失败", "你有图片未成功上传,请删除失败图片后再提交", "error");
              return;
            }
      
            var forum = $("#forum").val();
            $.ajax({
             url: '<?php echo WWW.URL('post','post','');?>',
             type:"POST",
             cache: false,
             data:{
                 id:<?php echo $id;?>,
                 content:editor.body.html(),
                 
             },
             dataType: 'json'
         }).then(function(e) {
             if(e.error){
                SimditorAutosave.prototype.remove();
                // setTimeout(function(){
                     window.location.reload();
                 //},1000);
             }else{
                _obj.removeAttr('disabled');
                _obj.text("发 表");
                swal(e.error?"发表成功":"发表失败", e.info, e.error?"success": "error");
             }
           }, function() {
                _obj.removeAttr('disabled');
                _obj.text("发 表");
                swal("失败", "请尝试重新提交", "error");
           });
        })
    })
</script>
<?php endif ?>
        <?php else: ?>
            <a href="<?php echo WWW;?>user<?php echo EXP;?>login">登陆</a>后才可发表内容
        <?php endif ?>
      

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

