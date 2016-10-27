<?php
	//后台首页控制器
	class IndexAction extends CommonAction{
		//后台首页入口
		public function index(){
			$this->assign('username',$_SESSION['username']);
			$this->display();
    	}
		
		//菜单显示
		public function menu(){
			$this->display();
    	}	
			
		//显示主窗体 系统信息
		public function main(){
		$this->assign('username',$_SESSION['username']);
		$phpsys = array(
			'php_system'=>C('SYS_NAME').' '.C('SYS_VERSIONS'),
			'php_uname'=>php_uname(),
			'php_version'=>PHP_VERSION,
			'php_port'=>$_SERVER['SERVER_PORT'],
			'php_software'=>$_SERVER['SERVER_SOFTWARE'],
			'php_max_time'=>get_cfg_var('max_execution_time').'s',
			'php_sapi_name'=>php_sapi_name(),
			);
		$this->assign('phpsys',$phpsys);
		$this->display();
    	}
		
		//注销登录
		public function logout(){
			session_unset();
			session_destroy();
			$this->redirect(GROUP_NAME .'/Login/index');	
		}
		/* 清除缓存 */
		public function clearCache()
		{	
			$runtimePath='./Runtime/';
			/* 清空后台缓存 */
			$this->dirDelete($runtimePath.'Admin/');
			/* 清空前台缓存 */
			$this->dirDelete($runtimePath.'Index/');
			$this->success('缓存更新已完成！',U(APP_NAME.'/Index/main'));
		}
	
		protected function dirDelete($dir) {
			$dir = $this->dirPath($dir);
			if (!is_dir($dir)) {
				return false;
			}
			$list = glob($dir . '*');
			foreach ($list as $v) {
				is_dir($v) ? $this->dirDelete($v) : @ unlink($v);
			}
			return @ rmdir($dir);
		}
	
		protected function dirPath($path) {
			$path = str_replace('\\', '/', $path);
			if (substr($path, -1) != '/')
				$path = $path . '/';
			return $path;
		}
		
	}