<?php
    
    
    function __construct(){
    
    
        include './model/login_model.php';
        
        $_GET['a']();

    }
    //显示首页
    function index()
    {
        
        $_GET['tblname']='shop_type';
        $_GET['pk']='tid';
        
        include './view/login/login.php';
    }

    //验证一下子
    function dologin()
    {
     $_GET['tblname']='shop_type';
     $_GET['pk']='uid';
     $uname = trim($_POST['uname']); 
     $upwd = md5($_POST['qupwd']);
     $sure_upwd = md5($_POST['upwd']);
     $yzm = $_POST['yzm'];

    if(!empty($uname) && !empty($upwd) && !empty($sure_upwd)){
        if($upwd != $sure_upwd){
            echo "<script>alert('密码不一致');window.location.href='./index.php?c=login&a=index';</script>";
        }

    if(strtolower($_SESSION['yzm'])!=strtolower($_POST['yzm']))
    {
        echo "<script>alert('请输入正确的验证码');window.location.href='./index.php?c=login&a=index';</script>";
        
    }

        $link = @mysqli_connect(HOST,USER,PWD,DBNAME);
        mysqli_set_charset($link,'utf8');
        $sql = "insert into shop_users(uname,upwd) values('{$uname}','{$upwd}')";
        $res = mysqli_query($link,$sql);
        
        //6.判断执行结果
            if($res){
                if(mysqli_affected_rows($link)>0){
                   
                     mysqli_insert_id($link);
                     echo " <script>alert('注册成功');window.location.href='./index.php?c=enter&a=index';</script>";

                }else{
                    return false;
                }
                
            }else{
                die(mysqli_error($link));
            }
    

        mysqli_close($link);
     

        // print_r($sql);die;
        //insert();
	
        //echo " <script>alert('注册成功');window.location.href='./index.php?c=enter&a=index';</script>";
    

    }else{
        echo "<script>alert('请输入正确的用户名和密码');window.location.href='./index.php?c=login&a=index';</script>";
}
    }

