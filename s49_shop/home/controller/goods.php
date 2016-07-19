<?php
    /*商品管理者(控制器)*/
    
    function __construct()
    {
        //拿工具
            require "./model/goods_model.php";
            
        //干事
            $_GET['a']();
            
    }
    
    
    //商品列表 $_GET['tid']
    function index()
    {
        //拿数据
           if(empty($_GET['tid'])){  //没有传$_GET['tid']
              $goods = select();
              foreach($goods as $k=>$v){
                $goods[$k]['gpic'] = array_shift(explode('|#x#|',$v['gpic']));
              }
           }else{
              $goods = getGoods();   //传了 $_GET['tid']
           }
           
           // echo "<pre>";
           // print_r($goods);
        //显示数据
            require "./view/goods/index.php";
        
    }

        function index1()
    {
        //拿数据
           if(empty($_GET['tid'])){  //没有传$_GET['tid']
              $goods = select();
              foreach($goods as $k=>$v){
                $goods[$k]['gpic'] = array_shift(explode('|#x#|',$v['gpic']));
              }
           }else{
              $goods = getGoods();   //传了 $_GET['tid']
           }
           
           // echo "<pre>";
           // print_r($goods);
        //显示数据
            require "./view/goods/index1.php";
        
    }

        function index2()
    {
        //拿数据
           if(empty($_GET['tid'])){  //没有传$_GET['tid']
              $goods = select();
              foreach($goods as $k=>$v){
                $goods[$k]['gpic'] = array_shift(explode('|#x#|',$v['gpic']));
              }
           }else{
              $goods = getGoods();   //传了 $_GET['tid']
           }
           
           // echo "<pre>";
           // print_r($goods);
        //显示数据
            require "./view/goods/index2.php";
        
    }
    
    //商品详情
    function detail()
    {
        //查数据
        $goods = find($_GET['gid']);
        $goods['gpic'] = array_shift(explode('|#x#|',$goods['gpic']));
        
        //让 $_GET['gid'] 商品的浏览数 加1
        updateGoods('vcnt',1);
        //显示数据
        require "./view/details/detail.php";
    }