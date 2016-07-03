<?php
/*
 * 变量函数，又称为可变函数
 * 函数是名称，是一个变量，
 * 调用这个函数时，先把变量值取过来，作为函数的名称，再调用相应的函数
 * */

function fun1() {
	echo '我是函数1';
}

function fun2() {
	echo '我是函数2';
}

function fun3() {
	echo '我是函数3';
}

function fun4() {
	echo '我是函数4';
}

$a = 'fun2';

$a();
// fun1();
