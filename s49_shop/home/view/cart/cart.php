<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="../../public/css/cart.css"> 
</head>
<?php
	
	session_start();

?>
<body>
	<?php
	include ("../head/head.php");
	include ("../seek/seek.html");
	echo "<br/><br/>";
	?>	
	<div class='xqdaohang'>
		<ul>
			<li><a href='.././index/index.php'>首页</a></li>
			<li><a href='.././list page/list page.php'>继续购物</a></li>
		</ul>
	</div>
	<div class='gwctou'><img src="../../public/images/38.png"></div><br/>
	<div class='gwc1'>
		<div class='gwc2'>全部商品	药品</div>
				<form action="" method='POST'>
					<div class='gwc3'>
					配送至：<select name="classid" id="">
					<option value='lamp44'>北京</option>
					<option value='lamp49'>上海</option>
					<option value='lamp50'>广州</option>
				  	</select>
					</div>
				</form>	
	</div>
	<div class="gwc4">
		<div class="gwc6">商品</div>
		<div class="gwc5">单价（元）</div>
		<div class="gwc5">数量</div>
		<div class="gwc5">小计（元）</div>
		<div class="gwc5">操作</div>
	</div>	<br/>

<?php


		$link=mysqli_connect('localhost','root','')or die('数据库连接失败');
		mysqli_set_charset($link,'utf8');
		mysqli_select_db($link,'s49_shop');
		

		
		if(!empty($_GET['gid'])){
		
			$sql="insert into shop_cart(uid,gid,cnt) values({$_SESSION['uid']},{$_GET['gid']},'1')";
		
			$res = mysqli_query($link,$sql);   //网购物车里添加数据
		}
		

		//查询购物车页面商品
		$sql="select g.gid,g.gpic,g.gname,g.price,c.cnt,count(c.gid) mm from shop_goods as g,shop_cart as c where g.gid=c.gid and c.uid={$_SESSION['uid']} group by g.gid order by c.otime";
		$res = mysqli_query($link,$sql);
		$carts=mysqli_fetch_all($res,MYSQLI_ASSOC);  	
			// echo '<pre>';
			// print_r($carts);die;
			
			$dan=1;
			$sum=0;
			$sl=0;
			
			foreach($carts as $v){
			
			$sum+=$v['price']*$dan;
			$sl+=$dan;
		?>
	<div class="gwc7">
		<div class="gwz8"><img src="<?php echo '../../../admin/public/images/goods/',$v['gpic']; ?>"></div>
		<div class="gwz8"><a href="#"><?php echo $v['gname'];?></a></div>
		<div class="gwz8">颜色：<?php echo $v['gname']; ?></div>
		<div class="sgw10">
			<div class="gwz9">￥<?php echo $v['price'] ?> </div>
			<div class="gwz9">
				<input type="submit" value="-">			
				<input type="text" name="" value="1" style="width:30px;">
		       	<input type="submit" value="+">
		    </div>
			<div class="gwz9">￥<?php echo $v['price'] ?></div>
			<div class="gwz9"><a href="./delete.php?del&gid=<?php echo $v['gid']; ?>">删除</a></div>
		</div>
	</div><br/>

<?php
}
?>
	<div class="gwz11">
		<div class='gwz12'>
			<div class='gwz13'>总价（不含运费）：￥<?php echo $sum;?></div>
			<div class='gwz14'><a href=""><input type="submit" value="去结账"></a></div>
		</div>
	</div><br/></br>
<?php
	echo "<br/><br/>";
	include ("../base/base.html");
?>
</body>
</html>