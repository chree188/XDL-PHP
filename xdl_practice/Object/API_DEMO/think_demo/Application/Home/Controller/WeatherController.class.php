<?php
namespace Home\Controller;

use \Think\Controller;

class WeatherController extends Controller{

	public function getWeather(){

		$city = I('post.city', '上海');

		$url = 'http://api.map.baidu.com/telematics/v3/weather?location='.$city.'&output=json&ak=vqMyoRRwVgEq3tU1Wr6i0ij5';

		$api = new \Common\Util\ResultApi();
		$data = $api->getApiData($url, 'json');


		$this->assign('data', $data);

		$this->display();
	}

	public function baiduWeather(){

		//先根据城市名 获取 城市信息

		$city = I('post.city', '上海');

		$url = 'http://apis.baidu.com/apistore/weatherservice/cityinfo?cityname='.$city;
		 $header = array(
	        'apikey: 6d143d632a79ca4be381b14dadbd01a4',
	    );
		$api = new \Common\Util\ResultApi();
		$data = $api->getApiData($url, 'json', $header);


		//如果你能获取 该城市信息， 获取城市id 根据id获取 具体天气信息
		if ($data->errNum === 0) {
			$url = "http://apis.baidu.com/apistore/weatherservice/recentweathers?cityname={$city}&cityid=".$data->retData->cityCode;
			$results = $api->getApiData($url, 'json', $header);

			//V($results);
			$this->assign('results', $results);

		} else {
			$this->assign('error', 1);
		}

		$this->display();
	}
}
