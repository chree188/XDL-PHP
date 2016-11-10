<?php	

	/*
	 *  .*?		防贪婪匹配任意长度的任意字符
	 * 
	 * */
/*	
	$str = '<ul>
                <li><a href="http://localhost/a.php">关于我们</a></li>
                <li><a href="http://localhost/b.php">加入我们</a></li>
                <li><a href="http://localhost/c.php">供应商计划</a></li>
            </ul>';
			
//	$str='<b>a?aa</b><i>bbB#b</i><b>cc#c</b><b>ddd</b>';
    
	$ptn="/<a href=\"(.*?)\">(.*?)<\/a>/";
//	$ptn="/<b>.*?<\/b>/";
	
	preg_match_all($ptn, $str,$arr);
	
	echo '<pre>';
	print_r($arr);
*/

	$str = "2015-12-24"; //替换成: 12/24/2015
	
	$ptn="/(\d{4})[-](\d{2})[-](\d{2})/";
	
	$arr=preg_replace($ptn, '\\2/\\3/\\1', $str);
	$arr=preg_replace($ptn, '$2/$3/$1', $str);
	
	echo '<pre>';
	print_r($arr);
