<?php
//
//$arr = ['a','b','c','d'];
//
//foreach($arr as $k){
//	echo $k ,'<br>';
//}
//
//
//
//$brr = [108,7,10,82,50,27];
//foreach($brr as $k=>$v){
//	$brr[$k]=$v+1;
//	var_dump($brr);
//	echo '<br>';
//}

//
//$arr = [
//	0=>['a','b','c'],
//	1=>['d','e','f'],
//	2=>['g','h','i']
//];
//
//foreach($arr as $k=>$v){
//	foreach($v as $kk=>$vv){
//		echo $vv.'';
//	}
//	echo '<br>';
//}


/*****************二维数组，添加属性********************/
/* $arr = [
        0=>['name'=>'张三','sex'=>'男','age'=>24],
        1=>['name'=>'李四','sex'=>'女','age'=>23],
        2=>['name'=>'王五','sex'=>'男','age'=>29],
        3=>['name'=>'赵六','sex'=>'女','age'=>26],
    ];
	
	
	echo '<table border=1 width=300px align=center>';
		foreach($arr as $k=>$v){
			echo '<tr>';
				echo '<td>',$v['name'],'</td>';
				echo '<td>',$v['sex'],'</td>';
				echo '<td>',$v['age'],'</td>';
				echo '<td>',$arr[$k]['height']=178;'</td>';
			echo '</tr>';
		}
	
	echo '</table>';*/

	
	/*****************二维数组过滤，留女不要男*****************/
	/*$stu=array(
		array("name"=>"张三","age"=>20,"sex"=>"女"),
        array("name"=>"李四","age"=>21,"sex"=>"男"),
        array("name"=>"王五","age"=>22,"sex"=>"女"),
        array("name"=>"赵六","age"=>24,"sex"=>"男"),
    );
	
	foreach ($stu as $k => $v) {
		if($v['sex']=='女'){
			$arr[]=$v;
		}	
	}
	echo '<pre>';
	print_r($arr);*/
	
	
	
	
//	
//	$path="./mydir/1.avi";
//	
//	$a=pathinfo($path);
//	
//	echo $a['extension'];
//	
//	echo "<pre>";
//	
//	print_r($a);
//	


/* //我们定义一个泡到美女的变量($pao)为false，意思为没泡到
 $pao = false;

if($pao)
    //你可以试试在这儿写多行代码会不会报错。
    echo '我愿意去死';
else
    echo '我不愿意去死';

    //if...else执行结束，后续代码*/
    
    
    
/*//我们定义一个泡到美女的变量($pao)为true，意思为泡到了
 $pao = true;

if($pao){
    echo '我愿意去死';
    echo '林志玲，我爱死你了。';
}else{
    echo '我不愿意去死';
    echo '凤姐，我肯定不会爱你的';
}
 //if...else执行结束，后续代码*/

 
 
 /*//声明变量为null
$n = null;
var_dump($n);

//var_dump显示输出变量$meiyou，看看结果是什么？
@var_dump($meiyou);

//声明一个变量$iphone的值为字符串的手机
$iphone = '手机';
//unset销毁掉一个变量
unset($iphone);
@var_dump($iphone);*/
 
 
/*  $apple = false;//null
 if(empty($apple)){
     echo '执行了真区间，凤姐，我爱你';
 }else{
    echo '行了假区间，你想凤姐了';
 }*/
 
/* 
 //待会儿将变量$jia改为null再执行看看结果
$jia = false;
$jian = true;

$result = isset($jia,$jian);

var_dump($result);
*/


/*$one = 10;
$two = false;
$three = 0;
$four = null;

$result = isset($one , $two , $three , $four);
//执行看看结果，是不是 false
var_dump($result);*/


