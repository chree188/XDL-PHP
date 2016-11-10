<?php
namespace Home\Controller;

use \Think\Controller;

class RobotController extends Controller{

	//图灵机器人
	public function tuling(){

		$this->display();
	}


	public function ajaxTuling(){
		//获取 表单信息
		$info = I('post.info', '');

		//设置请求地址
		$url = "http://www.tuling123.com/openapi/api?key=cb964c5958cb852407a5b86c4f8bbf04&info={$info}";

		$api = new \Common\Util\ResultApi();
		$data = $api->getApiStr($url);

		echo $data;
		//V($data);

	}
}
