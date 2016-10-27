API接口

=========================================================================
一. IP地址库
	1. 淘宝ip接口
		1.1 请求接口（GET）：
			http://ip.taobao.com/service/getIpInfo.php?ip=[ip地址字串]
		1.2 响应信息：
			（json格式的）国家 、省（自治区或直辖市）、市（县）、运营商
		1.3 返回数据格式：
			{"code":0,"data":{"ip":"210.75.225.254","country":"\u4e2d\u56fd","area":"\u534e\u5317",
			"region":"\u5317\u4eac\u5e02","city":"\u5317\u4eac\u5e02","county":"","isp":"\u7535\u4fe1",
			"country_id":"86","area_id":"100000","region_id":"110000","city_id":"110000",
			"county_id":"-1","isp_id":"100017"}}
			其中code的值的含义为，0：成功，1：失败。
		1.4 地址举例
			宁夏：222.75.147.27
			山东：221.1.64.11
			上海：223.167.32.42
		1.5 官网
			http://ip.taobao.com/

二. 天气查询API
	1. 百度地图天气
		1.1 API 地址
			http://api.map.baidu.com/telematics/v3/weather?location=城市名&output=json&ak=vqMyoRRwVgEq3tU1Wr6i0ij5
		1.2 返回数据
			{"error":0,"status":"success","date":"2015-08-10","results":[{"currentCity":"上海","pm25":"99","index":[{"title":"穿衣","zs":"热","tipt":"穿衣指数","des":"天气热，建议着短裙、短裤、短薄外套、T恤等夏季服装。"},{"title":"洗车","zs":"不宜","tipt":"洗车指数","des":"不宜洗车，未来24小时内有雨，如果在此期间洗车，雨水和路上的泥水可能会再次弄脏您的爱车。"},{"title":"旅游","zs":"一般","tipt":"旅游指数","des":"天气稍热，有微风，但较强降雨的天气将给您的出行带来很多的不便，若坚持旅行建议带上雨具。"},{"title":"感冒","zs":"少发","tipt":"感冒指数","des":"各项气象条件适宜，发生感冒机率较低。但请避免长期处于空调房间中，以防感冒。"},{"title":"运动","zs":"较不宜","tipt":"运动指数","des":"有较强降水，建议您选择在室内进行健身休闲运动。"},{"title":"紫外线强度","zs":"弱","tipt":"紫外线强度指数","des":"紫外线强度较弱，建议出门前涂擦SPF在12-15之间、PA+的防晒护肤品。"}],"weather_data":[{"date":"周一 08月10日 (实时：27℃)","dayPictureUrl":"http://api.map.baidu.com/images/weather/day/dayu.png","nightPictureUrl":"http://api.map.baidu.com/images/weather/night/dayu.png","weather":"大雨","wind":"东南风微风","temperature":"30 ~ 26℃"},{"date":"周二","dayPictureUrl":"http://api.map.baidu.com/images/weather/day/zhongyu.png","nightPictureUrl":"http://api.map.baidu.com/images/weather/night/zhenyu.png","weather":"中雨转阵雨","wind":"南风微风","temperature":"30 ~ 26℃"},{"date":"周三","dayPictureUrl":"http://api.map.baidu.com/images/weather/day/zhenyu.png","nightPictureUrl":"http://api.map.baidu.com/images/weather/night/yin.png","weather":"阵雨转阴","wind":"微风","temperature":"31 ~ 26℃"},{"date":"周四","dayPictureUrl":"http://api.map.baidu.com/images/weather/day/duoyun.png","nightPictureUrl":"http://api.map.baidu.com/images/weather/night/duoyun.png","weather":"多云","wind":"东北风微风","temperature":"32 ~ 26℃"}]}]}
		
	2. 百度APIStore 
		1.1 API地址
			http://apistore.baidu.com/apiworks/servicedetail/112.html
		1.2 用法
			 $ch = curl_init();
			$url = 'http://apis.baidu.com/apistore/weatherservice/citylist?cityname=%E6%9C%9D%E9%98%B3';
			$header = array(
				'apikey: 您自己的apikey',
			);
			// 添加apikey到header
			curl_setopt($ch, CURLOPT_HTTPHEADER  , $header);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			// 执行HTTP请求
			curl_setopt($ch , CURLOPT_URL , $url);
			$res = curl_exec($ch);
			var_dump(json_decode($res));
			
			
三. 机器人
	1. 图灵机器人
		1.1 网址
			http://www.tuling123.com/openapi/
		1.2 信息
			API KEY ：cb964c5958cb852407a5b86c4f8bbf04
			微信地址：http://www.tuling123.com/openapi/wechatapi?key=cb964c5958cb852407a5b86c4f8bbf04
		1.3 接口
			参考 http://www.tuling123.com/openapi/cloud/access_api.jsp
			
			
			
四. 地图
	1. 百度 地图 API
	http://developer.baidu.com/map/
    


五. 分享
    1. 百度分享
       地址：
    2. bShare
	   地址：http://www.bshare.cn/	
			
			
		
			
扩展
=========================================================================
一. 邮件服务
	1. 使用PHPMail 扩展类
二. Excel 服务
    1. 直接使用 设置 header头方式 来导出 excel
    2. 使用PHPExcep 类
        
	