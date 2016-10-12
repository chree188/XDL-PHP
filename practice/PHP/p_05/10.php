<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>
			表单练习
		</title>
	</head>
	<body>
		<h2>
			表单练习
		</h2>
		<form action="" method="post" enctype="multipart/form-data">
			请输入月份：
			<input type="text" name="month" value="" placeholder="输入数字1-12" autofocus/>
			<input type="submit" value="提交" />
		</form>
	</body>
</html>
<?php
header('Content-type:text/html;charset=utf-8');

$month = empty($_POST['month']) ? " " : $_POST['month'];
$d31 = "月份有31天。";
$d30 = "月份有30天。";
$d29 = "月份今年有29天。";

switch($month) {
	case 1 :
		echo $month . $d31;
		break;
	case 3 :
		echo $month . $d31;
		break;
	case 5 :
		echo $month . $d31;
		break;
	case 7 :
		echo $month . $d31;
		break;
	case 8 :
		echo $month . $d31;
		break;
	case 10 :
		echo $month . $d31;
		break;
	case 12 :
		echo $month . $d31;
		break;
	case 4 :
		echo $month . $d30;
		break;
	case 6 :
		echo $month . $d30;
		break;
	case 9 :
		echo $month . $d30;
		break;
	case 11 :
		echo $month . $d30;
		break;
	case 2 :
		echo $month . $d29;
		break;
	case $month != 1||2||3||4||5||6||7||8||9||10||12 :
		echo "请输入正确的月份。";
		break;
	//		case " ": echo "没有输入月份";
}
?>