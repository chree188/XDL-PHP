<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="./public/css/index.css">  
</head>
<body>
	<?php
		include ("./view/head/head.php");
		include ("./view/seek/seek.html");
	?>
	<!-- 导航条 -->
	<div class='sydh'>
		<div class='sydh1'>
			<ul>
				  <?php
            
                $condition = " where pid=0 ";
                $menu_1 = select($condition);
                // echo '<pre>';
                // print_r($menu_1);die;
                
                foreach($menu_1 as $k=>$v){
                
                    echo "<li class='m1'><a href='./index.php?c=goods&a=index&tid={$v['tid']}'>{$v['tname']}</a>";
                    
                    //如果一级分类,有子类,就把子类显示出来
                    // $condition = " where pid={$v['tid']} ";
                    // if($menu_2 = select($condition)){
                    // echo "<ul>";
                    //         foreach($menu_2 as $kk=>$vv){
                            
                    //             echo "<li class='m2'><a href='./index.php?c=goods&a=index&tid={$vv['tid']}'>{$vv['tname']}</a></li>";
                            
                    //         }
                    // echo "</ul>";
                    // }    
                    echo "</li>";
                
                }
            ?>
			</ul>
		</div>
	</div>

	<!-- banner -->
	<div class='lb'>
		<img src="./public/images/111.jpg" alt="">
	</div>
	<div class='lunbotu1'>
		<img src="./public/images/15.gif" alt="">&nbsp;
		<img src="./public/images/16.png" alt="">
	</div><br/>
	<!-- 1级页面-->
	<div><img src="./public/images/18.gif" alt=""></div>
	<div><img src="./public/images/19.gif" alt=""></div>

	<div class='zhuti1'>
		<div class='zhuti2'><img src="./public/images/17.png" alt=""></div>


		<div class='zhuti3'>
		<?php
			$_GET['tblname'] = 'shop_goods';
			$_GET['pk'] = 'gid';
			$condition=" where tid=18 limit 0,4";
			$goods=select($condition);
			// echo '<pre>';
			// print_r($goods);die;
			foreach($goods as $k=>$v){
					$v['gpic']=rtrim($v['gpic'],'|#x#|');
					// echo '<pre>';
					// print_r($v['gpic']);die;
					echo "<div  class='zhuti3'>
						<ul>
							<li class='mb3'><a href='./index.php?c=goods&a=index&tid={$v['tid']}'><img src='../admin/public/images/goods/{$v['gpic']}'></a></li>
							<li class='mb4'><a href='./index.php?c=goods&a=index&tid={$v['tid']}'>{$v['gname']}</a></li>
							<li class='mb5'>¥ {$v['price']}</li>
						</ul>
					
					</div>";
					
			}
		?>
		</div>


	</div><br/>
	<div class='ggao'><img src="./public/images/22.gif" alt=""></div><br/>

	<!-- 2级页面 -->
	<div><img src="./public/images/23.gif" alt=""></div>
	<div><img src="./public/images/22.png" alt=""></div>

	<div class='zhuti1'>
		<div class='zhuti2'><img src="./public/images/23.png" alt=""></div>
	
		<div class='zhuti3'>
			<?php
			$_GET['tblname'] = 'shop_goods';
			$_GET['pk'] = 'gid';
			$condition=" where tid=16 limit 0,4";
			$goods=select($condition);
			// echo '<pre>';
			// print_r($goods);die;
			foreach($goods as $k=>$v){
					$v['gpic']=rtrim($v['gpic'],'|#x#|');
					// echo '<pre>';
					// print_r($v['gpic']);die;
					echo "<div  class='zhuti3'>
						<ul>
							<li class='mb3'><a href='./index.php?c=goods&a=index2&tid={$v['tid']}'><img src='../admin/public/images/goods/{$v['gpic']}'></a></li>
							<li class='mb4'><a href='./index.php?c=goods&a=index2&tid={$v['tid']}'>{$v['gname']}</a></li>
							<li class='mb5'>¥ {$v['price']}</li>
						</ul>
					
					</div>";
					
			}
		?>
		</div>
	
	</div><br/>
	<!--3级页面-->
	<div><img src="./public/images/28.gif" alt=""></div>
	<div><img src="./public/images/29.gif" alt=""></div>
	<div><img src="./public/images/28.png" alt=""></div>

	<div class='zhuti1'>
		<div class='zhuti2'><img src="./public/images/29.png" alt=""></div>
		<div class='zhuti3'>
	

		<div class='zhuti3'>
			<?php
			$_GET['tblname'] = 'shop_goods';
			$_GET['pk'] = 'gid';
			$condition=" where tid=17 limit 0,4";
			$goods=select($condition);
			// echo '<pre>';
			// print_r($goods);die;
			foreach($goods as $k=>$v){
				
					$v['gpic']=rtrim($v['gpic'],'|#x#|');
					// echo '<pre>';
					// print_r($v);die;
					echo "<div class='zhuti3'>
						<ul>
							<li class='mb3'><a href='./index.php?c=goods&a=index1&tid={$v['tid']}'><img src='../admin/public/images/goods/{$v['gpic']}'></a></li>
							<li class='mb4'><a href='./index.php?c=goods&a=index1&tid={$v['tid']}'>{$v['gname']}</a></li>
							<li class='mb5'>¥ {$v['price']}</li>
						</ul>
					
					</div>";
					
			}
		?>	
		</div>
	
		</div>
	
	</div><br/>
	<?php
		include ("./view/base/base.html");
	?>
</body>
</html>