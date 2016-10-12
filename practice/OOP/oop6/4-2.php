<?php	
header("content-type:text/html;charset=utf-8");

//异常封装到 函数
function demo($a,$b)
{
//	除数不能为0
	if($b == 0){
//		抛出异常
		throw new Exception('除数不能为0',249);
	}
	return $a / $b;
}

try{
	echo demo(10,0);
}catch(Exception $e){
	echo '异常信息:'.$e->getMessage().'<br>';
    echo '异常号:'.$e->getCode().'<br>';//默认是0
    echo '异常所在文件:'.$e->getFile().'<br>';
    echo '异常所在行号:'.$e->getLine().'<br>';
    echo $e.'<br>';
    var_dump($e->getTrace());
    var_dump($e->getTraceAsString());
    // getPrevious  返回上一个异常
}
