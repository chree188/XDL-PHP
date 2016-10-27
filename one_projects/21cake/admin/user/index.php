<?php 
	include '../init.php';

	if(empty($_POST['tel'])){
		$sql = 'select `id`,`tel`,`nickname`,`sex`,`birthday`,`email`,`icon`,`status`,`regtime` from user order by id asc';
	}else{
		$sql =  'select `id`,`tel`,`nickname`,`sex`,`birthday`,`email`,`icon`,`status`,`regtime`  from user   where tel like "%'.htmlentities($_POST['tel']).'%" order by id asc';
	}


	// echo $sql;exit;

	$result = page($sql);
	// var_dump($result);
	$user_list = $result[1];
	$page = $result[0];
	// insert into user values
	// (null,'13345678890','何亚飞',md5('123456'),2, '1991-10-25', 'heyafei125927@163.com',default,default, UNIX_TIMESTAMP()),
	// (null,'13345678891','曾侃熙',md5('123456'),1, '1992-10-25', 'heyafei125927@163.com',default,default, UNIX_TIMESTAMP()),
	// (null,'13345678892','张亮',md5('123456'),2, '1993-10-25', 'heyafei125927@163.com',default,default, UNIX_TIMESTAMP()),
	// (null,'13345678893','徐剑',md5('123456'),1, '1994-10-25', 'heyafei125927@163.com',default,default, UNIX_TIMESTAMP()),
	// (null,'13345678894','德总',md5('123456'),2, '1995-10-25', 'heyafei125927@163.com',default,default, UNIX_TIMESTAMP()),
	// (null,'13345678895','吴总',md5('123456'),2, '1996-10-25', 'heyafei125927@163.com',default,default, UNIX_TIMESTAMP());


 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<style>
		.table {
			border-collapse: collapse;
			border-style: solid;
			border-width: 2px;
			width: 100%;
			/*height:800px;*/
		}

		.table tr{height:120px;}
		.table tr:first-child{height:50px;}

		.table th{
			background:#EFF4F7;
			border:2px solid #C7D0D7;
		}
		.table td {
			border:2px solid #C7D0D7;
			text-align:center;
			color:#4C5154;
			font-family:Arial;
			font-size:14px;
			padding:5px
		}

		.table tr:hover{background-color: #EFF4F7;}

		.pc{color:red;height:34px;border:1px solid #e1e2e3;display:inline-block;cursor:pointer;text-align:center;color:blue;margin:0 2px;padding:0 10px;line-height:34px;}

		.pc:hover{
		    border:1px solid #3388FF;
		    background: #F2F8FF;
		}

		.page{
		    text-align: right;
		    margin-top: 15px;
		}

		.search{
        font-size: 13px;
        min-height: 32px;
        margin: 0;
        padding: 7px 8px;
        outline: none;
        color: #333;
        background-color: #fff;
        background-repeat: no-repeat;
        background-position: right center;
        border: 1px solid #ccc;
        border-radius: 3px;
        box-shadow: inset 0 1px 2px rgba(0,0,0,0.075);
        -moz-box-sizing: border-box;
        box-sizing: border-box;
        transition: all 0.15s ease-in;
        -webkit-transition: all 0.15s ease-in 0;
        vertical-align: middle;
      }

	    .button {
	        position: relative;
	        display: inline-block;
	        margin: 0;
	        padding: 8px 15px;
	        font-size: 13px;
	        font-weight: bold;
	        color: #333;
	        text-shadow: 0 1px 0 rgba(255,255,255,0.9);
	        white-space: nowrap;
	        background-color: #eaeaea;
	        background-image: -moz-linear-gradient(#fafafa, #eaeaea);
	        background-image: -webkit-linear-gradient(#fafafa, #eaeaea);
	        background-image: linear-gradient(#fafafa, #eaeaea);
	        background-repeat: repeat-x;
	        border-radius: 3px;
	        border: 1px solid #ddd;
	        border-bottom-color: #c5c5c5;
	        box-shadow: 0 1px 3px rgba(0,0,0,.05);
	        vertical-align: middle;
	        cursor: pointer;
	        -moz-box-sizing: border-box;
	        box-sizing: border-box;
	        -webkit-touch-callout: none;
	        -webkit-user-select: none;
	        -khtml-user-select: none;
	        -moz-user-select: none;
	        -ms-user-select: none;
	        user-select: none;
	        -webkit-appearance: none;
	      }
	    .button:hover{
	        background-position: 0 -15px;
	        border-color: #ccc #ccc #b5b5b5;
	      }

	    .search:focus {
	        outline: none;
	        border-color: #51a7e8;
	        box-shadow: inset 0 1px 2px rgba(0,0,0,.075), 0 0 5px rgba(81,167,232,.5);
	      }

	    #search .search{
	        font-size: 18px;
	        width: 705px;
	      }
	    #search .button {
	        padding: 10px;
	        width: 90px;
	      }

	    .container { margin: 30px auto 40px auto;  text-align: center; } 

	</style>
</head>
<body>
	<div class="container">
	    <div id="search">
	      <form action="index.php" method='post'>
	      	 Tel : <input type="text" name="tel" class='search'>
	      	<input class="button" type="submit" value="Search" >
	      </form>
	    </div>
	</div>
	<table class='table'>
		<tr>
			<th>头像</th>
			<th>编号</th>
			<th>手机号</th>
			<th>昵称</th>
			<th>性别</th>
			<th>生日</th>
			<th>邮箱</th>
			<th>状态</th>
			<th>注册时间</th>
			<th>操作</th>
		</tr>
		<?php if(empty($user_list)): ?>
			<tr><td colspan=10>找不到您搜索的内容....</td></tr>
		<?php else: ?>
			<?php foreach($user_list as $v): ?>
				<tr>
					<td>
						<?php if(empty($v['icon'])): ?>
							<img src="<?= PUB_IMG?>icon.jpg" width=50>
						<?php else: ?>
						<?php 
							// 解析图片的路径
							// $filepath = URL.'uploads/';
							// $filepath .= substr($v['icon'],0,4).'/';
							// $filepath .= substr($v['icon'],4,2).'/';
							// $filepath .= substr($v['icon'],6,2).'/';
							// $filepath .= '50_'.$v['icon'];
							// echo '<img src="'.$filepath.'" width=50>';
						 ?>
						<img src="<?= img_url($v['icon'],50)?>" width=50>
						<?php endif; ?>
					</td>
					<td><?= $v['id']?></td>
					<td><?= $v['tel']?></td>
					<td><?= $v['nickname']?></td>
					<td><?= $v['sex']?></td>
					<td><?= $v['birthday']?></td>
					<td><?= $v['email']?></td>
					
					<td><a href="action.php?bz=status&id=<?= $v['id']?>&status=<?= $v['status']?>"><?= $v['status']==1?'激活':'禁用'; ?></a></td>

					<td><?= date('Y-m-d h:i:s',$v['regtime'])?></td>
					<td>
						<a href="edit.php?id=<?= $v['id']?>">编辑</a>
						<a href="action.php?bz=del&id=<?= $v['id']?>&icon=<?=$v['icon']?>">删除</a>
					</td>
				</tr>
			<?php endforeach; ?>
		<?php endif;?>
	</table>
	<?= $page ?>

</body>
</html>