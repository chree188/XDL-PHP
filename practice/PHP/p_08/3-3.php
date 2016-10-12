<?php	
	/* 二维数组的排序 */
	
	$stu=[
		0=>["name"=>"张三","age"=>28,"sex"=>"女"],
        1=>["name"=>"李四","age"=>25,"sex"=>"男"],
        2=>["name"=>"王五","age"=>22,"sex"=>"女"],
        3=>["name"=>"赵六","age"=>24,"sex"=>"男"],
    ];
	
	usort($stu,'px');
	
	function px($x,$y){
		if($x['age']<$y['age']){return -1;}
		if($x['age']==$y['age']){return 0;}
		if($x['age']>$y['age']){return 1;}
	}
	
	echo '<pre>';
	print_r($stu);
	