<?php
	
	/*continue 停止 本次 循环，继续下一次循环
	break	终止 本层 循环，执行循环之后的代码*/
	
	/*for ($i=1; $i <=100 ; $i++) { 
		if(30==$i){
			continue;		//写成30==$i 为的是及时发现错误
			echo $i,'<br/>';
		}
		echo $i.'<br/>';
	}*/
	
	/*for ($i=1; $i <=100 ; $i++) { 
		if(30==$i){
			break;	//终止本层循环
		}
		echo $i,'<br/>';
	}*/
	
	for ($i=1; $i <=9 ; $i++) { 
		for ($j=1; $j <=9 ; $j++) { 
			if($j==5){
				break 2; //中断两层循环
			}
			echo $j,'<br/>';
		}
		echo '<br/>';
	}