<?php
	//后台登录控制器
	class LoginAction extends Action{
		//登录页面视图
		public function index(){
			$this->display();
		}
		//登录判断
		public function login(){
			if(!IS_POST) halt('页面不存在'); //防止直接通过直接栏 访问
			//验证 验证码
			$verify = I('verify');
			$verify = md5($verify);
			if($verify != session('verify')){
				$this->error('验证码错误');
			}	
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
			$this->success('登录成功',U('admin.php/Index/index'));
		}
		
		/*引入自己的 验证码 包含自己验证码这里比较神奇 可以在框架-Common.php里面 import函数里面找到$classfile 然后输出来测试*/
		public function verify(){
			import('ORG.Util.Image');
			Image::buildImageVerify(5,1,'png',54,25);	
		}	
	}