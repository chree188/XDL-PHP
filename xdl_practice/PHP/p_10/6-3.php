<?php
    /*错误的种类*/
    
    echo '1.aaaaaaaaaaaaaaaa<br/>';
    echo '2.bbbbbbbbbbbbbbbb<br/>';
    // echo '3.cccccccccccccccc'  1.语法错误  整个文件都不执行
    // echo $a;   2.运行时错误   前面,后面都会执行
    echo '4.dddddddddddddddd<br/>';
    echo '5.eeeeeeeeeeeeeeee<br/>';

    $a=10;
    if($a=5){   // 3. 5=$a 逻辑错误
        echo '找到你啦';
    }