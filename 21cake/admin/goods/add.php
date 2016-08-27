<?php 
	include '../init.php'; 

	$sql = 'select id,name,pid,path, concat(path,id,",") px from category order by px';

	$list = query($sql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="<?= PUB_JS?>kind/themes/default/default.css">
	<script src='<?= PUB_JS?>kind/kindeditor-min.js'></script>
	<script src='<?= PUB_JS?>kind/lang/zh_CN.js'></script>
	<script>
			var editor;
			KindEditor.ready(function(K) {
				// textarea标签的name名
				editor = K.create('textarea[name="desc"]', {
					resizeType : 1,
					allowPreviewEmoticons : false,
					allowImageUpload : false,
					items : [
						'fontname', 'fontsize', '|', 'forecolor', 'hilitecolor', 'bold', 'italic', 'underline',
						'removeformat', '|', 'justifyleft', 'justifycenter', 'justifyright', 'insertorderedlist',
						'insertunorderedlist', '|', 'emoticons', 'image', 'link']
				});

				// 富文本编辑内容 编辑
				// editor.html(' <?=  $v['desc']?>  ');
			});
	</script>
</head>
<body>
	<fieldset>
		<legend>新增商品</legend>
		<form action="action.php?bz=add" method='post' enctype='multipart/form-data'>
			<p>商品名: <input type="text" name='name'  ></p>
			<p>分类:
				<select name="cid">
					<?php foreach($list as $v): ?>
						<?php 
							// 分类的排版
							$nbsp = str_repeat('---', substr_count($v['path'],',')-1) ;   
						 ?>
						<option value="<?= $v['id']?>"><?= $nbsp.$v['name']?></option>
					<?php endforeach; ?>
				</select>
			</p>
			<p>价格: <input type="text" name='price' ></p>
			<p>上架: 
				<label> <input type="radio" name="up" value=1 checked>Yes</label>
				<label> <input type="radio" name="up" value=2>No</label>
			</p>
			<p>热销: 
				<label> <input type="radio" name="hot" value=1 >Yes</label>
				<label> <input type="radio" name="hot" value=2 checked>No</label>
			</p>
			<p>头像: <input type="file" name='icon' ></p>
			<p> <input type="submit" value='新增' ></p>
		</form>
	</fieldset>
</body>
</html>