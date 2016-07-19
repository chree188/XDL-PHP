<?php
    
    
    /**
    *   功能:连接数据库服务器
    *   参数:HOST 服务器地址 
    *        USER 用户名
    *        PWD  密码
    *        DBNAME  库名
    *
    */
    
    function connect()
    {
       
        $link = @mysqli_connect(HOST,USER,PWD,DBNAME);
    
        if(mysqli_connect_errno()){
            die(mysqli_connect_error());
        }
    
        mysqli_set_charset($link,'utf8');
        
        return $link;
    }
    
    
    /**
    *   功能:插入一条记录
    *   参数:$_POST
    *   返回: 成功 返回插入记录的ID号
    *         失败 返回false
    *   语句错: 直接die报错
    */
    // $_POST['regtime'] = time();
    function insert()
    {
        
        $link = connect();
        
        $fields = '';
        $values = '';
        foreach($_POST as $k=>$v){
            if($v==''){   //如果提交字段数据为空 就过滤掉
                continue;
            }
            $fields .= $k.',';  // name,age,sex,tel,
            $values .= "'{$v}',";  // jingshui,m,33
        }
              
        $fields =rtrim($fields,',');
        $values = rtrim($values,',');
        
        $sql = 'insert into '.$_GET['tblname'].'('.$fields.')'." values(".$values.")";

        $res = mysqli_query($link,$sql);
    
    //6.判断执行结果
        if($res){
            if(mysqli_affected_rows($link)>0){
               
                return mysqli_insert_id($link);
            }else{
                return false;
            }
            
        }else{
            die(mysqli_error($link));
        }
    

        mysqli_close($link);
        
        
    }

    /**
    *  功能:删除一条记录
    *  参数:$_GET['id']  
    *  返回:成功返回 true
    *       失败返回 false
    *  语句错: 直接die 打印错误信息
    */
    function delete()
    {
        $link = connect();
    
    //4.准备SQL
        $sql = "delete from ".$_GET['tblname']." where ".$_GET['pk']."={$_GET['id']}";
    
    //5.发送SQL
        $res = mysqli_query($link,$sql);
        
    //6.判断
        if($res){
           
            if(mysqli_affected_rows($link)>0){
                return true;
            }else{
                return false;
            }
        }else{
            die(mysqli_error($link));
        }
    
    }
    
    
    /**
    * 功能: 保存修改数据,一条
    * 参数: $_POST 要修改的内容
    *       $_GET['id']  要修改的记录号
    * 返回: 成功 true
    *       失败 false
    * 语句错:直接die打印错误
    */
  
    function update()
    {
    
        $link = connect();
       
        $fields = [];
        foreach($_POST as $k=>$v){
            if(empty($v)){   //如果提交字段数据为空 就过滤掉
                continue;
            }
            $fields[] = "{$k}='{$v}'";
        
        }
        $fields = implode(',',$fields);
       
        $sql = "update ".$_GET['tblname']." set ".$fields." where ".$_GET['pk']."={$_GET['id']}";
        
    //5.发送
        $res = mysqli_query($link,$sql);
        
    //6.判断
        if($res){
            if(mysqli_affected_rows($link)>0){
                return true;
            }
                return false;
            
        }else{
            die(mysqli_error($link));
        }
    //7.关闭
        mysqli_close($link);
    }
    
    /**
    *  功能: 查询表中所有信息
    *  参数: 
    *  返回: 成功 返回查询到的二维数组
    *        失败 false
    *  语句错: 直接die掉
    */ 
    function select($condition='')
    {
        $link = connect();
    
    //4.准备SQL语句
    $sql = "select * from ".$_GET['tblname'].$condition;
    
    //5.发送SQL语句给数据库服务器,返回结果集
    $res = mysqli_query($link,$sql);
    
    //6.判断执行结果     // $res['num_rows']  返回结果集的条目
    if($res){
         if(mysqli_num_rows($res)>0){   //判断结果集中的记录个数
            
            //一次性把查询结果读取一个数组中
            return mysqli_fetch_all($res,MYSQLI_ASSOC);   
                   
         }else{
            return false;
         }
    }else{
        die( mysqli_error($link) );  //如果语句本身有错误,就die掉
    }
    
    //7.释放结果集
    mysqli_free_result($res);
    
    //8.断开连接
    mysqli_close($link);
   
    }
    
    /**
    * 功能: 获得某个条件下的记录数
    * 参数: $condition where条件 需要手工写
    * 返回: 记录数目
    *
    */
    function rowCount($condition='')
    {
        $link = connect();
        $sql = "select count(*) num from ".$_GET['tblname'].$condition;
        $res = mysqli_query($link,$sql);
        return mysqli_fetch_all($res,MYSQLI_ASSOC)[0]['num'];
    }
    
    /**
    * 功能: 获得某一条记录的信息
    * 参数: 表的主键ID
    * 返回: 数组形式的记录信息
    *
    *
    */
    function find($id)
    {
        $link = connect();
        $sql = "select * from ".$_GET['tblname']." where ".$_GET['pk']."={$id}";
        $res = mysqli_query($link,$sql);
        return mysqli_fetch_all($res,MYSQLI_ASSOC)[0];
    }
    
?>