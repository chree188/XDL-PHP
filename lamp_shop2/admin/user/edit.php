<?php include("../init.php");
	
	$sql = 'select * from user where id='.$_GET['id'];
	// echo $sql;exit;
	$result = query($sql);
	$user_list = $result[0];



 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<style>
body {
	overflow-x: hidden;
	background: #f2f0f5;
	padding: 15px 0px 10px 5px;
}

	</style>
	<link rel="stylesheet" href="<?= CSS?>edit.css">
</head>
<body>
	
	<table width="99%" border="0" cellspacing="0" cellpadding="0" id="searchmain">
  <tr>
    <td width="99%" align="left" valign="top">您的位置：<a href="index.php">用户模块</a>&nbsp;&nbsp;>&nbsp;&nbsp;编辑用户</td>
  </tr>
  <tr>
    <td align="left" valign="top" id="addinfo">
    <a href="add.php" target="mainFrame" onFocus="this.blur()" class="add">新增用户</a>
    </td>
  </tr>
 
  <tr>
    <td align="left" valign="top">
    <form method="post" action="./action.php?bz=edit" enctype='multipart/form-data'>
	    <table width="100%" border="0" cellspacing="0" cellpadding="0" id="main-tab">
	    <input type="hidden" name='id' value='<?= $user_list['id']?>'>
	      <tr onMouseOut="this.style.backgroundColor='#ffffff'" onMouseOver="this.style.backgroundColor='#edf5ff'">
	        <td align="right" valign="middle" class="borderright borderbottom bggray">用户姓名：</td>
	        <td align="left" valign="middle" class="borderright borderbottom main-for">
	        <input type="text" name="nickname" value="<?= $user_list['nickname'];?>" class="text-word">
	       <b>*</b>
	        </td> 
	        </tr>

	     

	      <tr onMouseOut="this.style.backgroundColor='#ffffff'" onMouseOver="this.style.backgroundColor='#edf5ff'">
	        <td align="right" valign="middle" class="borderright borderbottom bggray">密码：</td>
	        <td align="left" valign="middle" class="borderright borderbottom main-for">
	        <input type="password" name="pwd" class="text-word">
	        <b>*</b>
	        </td>
	      </tr>

	      <tr onMouseOut="this.style.backgroundColor='#ffffff'" onMouseOver="this.style.backgroundColor='#edf5ff'">
	        <td align="right" valign="middle" class="borderright borderbottom bggray">确认密码：</td>
	        <td align="left" valign="middle" class="borderright borderbottom main-for">
	        <input type="password" name="repwd" value="" class="text-word">
	        <b>*</b>
	        </td>
	        </tr>
			
			 

			<tr onMouseOut="this.style.backgroundColor='#ffffff'" onMouseOver="this.style.backgroundColor='#edf5ff'">
	        <td align="right" valign="middle" class="borderright borderbottom bggray">手机号：</td>
	        <td align="left" valign="middle" class="borderright borderbottom main-for">
	        <input type="text" name="tel" value="<?= $user_list['nickname']?>" class="text-word" placeholder='手机号' maxlength=11>
	        </td>
	        </tr>

	      <tr onMouseOut="this.style.backgroundColor='#ffffff'" onMouseOver="this.style.backgroundColor='#edf5ff'">
	        <td align="right" valign="middle" class="borderright borderbottom bggray">性别：</td>
	        <td align="left" valign="middle" class="borderright borderbottom main-for">	        
	        <label><input type="radio" name="sex" value=1 <?= $user_list['sex'] == 1? 'checked':'' ?>>男</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	        <label><input type="radio" name="sex" value=2 <?= $user_list['sex'] == 2? 'checked':'' ?>>女</label>
	        <!-- <label> <input type="radio" name="sex" value=1 <?= $user_list['sex'] == 1? 'checked':'' ?>>男</label>
				<label> <input type="radio" name="sex" value=2 <?= $user_list['sex'] == 2? 'checked':'' ?>>女</label> -->
			</p>
	        </td>
	        </tr>

	      <!-- <tr onMouseOut="this.style.backgroundColor='#ffffff'" onMouseOver="this.style.backgroundColor='#edf5ff'">
	        <td align="right" valign="middle" class="borderright borderbottom bggray">生日：</td>
	        <td align="left" valign="middle" class="borderright borderbottom main-for">
	        <input type="date" name="birthday" value="" class="text-word">
	        </td>
	      </tr> -->

	     <!--  <tr onMouseOut="this.style.backgroundColor='#ffffff'" onMouseOver="this.style.backgroundColor='#edf5ff'">
	        <td align="right" valign="middle" class="borderright borderbottom bggray">邮编：</td>
	        <td align="left" valign="middle" class="borderright borderbottom main-for">
	        <input type="text" name="code" value="" class="text-word">
	        </td>
	      </tr>
	      <tr onMouseOut="this.style.backgroundColor='#ffffff'" onMouseOver="this.style.backgroundColor='#edf5ff'">
	        <td align="right" valign="middle" class="borderright borderbottom bggray">电话：</td>
	        <td align="left" valign="middle" class="borderright borderbottom main-for">
	        <input type="text" name="phone" value="" class="text-word">
	        </td>
	      </tr> -->
	      <tr onMouseOut="this.style.backgroundColor='#ffffff'" onMouseOver="this.style.backgroundColor='#edf5ff'">
	        <td align="right" valign="middle" class="borderright borderbottom bggray">email：</td>
	        <td align="left" valign="middle" class="borderright borderbottom main-for">
	        <input type="email" varlues="<?= $user_list['email']?>" name="email" class="text-word">
	        </td>
	      </tr>

	       <tr onMouseOut="this.style.backgroundColor='#ffffff'" onMouseOver="this.style.backgroundColor='#edf5ff'">
	        <td align="right" valign="middle" class="borderright borderbottom bggray">头像：</td>
	        <td align="left" valign="middle" class="borderright borderbottom main-for">
	 		 <!-- <p>头像: <input type="file" name='icon' ></p> -->
	        <input type="file" name="icon" value="" class="text-word">
	        </td>
	        </tr>

	      <!-- <tr onMouseOut="this.style.backgroundColor='#ffffff'" onMouseOver="this.style.backgroundColor='#edf5ff'">
	        <td align="right" valign="middle" class="borderright borderbottom bggray">用户权限：</td>
	        <td align="left" valign="middle" class="borderright borderbottom main-for">
	        <select name="state" id="level">
		    <option value="1" >&nbsp;&nbsp;超级管理员</option>
		    <option value="2" >&nbsp;&nbsp;YJSY会员</option>
		    <option value="3" >&nbsp;&nbsp;普通用户</option>
	        </select>
	        </td>
	      </tr> -->
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
</body>
</html>