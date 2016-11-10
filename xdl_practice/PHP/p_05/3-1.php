<?php
	
	/*continue 停止 本次 循环，继续执行下一次循环 
	break	终止 本层 循环，执行循环之后的代码*/
	
	/*for ($i=1; $i <=100 ; $i++) { 
		if(30==$i){		//写成30==$i 是为了及时发现错误
			continue;
			echo $i,'<br/>'.'&nbsp;&nbsp;';
		}
		echo $i,'<br/>';
	}*/
	
	/*for ($j=1; $j <=100 ; $j++) { 
		if(20==$j){
			break;		//终止本层循环
		}
		echo $j,'<br/>';
	}*/
	
	for ($a=1; $a <=9 ; $a++) { 
		for ($b=1; $b <=9 ; $b++) { 
			if($b==5){
				break 2; //中断两层循环
			}
			echo $b,'<br/>';
		}
		echo '<br/>';
	}
	