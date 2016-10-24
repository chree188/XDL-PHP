<?php
class AdminAction extends CommonAction {
	//后台管理员列表
	public function adminList() {
		$objAdmin = M('admin');
		$list = $objAdmin->select();
		$list = deep_htmlspecialchars_decode($list);
		$this->assign('list',$list); 
		
		$this->display();
	}	
	//添加后台管理员
	public function addAdmin() {
		$objAdmin = M('admin');	
		if($_POST){
			$POST = deep_htmlspecialchars($_POST);
			parent::checkField('username',$POST['username'],'require','用户名不能为空');
			parent::checkField('password',$POST['password'],'require','密码不能为空');	
			parent::checkField('repassword',$POST['repassword'],'require','确认密码不能为空');
			if($POST['password'] != $POST['repassword']){
				$this->error('两次密码不一致');	
			}
			$username = $objAdmin->where(array('username'=>$POST['username']))->find();
			if($username){
				$this->error('用户名已经存在');	
			}
			$data = array();
			$data['username'] = $POST['username'];
			$data['password'] = md5($POST['password']);
			$data['createtime'] = time();
			$result = $objAdmin->add($data);
			if($result){
				$this->success('添加成功',U(APP_NAME .'/Admin/adminlist'));	
			}else{
				$this->error('添加失败');	
			}
		}else{
		$this->display();
		}
	}
	//编辑管理员
	public function editAdmin() {
		$objAdmin = M('admin');	
		$id = intval($_GET['id']);
		if($_POST){
			$POST = deep_htmlspecialchars($_POST);
			parent::checkField('password',$POST['password'],'require','旧密码不能为空');
			parent::checkField('newpassword',$POST['newpassword'],'require','新密码不能为空');
			$password = $objAdmin->where('id='.$POST['id'])->find();
			if($password['password'] != md5($POST['password'])) $this->error('旧密码不正确，请重试');
			$result = $objAdmin->where('id='.$POST['id'])->save(array('id'=>$POST['ID'],'password'=>md5($POST['newpassword'])));
			if($result){
				$this->success('密码修改成功',U(APP_NAME .'/Admin/adminlist'));	
			}else{
				$this->error('密码修改失败');	
			}
		}else{
		$data = $objAdmin->where(array('id'=>$id))->find();
		$data = deep_htmlspecialchars_decode($data);
		$this->assign('data',$data);
		$this->display();	
		}
	}
	//删除管理员
	public function deleteAdmin() {
		$objAdmin = M('admin');
		$id = intval($_GET['id']);
		if($id == 1) $this->error('该管理员不能删除');
		$result = $objAdmin->where('id='.$id)->delete();
		if($result){
			$this->success('删除成功',U(APP_NAME .'/Admin/adminlist'));	
		}else{
			$this->error('删除失败，请稍后再试');	
		}
	}
	//网站前台会员管理
	public function memberList() {
		$objUser = M('user');
		import('ORG.Util.Page');//导入分页类
		$count = $objUser->count(); //统计总数
		$page = new page($count,25);
		$list = $objUser->field('id,username,email,login_time,reg_time,lock')->order('reg_time desc')->limit($page->firstRow.','.$page->listRows)->select();
		$list = deep_htmlspecialchars_decode($list);
		$show = $page->show();
		$this->assign('list',$list);
		$this->assign('page',$show);
		$this->display();	
	}
	//锁定会员
	public function memberLock() {
		$objUser = M('user');
		$lock = $this->_get('lock');
		$id = $this->_get('id');
		$result = $objUser->where('id='.$id)->setField('lock',$lock);
		//echo $objUser->getLastSql(); die;
		if($result){
			$this->success('操作成功');	
		}else{
			$this->error('操作失败，请稍后再试');
		}
	}
	//会员积分奖励规则设置
	public function memberPoint() {
		if(IS_POST){
			$POST = deep_htmlspecialchars($_POST);
			$file = './Conf/Config.php';
			$config = array_merge(include $file, array_change_key_case($POST,CASE_UPPER)); //把表单中发送过来的键值小写-大写
			$str = "<?php\r\nreturn " .var_export($config,true) .";\r\n?>"; //把数组转成字符串 方便下面函数重新写入
			if(file_put_contents($file,$str)){
				$this->success('修改成功',$_SERVER['HTTP_REFERER']);	
			}else{
				$this->error('修改失败');
			}
		}else{
			$this->display();	
		}
	}
	//会员经验级别规则设置
	public function memberLevel() {
		if(IS_POST){
			$POST = deep_htmlspecialchars($_POST);
			$file = './Conf/Config.php';
			$config = array_merge(include $file, array_change_key_case($POST,CASE_UPPER)); //把表单中发送过来的键值小写-大写
			$str = "<?php\r\nreturn " .var_export($config,true) .";\r\n?>"; //把数组转成字符串 方便下面函数重新写入
			if(file_put_contents($file,$str)){
				$this->success('修改成功',$_SERVER['HTTP_REFERER']);	
			}else{
				$this->error('修改失败');
			}
		}else{
			$this->display();	
		}
	}
}