<?php
    /*类别管理者(控制器)*/
    
    function __construct()
    {
        //拿工具
          require "./model/type_model.php";
        //干事
        $_GET['a']();
        
    }
    
    
    //分类列表
    function index()
    {
        //拿数据
           $types = getTypeInfo();
        //显示数据
        require "./view/type/index.php";
    }
    
    //显示添加分类页面
    function addForm()
    {
        $_GET['pid'] = empty($_GET['pid'])? 0 : $_GET['pid']; 
        $types = getTypeInfo();
        // echo '<pre>';
        // print_r($types);die;
        require "./view/type/insert.php";
    }
    
    
    //插入数据库
    function doAdd()
    {   
        // $_POST['pid']
        // $_POST['tname']
        if($_POST['pid']==0){
            $_POST['path'] = '0,';
        }else{
            $_POST['path'] =  find($_POST['pid'])['path'].$_POST['pid'].',';
        }
        
        if(insert()){
            echo '添加成功..3秒跳转...';
        }else{
            echo '添加失败..3秒跳转...';
        }
        echo "<meta http-equiv=refresh content='2,./index.php?c=type&a=index' />";
        return;
    
    }
    
    
    //删除分类
    function del()
    {
        
        // 要删除的这个类别下面有没有 后代
         // path like '%,$_GET['id'],%'
         // ,12,
         // ,2,
         $condition = " where path like '%,{$_GET['id']},%' ";
         $types = select($condition);
         if(!$types){    //判断类别下面有没有子类
            
            $condition = " where tid={$_GET['id']} ";
            $_GET['tblname'] = 'shop_goods';
            if(select($condition)){   //判断类别中有没有商品
                echo '不能删除,该类别下面可能有商品...';
                echo "<meta http-equiv=refresh content='2,./index.php?c=type&a=index' />";
                return;
            }
            
            $_GET['tblname'] = 'shop_type';
            delete();
            echo '删除成功..3秒跳转...';
            echo "<meta http-equiv=refresh content='2,./index.php?c=type&a=index' />";
            return;
         }else{
            echo '不能删除,可能有子分类...';
            echo "<meta http-equiv=refresh content='2,./index.php?c=type&a=index' />";
            return;
         }
        
        
    }
    
    //显示修改类别的页面
    function edit()
    {
        $_GET['tname'];  //原来的名字
        $_GET['id'];  //你要修改的那个类别
        require "./view/type/edit.php";
    }
    
    
    //修改类别名称
    function doedit()
    {
        if(update()){
            echo '修改成功..3秒跳转...';
        }else{
            echo '修改失败..3秒跳转...';
        }
        echo "<meta http-equiv=refresh content='2,./index.php?c=type&a=index' />";
        return;
    }
    
    
    
    
    
    
    
