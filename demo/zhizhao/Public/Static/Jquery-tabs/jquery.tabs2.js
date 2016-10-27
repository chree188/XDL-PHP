/*
==========================================
* jQuery选项卡 v1.2
==========================================
* Copyright (c) 2012 伯仁网络 All rights reserved.
* Author: YinHailin
* $Id: jquery.tabs2.js 6 2013-10-15 05:47:36Z luokun $
==========================================
*/
;(function($){
	$.fn.tabs = function(options) {
		var defaults = {
			togger : '.togger',  //触发选择器
			tabs : '.tab',  //选项卡选择器
			toggerFocus : 'current',  //触发器焦点class
			toggerMode : 'click',  //触发模式，默认为click，可以填入jQuery事件名称
			callback : null
		};
		options = $.extend(defaults,options);
		this.each(function(){
			var $togger =$(this).find(defaults.togger);  //获取触发器对象
			var $tabs = $(this).find(defaults.tabs);  //获取选项卡对象
			$togger.bind(defaults.toggerMode,function(){
				/* 改变触发器状态 */
				$togger.removeClass(defaults.toggerFocus); //去除焦点
				$(this).addClass(defaults.toggerFocus);  //添加新焦点
				/* 改变选项卡状态 */
				var index = $(this).index();  //触发器索引值
				$tabs.hide()
					.eq(index).show();
				if (typeof defaults.callback == 'function') {
					defaults.callback();	
				}
			});
		});
	};
})(jQuery);