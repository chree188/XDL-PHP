<?php
namespace Home\Controller;

use Think\Controller;

class IpController extends Controller{

	public function _initialize(){

	}

	//淘宝ip地址库接口
	public function taobao(){
		echo "<meta charset='utf-8'>";
		//获取客户端ip
		$ip = "211.161.196.174";
		// $ip = I('server.REMOTE_ADDR');//从server中获取IP

		//实例化 接口
		$api = new \Common\Util\ResultApi();
		//返回数据
		$data = $api->getApiData('http://ip.taobao.com/service/getIpInfo.php?ip='.$ip, 'json');

		if ($data->code != 0) {
			echo "IP error !";
			return;
		}

		dump($data->data);

	}

	//think自带ip库
	public function thinkIp(){
		echo "<meta charset='utf-8'>";
		$ip = get_client_ip();//TP自带的获取IP方式
		$Ip = new \Org\Net\IpLocation('UTFWry.dat');
		// 实例化类 参数表示IP地址库文件
		$area = $Ip->getlocation($ip); // 获取某个IP地址所在的位置
		dump($area);
	}


	//根据淘宝ip库接口自动选择地址
	public function selectArea(){
		//获取客户端ip 所在的区域
		$ip = "223.167.32.42";
		//实例化 接口
		$api = new \Common\Util\ResultApi();
		//返回数据
		$data = $api->getApiData('http://ip.taobao.com/service/getIpInfo.php?ip='.$ip, 'json');

		// $id = M('district')->where(array('name'=>$data->data->region))->getField('id');
		$id = M('address')->where(array('name'=>$data->data->region))->getField('id');
		$this->assign('id', $id);
		//var_dump($id);
		$this->display();
	}

	//ajax返回数据
	public function area(){
		//接收post中数据
		$upid = I('post.upid', 0);

		//实例化模型
		// $area = M('district');
		$area = M('address');

		$list = $area->where(array('upid'=>$upid))->select();

		echo json_encode($list);
	}
}
