/*
==========================================
* jQuery选项卡插件v0.1
==========================================
+ 参数说明
+ togger : 触发器的class
+ toggerFocus : 触发器获得焦点时的class
+ tabs : 选项卡的class
+ toggerMode : 触发器触发方式，默认为click，可以是mouseenter等jQuery事件
==========================================
* Copyright (c) 2012 伯仁网络 All rights reserved.
* Author: YinHailin
* $Id: jquery.tabs.js 1 2013-09-18 07:28:10Z luokun $
==========================================
*/

;(function($){
	$.fn.tabs = function(options) {
		var defaults = {
			togger : 'togger',  //触发器class
			toggerFocus : 'selected',  //触发器焦点class
			tabs : 'tabs',  //选项卡class，支持多选项卡操作，选项卡间用",'分隔
			toggerMode : 'click',  //触发模式，默认为click，可以填入jQuery事件名称
			defaultTabs : '0'  //默认开启选项卡，默认开启第一个
		};
		options = $.extend(defaults,options); //传进来的options会覆盖默认的 即：后面的覆盖前面的
		/* 为class添加点符号"." */
		options.togger = options.togger;
		options.tabs = options.tabs;
		options.tabs = options.tabs.replace(/,/g, ",.");  //多选项卡处理
		/* 主程式 */
		return this.each(function(){
			var $togger =$(options.togger);  //获取触发器对象
			$togger.bind(options.toggerMode,function(){
				/* 改变触发器状态 */
				$togger.removeClass(options.toggerFocus); //去除焦点
				$(this).addClass(options.toggerFocus);  //添加新焦点
				/* 改变选项卡状态 */
				var index = $(this).index(options.togger);  //触发器索引值
				/* 选项卡处理 */
				var tabs = options.tabs.split(',');
				var $tabs, i;
				for (i = 1; i<=tabs.length;i++) {
					$tabs = $(tabs[i-1]);  //获取选项卡对象
					$tabs.hide()
						.eq(index).show();
				}
			}).eq(options.defaultTabs).trigger(options.toggerMode);  //该行设置默认选项卡
		});
	};
})(jQuery);
