<?php
    /*时间戳格式化*/
    
    date_default_timezone_set('PRC');
    
    echo date('Y年m月d日 H时i分s秒 星期N',time());
    echo '<br/>';
    echo date('Y年m月d日 H时i分s秒 星期l T');
//	echo date_default_timezone_get();