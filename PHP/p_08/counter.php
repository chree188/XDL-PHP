<form action="" method="post">
	第一个值：<input type="text" name="num1" value="" style="width: 50px;" autofocus /><br>
		<label><input type="radio" name="count" id="count" value="+" />+</label>
		<label><input type="radio" name="count" id="count" value="-" />-</label>
		<label><input type="radio" name="count" id="count" value="*" />*</label>
		<label><input type="radio" name="count" id="count" value="/" />/</label><br>
	第二个值：<input type="text" name="num2" value="" style="width: 50px;" /><br>
		<input type="submit" value="计算" /><br>
</form>
<?php	
	header('content-type:text/html;charset=utf-8');
	if(!isset($_POST['num1'])||!isset($_POST['num2'])||!is_numeric($_POST['num1'])||!is_numeric($_POST['num2'])){
		die("<div style='color:red'>请输入正确格式</div>");
	}
	$num1=$_POST['num1'];
	$num2=$_POST['num2'];
	$count=$_POST['count'];
	
	if($num2==0&&$count=='/'){
		die("<div>被除数不能为0</div>");
	}
	$result='';
	switch ($count) {
		case '+':$result=$num1+$num2;break;
		case '-':$result=$num1-$num2;break;
		case '*':$result=$num1*$num2;break;
		case '/':$result=$num1/$num2;break;
	}
	echo $num1.$count.$num2.'='.$result;
?>