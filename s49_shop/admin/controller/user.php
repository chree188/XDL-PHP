<?php 
    /*用户管理者(控制器)*/

    function __construct()
    {
        require "./model/user_model.php";
        $_GET['a']();

    }
    
    function logout()
    {
        unset($_SESSION['flag']);
        echo "<meta http-equiv=refresh content='0,./index.php?c=user&a=index' />";
    }

    //显示登录页面
    function login()
    {
        require "./view/user/login.php";
    }

    //验证一下子
    function dologin()
    {
        
        $_POST['upwd'] = md5($_POST['upwd']);
        $condition = " where uname='{$_POST['uname']}' and upwd='{$_POST['upwd']}'";
       
        if(strtolower($_SESSION['code'])!=strtolower($_POST['yzm']))
        {
            echo '验证码不等';
            echo "<meta http-equiv=refresh content='1,./index.php?c=user&a=login' />";
            return;
        }
        
       
        if($arr=select($condition)){
        // echo '<pre>';
        // print_r($arr);die;
            $_SESSION['flag'] = true;
            if($arr['0']['auth']!='2'){
                echo '对不起,长的不帅,进不去!!!(非超管)<br/>';
                echo "<meta http-equiv=refresh content='3,./index.php?c=user&a=login' />";

                return;
            }else{
                echo "<meta http-equiv=refresh content='0,./index.php?c=user&a=index' />";
                return;
            }
        }
        echo '账号密码错误,3秒后跳转...';
        
        //失败跳转到 index.php?c=user&a=login
        echo "<meta http-equiv=refresh content='0,./index.php?c=user&a=login' />";
    }
    //显示用户
    function index()
    {
        
        // echo '<pre>';
        // tid = 8 ;
         // 12,15,17 select tid from shop_type where path like '%,8,%'
        // select * from shop_goods where tid in(12,15,17)
        // print_r($_GET);DIE;
    
        // (当前页数-1)*每页条数,每页条数
        
        $perPage = 5;   //每页3条记录
        $nowPage = empty($_GET['page']) ? 1 : $_GET['page'];   //要显示第几页
        
        
        //如果当前页小于1 属于非法值 
        if($nowPage<1){
            $nowPage=1;
        }
        
        
        
        $limit = " limit ".($nowPage-1)*$perPage.",{$perPage} ";
        
        // echo $limit;die;
        
        $where = [];
        $condition = '';
        if(!empty($_GET['uname'])){

            $where[] = " uname like '%{$_GET['uname']}%' ";

        }

        if(!empty($_GET['sex'])){

            $where[] = " sex='{$_GET['sex']}' ";

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
        
        $users = select($condition.$limit);
        require "./view/user/index.php";


    }

    //删除用户
    function del()
    {

        if(delete()){
            echo '删除成功.3秒后跳转...';
            echo "<meta http-equiv='refresh' content='2;./index.php?c=user&a=index'   />";
        }else{
            echo '删除失败.3秒后跳转...';
            echo "<meta http-equiv='refresh' content='2;./index.php?c=user&a=index'   />";
        }
    }
    
    
    
    //修改用户信息
    function edit()
    {
        //拿数据
        $user = find($_GET['id']);
        
        //显示数据
        require "./view/user/edit.php";
    }
    
    
    //把修改信息写回数据库
    function doedit()
    {
        // echo '<pre>';
        // print_r($_POST);die;
        if(!empty($_POST['upwd'])){
            $_POST['upwd'] = md5($_POST['upwd']);
        }else{
            unset($_POST['upwd']);
        }
        if(update()){
            echo "修改成功.3秒后跳转...";
            echo "<meta http-equiv=refresh content='2,./index.php?c=user&a=index' />";
        }else{
            echo "修改失败.3秒后跳转...";
            echo "<meta http-equiv=refresh content='2,./index.php?c=user&a=index' />";
        }
        
    }
    
    
    
    //显示添加用户的表单
    function addForm()
    {
        require "./view/user/insert.php";
    }
    
    
    //插入数据库
    function add()
    {
       
        //防不住 用户名为空
        foreach($_POST as $k=>$v){
            if( empty($v) ){
                echo '不能为空....3秒跳转';
                echo "<meta http-equiv=refresh content='2,./index.php?c=user&a=addForm' />";
                return;
            }
        }
        
        //其它表单验证 不会
        
        
        //判断密码不能为空
        if(empty($_POST['upwd1']) || empty($_POST['upwd2'])){
            echo '密码不能为空....3秒跳转';
            echo "<meta http-equiv=refresh content='2,./index.php?c=user&a=addForm' />";
            return;
        }
        
        //判断密码是否一致
        if($_POST['upwd1']!=$_POST['upwd2']){
            echo '两次密码不一致....3秒跳转';
            echo "<meta http-equiv=refresh content='2,./index.php?c=user&a=addForm' />";
            return;
        }
        
        //生成加密后的密码
        $_POST['upwd'] = md5($_POST['upwd1']);
        unset($_POST['upwd1']);
        unset($_POST['upwd2']);
        if(insert()){
            echo '添加成功....3秒跳转';
            echo "<meta http-equiv=refresh content='2,./index.php?c=user&a=index' />";
            return;
        }else{
            echo '添加失败....3秒跳转';
            echo "<meta http-equiv=refresh content='2,./index.php?c=user&a=addForm' />";
            return;
        }
    }
    
    
    //调整权限
    function auth()
    {   
        $_POST['auth']=$_GET['lel'];
        update();
        echo "<meta http-equiv=refresh content='0,./index.php?c=user&a=index&page={$_GET['page']}' />";
         
        
    }
    
    
    
    
    
    
    
    
 ?>