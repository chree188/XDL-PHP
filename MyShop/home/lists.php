<html>
	<head>
		<meta charset="UTF-8" />
		<title>精选商品</title>
		<script type="text/javascript" src="./include/js/jquery-1.6.4.min.js"></script>
	</head>
	<body>
		<!--网页主体content-->
			<?php
				include './include/header.php';
			?>
		<div class="content">
			<div class="inner">
    	<div class="ibanner">
    <img src="./include/img/ibanner04.jpg" width="980" height="249" /></div>
    	<div class="tinner">
        	<div class="hd"><img class="png" src="./include/img/hd.png" width="1006" height="29" /></div>
        	<div class="bd png">
            	<div class="ileft">
                	<div class="title">精选产品</div>
                    <ul class="list">
						<?php
							//商品类别表里面的一级类别遍历出来	
                    		$sql = "select * from type where pid = 0";
							$result = mysqli_query($link,$sql);	//成功是结果集对象 失败false
							if($result){
								while($row = mysqli_fetch_assoc($result)){
$str = <<<aa
					<li>
						<a href="lists.php?typeid={$row['id']}">
							精选{$row['name']}类产品
						</a>
					</li>
aa;
					echo $str;
								}
							}
                    	?>
					</ul>
                    <div class="lft"><img src="./include/img/lnavft.jpg" width="222" height="15" /></div>
                </div>
                <div class="iright">
                	<div class="position">
                    	当前位置&nbsp;&nbsp;<a href="index.php">首页</a>|<a href="lists.php">精选产品</a>
                    </div>
                    <ul class="plist">
                    	
                    	<?php
							//where 使用封装搜索条件
							//1 设置数组来接收搜索的条件 
							$wherelist = array();
			
							//2 判断get方式传值 搜索条件是否存在
							if(!empty($_GET['typeid'])){
								$wherelist[] = "typeid in(select id from type where path like '%,{$_GET['typeid']},%')";
							}
			
							//3 查看搜索条件数组是否有值 
							if(count($wherelist)>0){
								$where  = " where ".implode(" and ",$wherelist);
							}
			
							//4 拼接sql语句
							$sql = "select * from goods ".$where;
							$result = mysqli_query($link,$sql);
							while($row = mysqli_fetch_assoc($result)){
$str = <<<aa
		
						<li>
                        	<div class="media"><a href="details.php?id={$row['id']}"><img src="../admin/goods/uploads/m_{$row['picname']}" width="203" height="131" /></a></div>
                        	<div class="intro">
                            	<div class="tt"><a href="details.php?id={$row['id']}">{$row['goods']}</a></div>
                                <div class="c">{$row['descr']}</div>
                                <div class="more"><a href="details.php?id={$row['id']}"><img src="./include/img/button01.jpg" width="130" height="38" /></a></div>
                            </div>
                        </li>
aa;
							echo $str;
							}
						?>
                    </ul>
                    <div class="page">
  <span class="disabled">«上一页</span><span class="current">1</span><a href="/newslist/0/2.aspx">2</a><a href="/newslist/0/3.aspx">3</a><a href="/newslist/0/4.aspx">4</a><a href="/newslist/0/2.aspx">下一页»</a>
</div>
                </div>
            </div>
            <div class="ft"><img class="png" src="./include/img/ft.png" width="1006" height="29" /></div>
        </div>	
    </div>
			<?php
			include './include/footer.php';
			?>
		</div>
	</body>
</html>
