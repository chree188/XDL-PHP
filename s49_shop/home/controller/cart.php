<?php
    /*购物车管理者(控制器)*/

    
    function __construct()
    {
        //拿工具
            require "./model/cart_model.php";
            
        //干事
            $_GET['a']();
    }
    
    
    /*
        $_SESSION['cart'][商品的ID] = [定价,数量,金额,图片];
    */
    function put()
    {

        $_GET['tblname'] = 'shop_goods';
        $_GET['pk'] = 'gid';
        
        if(empty($_SESSION['cart'][$_GET['gid']])){
            $_SESSION['cart'][$_GET['gid']] = find($_GET['gid']); //拿到商品所有信息
            
            // $_SESSION['cart'][10] = [
            //     'gid'=>10,
            //     'gname'=>'xxoo',
            //     'gpic'=>'',
            //     'cnt'=>库存
            // ];
            
            $_SESSION['cart'][$_GET['gid']]['cnt'] = 1;
        }else{
            $_SESSION['cart'][$_GET['gid']]['cnt'] += 1;
        }
        echo "添加购物车成功: ";
        echo "<a href='./index.php?c=goods&a=index'>继续购物</a>&nbsp;&nbsp;&nbsp;";
        echo "<a href='./index.php?c=cart&a=index'>去购物车结算</a>";
        
    }
    
    //显示购物车中的内容
    function index()
    {
        // echo '<pre>';
        // print_r($_SESSION['cart']);die;
        require "./view/cart/index.php";
    }
    
    //从购物车丢掉
    function cut()
    {
        // echo '<pre>';
        // print_r($_SESSION[]);
        unset($_SESSION['cart'][$_GET['gid']]);
        echo "<meta http-equiv=refresh content='0,./index.php?c=cart&a=index' >";
    }
    
    
    
    //清空购物车
    function clear()
    {
        unset($_SESSION['cart']);
        echo "<meta http-equiv=refresh content='0,./index.php?c=cart&a=index' >";
    }
    
    
    //增加1
    function inc()
    {
        $_SESSION['cart'][$_GET['gid']]['cnt'] += 1;
        $_GET['tblname'] = 'shop_goods';
        $_GET['pk'] = 'gid';
        $max = find($_GET['gid'])['cnt'];   //得到对应商品的库存
        if($_SESSION['cart'][$_GET['gid']]['cnt']>$max){
            $_SESSION['cart'][$_GET['gid']]['cnt'] = $max;
        }
        echo "<meta http-equiv=refresh content='0,./index.php?c=cart&a=index' >";
    }
    
    //减1
    function dec()
    {
        $_SESSION['cart'][$_GET['gid']]['cnt'] -= 1;
        if($_SESSION['cart'][ $_GET['gid'] ]['cnt']<1){
            $_SESSION['cart'][ $_GET['gid'] ]['cnt'] = 1;
        }
        
        echo "<meta http-equiv=refresh content='0,./index.php?c=cart&a=index' />";
    }