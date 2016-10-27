<?php
class LoginAction extends CommonAction {
	//登录视图
	public function index() {
		$this->display();
	}	
	//登录表单处理
	public function handleLogin() {
		if(!IS_POST) parent::error404();	
		$POST = deep_htmlspecialchars_decode($_POST);
        $objUser = M('user');
		parent::checkField('username',$POST['username'],'require','用户名不能为空');
        parent::checkField('password',$POST['password'],'require','密码不能为空');
        parent::checkField('verify',$POST['verify'],'require','验证码不能为空');
        if( md5($POST['verify']) != $_SESSION['verify']) $this->error('验证码不正确');
		$userData = $objUser->where(array('username'=>$POST['username']))->field('id,username,password,lock,login_time')->find();
        if(!$userData){
           $this->error('用户名不存在，请注册',U(APP_NAME.'/Login/register'));
        }else{
           if($userData['password'] != md5($POST['password'])) $this->error('密码不正确');
           if(!$userData['lock']) $this->error('账户被锁定，请联系管理员');
        }
        //每天登录增加经验 积分
        $today = strtotime(date('Y-m-d'));
        if ($userData['login_time'] < $today) {
            $objUser->where(array('id' => $userData['id']))->setInc('exp', C('POINT_LOGIN'));
            $objUser->where(array('id' => $userData['id']))->setInc('point', C('LEVEL_LOGIN'));
        }
        //更新登录时间和登录IP
        $objUser->where(array('id'=>$userData['id']))->data(array('login_time'=>time(),'login_ip'=>get_client_ip()))->save();
        //处理下一次自动登录
        if (isset($_POST['auto'])) {
            $username = $userData['username'];
            $ip = get_client_ip();
            $value = $username .'||'. $ip;
            $value = encryption($value);
            //cookie('auto',$value,time() + 3600 * 24 * 7);
            @setCookie('auto', $value, C('AUTO_LOGIN_TIME'), '/');
            //P($_COOKIE['auto']); die;
        }
        //写入session 并跳转到首页
        session('uid',$userData['id']);
        session('username',$userData['username']);
        $this->success('登录成功...',U(APP_NAME.'/Index/index'));
	}
	//注册视图
	public function register() {
		
		$this->display();	
	}
	//注册表单处理
	public function handleReg() {
		if(!IS_POST) parent::error404();
		$POST = deep_htmlspecialchars_decode($_POST);
        parent::checkField('username',$POST['username'],'require','用户名不能为空');
        parent::checkField('username',$POST['username'],'twomore','用户名在2-14个字符');
        parent::checkField('email',$POST['email'],'require','邮箱不能为空');
        parent::checkField('email',$POST['email'],'email','邮箱格式不对');
        parent::checkField('password',$POST['password'],'require','密码不能为空');
        parent::checkField('password',$POST['password'],'password','密码只能在6-20个字符');
        parent::checkField('repassword',$POST['repassword'],'require','确认密码不能为空');
        if($POST['password'] != $POST['repassword']) $this->error('前后密码不一致');
        parent::checkField('verify',$POST['verify'],'require','验证码不能为空');
        if( md5($POST['verify']) != $_SESSION['verify']) $this->error('验证码不正确');
		$objUser = M('user');
		$data = array();
		$data['username'] = $POST['username'];
		$data['email'] = $POST['email'];
		$data['password'] = md5($POST['password']);
		$data['reg_time'] = time();
		$data['login_ip'] = get_client_ip();
		$result = $objUser->data($data)->add();
		if($result){
			$this->success('恭喜你，注册成功',U(APP_NAME.'/Login/index'));
		}else{
			$this->error('注册失败，请稍后再试');	
		}
	}
	//获取验证码
	public function verify() {
		import('ORG.Util.Image');	
		Image::buildImageVerify(5,1,'png',54,25);
	}
	//异步验证用户名是否已经存在
	public function checkUserName(){
		if(!IS_AJAX) parent::error404();
		$username = $this->_post('username');
		$result = M('user')->where(array('username'=>$username))->getField('id');
		if($result){
			echo 1;	
		}else{
			echo 0;	
		}
	}
    //退出登录
    public function logout(){
        session_unset();
        session_destroy();
        //删除cookie 不然退出登录不行
        cookie('auto',null);
        redirect(U(APP_NAME.'/Index/index'));
    }
}