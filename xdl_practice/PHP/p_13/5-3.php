<?php	
//	文件的指针操作
	$f=fopen("1.txt", "r");
	echo fread($f, 2);	//结果为 ab
//		内容:abcd
//		指针：0123 4
	
//	当前指针位置
	echo ftell($f);	//结果为2
	
//	当使用fread去读取的时候 读取1位指针位置向后移动一位
//	使用fseek移动指针的时候 指针移动几位就在最后的那个位置那里
	
//	移动文件指针
//	fseek($f, SEEK_CUR);	//seek寻找 cur current 当前 SEEK_CUR当前位置
//	fseek($f, -2,SEEK_END);	//SEEK_END 从末尾开始
	echo "<hr>";
	fseek($f, 2,SEEK_CUR);
//  fseek($f,200,SEEK_CUR);
//  直接移动指针 指针可以指向指定位置
//  echo ftell($f);//结果为 4
	echo "<hr>";
	fseek($f,-2,SEEK_END);//SEEK_END 从末尾开始
	echo ftell($f);//结果为 2
//	1 从前往后移动 指针会指向下一个位置 
//	2 

	echo "<hr>";
//	1 指针从头开始移动,移动位数,指向下一个位置
//	2 指针如果从末尾开始移动,直线移动到的位置(不是下一个位置)
	

//	锁 防止多人同时操作一个文件出现异常报错
//	flock// lock 
//	共享锁  LOCK_SH  上海的优衣库试衣间 人人可以用       只能在里面读
//	独占锁  LOCK_EX  加入你还想在里面拍电影 必须配插销   可以写，创作
//	释放锁  LOCK_UN  使用完试衣间