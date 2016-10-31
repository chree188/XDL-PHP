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
	<?php
		//处理添加表单的错误信息
		switch(@$_GET['errno']) {
			case 1 :
				echo "<h2 style='color:red; '>您的入会注册申请已提交，等待管理员审核。</h2>";
				break;
			case 2 :
				echo "<h2 style='color:red; '>带<b>*</b>项不能为空。</h2>";
				break;
			case 3 :
				echo "<h2 style='color:red; '>注册失败！请核对您的信息是否正确后重新提交。</h2>";
				break;
		}
	?>
<!--main_top-->
<table width="99%" border="0" cellspacing="0" cellpadding="0" id="searchmain">
  <tr>
    <td align="center" valign="top" id="addinfo">
    <h1>会员入会申请</h1>
    </td>
  </tr>
  <tr>
    <td align="left" valign="top">
    <form method="post" action="./usaction.php" enctype="multipart/form-data">
    <table width="100%" border="0" cellspacing="0" cellpadding="0" id="main-tab">
      <!--基础信息注册用户输入部分-->
      <tr onMouseOut="this.style.backgroundColor='#ffffff'" onMouseOver="this.style.backgroundColor='#edf5ff'">
        <td align="right" valign="middle" class="borderright borderbottom bggray">推荐人姓名：</td>
        <td align="left" valign="middle" class="borderright borderbottom main-for">
        	<?php
		        echo "<select name='adminid'>";
					echo "<option value=''>--请选择--</option>";
					//查看类别信息 select 输出到表格里面 
					//六脉神剑 
					//1 导入数据库配置文件
					include("../public/sql/dbconfig.php");
					//2 连接数据库
					$link = @mysqli_connect(HOST,USER,PASS) or die("数据库连接失败");
					//3 设置字符集 选择数据库
					mysqli_set_charset($link,"utf8");
					mysqli_select_db($link,DBNAME);
					//4 写sql语句 获得结果集 
					$sql = "select * from admin";	// 修改为一类别pid path排序
					$result = mysqli_query($link,$sql);
					//5 解析结果集 
					while($row = mysqli_fetch_assoc($result)){
						//显示下拉列表的形式
						$disable = null;
						if($row['id']==1){
							$disable = "disabled";
						}
						echo "<option value='{$row['id']}'{$disable}>{$row['name']}</option>";
					}	
					//6 关闭数据库 释放结果集 
					
					mysqli_close($link);
					mysqli_free_result($result);
		        echo "</select>";
			?>
        <b>*</b>
        </td>
      </tr>
      <tr onMouseOut="this.style.backgroundColor='#ffffff'" onMouseOver="this.style.backgroundColor='#edf5ff'">
        <td align="right" valign="middle" class="borderright borderbottom bggray">入会日期：</td>
        <td align="left" valign="middle" class="borderright borderbottom main-for">
        <input type="date" name="addtime" value="" class="text-word">
        <b>*</b>
        </td>
      </tr>
      <tr onMouseOut="this.style.backgroundColor='#ffffff'" onMouseOver="this.style.backgroundColor='#edf5ff'">
        <td align="right" valign="middle" class="borderright borderbottom bggray">昵称：</td>
        <td align="left" valign="middle" class="borderright borderbottom main-for">
        <input type="text" name="username" value="" placeholder="请输入昵称(两字)" maxlength="2" class="text-word" >
        <b>*</b>
        </td>
      </tr>
      <tr onMouseOut="this.style.backgroundColor='#ffffff'" onMouseOver="this.style.backgroundColor='#edf5ff'">
        <td align="right" valign="middle" class="borderright borderbottom bggray">真实姓名：</td>
        <td align="left" valign="middle" class="borderright borderbottom main-for">
        <input type="text" name="name" value="" placeholder="请输入您真实姓名" class="text-word">
        <b>*</b>
        </td>
      </tr>
      <tr onMouseOut="this.style.backgroundColor='#ffffff'" onMouseOver="this.style.backgroundColor='#edf5ff'">
        <td align="right" valign="middle" class="borderright borderbottom bggray">性别：</td>
        <td align="left" valign="middle" class="borderright borderbottom main-for">
        <label><input type="radio" name="sex" value="1" checked >男</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <label><input type="radio" name="sex" value="2" >女</label>
        </td>
      </tr>
      <tr onMouseOut="this.style.backgroundColor='#ffffff'" onMouseOver="this.style.backgroundColor='#edf5ff'">
        <td align="right" valign="middle" class="borderright borderbottom bggray">年龄：</td>
        <td align="left" valign="middle" class="borderright borderbottom main-for">
        <input type="text" name="age" value="" placeholder="请输入年龄" maxlength="2" class="text-word">
        </td>
      </tr>  
      <tr onMouseOut="this.style.backgroundColor='#ffffff'" onMouseOver="this.style.backgroundColor='#edf5ff'">
        <td align="right" valign="middle" class="borderright borderbottom bggray">常用手机号：</td>
        <td align="left" valign="middle" class="borderright borderbottom main-for">
        <input type="text" name="phone1" value="" placeholder="请输入您常用手机号" maxlength="11" class="text-word">
        <b>*</b>
        </td>
      </tr>
      <tr onMouseOut="this.style.backgroundColor='#ffffff'" onMouseOver="this.style.backgroundColor='#edf5ff'">
        <td align="right" valign="middle" class="borderright borderbottom bggray">备用手机号：</td>
        <td align="left" valign="middle" class="borderright borderbottom main-for">
        <input type="text" name="phone2" value="" placeholder="请输入备用手机号" maxlength="11" class="text-word">
        </td>
      </tr>
      <tr onMouseOut="this.style.backgroundColor='#ffffff'" onMouseOver="this.style.backgroundColor='#edf5ff'">
        <td align="right" valign="middle" class="borderright borderbottom bggray">入会用QQ号：</td>
        <td align="left" valign="middle" class="borderright borderbottom main-for">
        <input type="text" name="qq1" value="" placeholder="请输入您入会用QQ号" maxlength="11" class="text-word">
        <b>*</b>
        </td>
      </tr>
      <tr onMouseOut="this.style.backgroundColor='#ffffff'" onMouseOver="this.style.backgroundColor='#edf5ff'">
        <td align="right" valign="middle" class="borderright borderbottom bggray">备用QQ号：</td>
        <td align="left" valign="middle" class="borderright borderbottom main-for">
        <input type="text" name="qq2" value="" placeholder="请输入备用QQ号" maxlength="11" class="text-word">
        </td>
      </tr>
      <tr onMouseOut="this.style.backgroundColor='#ffffff'" onMouseOver="this.style.backgroundColor='#edf5ff'">
        <td align="right" valign="middle" class="borderright borderbottom bggray">身份证号：</td>
        <td align="left" valign="middle" class="borderright borderbottom main-for">
        <input type="text" name="idcard" value="" placeholder="请输入您本人的身份证号" maxlength="18" class="text-word">
        <b>*</b>
        </td>
      </tr>
      <tr onMouseOut="this.style.backgroundColor='#ffffff'" onMouseOver="this.style.backgroundColor='#edf5ff'">
        <td align="right" valign="middle" class="borderright borderbottom bggray">身份证上住址：</td>
        <td align="left" valign="middle" class="borderright borderbottom main-for">
        <input type="text" name="address" value="" placeholder="请输入您身份证上住址" class="text-word">
        <b>*</b>
        </td>
      </tr>
      <tr onMouseOut="this.style.backgroundColor='#ffffff'" onMouseOver="this.style.backgroundColor='#edf5ff'">
        <td align="right" valign="middle" class="borderright borderbottom bggray">现住址：</td>
        <td align="left" valign="middle" class="borderright borderbottom main-for">
        <input type="text" name="nowaddr" value="" placeholder="请输入您现住址" class="text-word">
        <b>*</b>
        </td>
      </tr>
      <tr onMouseOut="this.style.backgroundColor='#ffffff'" onMouseOver="this.style.backgroundColor='#edf5ff'">
        <td align="right" valign="middle" class="borderright borderbottom bggray">实名支付宝号：</td>
        <td align="left" valign="middle" class="borderright borderbottom main-for">
        <input type="text" name="alipay" value="" placeholder="请输入您实名认证支付宝账号" class="text-word">
        <b>*</b>
        </td>
      </tr>
      <tr onMouseOut="this.style.backgroundColor='#ffffff'" onMouseOver="this.style.backgroundColor='#edf5ff'">
        <td align="right" valign="middle" class="borderright borderbottom bggray">实名财付通号：</td>
        <td align="left" valign="middle" class="borderright borderbottom main-for">
        <input type="text" name="tenpay" value="" placeholder="请输入您实名认证财付通账号" class="text-word">
        </td>
      </tr>
      <!-------------------------------------------以下为信息截图部分------------------------------------------------>
      <tr onMouseOut="this.style.backgroundColor='#ffffff'" onMouseOver="this.style.backgroundColor='#edf5ff'">
        <td align="right" valign="middle" class="borderright borderbottom bggray">入会打款截图：</td>
        <td align="left" valign="middle" class="borderright borderbottom main-for">
        <input type="file" name="addpic"><b>*</b>
        </td>
      </tr>
      <tr onMouseOut="this.style.backgroundColor='#ffffff'" onMouseOver="this.style.backgroundColor='#edf5ff'">
        <td align="right" valign="middle" class="borderright borderbottom bggray">身份证正面截图：</td>
        <td align="left" valign="middle" class="borderright borderbottom main-for">
        <input type="file" name="idapic"><b>*</b>
        </td>
      </tr>
      <tr onMouseOut="this.style.backgroundColor='#ffffff'" onMouseOver="this.style.backgroundColor='#edf5ff'">
        <td align="right" valign="middle" class="borderright borderbottom bggray">身份证反面截图：</td>
        <td align="left" valign="middle" class="borderright borderbottom main-for">
        <input type="file" name="idbpic"><b>*</b>
        </td>
      </tr>
      <tr onMouseOut="this.style.backgroundColor='#ffffff'" onMouseOver="this.style.backgroundColor='#edf5ff'">
        <td align="right" valign="middle" class="borderright borderbottom bggray">支付宝实名认证截图：</td>
        <td align="left" valign="middle" class="borderright borderbottom main-for">
        <input type="file" name="alipaypic"><b>*</b>
        </td>
      </tr>
      <!---------------------------------不是必填项，由于报错原因；暂时搁置-------------------------------------->
      <!--<tr onMouseOut="this.style.backgroundColor='#ffffff'" onMouseOver="this.style.backgroundColor='#edf5ff'">
        <td align="right" valign="middle" class="borderright borderbottom bggray">财付通实名认证截图：</td>
        <td align="left" valign="middle" class="borderright borderbottom main-for">
        <input type="file" name="tenpaypic">
        </td>
      </tr>
      <tr onMouseOut="this.style.backgroundColor='#ffffff'" onMouseOver="this.style.backgroundColor='#edf5ff'">
        <td align="right" valign="middle" class="borderright borderbottom bggray">ip地址截图：</td>
        <td align="left" valign="middle" class="borderright borderbottom main-for">
        <input type="file" name="ippic">
        </td>
      </tr>
      <tr onMouseOut="this.style.backgroundColor='#ffffff'" onMouseOver="this.style.backgroundColor='#edf5ff'">
        <td align="right" valign="middle" class="borderright borderbottom bggray">近期生活照截图：</td>
        <td align="left" valign="middle" class="borderright borderbottom main-for">
        <input type="file" name="lifepic">
        </td>
      </tr>
      <tr onMouseOut="this.style.backgroundColor='#ffffff'" onMouseOver="this.style.backgroundColor='#edf5ff'">
        <td align="right" valign="middle" class="borderright borderbottom bggray">第二证件截图：</td>
        <td align="left" valign="middle" class="borderright borderbottom main-for">
        <input type="file" name="twocardpic">
        </td>
      </tr>
      <tr onMouseOut="this.style.backgroundColor='#ffffff'" onMouseOver="this.style.backgroundColor='#edf5ff'">
        <td align="right" valign="middle" class="borderright borderbottom bggray">通话记录截图：</td>
        <td align="left" valign="middle" class="borderright borderbottom main-for">
        <input type="file" name="onemonthpic">
      </td>-->
      <!---------------------------------不是必填项，由于报错原因；暂时搁置-------------------------------------->
      </tr>
      <tr onMouseOut="this.style.backgroundColor='#ffffff'" onMouseOver="this.style.backgroundColor='#edf5ff'">
        <td align="right" valign="middle" class="borderright borderbottom bggray">注意输入框末尾的 <b>*</b></td>
        <td align="left" valign="middle" class="borderright borderbottom main-for"><h4>加<b>*</b>号项为必填项，不能为空。。。</h4>
        </td>
      </tr>
      <tr onMouseOut="this.style.backgroundColor='#ffffff'" onMouseOver="this.style.backgroundColor='#edf5ff'">
        <td align="right" valign="middle" class="borderright borderbottom bggray">&nbsp;</td>
        <td align="left" valign="middle" class="borderright borderbottom main-for">
        <input name="" type="submit" value="提交" class="text-but">
        <input name="" type="reset" value="重置" class="text-but"></td>
      </tr>
    </table>
    </form>
    </td>
    </tr>
</table>
</body>
</html>