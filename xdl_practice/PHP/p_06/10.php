<html>
	<head>
		<meta charset="UTF-8" />
		<title>表单练习</title>
	</head>
	<body>
		<h2>表单练习</h2>
		<form action="" method="post" enctype="multipart/form-data">
			请输入行数：
			<input type="text" name="string" placeholder="输入数字" autofocus/>
			<input type="submit" value="提交" />
		</form>
	</body>
</html>


<?php

	/*
	 * 把表单的数据传到PHP中！
	 * 因为传过来的数据是string类型的，所以要强制转换成int类型
	 * */
	$string = empty($_POST['string']) ? " " : $_POST['string'];
 	echo $string;
	$string=(int)$string;
	echo '<br/>';
	//------------------

	/*
	 * 根据输入的行号，打印星星
	 * 因为之前已经把表单传过来的类型强制转换成int了
	 * 所以就算是在表单中输入的値是string类型的，它也不会执行下面的语句
	 */
	for($i=1;$i<=$string;$i++){
		for($j=1;$j<=$i;$j++){
			echo '*';
		}
		echo '<br/>';
	}
	echo '<br/>';
	echo '<br/>';

	
	//根据输入的行号，打印星星
	for($a=1;$a<=$string;$a++){
		for($b=1;$b<=$a;$b++){
			echo '&ensp;';
		}
		for($k=1;$k<=($string+1-$a);$k++){
            echo '*';
        }
		echo '</br>';
	}
	echo '<br/>';
	echo '<br/>';
	

?>