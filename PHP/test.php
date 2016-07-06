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
	
	
	
	
	
	$path="./mydir/1.avi";
	
	$a=pathinfo($path);
	
	echo $a['extension'];
	
	echo "<pre>";
	
	print_r($a);
	
	
