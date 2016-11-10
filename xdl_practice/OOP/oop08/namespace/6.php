<?php
/**
 * Created by PhpStorm.
 * User: hui
 * Date: 2016/9/18
 * Time: 14:47
 */
namespace dds;

require 'fun2.php';

function demo(){
    echo 'dds的demo...<br>';
}

demo(); //非限定名称
nb\demo();  //限定名称
\dds\nb\fun();  //完全限定名称