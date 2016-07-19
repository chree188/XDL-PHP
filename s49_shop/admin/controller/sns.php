<?php

    function __construct()
    {
        include './model/sns_model.php';
        $_GET['a']();
            
    }
    
    
    function index()
    {
     // (当前页数-1)*每页条数,每页条数
        
        $perPage = 3;   //每页3条记录
        $nowPage = empty($_GET['page']) ? 1 : $_GET['page'];   //要显示第几页
        
        
        //如果当前页小于1 属于非法值 
        if($nowPage<1){
            $nowPage=1;
        }
        
        
        
        $limit = " limit ".($nowPage-1)*$perPage.",{$perPage} ";
       

        if(!empty($_GET['tid'])){

            $where[] = " tid='{$_GET['tid']}' ";

        }
        
        if(!empty($where)){
         $condition =  " where ".implode(' and ',$where);
        }
        
        @$rows = rowCount($condition); //符合条件的总记录数
        
        $maxPage = ceil($rows/$perPage);  //总页数
      
        //上一页
        $prevPage = ($nowPage<=1) ? 1 : ($nowPage-1);
        
        //下一页
        $nextPage = ($nowPage>=$maxPage) ? $maxPage : ($nowPage+1);
        
    $orders = select();
     //显示数据
     if(empty($_SESSION['flag'])){
       echo "<script>alert('您还未登录，请您先登录！');window.location.href='./index.php?c=enter&a=index'</script>";}
       else 



       // $orders=select();
        include './view/sns/index.php';
    }
    
    
        function status()
        {   
            
            // echo '<pre>';
            // print_r($_GET);die;
            $_POST['status']=$_GET['sta'];
            update();
            echo "<meta http-equiv=refresh content='0,./index.php?c=sns&a=index&page={$_GET['page']}' />";
             
            
        }

    function cut()
    {
        // echo '<pre>';
        // print_r($_SESSION[]);
       $_SESSION['ooid'] = select();
       $_GET['tblname'] = 'shop_orders';
       $_GET['pk'] = 'oid';
       $_GET['id'] = $_GET['oid'];
       if($_GET['status']){
       delete($_GET['oid']);  
        echo "<meta http-equiv=refresh content='0,./index.php?c=sns&a=index' >";
        }
        else 
        echo "<script>alert('您的订单已发货，无法取消订单');window.location.href='./index.php?c=sns&a=index'</script>";
        
        }




?>