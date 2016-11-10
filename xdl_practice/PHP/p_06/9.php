<!--<html>
<head>
    <meta charset="UTF-8" />
</head>
<body>
<h2>
    实现一个计算器
</h2>
<form action="" method="post" enctype="multipart/form-data">
    输入第一个数：
    <input type="text" name="one" autofocus/>
    <br/>
    <label>
        <input type="radio" name="str" value="+" id="0" />
        +
    </label>
    <label>
        <input type="radio" name="str" value="-" id="1" />
        -
    </label>
    <label>
        <input type="radio" name="str" value="*" id="2" />
        *
    </label>
    <label>
        <input type="radio" name="str" value="/" id="3" />
        /
    </label>
    <br />
    输入第二个数：
    <input type="text" name="two" autofocus/>
    <br/>
    <input type="submit" value="提交" />
</form>
</body>
</html>


<?php

/*
 * 把两个txt文本内的内容传到php中
 * 并且强制转换成Int类型
 * */
$one = empty($_POST['one']) ? " " : $_POST['one'];
$two = empty($_POST['two']) ? " " : $_POST['two'];
$one=(int)$one;
$two=(int)$two;

//得到了radio中的value值
$str= empty($_POST['str']) ? " " : $_POST['str'];

//用于判断，加法，减法，乘法，除法
switch($str) {
    case "+" :
        echo $one,'+',$two,'=' ,$one+$two;
        break;
    case "-" :
        echo $one,'-',$two,'=' ,$one-$two;
        break;
    case "*" :
        echo $one,'*',$two,'=' ,$one*$two;
        break;
    case "/" :
		//判断被除数是否为0
		if($two==0){
			echo '被除数不能为‘0’';
		}else{
        echo $one,'/',$two,'=' ,$one/$two;
        break;
		}
}

?>-->


<form action="" method='post'>
	第一个值:<input type="text" name='num1' value='' style='width:50px;'><br>
			 <input type="radio" name='count' value='+' checked>+
			 <input type="radio" name='count' value='-'>-
			 <input type="radio" name='count' value='*'>*
			 <input type="radio" name='count' value='/'>/<br>
	第二个值:<input type="text" name='num2' value='' style='width:50px;'><br> 
			 <input type="submit" value='计算'><br> 
</form>
<?php  
header('content-type:text/html;charset=utf-8');
if(!isset($_POST['num1']) || !isset($_POST['num2']) || !is_numeric( $_POST['num1']) || !is_numeric( $_POST['num2'])){
	die("<div style='color:red'>请输入正确格式</div>");
}
$num1 = $_POST['num1'];
$num2 = $_POST['num2'];
$count = $_POST['count'];

if($num2 == 0 && $count == '/'){
	die("<div>除数不能为0</div>");
}
$result = '';
switch($count){
	case '+': $result = $num1+$num2;break;
	case '-': $result = $num1-$num2;break;
	case '*': $result = $num1*$num2;break;
	case '/': $result = $num1/$num2;break;
}
echo $num1.$count.$num2.'='.$result;

