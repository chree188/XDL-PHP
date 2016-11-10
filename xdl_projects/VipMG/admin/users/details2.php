<?php
	//开启session接收消息
	session_start();	
	//登录验证
	if($_SESSION['user']['state'] != 1){	//判断session里state非超级管理员 不允许进入超级管理员页后台
		header('Location:../login.php');
		exit;
	}
?>
<html>
<head>
<meta charset=utf-8 />
<link link rel="shortcut icon" type="imagex-icon" href="../favicon.ico" />
<link href="../public/css/css.css" type="text/css" rel="stylesheet" />
<link href="../public/css/main.css" type="text/css" rel="stylesheet" />
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
<!--main_top-->
<table width="99%" border="0" cellspacing="0" cellpadding="0" id="searchmain">
  <tr>
    <td width="99%" align="left" valign="top">您的位置：查看会员详情</td>
  </tr>
  <tr>
    <td align="left" valign="top">
    	<?php
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
			$sql = "select users.* , admin.name as adname from users inner join admin on users.adminid = admin.id where users.status = 1 and users.id={$_GET['id']}";
//			echo $sql;
			$result = mysqli_query($link,$sql);

			//5 解析结果集 
			$row = mysqli_fetch_assoc($result);

		}

		?>
    <table width="100%" border="0" cellspacing="0" cellpadding="0" id="main-tab">
      <!--基础信息注册用户输入部分-->
      <tr onMouseOut="this.style.backgroundColor='#ffffff'" onMouseOver="this.style.backgroundColor='#edf5ff'">
        <td align="right" valign="middle" class="borderright borderbottom bggray">推荐人姓名：</td>
        <td align="left" valign="middle" class="borderright borderbottom main-for">
        <input type="text" name="adminid" readonly value="<?php echo $row['adname']?>" class="text-word">
        </td>
      </tr>
      <tr onMouseOut="this.style.backgroundColor='#ffffff'" onMouseOver="this.style.backgroundColor='#edf5ff'">
        <td align="right" valign="middle" class="borderright borderbottom bggray">入会日期：</td>
        <td align="left" valign="middle" class="borderright borderbottom main-for">
        <input type="text" name="addtime" readonly value="<?php echo $row['addtime']?>" class="text-word">
        </td>
      </tr>
      <tr onMouseOut="this.style.backgroundColor='#ffffff'" onMouseOver="this.style.backgroundColor='#edf5ff'">
        <td align="right" valign="middle" class="borderright borderbottom bggray">昵称：</td>
        <td align="left" valign="middle" class="borderright borderbottom main-for">
        <input type="text" name="username" readonly value="<?php echo $row['username']?>" class="text-word" >
        </td>
      </tr>
      <tr onMouseOut="this.style.backgroundColor='#ffffff'" onMouseOver="this.style.backgroundColor='#edf5ff'">
        <td align="right" valign="middle" class="borderright borderbottom bggray">真实姓名：</td>
        <td align="left" valign="middle" class="borderright borderbottom main-for">
        <input type="text" name="name" readonly value="<?php echo $row['name']?>" class="text-word">
        </td>
      </tr>
      <tr onMouseOut="this.style.backgroundColor='#ffffff'" onMouseOver="this.style.backgroundColor='#edf5ff'">
        <td align="right" valign="middle" class="borderright borderbottom bggray">性别：</td>
        <td align="left" valign="middle" class="borderright borderbottom main-for">
        <label><input type="radio" disabled="disabled" name="sex" value="1"<?php echo $row['sex']=='1' ? 'checked' :'';  ?> >男</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <label><input type="radio" disabled="disabled" name="sex" value="2"<?php echo $row['sex']=='2' ? 'checked' :'';  ?> >女</label>
        </td>
      </tr>
      <tr onMouseOut="this.style.backgroundColor='#ffffff'" onMouseOver="this.style.backgroundColor='#edf5ff'">
        <td align="right" valign="middle" class="borderright borderbottom bggray">年龄：</td>
        <td align="left" valign="middle" class="borderright borderbottom main-for">
        <input type="text" name="age" readonly value="<?php echo $row['age']?>" class="text-word">
        </td>
      </tr>  
      <tr onMouseOut="this.style.backgroundColor='#ffffff'" onMouseOver="this.style.backgroundColor='#edf5ff'">
        <td align="right" valign="middle" class="borderright borderbottom bggray">常用手机号：</td>
        <td align="left" valign="middle" class="borderright borderbottom main-for">
        <input type="text" name="phone1" readonly value="<?php echo $row['phone1']?>" class="text-word">
        </td>
      </tr>
      <tr onMouseOut="this.style.backgroundColor='#ffffff'" onMouseOver="this.style.backgroundColor='#edf5ff'">
        <td align="right" valign="middle" class="borderright borderbottom bggray">备用手机号：</td>
        <td align="left" valign="middle" class="borderright borderbottom main-for">
        <input type="text" name="phone2" readonly value="<?php echo $row['phone2']?>" class="text-word">
        </td>
      </tr>
      <tr onMouseOut="this.style.backgroundColor='#ffffff'" onMouseOver="this.style.backgroundColor='#edf5ff'">
        <td align="right" valign="middle" class="borderright borderbottom bggray">入会用QQ号：</td>
        <td align="left" valign="middle" class="borderright borderbottom main-for">
        <input type="text" name="qq1" readonly value="<?php echo $row['qq1']?>" class="text-word">
        </td>
      </tr>
      <tr onMouseOut="this.style.backgroundColor='#ffffff'" onMouseOver="this.style.backgroundColor='#edf5ff'">
        <td align="right" valign="middle" class="borderright borderbottom bggray">备用QQ号：</td>
        <td align="left" valign="middle" class="borderright borderbottom main-for">
        <input type="text" name="qq2" readonly value="<?php echo $row['qq2']?>" class="text-word">
        </td>
      </tr>
      <tr onMouseOut="this.style.backgroundColor='#ffffff'" onMouseOver="this.style.backgroundColor='#edf5ff'">
        <td align="right" valign="middle" class="borderright borderbottom bggray">身份证号：</td>
        <td align="left" valign="middle" class="borderright borderbottom main-for">
        <input type="text" name="idcard" readonly value="<?php echo $row['idcard']?>" class="text-word">
        </td>
      </tr>
      <tr onMouseOut="this.style.backgroundColor='#ffffff'" onMouseOver="this.style.backgroundColor='#edf5ff'">
        <td align="right" valign="middle" class="borderright borderbottom bggray">身份证上住址：</td>
        <td align="left" valign="middle" class="borderright borderbottom main-for">
        <input type="text" name="address" readonly value="<?php echo $row['address']?>" class="text-word">
        </td>
      </tr>
      <tr onMouseOut="this.style.backgroundColor='#ffffff'" onMouseOver="this.style.backgroundColor='#edf5ff'">
        <td align="right" valign="middle" class="borderright borderbottom bggray">现住址：</td>
        <td align="left" valign="middle" class="borderright borderbottom main-for">
        <input type="text" name="nowaddr" readonly value="<?php echo $row['nowaddr']?>" class="text-word">
        </td>
      </tr>
      <tr onMouseOut="this.style.backgroundColor='#ffffff'" onMouseOver="this.style.backgroundColor='#edf5ff'">
        <td align="right" valign="middle" class="borderright borderbottom bggray">实名支付宝号：</td>
        <td align="left" valign="middle" class="borderright borderbottom main-for">
        <input type="text" name="alipay" readonly value="<?php echo $row['alipay']?>" class="text-word">
        </td>
      </tr>
      <tr onMouseOut="this.style.backgroundColor='#ffffff'" onMouseOver="this.style.backgroundColor='#edf5ff'">
        <td align="right" valign="middle" class="borderright borderbottom bggray">实名财付通号：</td>
        <td align="left" valign="middle" class="borderright borderbottom main-for">
        <input type="text" name="tenpay" readonly value="<?php echo $row['tenpay']?>" class="text-word">
        </td>
      </tr>
      <!--------------------------------------以下为信息截图部分---------------------------------------------------------->
      <tr onMouseOut="this.style.backgroundColor='#ffffff'" onMouseOver="this.style.backgroundColor='#edf5ff'">
        <td align="right" valign="middle" class="borderright borderbottom bggray">入会打款截图：</td>
        <td align="left" valign="middle" class="borderright borderbottom main-for">
        <img src='../../uploads/s_{$row['picname']}'>
        </td>
      </tr>
      <tr onMouseOut="this.style.backgroundColor='#ffffff'" onMouseOver="this.style.backgroundColor='#edf5ff'">
        <td align="right" valign="middle" class="borderright borderbottom bggray">身份证正面截图：</td>
        <td align="left" valign="middle" class="borderright borderbottom main-for">
        <img src='../../uploads/s_{$row['picname']}'>
        </td>
      </tr>
      <tr onMouseOut="this.style.backgroundColor='#ffffff'" onMouseOver="this.style.backgroundColor='#edf5ff'">
        <td align="right" valign="middle" class="borderright borderbottom bggray">身份证反面截图：</td>
        <td align="left" valign="middle" class="borderright borderbottom main-for">
        <img src='../../uploads/s_{$row['picname']}'>
        </td>
      </tr>
      <tr onMouseOut="this.style.backgroundColor='#ffffff'" onMouseOver="this.style.backgroundColor='#edf5ff'">
        <td align="right" valign="middle" class="borderright borderbottom bggray">支付宝实名认证截图：</td>
        <td align="left" valign="middle" class="borderright borderbottom main-for">
        <img src='../../uploads/s_{$row['picname']}'>
        </td>
      </tr>
      <tr onMouseOut="this.style.backgroundColor='#ffffff'" onMouseOver="this.style.backgroundColor='#edf5ff'">
        <td align="right" valign="middle" class="borderright borderbottom bggray">财付通实名认证截图：</td>
        <td align="left" valign="middle" class="borderright borderbottom main-for">
        <img src='../../uploads/s_{$row['picname']}'>
        </td>
      </tr>
      <tr onMouseOut="this.style.backgroundColor='#ffffff'" onMouseOver="this.style.backgroundColor='#edf5ff'">
        <td align="right" valign="middle" class="borderright borderbottom bggray">ip地址截图：</td>
        <td align="left" valign="middle" class="borderright borderbottom main-for">
        <img src='../../uploads/s_{$row['picname']}'>
        </td>
      </tr>
      <tr onMouseOut="this.style.backgroundColor='#ffffff'" onMouseOver="this.style.backgroundColor='#edf5ff'">
        <td align="right" valign="middle" class="borderright borderbottom bggray">近期生活照截图：</td>
        <td align="left" valign="middle" class="borderright borderbottom main-for">
        <img src='../../uploads/s_{$row['picname']}'>
        </td>
      </tr>
      <tr onMouseOut="this.style.backgroundColor='#ffffff'" onMouseOver="this.style.backgroundColor='#edf5ff'">
        <td align="right" valign="middle" class="borderright borderbottom bggray">第二证件截图：</td>
        <td align="left" valign="middle" class="borderright borderbottom main-for">
        <img src='../../uploads/s_{$row['picname']}'>
        </td>
      </tr>
      <tr onMouseOut="this.style.backgroundColor='#ffffff'" onMouseOver="this.style.backgroundColor='#edf5ff'">
        <td align="right" valign="middle" class="borderright borderbottom bggray">通话记录截图：</td>
        <td align="left" valign="middle" class="borderright borderbottom main-for">
        <img src='../../uploads/s_{$row['picname']}'>
        </td>
      </tr>
    </table>
    </td>
    </tr>
</table>
</body>
</html>