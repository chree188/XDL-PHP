<?php 
	include '../init.php';

	$pid = empty($_GET['pid'])? 0: $_GET['pid'] ;
	if(empty($_POST['name'])){
		$sql = 'select `id`,`name`,`pid`,`path`,`display` from category where pid = '.$pid;
	}else{
		$sql =  'select `id`,`name`,`pid`,`path`,`display` from category where name  like "%'.htmlentities($_POST['name']).'%" ';
	}
	
	// echo $sql;exit;

	$result = page($sql);
	// var_dump($result);
	$user_list = $result[1];
	$page = $result[0];

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
	      	Category Name : <input type="text" name="name" class='search'>
	      	<input class="button" type="submit" value="Search" >
	      </form>
	    </div>
	</div>
	
	<a href="index.php?pid=<?= $list[0]['pid']?>" style="margin-bottom:5px; text-decoration: none; color:#cab;"> [ 返回上一级分类 ] </a>

	<table class='table'>
		<tr>
			<th>编号</th>
			<th>分类名</th>
			<th>PID</th>
			<th>PATH</th>
			<th>Display</th>
			<th>操作</th>
		</tr>
		<?php if(empty($user_list)): ?>
			<tr><td colspan=10>找不到您搜索的内容....</td></tr>
		<?php else: ?>
			<?php foreach($user_list as $v): ?>
				<tr>
					<td><?= $v['id']?></td>
					<td><?= $v['name']?></td>
					<td><?= $v['pid']?></td>
					<td><?= $v['path']?></td>
					<td><a href='action.php?bz=display&id=<?= $v['id']?>&display=<?= $v['display']?>'><?= $v['display']==1?'显示':'隐藏';     ?></a></td>
					<td>
						<a href="index.php?pid=<?= $v['id']?>">查看子分类</a>
						<a href="add.php?id=<?= $v['id']?>&path=<?= $v['path']?>">添加子分类</a>
						<a href="edit.php?id=<?= $v['id']?>">编辑</a>
						<a href="action.php?bz=del&id=<?= $v['id']?>">删除</a>
					</td>
				</tr>
			<?php endforeach; ?>
		<?php endif; ?>

		
	</table>
	<?= $page ?>
</body>
</html>