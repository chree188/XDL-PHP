<html>
<head>
<meta charset=utf-8 />
<link href="../include/css/css.css" type="text/css" rel="stylesheet" />
<link href="../include/css/main.css" type="text/css" rel="stylesheet" />
<style> body {
	overflow-x: hidden;
	background: #f2f0f5;
	padding: 15px 0px 10px 5px;
}

#searchmain {
	font-size: 12px;
}

#search {
	font-size: 12px;
	background: #548fc9;
	margin: 10px 10px 0 0;
	display: inline;
	width: 100%;
	color: #FFF;
	float: left
}

#search form span {
	height: 40px;
	line-height: 40px;
	padding: 0 0px 0 10px;
	float: left;
}

#search form input.text-word {
	height: 24px;
	line-height: 24px;
	width: 180px;
	margin: 8px 0 6px 0;
	padding: 0 0px 0 10px;
	float: left;
	border: 1px solid #FFF;
}

#search form input.text-but {
	height: 24px;
	line-height: 24px;
	width: 55px;
	background: url(../include/images/main/list_input.jpg) no-repeat left top;
	border: none;
	cursor: pointer;
	font-family: "Microsoft YaHei", "Tahoma", "Arial", '宋体';
	color: #666;
	float: left;
	margin: 8px 0 0 6px;
	display: inline;
}

#search a.add {
	background: url(../include/images/main/add.jpg) no-repeat -3px 7px #548fc9;
	padding: 0 10px 0 26px;
	height: 40px;
	line-height: 40px;
	font-size: 14px;
	font-weight: bold;
	color: #FFF;
	float: right
}

#search a:hover.add {
	text-decoration: underline;
	color: #d2e9ff;
}

#main-tab {
	border: 1px solid #eaeaea;
	background: #FFF;
	font-size: 12px;
}

#main-tab th {
	font-size: 12px;
	background: url(../include/images/main/list_bg.jpg) repeat-x;
	height: 32px;
	line-height: 32px;
}

#main-tab td {
	font-size: 12px;
	line-height: 40px;
}

#main-tab td a {
	font-size: 12px;
	color: #548fc9;
}

#main-tab td a:hover {
	color: #565656;
	text-decoration: underline;
}

.bordertop {
	border-top: 1px solid #ebebeb
}

.borderright {
	border-right: 1px solid #ebebeb
}

.borderbottom {
	border-bottom: 1px solid #ebebeb
}

.borderleft {
	border-left: 1px solid #ebebeb
}

.gray {
	color: #dbdbdb;
}

.num {
	color: #538ec6;
	font-family: "Georgia", "Tahoma", "Arial";
}

span.num {
	font-size: 30px;
	color: #538ec6;
	font-family: "Georgia", "Tahoma", "Arial";
}

td.fenye {
	padding: 10px 0 0 0;
	text-align: right;
}

.bggray {
	background: #f9f9f9
}

</style>
</head>
<body>
	<?php
		//输出删除失败的提示
		$_GET['errno'] = empty($_GET['errno']) ? '' : $_GET['errno'];
		switch($_GET['errno']){
			case 1: echo "<h3 style='color:red'>删除失败!</h3>";
			break;
		}
		
		//设置报错情况	去除notice错误
		error_reporting(E_ALL ^ E_NOTICE)

	?>
<!--main_top-->
<table width="99%" border="0" cellspacing="0" cellpadding="0" id="searchmain">
  <tr>
    <td width="99%" align="left" valign="top">您的位置：商品管理</td>
  </tr>
  <tr>
    <td align="left" valign="top">
    <table width="100%" border="0" cellspacing="0" cellpadding="0" id="search">
  		<tr>
   		 <td width="90%" align="left" valign="middle">
	         <form action="index.php">
			 <?php $_GET['name'] = empty($_GET['name'])? "":$_GET['name']; ?>
	         <span>关键字：</span>
	         <input type="text" name="name" value="<?php echo $_GET['name']; ?>" class="text-word">
	         <input name="" type="submit" value="查询" class="text-but">
	         </form>
         </td>
  		  <td width="10%" align="center" valign="middle" style="text-align:right; width:150px;"><a href="add.php" target="mainFrame" onFocus="this.blur()" class="add">新增商品</a></td>
  		</tr>
	</table>
    </td>
  </tr>
  <tr>
    <td align="left" valign="top">
    
    <table width="100%" border="0" cellspacing="0" cellpadding="0" id="main-tab">
      <tr>
      	<th align="center" valign="middle" class="borderright">序号</th>
        <th align="center" valign="middle" class="borderright">ID</th>
        <th align="center" valign="middle" class="borderright">图片</th>
        <th align="center" valign="middle" class="borderright">父类别</th>
        <th align="center" valign="middle" class="borderright">商品名称</th>
        <th align="center" valign="middle" class="borderright">生产厂家</th>
        <th align="center" valign="middle" class="borderright">描述</th>
        <th align="center" valign="middle" class="borderright">单价</th>
        <th align="center" valign="middle" class="borderright">状态</th>
        <th align="center" valign="middle" class="borderright">库存量</th>
        <th align="center" valign="middle" class="borderright">销量</th>
        <th align="center" valign="middle" class="borderright">添加时间</th>
        <th align="center" valign="middle">操作</th>
      </tr>
      
      <?php
			//查看类别信息 select 输出到表格里面
			//设置默认时区
			date_default_timezone_set('PRC');
			//设置状态
			$state = array("1"=>"新添加","2"=>"在售","3"=>"下架");
			//反数据库商品状态
			$unstate = array("新添加"=>"1","在售"=>"2","下架"=>"3");
			//六脉神剑 
			//1 导入数据库配置文件
			include("../../public/sql/dbconfig.php");
			//2 连接数据库
			$link = @mysqli_connect(HOST,USER,PASS) or die("数据库连接失败");
			//3 设置字符集 选择数据库
			mysqli_set_charset($link,"utf8");
			mysqli_select_db($link,DBNAME);
			
			//=============封装搜索条件======================
			//1 设置数组接收搜索条件
				$wherelist = array();
				$urllist = array();	//封装url的状态维持的条件
			//2 接收搜索条件 
				$unstate[$_GET['name']] = empty($unstate[$_GET['name']])? "{$_GET['name']}" : $unstate[$_GET['name']];	//判断是否传除新添加 在售 下架之外的条件
				if(!empty($_GET['name'])){
					$wherelist[] =" (goods like '%{$_GET['name']}%' 
					or company like '%{$_GET['name']}%' 
					or descr like '%{$_GET['name']}%'
					or state like '%{$unstate[$_GET['name']]}%'
					or store like '%{$_GET['name']}%'
					or num like '%{$_GET['name']}%' )";
					$urllist[] = "name={$_GET['name']}";
				}
			//3 判断搜索条件的有效性	
				if(count($wherelist)>0){
					$where = " where ".implode(" and ",$wherelist);
					$url = "&".implode("&", $urllist);
				}

			//=============封装搜索条件======================
			
			/*================实现分页显示==================*/
//				1 设置参数
				$page = empty($_GET['p'])? 1 : $_GET['p'];	//页码
				$maxPage = 0;	//一共显示多少页
				$maxRow = 0;	//一共有多少条
				$pageSize = 6;	//每页显示多少条	页大小
//				2 一共多少条
				$sql = "select * from goods ".$where;
				$res = mysqli_query($link, $sql);
				$maxRow = mysqli_num_rows($res);
//				3 一共显示多少页
				$maxPage = ceil($maxRow/$pageSize);
//				4 判断页码 是否有效
				if($page>$maxPage){
					$page = $maxPage;
				}
				if($page<1){
					$page = 1;
				}
//				5 拼接limit
				$limit = " limit ".($page-1)*$pageSize.",".$pageSize;
			/*================实现分页显示==================*/
			
			//4 写sql语句 获得结果集 
			
			$sql = "select * from goods $where order by concat(typeid,id) $limit";
			$result = mysqli_query($link,$sql);
			//5 解析结果集 
			$i = 0;
			while($row = mysqli_fetch_assoc($result)){
				$i++;
				$addTime = date("Y-m-d H:i:s",$row['addtime']);	//格式化注册时间戳
$str = <<<swUse
				<tr onMouseOut="this.style.backgroundColor='#ffffff'" 
				onMouseOver="this.style.backgroundColor='#edf5ff'">
		<td align="center" valign="middle" class="borderright borderbottom num">{$i}</td>
        <td align="center" valign="middle" class="borderright borderbottom">{$row['id']}</td>
        <td align="center" valign="middle" class="borderright borderbottom"><img src='./uploads/s_{$row['picname']}'></td>
        <td align="center" valign="middle" class="borderright borderbottom">{$row['typeid']}</td>
        <td align="center" valign="middle" class="borderright borderbottom"><a href='./uploads/m_{$row['picname']}'>{$row['goods']}</a></td>
        <td align="center" valign="middle" class="borderright borderbottom">{$row['company']}</td>
        <td align="center" valign="middle" class="borderright borderbottom">{$row['descr']}</td>
        <td align="center" valign="middle" class="borderright borderbottom">{$row['price']}</td>
        <td align="center" valign="middle" class="borderright borderbottom">{$state[$row['state']]}</td>
        <td align="center" valign="middle" class="borderright borderbottom">{$row['store']}</td>
        <td align="center" valign="middle" class="borderright borderbottom">{$row['num']}</td>
        <td align="center" valign="middle" class="borderright borderbottom">{$addTime}</td>
        <td align="center" valign="middle" class="borderbottom">
        <a href="edit.php?id={$row['id']}&oldpicname={$row['picname']}&pid={$row['typeid']}" target="mainFrame" onFocus="this.blur()" class="add">编辑</a>
        <span class="gray">&nbsp;|&nbsp;</span>
        <a href="action.php?a=del&id={$row['id']}&picname={$row['picname']}" target="mainFrame" onFocus="this.blur()" class="add">删除</a>
        </td>
      </tr>
swUse;
	echo $str;
			}
			//6 关闭数据库 释放结果集 
			mysqli_close($link);
			mysqli_free_result($result);
		?>
    </table></td>
    </tr>
  			<tr>
				<td align="left" valign="top" class="fenye">
					共查询到<span class="num"><?php  echo mysqli_num_rows($res)?></span>条类别信息 &nbsp;&nbsp;
					<span class="num"><?php  echo $page.'/'.$maxPage ?></span>页  &nbsp;&nbsp;
					<?php 
						$url = empty($url)? "" : $url;
						echo "<a href='index.php?p=1{$url}' target='mainFrame' onFocus='this.blur()'>
							首页
						</a>&nbsp;&nbsp;";
						echo "<a href='index.php?p=".($page-1)."{$url}' target='mainFrame' onFocus='this.blur()'>
							上一页
						</a>&nbsp;&nbsp;";
						echo "<a href='index.php?p=".($page+1)."{$url}' target='mainFrame' onFocus='this.blur()'>
							下一页
						</a>&nbsp;&nbsp;";
						echo "<a href='index.php?p={$maxPage}{$url}' target='mainFrame' onFocus='this.blur()'>
							尾页
						</a>";
					?>
				</td>
			</tr>
</table>
</body>
</html>