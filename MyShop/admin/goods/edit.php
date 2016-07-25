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

textarea {
	resize: none;
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
    <td width="99%" align="left" valign="top">您的位置：<a href="index.php">商品模块</a>&nbsp;&nbsp;>&nbsp;&nbsp;添加商品</td>
  </tr>
  <tr>
    <td align="left" valign="top" id="addinfo">
    <a href="add.php" target="mainFrame" onFocus="this.blur()" class="add">新增商品</a>
    </td>
  </tr>
  <tr>
    <td align="left" valign="top">
    	<?php
    	//设置报错情况	去除notice错误
		error_reporting(E_ALL ^ E_NOTICE);
		
		//需要获得被修改的商品信息
		//1 导入配置文件 
		
		if(@$_GET['id']){

			include("../../public/sql/dbconfig.php");
			//2 连接数据库
			$link = @mysqli_connect(HOST,USER,PASS) or die("数据库连接失败");
			//3 选择数据库 设置字符集
			mysqli_set_charset($link,"utf8");
			mysqli_select_db($link,DBNAME);
			//4 写sql语句 执行sql
			$sql = "select * from goods where id={$_GET['id']}";
			$result = mysqli_query($link,$sql);

			//5 解析结果集 
			$row = mysqli_fetch_assoc($result);
		}

		?>
    <form method="post" action="./action.php?a=update" enctype="multipart/form-data">
    <input type="hidden" name='id' value="<?php echo $row['id']?> ">
    <input type="hidden" name='oldpicname' value="<?php echo $_GET['oldpicname']?> ">
    <table width="100%" border="0" cellspacing="0" cellpadding="0" id="main-tab">
      <tr onMouseOut="this.style.backgroundColor='#ffffff'" onMouseOver="this.style.backgroundColor='#edf5ff'">
        <td align="right" valign="middle" class="borderright borderbottom bggray">所属类别：</td>
        <td align="left" valign="middle" class="borderright borderbottom main-for">
        <select name="typeid" id="level" >
        <?php
			//查看类别信息 select 输出到表格里面 
			//六脉神剑   ======上面获得被修改的商品信息已经使用，所以这里注释
			//1 导入数据库配置文件
//			include("../../public/sql/dbconfig.php");
//			//2 连接数据库
//			$link = @mysqli_connect(HOST,USER,PASS) or die("数据库连接失败");
//			//3 设置字符集 选择数据库
//			mysqli_set_charset($link,"utf8");
//			mysqli_select_db($link,DBNAME);
			//4 写sql语句 获得结果集 
			$sql = "select * from type order by concat(path,id)";	// 修改为一类别pid path排序
			$result = mysqli_query($link,$sql);
			//5 解析结果集 
			while($trow = mysqli_fetch_assoc($result)){
//				显示下拉列表的形式
				$disable = null;	//祖父类默认不可选
				if($trow['pid']==0){
					$disable = "disabled";
				}
				
//				1 数逗号个数
				$num = substr_count($trow['path'], ',');
//				2 输出空格
				$pad = str_repeat("_>", $num-1);
				$selected = null;		//修改时默认选中被修改是商品的父类
				if($_GET['pid']==$trow['id']){
					$selected = "selected";
				}
				
				echo "<option value='{$trow['id']}'{$disable}{$selected}>{$pad}{$trow['name']}</option>";
			}	
			//6 关闭数据库 释放结果集 
			
			mysqli_close($link);
			mysqli_free_result($result);
		?>
        </select>
        </td>
      </tr>
      <tr onMouseOut="this.style.backgroundColor='#ffffff'" onMouseOver="this.style.backgroundColor='#edf5ff'">
        <td align="right" valign="middle" class="borderright borderbottom bggray">商品名称：</td>
        <td align="left" valign="middle" class="borderright borderbottom main-for">
        <input type="text" name="goods" value="<?php echo $row['goods']?>" class="text-word">
        <b>*</b>
        </td>
        </tr>
      <tr onMouseOut="this.style.backgroundColor='#ffffff'" onMouseOver="this.style.backgroundColor='#edf5ff'">
        <td align="right" valign="middle" class="borderright borderbottom bggray">生产厂家：</td>
        <td align="left" valign="middle" class="borderright borderbottom main-for">
        <input type="text" name="company" value="<?php echo $row['company']?>" class="text-word">
        </td>
        </tr>
      <tr onMouseOut="this.style.backgroundColor='#ffffff'" onMouseOver="this.style.backgroundColor='#edf5ff'">
        <td align="right" valign="middle" class="borderright borderbottom bggray">简介：</td>
        <td align="left" valign="middle" class="borderright borderbottom main-for">
        <textarea name="descr" value="" cols="42px" rows="7px" class="text-word"><?php echo $row['descr']?></textarea>
        </td>
        </tr>
      <tr onMouseOut="this.style.backgroundColor='#ffffff'" onMouseOver="this.style.backgroundColor='#edf5ff'">
        <td align="right" valign="middle" class="borderright borderbottom bggray">单价：</td>
        <td align="left" valign="middle" class="borderright borderbottom main-for">
        <input type="text" name="price" value="<?php echo $row['price']?>" class="text-word"><b style="color: gold;font-size: 20px;">￥</b>
        </td>
        </tr>
       <tr onMouseOut="this.style.backgroundColor='#ffffff'" onMouseOver="this.style.backgroundColor='#edf5ff'">
        <td align="right" valign="middle" class="borderright borderbottom bggray">图片：</td>
        <td align="left" valign="middle" class="borderright borderbottom main-for">
        <input type="file" name="pic" value="<?php echo $_GET['oldpicname']?>"><b>*</b>
        </td>
        </tr>
      <tr onMouseOut="this.style.backgroundColor='#ffffff'" onMouseOver="this.style.backgroundColor='#edf5ff'">
        <td align="right" valign="middle" class="borderright borderbottom bggray">状态：</td>
        <td align="left" valign="middle" class="borderright borderbottom main-for">
        <label><input type="radio" name="state" value="1" <?php echo $row['state']=='1' ? 'checked' :'';  ?>>新添加</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <label><input type="radio" name="state" value="2" <?php echo $row['state']=='2' ? 'checked' :'';  ?>>在售</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <label><input type="radio" name="state" value="3" <?php echo $row['state']=='3' ? 'checked' :'';  ?>>下架</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        </td>
        </tr>
      <tr onMouseOut="this.style.backgroundColor='#ffffff'" onMouseOver="this.style.backgroundColor='#edf5ff'">
        <td align="right" valign="middle" class="borderright borderbottom bggray">库存量：</td>
        <td align="left" valign="middle" class="borderright borderbottom main-for">
        <input type="text" name="store" value="<?php echo $row['store']?>" class="text-word">
        </td>
      </tr>
      <tr onMouseOut="this.style.backgroundColor='#ffffff'" onMouseOver="this.style.backgroundColor='#edf5ff'">
        <td align="right" valign="middle" class="borderright borderbottom bggray">注意输入框末尾的 <b>*</b></td>
        <td align="left" valign="middle" class="borderright borderbottom main-for"><h4>加<b>*</b>号项为必填项，不能为空。。.状态只能修改为<b>在售 或 下架</b></h4>
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
    <?php
		//处理添加表单的错误信息
		switch(@$_GET['errno']) {
			case 1 :
				echo "<h2 style='color:red; '>修改失败,该商品已存在</h2>";
				break;
			case 2 :
				echo "<h2 style='color:red; '>带*项不能为空</h2>";
				break;
		}
	?>
    </td>
    </tr>
</table>
</body>
</html>