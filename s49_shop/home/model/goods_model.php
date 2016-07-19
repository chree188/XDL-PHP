<?php
    /*商品操作模型*/
    
    require "./model/db_cfg.php";
    require "./model/db.php";
    
    $_GET['tblname'] = 'shop_goods';
    $_GET['pk'] = 'gid';
    
    
    /**
    * 功能: 获取指定类别下的商品信息
    * 参数: $_GET['tid'] 
    * 返回: 商品信息
    */
    function getGoods()
    {
        
         // select * from shop_goods where tid in(select tid from shop_type where path like '%,10,%');
        $condition = " where tid in(select tid from shop_type where path like '%,{$_GET['tid']},%') or tid={$_GET['tid']} ";
        $goods =  select($condition);
        
        //只要商品的第一张图片
        foreach($goods as $k=>$v){
            $goods[$k]['gpic'] =  array_shift(explode('|#x#|',$v['gpic']));
        }
        
        return $goods;
    }
    
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