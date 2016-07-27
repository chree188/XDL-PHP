<!--网站页脚-->
<link href="./include/css/style.css" rel="stylesheet" />
<link rel="stylesheet" href="./include/css/base.css"/>
<link rel="stylesheet" href="./include/css/back-common.css"/>
<link rel="stylesheet" href="./include/css/back-index.css"/>
<!--养生热线-->
<div class="ctel">
	<img src="./include/img/mark.jpg" width="22" height="21" />
	&nbsp;<span class="tt">养生热线：</span>0570-6216550 13777399387
</div>
<!--回到顶部，留言，联系客服 先保留-->
	<div class="aside-panel" id="j-panel">
	<a href="javascript:;" title="" id="j-gotop" class="backtop">顶部</a>
	<a href="javascript:;" title="" id="j-message">留言</a>
	<a href="javascript:;" title=""  id="j-service">客服</a>
	</div>
<div align="center">
	<span class="tt">友情链接：</span>
	<a href="https://taobao.com/">
		淘宝网
	</a>
	<a href="https://jd.com/">
		京东商城
	</a>
	<a href="https://github.com/">
		github
	</a>
</div>
<div class="footer">
	浙ICP备案12345678  版权所有 天慈天养土特产  技术支持：
	<a href="https://github.com/gitzwt">
		逗你玩科技
	</a>
</div>

<?php
	//设置报错情况	去除notice错误
	error_reporting(E_ALL ^ E_NOTICE);
	//is_resource() 检测变量是否为资源类型
	if(is_resource($link)) {	//判断是否为空资源，为空 即关闭数据库连接和释放资源
		mysqli_close($link);	
	}
	if(is_resource($result)) {
		mysqli_free_result($result);	
	}
	
	
?>