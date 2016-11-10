<?php
echo strlen('abcd');
echo '<br/>';
echo mb_strlen('中国abc').'<br/>';

//字符串替换函数   参数: 1)找啥  2)换成啥   3)在哪儿找
$str = 'aaxbbxccxdd';
// $a = $str;
$aaa = str_replace('x', '@', $str, $cnt);
//$str还是原来的值, 返回的是被替换过的
// echo $cnt;  记录替换的次数
// echo $aaa;

//把一个文件的内容读出来
// $str = file_get_contents('./images/1.txt');
// echo $str;

//把一些内容写入到文件中去    FILE_APPEND 表示在原来内容基础上追加
echo file_put_contents('./2.txt', 'XYZ123456', FILE_APPEND);
