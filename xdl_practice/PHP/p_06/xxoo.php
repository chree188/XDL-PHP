<?php
    header('content-type:text/html;charset=utf-8');
    $str = 'abcd中国';
    
    // echo mb_strlen($str);
    
    // echo str_replace('d','xxoo','abcde');
    
    // echo file_get_contents('./1.txt');
    file_put_contents('./1.txt',',明天去杭州',FILE_APPEND);