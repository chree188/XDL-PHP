<?php
/**
 * Created by PhpStorm.
 * User: hui
 * Date: 2016/10/26
 * Time: 10:19
 */

namespace Admin\Controller;

use Think\Controller;
use Think\Verify;
//后台登录控制器
class LoginController extends Controller
{
    //登录页面视图
    public function index(){
        $this->display();
    }
    //登录判断
    public function login(){
        if(!IS_POST) halt('页面不存在'); //防止直接通过直接栏 访问
        //验证 验证码
        $Verify = new Verify;
        if(!$Verify->check($_POST['verify'])) $this->error("验证码错误！");
        $password = md5($_POST['password']);
        //用户名和密码 验证
        $db = M('admin');
        $user = $db->where(array('username'=>I('username')))->find();
        //echo $db->getLastSql(); die;
        if(!$user || $user['password'] != $password){
            $this->error('用户名或密码错误');
        }
        //更新用户最后一次登录时间和IP
        $data = array(
            'id' => $user['id'],
            'logintime' => time(),
            'loginip' => get_client_ip(),
        );
        $db->save($data);
        //写入SESSION
        session('admin_id',$user['id']);
        session('username',$user['username']);
        session('logintime',date('Y-m-d H:i:s'),$user['logintime']);
        session('loginip',$user['loginip']);
        $this->success('登录成功',U('Index/index'));
    }

    //获取验证码
    public function verify() {
        $config = array(
            'fontSize' => 12, // 验证码字体大小
            'length' => 4, // 验证码位数
            'useNoise' => false, // 关闭验证码杂点
            'imageW' => 80, //验证码宽度
            'imageH' => 35, //验证码高度
            'codeSet' => '0123456789',
        );
        $Verify = new Verify($config);
        $Verify->entry();
    }
}