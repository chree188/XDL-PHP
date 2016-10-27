<html>
<head>
<meta charset=utf-8 />
<link href="../include/css/css.css" type="text/css" rel="stylesheet" />
<link href="../include/css/main.css" type="text/css" rel="stylesheet" />
<style> 
body {
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
	color: #FFF
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
	background: url(../include/images/main/add.jpg) no-repeat 0px 6px;
	padding: 0 10px 0 26px;
	height: 40px;
	line-height: 40px;
	font-size: 14px;
	font-weight: bold;
	color: #FFF
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

b {
	color: red;
	font-size: 20px;
}

td.fenye {
	padding: 10px 0 0 0;
	text-align: right;
}

.bggray {
	background: #f9f9f9;
	font-size: 14px;
	font-weight: bold;
	padding: 10px 10px 10px 0;
	width: 120px;
}

.main-for {
	padding: 10px;
}

.main-for input.text-word {
	width: 310px;
	height: 36px;
	line-height: 36px;
	border: #ebebeb 1px solid;
	background: #FFF;
	font-family: "Microsoft YaHei", "Tahoma", "Arial", '宋体';
	padding: 0 10px;
}

.main-for select {
	width: 310px;
	height: 36px;
	line-height: 36px;
	border: #ebebeb 1px solid;
	background: #FFF;
	font-family: "Microsoft YaHei", "Tahoma", "Arial", '宋体';
	color: #666;
}

.main-for input.text-but {
	width: 100px;
	height: 40px;
	line-height: 30px;
	border: 1px solid #cdcdcd;
	background: #e6e6e6;
	font-family: "Microsoft YaHei", "Tahoma", "Arial", '宋体';
	color: #969696;
	float: left;
	margin: 0 10px 0 0;
	display: inline;
	cursor: pointer;
	font-size: 14px;
	font-weight: bold;
}

#addinfo a {
	font-size: 14px;
	font-weight: bold;
	background: url(../include/images/main/addinfoblack.jpg) no-repeat 0 1px;
	padding: 0px 0 0px 20px;
	line-height: 45px;
}

#addinfo a:hover {
	background: url(../include/images/main/addinfoblue.jpg) no-repeat 0 1px;
}

</style>
</head>
<body>
	<?php
		//处理添加表单的错误信息
		$_GET['errno'] = empty($_GET['errno'])? '' : $_GET['errno'];
		switch($_GET['errno']) {
			case 1 :
				echo "<h2 style='color:red; '>订单信息未修改。。</h2>";
				break;
		}
	?>
<!--main_top-->
<table width="99%" border="0" cellspacing="0" cellpadding="0" id="searchmain">
  <tr>
    <td width="99%" align="left" valign="top">您的位置：<a href="index.php">查看用户订单</a>&nbsp;&nbsp;>&nbsp;&nbsp;修改订单</td>
  </tr>
  <tr>
    <td align="left" valign="top">
    	<?php
    	//设置默认时区
		date_default_timezone_set('PRC');
		//需要获得被修改的用户信息
		//1 导入配置文件 
		
		if(@$_GET['id']){

			include("../../public/sql/dbconfig.php");
			//2 连接数据库
			$link = @mysqli_connect(HOST,USER,PASS) or die("数据库连接失败");
			//3 选择数据库 设置字符集
			mysqli_set_charset($link,"utf8");
			mysqli_select_db($link,DBNAME);
			//4 写sql语句 执行sql
			$sql = "select orders.* , users.username from orders inner join users on orders.uid = users.id where orders.id={$_GET['id']}";
			$result = mysqli_query($link,$sql);

			//5 解析结果集 
			$row = mysqli_fetch_assoc($result);

		}

		?>
    <form method="post" action="./action.php?a=update">
    <input type="hidden" name='id' value="<?php echo $row['id']?> ">
    <table width="100%" border="0" cellspacing="0" cellpadding="0" id="main-tab">
      <tr onMouseOut="this.style.backgroundColor='#ffffff'" onMouseOver="this.style.backgroundColor='#edf5ff'">
        <td align="right" valign="middle" class="borderright borderbottom bggray">订单号：</td>
        <td align="left" valign="middle" class="borderright borderbottom main-for">
        <input type="text" name="odid" readonly value="<?php echo $row['odid']?>" class="text-word">
        </td>
        </tr>
      <tr onMouseOut="this.style.backgroundColor='#ffffff'" onMouseOver="this.style.backgroundColor='#edf5ff'">
        <td align="right" valign="middle" class="borderright borderbottom bggray">会员账号：</td>
        <td align="left" valign="middle" class="borderright borderbottom main-for">
        <input type="text" name="username" readonly value="<?php echo $row['username']?>" class="text-word">
        </td>
        </tr>
      <tr onMouseOut="this.style.backgroundColor='#ffffff'" onMouseOver="this.style.backgroundColor='#edf5ff'">
        <td align="right" valign="middle" class="borderright borderbottom bggray">收件人：</td>
        <td align="left" valign="middle" class="borderright borderbottom main-for">
        <input type="text" name="linkman" value="<?php echo $row['linkman']?>" class="text-word">
        </td>
      </tr>
      <tr onMouseOut="this.style.backgroundColor='#ffffff'" onMouseOver="this.style.backgroundColor='#edf5ff'">
        <td align="right" valign="middle" class="borderright borderbottom bggray">收件人地址：</td>
        <td align="left" valign="middle" class="borderright borderbottom main-for">
        <input type="text" name="address" value="<?php echo $row['address']?>" class="text-word">
        </td>
        </tr>
      <tr onMouseOut="this.style.backgroundColor='#ffffff'" onMouseOver="this.style.backgroundColor='#edf5ff'">
        <td align="right" valign="middle" class="borderright borderbottom bggray">邮编：</td>
        <td align="left" valign="middle" class="borderright borderbottom main-for">
        <input type="text" name="code" value="<?php echo $row['code']?>" class="text-word">
        </td>
      </tr>
      <tr onMouseOut="this.style.backgroundColor='#ffffff'" onMouseOver="this.style.backgroundColor='#edf5ff'">
        <td align="right" valign="middle" class="borderright borderbottom bggray">电话：</td>
        <td align="left" valign="middle" class="borderright borderbottom main-for">
        <input type="text" name="phone" value="<?php echo $row['phone']?>" class="text-word">
        </td>
      </tr>
      <tr onMouseOut="this.style.backgroundColor='#ffffff'" onMouseOver="this.style.backgroundColor='#edf5ff'">
        <td align="right" valign="middle" class="borderright borderbottom bggray">用户备注信息：</td>
        <td align="left" valign="middle" class="borderright borderbottom main-for">
        <textarea name="descr" readonly value="" cols="42px" rows="7px" class="text-word"><?php echo $row['descr']?></textarea>
        </td>
      </tr>
      <tr onMouseOut="this.style.backgroundColor='#ffffff'" onMouseOver="this.style.backgroundColor='#edf5ff'">
        <td align="right" valign="middle" class="borderright borderbottom bggray">购买时间：</td>
        <td align="left" valign="middle" class="borderright borderbottom main-for">
        <input type="text" name="addtime" readonly value="<?php echo date("Y-m-d H:i:s",$row['addtime'])?>" class="text-word">
        </td>
      </tr>
      <tr onMouseOut="this.style.backgroundColor='#ffffff'" onMouseOver="this.style.backgroundColor='#edf5ff'">
        <td align="right" valign="middle" class="borderright borderbottom bggray">总金额：</td>
        <td align="left" valign="middle" class="borderright borderbottom main-for">
        <input type="text" name="total" readonly value="<?php echo $row['total']?>" class="text-word">
        <b>*</b>
        </td>
      </tr>
      <tr onMouseOut="this.style.backgroundColor='#ffffff'" onMouseOver="this.style.backgroundColor='#edf5ff'">
        <td align="right" valign="middle" class="borderright borderbottom bggray">订单状态：</td>
        <td align="left" valign="middle" class="borderright borderbottom main-for">
        <select name="status" id="level">
	    <option value="1"<?php echo $row['status']=='1' ? 'selected' :'';  ?> >&nbsp;&nbsp;新订单</option>
	    <option value="2"<?php echo $row['status']=='2' ? 'selected' :'';  ?> >&nbsp;&nbsp;已发货</option>
	    <option value="3"<?php echo $row['status']=='3' ? 'selected' :'';  ?> >&nbsp;&nbsp;已收货</option>
	    <option value="4"<?php echo $row['status']=='4' ? 'selected' :'';  ?> >&nbsp;&nbsp;无效订单</option>
        </select>
        </td>
      </tr>
      <tr onMouseOut="this.style.backgroundColor='#ffffff'" onMouseOver="this.style.backgroundColor='#edf5ff'">
        <td align="right" valign="middle" class="borderright borderbottom bggray">&nbsp;</td>
        <td align="left" valign="middle" class="borderright borderbottom main-for">
        <input name="" type="submit" value="修改" class="text-but">
        <input name="" type="reset" value="重置" class="text-but"></td>
        </tr>
    </table>
    </form>
    </td>
    </tr>
</table>
</body>
</html>