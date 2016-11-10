<?php
/* 函数的调用关系 */

//老公
function husband($job) {
	echo '老公去' . $job;
}

//老婆
function wife($job) {
	husband($job);
}

//女儿
function daughter($job) {
	wife($job);
}

daughter('拿可乐');

echo '<br/>';

fun1();

function fun1() {
	echo '1';
	echo '2';
	fun2();
	echo '3';
	echo '4';
	return;
}

function fun2() {
	echo 'a';
	echo 'b';
	fun3();
	echo 'c';
	echo 'd';
	return;
}

function fun3() {
	echo '一';
	echo '二';
	echo '三';
	echo '四';
	return;
}
