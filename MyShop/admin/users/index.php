<html>
<head>
<meta charset=utf-8 />
<title>主要内容区main</title>
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
		switch(@$_GET['errno']){
			case 3: echo "<h3 style='color:red'>删除失败!</h3>";
			break;
		}

	?>
<!--main_top-->
<table width="99%" border="0" cellspacing="0" cellpadding="0" id="searchmain">
  <tr>
    <td width="99%" align="left" valign="top">您的位置：用户管理</td>
  </tr>
  <tr>
    <td align="left" valign="top">
    <table width="100%" border="0" cellspacing="0" cellpadding="0" id="search">
  		<tr>
   		 <td width="90%" align="left" valign="middle">
	         <form method="post" action="">
	         <span>管理员：</span>
	         <input type="text" name="" value="" class="text-word">
	         <input name="" type="button" value="查询" class="text-but">
	         </form>
         </td>
  		  <td width="10%" align="center" valign="middle" style="text-align:right; width:150px;"><a href="add.php" target="mainFrame" onFocus="this.blur()" class="add">新增管理员</a></td>
  		</tr>
	</table>
    </td>
  </tr>
  <tr>
    <td align="left" valign="top">
    
    <table width="100%" border="0" cellspacing="0" cellpadding="0" id="main-tab">
      <tr>
        <th align="center" valign="middle" class="borderright">ID</th>
        <th align="center" valign="middle" class="borderright">帐号</th>
        <th align="center" valign="middle" class="borderright">姓名</th>
        <th align="center" valign="middle" class="borderright">性别</th>
        <th align="center" valign="middle" class="borderright">地址</th>
        <th align="center" valign="middle" class="borderright">邮编</th>
        <th align="center" valign="middle" class="borderright">电话</th>
        <th align="center" valign="middle" class="borderright">邮箱</th>
        <th align="center" valign="middle" class="borderright">权限</th>
        <th align="center" valign="middle" class="borderright">注册时间</th>
        <th align="center" valign="middle">操作</th>
      </tr>
      
      <?php
			//查看用户信息 select 输出到表格里面 
			//设置默认时区
			date_default_timezone_set('PRC');
			// 设置性别
			$sex = array("1"=>"男","0"=>"女");
			// 设置权限
			$state = array("0"=>"超级管理员","1"=>"一般管理员","2"=>"信息录入员");
			//六脉神剑 
			//1 导入数据库配置文件
			include("../../public/sql/dbconfig.php");
			//2 连接数据库
			$link = @mysqli_connect(HOST,USER,PASS) or die("数据库连接失败");
			//3 设置字符集 选择数据库
			mysqli_set_charset($link,"utf8");
			mysqli_select_db($link,DBNAME);
			//4 写sql语句 获得结果集 
			$sql = "select * from users order by id";
			$result = mysqli_query($link,$sql);
			//5 解析结果集 
			while($row = mysqli_fetch_assoc($result)){
				$regTime = date("Y-m-d H:i:s",$row['addtime']);	//格式化注册时间戳
$str = <<<swUse
				<tr onMouseOut="this.style.backgroundColor='#ffffff'" 
				onMouseOver="this.style.backgroundColor='#edf5ff'">
        <td align="center" valign="middle" class="borderright borderbottom">{$row['id']}</td>
        <td align="center" valign="middle" class="borderright borderbottom">{$row['username']}</td>
        <td align="center" valign="middle" class="borderright borderbottom">{$row['name']}</td>
        <td align="center" valign="middle" class="borderright borderbottom">{$sex[$row['sex']]}</td>
        <td align="center" valign="middle" class="borderright borderbottom">{$row['address']}</td>
        <td align="center" valign="middle" class="borderright borderbottom">{$row['code']}</td>
        <td align="center" valign="middle" class="borderright borderbottom">{$row['phone']}</td>
        <td align="center" valign="middle" class="borderright borderbottom">{$row['email']}</td>
        <td align="center" valign="middle" class="borderright borderbottom">{$state[$row['state']]}</td>
        <td align="center" valign="middle" class="borderright borderbottom">{$regTime}</td>
        <td align="center" valign="middle" class="borderbottom">
        <a href="edit.php?id={$row['id']}" target="mainFrame" onFocus="this.blur()" class="add">编辑</a>
        <span class="gray">&nbsp;|&nbsp;</span>
        <a href="action.php?a=del&id={$row['id']}" target="mainFrame" onFocus="this.blur()" class="add">删除</a></td>
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
				<td align="left" valign="top" class="fenye">11 条数据 1/1 页&nbsp;&nbsp;
					<a href="#" target="mainFrame" onFocus="this.blur()">
						首页
					</a>&nbsp;&nbsp;
					<a href="#" target="mainFrame" onFocus="this.blur()">
						上一页
					</a>&nbsp;&nbsp;
					<a href="#" target="mainFrame" onFocus="this.blur()">
						下一页
					</a>&nbsp;&nbsp;
					<a href="#" target="mainFrame" onFocus="this.blur()">
						尾页
					</a></td>
			</tr>
</table>
</body>
</html>