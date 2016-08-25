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

	<div id="" class="wrap-box">
		
		<label>标题 <span></span></label>
<select id="forum" type="text" class="hy-text " style="width:150px;margin-bottom:10px">
<option value="-1">请选择分类</option>
<?php foreach ($forum as $v): ?>
<option value="<?php echo $v['id'];?>"><?php echo $v['name'];?></option>
<?php endforeach ?>
</select>
<input type="text" id="title" class="hy-text " placeholder="请填写标题">

<label>发表内容 <span></span></label>
<textarea id="editor" autofocus></textarea>

<div class="wrap-box" style="margin-top:10px">
    <input type="checkbox" id="thread-hide"> <label for="thread-hide"> 需要回复可见</label>
    <span class="grey">|</span>
     <label for="thread-gold"> 付费：</label> <input type="text" id="tgold" style="width:60px">
</div>



<div class="uploadifybox" >
<label for="file" style="display:block">上传附件</label>
<input id="file_upload" name="photo" type="file" multiple="true">
<!-- <button class="btn btn-primary" type="button" >选择我的历史上传文件</button> --> 
<form id="fileform" style="">
    <table class="upload-table">
        <thead>
            <th width="60">附件ID</th>
            <th width="400">附件名称</th>
            <th width="70">付费金币</th>
            <th>隐藏附件</th>
            <th>附件描述语</th>
            <th width="70">操作</th>
        </thead>
        <tbody id="filetable">
        
        </tbody>
    </table>
</form>
</div>
<script type="text/javascript">
    
        $(function() {
            $('#file_upload').uploadify({
                'formData'     : {

                    'timestamp' : '<?php echo NOW_TIME;?>',
                   
                },
                'buttonText': '选择文件[可多选]',
                'swf'      : '<?php echo WWW;?>public/uploadify/uploadify.swf',
                'uploader' : '<?php echo WWW;?>post<?php echo EXP;?>uploadfile',
                'height':30,
                //'removeCompleted' : false,
                //'checkExisting':false,
                'fileObjName' : 'photo',
                'formData':{ffmd5:"<?php echo cookie('HYBBS_HEX')?>"},
               
                onUploadSuccess : function(file, data, response) {
                    
                    var json = eval('('+data+')');
                    if(response){
                        
                        if(json.error){
                            $("#filetable").append('<tr><td><input class="fileid" name="fileid" type="text" value="'+json.id+'" disabled></td><td><input type="text" value="'+json.name+'" disabled></td><td><input class="filegold" name="filegold" type="text" value="0"></td><td><input type="checkbox" style="width: auto;margin:10px" class="filehide" value=""/>(回复可见)</td><td><input name="filemess" class="filemess" type="text" value=""></td><td><button style="    margin-top: 4px;" type="button" class="btn btn-primary" onclick="$(this).parent().parent().remove()">删除</button></td></tr>');
                            return;
                        }else{
                            swal(json.msg);
                        }

                    }
                    swal(json.msg);
                    
                    
                }
               
            });
        });
    </script>
<style type="text/css">
    
</style>


<button type="button" class="btn btn-primary" id="post1"><i class="am-icon-check"></i> 发 表</button>
<link href="<?php echo WWW;?>Plugin/Simditor/css/simditor.css" type="text/css" rel="stylesheet">
<link href="<?php echo WWW;?>public/uploadify/uploadify.css" type="text/css" rel="stylesheet">
<script src="<?php echo WWW;?>public/uploadify/jquery.uploadify.min.js"></script>
<style>
.simditor .simditor-toolbar > ul > li > .toolbar-item {
    display: table-cell;
    width: 40px;
    height: 40px;
    outline: none;
    color: #333333;
    font-size: 15px;
    line-height: 40px;
    vertical-align: middle;
    text-align: center;
    text-decoration: none;
}

</style>
<script type="text/javascript" src="<?php echo WWW;?>Plugin/Simditor/js/edit.min.js"></script>
<!-- <script type="text/javascript" src="<?php echo WWW;?>Plugin/Simditor/js/module.js"></script>
<script type="text/javascript" src="<?php echo WWW;?>Plugin/Simditor/js/hotkeys.js"></script>
<script type="text/javascript" src="<?php echo WWW;?>Plugin/Simditor/js/uploader.js"></script>
<script type="text/javascript" src="<?php echo WWW;?>Plugin/Simditor/js/simditor.js"></script>
<script type="text/javascript" src="<?php echo WWW;?>Plugin/Simditor/js/simditor-autosave.js"></script>
<script type="text/javascript" src="<?php echo WWW;?>Plugin/Simditor/js/simditor-emoji.js"></script>
<script type="text/javascript" src="<?php echo WWW;?>Plugin/Simditor/js/simditor-mark.js"></script>
<script type="text/javascript" src="<?php echo WWW;?>Plugin/Simditor/js/simditor-mention.js"></script>

<script type="text/javascript" src="<?php echo WWW;?>Plugin/Simditor/js/simditor-html.js"></script> -->



<script>

<?php $eidt_inc = get_plugin_inc('Simditor');?>

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
          autosave: 'editor-content',
          pasteImage:true,
          toolbar: [<?php echo $eidt_inc['toolbar'];?>],
          emoji: {imagePath: www+'Plugin/Simditor/emoji/'},
          allowedTags:[<?php echo $eidt_inc['allowedTags'];?>],
          allowedAttributes: {<?php echo $eidt_inc['allowedAttributes'];?>}

            

          //optional options
        });
    }
    edit_init();
    //window.post_index = false;
    $("#post1").click(function(){
      var _obj = $(this);
        _obj.attr('disabled','disabled');
        _obj.text("提交中...");

      if(editor.body.html().indexOf('class="uploading"') != -1){
        _obj.removeAttr('disabled');
        _obj.text("发 表");
        swal("失败", "你有图片未成功上传,请删除失败图片后再提交", "error");
        return;
      }


        var fileid='';
        var filegold='';
        var filemess='';
        var filehide = '';
        $(".fileid").each(function(e){
            fileid+=$(this).val()+'||';
        });
        $(".filegold").each(function(e){
            filegold+=$(this).val()+'||';
        });
        $(".filemess").each(function(e){
            filemess+=$(this).val()+'||';
        });
        $(".filehide").each(function(e){
            filehide+=($(this).is(':checked')?'1':0)+'||';
        });

        

        var forum = $("#forum").val();
        $.ajax({
         url: '<?php echo WWW.URL('post','','');?>',
         type:"POST",
         cache: false,
         data:{
             title:$("#title").val(),
             content:editor.body.html(),
             forum:forum,
             fileid:fileid,
             filegold:filegold,
             filemess:filemess,
             filehide:filehide,
             thide:($("#thread-hide").is(':checked')?1:0),
             tgold:$("#tgold").val(),
             
         },
         dataType: 'json'
     }).then(function(e) {
         
         if(e.error){
            SimditorAutosave.prototype.remove();
            window.location.href="<?php echo WWW.URL('thread','','','\/');?>"+e.id + "<?php echo EXT;?>";
             
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
