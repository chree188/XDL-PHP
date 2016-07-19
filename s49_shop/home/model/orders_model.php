<?php
    /*订单操作模型*/
    
    require "./model/db_cfg.php";
    require "./model/db.php";
    
    
    
    /**
    * 功能: 自增或自减某个字段值
    * 参数: $_GET['gid'] 要改变的商品
    * 参数: $field 要改变的字段名
    * 参数: $n 要改变的增量
    *  update shop_goods set $field=$field+{$n} where gid={$_GET['gid']}
    */
    function updateGoods($field,$n)
    {
        $link = connect();
       
        $sql = "update shop_goods set {$field}={$field}+{$n} where gid={$_GET['gid']}";
        $res = mysqli_query($link,$sql);
        
         if($res){
            if(mysqli_affected_rows($link)>0){
                return true;
            }
                return false;
            
        }else{
            die(mysqli_error($link));
        }
    }