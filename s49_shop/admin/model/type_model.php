<?php
    /*类别表操作模型*/
    
    $_GET['tblname'] = 'shop_type';
    $_GET['pk'] = 'tid';
    
    require "./model/db_cfg.php";
    require "./model/db.php";
  
 
    
    function getTypeInfo()
    {
        $link = connect();
        $sql = "select *,concat(path,tid) npath from shop_type order by npath";
        $res = mysqli_query($link,$sql);
        return mysqli_fetch_all($res,MYSQLI_ASSOC);
    }