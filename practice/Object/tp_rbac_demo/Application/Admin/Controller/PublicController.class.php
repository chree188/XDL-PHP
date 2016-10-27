<?php 
namespace Admin\Controller;

use \Think\Controller;

class PublicController extends Controller
{

	//执行登陆
	public function dologin()
	{
		//接收用户名和密码
		$username = I('post.username');
		$password = I('post.password');

		//验证
		$user = M('User');
		$data = $user->where(array('username'=>$username))->find();
		if (!$data) {
			$this->error('用户名不存在！');
			exit;
		}
		//验证密码
		if ($data['userpass'] != md5($password)) {
			$this->error('密码不正确');
			exit;
		}
		//把用户信息添加到session
		$_SESSION['admin_user'] = $data;


		//根据用户id获取对应的节点信息
		//$sql = "select n.mname,n.aname from lamp_user u join lamp_user_role ur on u.id=ur.uid join lamp_role_node rn on ur.rid=rn.rid join lamp_node n on rn.nid=n.id where u.id={$users['id']}";
		//$list = M()->query($sql);

		$list = M('node')->field('mname,aname')->where('id in'.M('role_node')->field('nid')->where("rid in ".M('user_role')->field('rid')->where(array('uid'=>array('eq',$data['id'])))->buildSql())->buildSql())->select();

		//控制器名转换为大写
		foreach ($list as $key => $val) {
			$list[$key]['mname'] = ucfirst($val['mname']);
		}

		//查看查询出来的信息
		// V($list); exit;

		$nodelist = array();
		$nodelist['Index'] = array('index');
		//遍历重新拼装
		foreach($list as $v){
			$nodelist[$v['mname']][] = $v['aname'];
			//把修改和执行修改 添加和执行添加 拼装到一起
			if($v['aname']=="edit"){
				$nodelist[$v['mname']][]="save";
			}
			if($v['aname']=="add"){
				$nodelist[$v['mname']][]="doadd";
			}
		}

		//将权限信息放置到session中
		$_SESSION['admin_user']['nodelist'] = $nodelist;

		//重组的信息
		// V($_SESSION);exit;
		
		//跳转到首页
		$this->redirect('Index/index');
	}

	//退出登陆
	public function logout()
	{
		//清空session
		unset($_SESSION['admin_user']);
		//跳转
		$this->redirect('Index/index');
	}
}