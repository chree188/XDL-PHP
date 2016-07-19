<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="./public/css/info.css">  
</head>
<body>
	<?php
	include ("./view/head/head.php");
	echo "<br/><br/>";
	?>
	<div class='ddt'>
		<div class='ddt1'><img src="./public/images/6.jpg"></div>
		<div class='ddt2'><img src="./public/images/45.png"></div>
	</div>
	<div class='ddt3'>填写并核对订单信息</div><br/>
	<!--   分割     -->
	<div class='ddzt'>
		<div class='ddzt3'>
			<h3 class='ddzt1'>收货人信息</h3>
			<div class='ddzt2'><a href="./index.php?c=orders&a=info">新增收货地址</a></div>
		</div>
		<div class='ddzt7'><img src="./public/images/z.png"></div><br/>
		<!--   分割     -->
	<div>
	<div class='ddzt6'>
	<?php
	$sum = 0;
	foreach($_SESSION['cart'] as $k=>$v){
		echo '&nbsp;'.'&nbsp;'.'&nbsp;'.'&nbsp'.'&nbsp'.'&nbsp'.'&nbsp'.'&nbsp'.'&nbsp'.'&nbsp'.'&nbsp'.'&nbsp';
		echo "<td colspan=4> 收货人: {$_SESSION['orders']['rec']}</td>";
		echo '&nbsp;'.'&nbsp;'.'&nbsp;'.'&nbsp'.'&nbsp'.'&nbsp'.'&nbsp'.'&nbsp';
		echo '</tr>';
			echo '<tr>';
			echo "<td colspan=4> 地址: {$_SESSION['orders']['addr']}</td>";
			echo '</tr>';
			echo '&nbsp;'.'&nbsp;'.'&nbsp;'.'&nbsp'.'&nbsp'.'&nbsp'.'&nbsp'.'&nbsp';
			echo '<tr>';
			echo "<td colspan=4> 电话: {$_SESSION['orders']['tel']}</td>";
			echo '</tr>';
			echo '<br/>';
	}
	?>
	</div>
	<div class='ddzt7'><img src="./public/images/z.png"></div><br/>
	<!--   分割     -->
	<div class='shqd'>
		<h3 class='shqd1'>送货清单</h3>
		<div class='shqd2'><a href="./index.php?c=cart&a=index">返回修改购物车</a></div>
	</div>


<!--   分割     -->
		<div class='shqdnr'>
			<div class='shqdnr1'>
			<table border=0 width=500>
				<?php
					$sum = 0;
					foreach($_SESSION['cart'] as $k=>$v){
						echo '<tr>';
						echo '&nbsp;'.'&nbsp;'.'&nbsp;'.'&nbsp'.'&nbsp';
						echo '<td>'.'商品名称：'.$v['gname'].'</td>';
					}

				?>
			</table>
			</div>
			<div class='shqdnr2'>
	<table border=0 width=500>
		<?php
			$sum = 0;
			foreach($_SESSION['cart'] as $k=>$v){
				echo '<td>'.'商品金额：'.$v['price'].'</td>';
				echo '<td>'.'数量：'.$v['cnt'].'</td>';
				echo '&nbsp;'.'&nbsp;'.'&nbsp';
				echo '<td>'.'总价：'.$v['price']*$v['cnt'].'</td>';
				echo '</tr>';
				$sum += $v['price']*$v['cnt'];
			}


		?>
	</table>



			</div>
		</div>
		<!-- 分割 -->
		<div class='ddzt7'><img src="./public/images/z.png"></div><br/>
		<div class='ddzhuti3'>
			
		</div>
	</div><br/>

	<div class='ddwb'>
		<div class='ddzhuti6'>
			<div class='ddzhuti7'>	
					<?php
						$_SESSION['orders']['ormb'] = $sum;   //订单总金额
						$_SESSION['orders']['status'] = 1;    //订单状态

						  	$_GET['tblname']='shop_users';
							$_GET['pk']='uid';
							// echo "<pre>";
							// print_r($_SESSION['uname']);die;
							@$condition=" where uname='{$_SESSION['uname']}'";
							$user=select($condition);
							$m=$user[0];
						 // 	$condition=" where uid='{$m['uid']}' ";
							// $order=select($condition);
						$_SESSION['orders']['uid'] = $m['uid']; // 下单人 即,用户ID

						echo '<tr>';
						echo "<td colspan=4> ￥ {$_SESSION['orders']['ormb']}</td>";
						echo '</tr>';
					?>
				
			</div><br/>
		</div>
		<div class='ddzhuti6'>
			<div class='ddzhuti9'>应付总额：</div><br/>
			<div class='ddzhuti9'>

			<?php
				$sum = 0;
				foreach($_SESSION['cart'] as $k=>$v){
					echo '<br/>';
					echo "<td colspan=4> 收货人: {$_SESSION['orders']['rec']}</td>";
					echo '&nbsp;'.'&nbsp;'.'&nbsp;'.'&nbsp'.'&nbsp'.'&nbsp'.'&nbsp'.'&nbsp'.'&nbsp';
					echo '</tr>';
					echo '<tr>';
					echo "<td colspan=4> 地址: {$_SESSION['orders']['addr']}</td>";
					echo '</tr>';
					echo '&nbsp;'.'&nbsp;'.'&nbsp;'.'&nbsp'.'&nbsp'.'&nbsp'.'&nbsp'.'&nbsp'.'&nbsp';
					echo '<tr>';
					echo "<td colspan=4> 电话: {$_SESSION['orders']['tel']}</td>";
					echo '</tr>';
				}
			?>

			</div><br/>
		</div>
	</div><br/>
	<div class='ddwb1'>
		<?php
			echo "<a href='./index.php?c=orders&a=mkorders'>提交订单</a>"; //点击调用 生成订单功能
		?>
	</div><br/>
	<div class='ddwb2'><img src="./public/images/46.png"></div><br/>

	<?php
	include ("./view/base/base.html");
	?>
</body>
</html>