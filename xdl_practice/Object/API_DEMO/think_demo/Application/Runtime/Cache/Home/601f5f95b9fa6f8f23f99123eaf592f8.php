<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="cn">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
	<style type="text/css">

	</style>
	<link rel="stylesheet" href="/practice/Object/API_DEMO/think_demo/Public/Dist/css/bootstrap.min.css">
	<script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=B8cfd1501ae7f7c55dc3793ee989c354"></script>
	<title>地图展示</title>
</head>
<body>
	<div class="container-fluid">
		<div class="page-header">
			<h1>百度地图API</h1>
		</div>

		<div class="row">
			<div class="col-md-6" id="allmap" style="width:300px; height:300px;"></div>
		</div>

	</div>

</body>
</html>
<script type="text/javascript">
	// 百度地图API功能
	var map = new BMap.Map("allmap");    // 创建Map实例
	var point = new BMap.Point(121.446434,31.299214);
	map.centerAndZoom(point, 13);
	//map.centerAndZoom(new BMap.Point(121.446434,31.299214), 13);  // 初始化地图,设置中心点坐标和地图级别
	map.addControl(new BMap.MapTypeControl());   //添加地图类型控件
	map.setCurrentCity("上海");          // 设置地图显示的城市 此项是必须设置的
	map.enableScrollWheelZoom(true);     //开启鼠标滚轮缩放


	// 添加带有定位的导航控件
	var navigationControl = new BMap.NavigationControl({
	    // 靠左上角位置
	    anchor: BMAP_ANCHOR_TOP_LEFT,
	    // LARGE类型
	    type: BMAP_NAVIGATION_CONTROL_LARGE,
	    // 启用显示定位
	    enableGeolocation: true
	  });
	  map.addControl(navigationControl);
	  // 添加定位控件
	  var geolocationControl = new BMap.GeolocationControl();
	  geolocationControl.addEventListener("locationSuccess", function(e){
	    // 定位成功事件
	    var address = '';
	    address += e.addressComponent.province;
	    address += e.addressComponent.city;
	    address += e.addressComponent.district;
	    address += e.addressComponent.street;
	    address += e.addressComponent.streetNumber;
	    alert("当前定位地址为：" + address);
	  });
	  geolocationControl.addEventListener("locationError",function(e){
	    // 定位失败事件
	    alert(e.message);
	  });
	  map.addControl(geolocationControl);




	  /*
	  var cr = new BMap.CopyrightControl({anchor: BMAP_ANCHOR_TOP_RIGHT});   //设置版权控件位置
	map.addControl(cr); //添加版权控件

	var bs = map.getBounds();   //返回地图可视区域
	cr.addCopyright({id: 1, content: "<a href='#' style='color:#fff;font-size:20px;background:#369;'>LAMP兄弟连</a>", bounds: bs});
	//Copyright(id,content,bounds)类作为CopyrightControl.addCopyright()方法的参数

	*/
	// 百度地图API功能

	var marker = new BMap.Marker(point);  // 创建标注
	map.addOverlay(marker);              // 将标注添加到地图中
	marker.addEventListener("click",getAttr);
	function getAttr(){
		var p = marker.getPosition();       //获取marker的位置
		alert("marker的位置是" + p.lng + "," + p.lat);
	}
</script>