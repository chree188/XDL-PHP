<?php
    /*商品信息表的操作模型*/
        $_GET['tblname'] = 'shop_goods';
        $_GET['pk'] = 'gid';
        
        require "./model/db_cfg.php";
        require "./model/db.php";
        
        
        //查询商品类别用 需要指明$_GET['tblname'] $_GET['pk']
        function getTypeInfo()
        {
            $link = connect();
            $sql = "select *,concat(path,tid) npath from shop_type order by npath";
            $res = mysqli_query($link,$sql);
            return mysqli_fetch_all($res,MYSQLI_ASSOC);
        }