<?php
    /*商品管理者(控制器)*/
    
    function __construct()
    {
        require "./model/goods_model.php";
        $_GET['a']();
    }

    //添加商品页面表单
    function addForm()
    {
        //拿数据
        $_GET['tblname'] = 'shop_type';
        $_GET['pk'] = 'tid';
        $types = getTypeInfo();
        require  "./view/goods/insert.php";
    }

    //插入数据库
    function doAdd()
    {
        require "./public/fileUpload.php"; //文件上传函数
        require "./public/picZoom.php";   //文件缩放函数
        
        $path = './public/images/goods/';  //上传图片保存的路径

        echo '<pre>';
        // print_r($_FILES['gpic']);die;
        $tmp = [];
        foreach($_FILES['gpic'] as $k=>$v){
            foreach($v as $kk=>$vv){
                $tmp[$kk][$k] = $vv;
            }
        }
        // print_r($tmp);die;
        // $_FILES['gpic'] 
        $_POST['gpic'] = '';
        foreach($tmp as $k=>$v){
            $res = fileUpload($path,$v); //处理上传的图片
            if($res['flag']){
                $_POST['gpic'] .= $res['picname'].'|#x#|';
            }
        }
        
       
        
        // $_POST['gpic'] = './public/goods/default.jpg'; //给商品一个默认图片
        
        
        
       
        
        $_POST['ctime'] = time(); //创建商品的时间
        
        insert();  //可以加判断  
        
        //添加成功后跳转到商品列表
        echo "<meta http-equiv=refresh content='0,./index.php?c=goods&a=index' >";
    
    
    }
    
    
    
    //商品列表
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
        
        // echo $limit;die;
        
        $where = [];
        $condition = '';
        if(!empty($_GET['gname'])){

            $where[] = " gname like '%{$_GET['gname']}%' ";

        }

        if(!empty($_GET['tid'])){

            $where[] = " tid='{$_GET['tid']}' ";

        }
        
        if(!empty($where)){
         $condition =  " where ".implode(' and ',$where);
        }
        
        $rows = rowCount($condition); //符合条件的总记录数
        
        $maxPage = ceil($rows/$perPage);  //总页数
      
        //上一页
        $prevPage = ($nowPage<=1) ? 1 : ($nowPage-1);
        
        //下一页
        $nextPage = ($nowPage>=$maxPage) ? $maxPage : ($nowPage+1);
        
        
        //拿数据
        $goods = select($condition.$limit);

       
        $_GET['tblname'] = 'shop_type';
        $_GET['pk'] = 'tid';
        if(!empty($goods)){
        foreach($goods as $k=>$v){
            $goods[$k]['tname'] = find($v['tid'])['tname'];
            $goods[$k]['gpic'] = rtrim($goods[$k]['gpic'],'|#x#|');
        }}
        $_GET['tblname'] = 'shop_goods';
        $_GET['pk'] = 'gid';
         // echo '<pre>';
        // print_r($goods);die;
        //显示数据
        //显示数据
        require "./view/goods/index.php";

    }
    
    
    function del()
    {
        // unlink($path.find($_GET['id'])['gpic']);
          if(delete()){
            echo '删除成功.3秒后跳转...';
            echo "<meta http-equiv='refresh' content='2;./index.php?c=goods&a=index'   />";
        }else{
            echo '删除失败.3秒后跳转...';
            echo "<meta http-equiv='refresh' content='2;./index.php?c=goods&a=index'   />";
        }
    }
    

    //显示修改页面
    function edit()
    {
        //拿数据 单条商品信息
         $goods = find($_GET['id']);
         $goods['gpic'] = rtrim($goods['gpic'],'|#x#|');
        //显示数据
        $types=getTypeInfo();
        require "./view/goods/edit.php";
    }
    
    function doedit()
    {
       
       if($_FILES['gpic']['error']=='0'){
             require "./public/fileUpload.php"; //文件上传函数
             require "./public/picZoom.php";   //文件缩放函数
        
            $path = './public/images/goods/';  //上传图片保存的路径
            
       
            $res = fileUpload($path,$_FILES['gpic']); //处理上传的图片
            if($res['flag']){
                $_POST['gpic'] = $res['picname'];
            }

       }
        if(update()){
            echo '修改成功.3秒后跳转...';
            echo "<meta http-equiv='refresh' content='1;./index.php?c=goods&a=index'   />";
        }else{
            echo '修改失败.3秒后跳转...';
            echo "<meta http-equiv='refresh' content='1;./index.php?c=goods&a=index'   />";
        }

       

       
    }

        //调整权限
    function status()
    {   
        $_POST['status']=$_GET['status'];
        update();
        echo "<meta http-equiv=refresh content='0,./index.php?c=goods&a=index&page={$_GET['page']}' />";
         
        
    }
    
    
    
    
    
    
    
    
    
    
    
    
    