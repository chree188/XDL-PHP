<?php
/*字符串函数*/

//1.
$str = '##ab#c#@';
echo rtrim($str, '@#');
echo '<br>';
$dir = '/images';
$name = '1.jpg';
$dir = rtrim($dir, '/') . '/';
echo $dir . $name;

//2.
// echo str_shuffle('abcdefghijk');

//3.
//echo substr('abcde',-3);

//4.md5
//$str = 'a';
//echo md5($str);
