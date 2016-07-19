<?php
    /*购物车管理者(控制器)*/

    
    function __construct()
    {
        //拿工具
            require "./model/cart_model.php";
            
        //干事
            $_GET['a']();
    }
        function index()
    {
        // echo '<pre>';
        // print_r($_SESSION['cart']);die;
        require "./view/404.php";
    }

