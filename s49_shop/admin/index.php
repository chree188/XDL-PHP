<?php
    //后台入口文件
	   session_start();
	   date_default_timezone_set('PRC');


        if(empty($_GET['c'])){
            $_GET['c'] = 'user';
        }

        if(empty($_GET['a'])){
            $_GET['a']='index';
        }
        
        require "./public/check.php"; 
        require "./controller/{$_GET['c']}.php";

        __construct();

?>