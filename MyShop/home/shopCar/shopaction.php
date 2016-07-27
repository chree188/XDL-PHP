<?php 
	session_start(); //启用会话session
	
				//获取参数a的值，并执行对应的操作
				switch($_GET['a']){
					
					/***********添加到购物车*************/
					case "add":  //加入购物车操作
						//获取要购买的商品信息
						$id = $_GET['id']; 
						//1. 导入配置文件
						require("../../public/sql/dbconfig.php");
						//2. 连接MySQL数据并判断
						$link=@mysql_connect(HOST,USER,PASS)or die("数据库连接失败！");
						//3. 选择数据库，设置编码
						mysql_select_db(DBNAME,$link);
						mysql_set_charset("utf8");
						//4. 定义查询sql语句，并执行
						$sql =  "select * from goods where id=".$id;
						$result = mysql_query($sql,$link);
						//5. 解析商品信息，并处理
						if(empty($result)){
							die("没有找到要添加的商品！");
						}
						$shop = mysql_fetch_assoc($result);
						$shop['m']=1; //追加购买商品数量
						//添加到购物车
						//先判断购物车中是否没有要购买的商品
						if(empty($_SESSION['shoplist'][$id])){
							//作为新商品放进去
							$_SESSION['shoplist'][$id]=$shop;
						}else{
							//购物车已存在，修改商品数量即可
							$_SESSION['shoplist'][$id]['m']+=1;
						}
						echo "<script> alert('添加购物车成功');parent.location.href='../details.php?id=$id'; </script>"; 
						break;
					
					/****************删除购物车中某件商品***************/
					case "del":  //从购物车中移除一个商品
						unset($_SESSION['shoplist'][$_GET['id']]);
						echo "<script>alert('删除成功！');window.location='showshop.php';</script>";
						break;
					
					/****************清空购物车中***************/
					case "clear": //清空购物车操作
						unset($_SESSION['shoplist']);
						echo "<script>alert('购物车已清空！');window.location='showshop.php';</script>";
						break;
					
					/****************修改购物车中某件商品数量***************/
					case "edit": //更改购物车中商品数量
						$id= $_GET['id'];
						$m = $_GET['m'];
						$_SESSION['shoplist'][$id]['m']+=$m;
						//判断是否商品数据越界
						if($_SESSION['shoplist'][$id]['m']<1){
							$_SESSION['shoplist'][$id]['m']=1;
						}
						echo "<script>window.location='showshop.php';</script>";
						break;
				}
