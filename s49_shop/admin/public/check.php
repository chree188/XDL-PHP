<?php

    // echo '你进来了吗';die;

    if(empty($_SESSION['flag'])){
        
        if($_GET['a']!='dologin'){
            $_GET['c']='user';
            $_GET['a']='login';
        }
        
    }

