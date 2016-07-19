
	<?php
	include ("./view/sns/head.php");
	?>
		<div class='grzxy'>
			<div class='grzxy1'>
				<a href='#'><img src="./public/images/41.png"></a>&nbsp;
				<a href='#'><img src="./public/images/42.png"></a>&nbsp;
				<a href='#'><img src="./public/images/43.png"></a>&nbsp;
				<a href='#'><img src="./public/images/44.png"></a>&nbsp;
			</div>
			<div class='grzxy2'>
				<div>近期订单</div><br/>

				<div>订单详情</div><br/>				
					<?php
						date_default_timezone_set('PRC');
						 $status = [0=>'未发货',1=>'已发货'];
						 if(!empty($orders)){
							echo "<table border=1 cellspacing=0 width=900 >";
								echo "<tr><th>下单时间</th> <th>订单编号</th> <th>手机号</th><th>地址</th><th>收货人</th><th>价格</th><th>订单状态</th></tr>";
								foreach($orders as $k=>$v){
								 $ot = date('Y-m-d H:i:s',$v['otime']);
								 
								if($v['uid'] == $_SESSION['orders']['uid']){
								echo "<tr><td>{$ot}</td> <td>{$v['oid']}</td> <td>{$v['tel']}</td> <td>{$v['addr']}</td> <td>{$v['rec']}</td> <td>￥：{$v['ormb']}</td> <td>{$status[$v['status']]}</td> </tr>";
								}
								}
								}
							echo "</table>";
							?>
				
			</div>
		</div>
	</div>
<?php
	include ("./view/base/base.html");
?>
</body>
</html>