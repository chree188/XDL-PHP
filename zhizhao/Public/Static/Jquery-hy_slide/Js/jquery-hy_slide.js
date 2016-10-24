/*
==========================================
* jquery-hy_slide多功能滚动插件 v1.0
==========================================
* Copyright (c) 2012 YinHailin All rights reserved.
* Author: YinHailin
* $Id: jquery-hy_slide.js 1 2013-08-27 02:44:21Z luokun $
==========================================
*/
;(function($){
	$.fn.hy_slide = function(options) {
		var defaults = {
			effect : 'scrollY',  //动画执行效果，可以是：scrollY(默认), scrollX, fade, scrollLoopX, scrollLoopY
			autoPlay : true,  //自动执行，true(默认) 或 false
			corotation : true,  //正转或反转，由上到下、由左到右为正转
			speed : 'normal',  //动画速度，可以是：normal(默认), fast, slow 或 数值
			timer : 2000,  //执行间隔，默认1000毫秒
			show : 1,  //展现量，默认展示1个
			step : 1,  //执行步数，默认执行1步
			classTr : 'hySlideTrigger',  //触发器父级class
			classCon : 'hySlideContent',  //滚动器父级class
			btnPrev : 'prev',  //上一个按钮class
			btnNext : 'next',  //下一个按钮class
			loop : true,  //是否循环执行动画，默认true
			slight : 0 //项目微调，单位px
		};
		var opts = $.extend(defaults, options);
		var $objTr = $('.'+opts.classTr, $(this).first());  //触发器父级对象
		var $objTrItem = $objTr.find('li');  //触发器元素对象
		var $objBtnPrev = $objTr.find('.'+opts.btnPrev);  //上一个按钮对象
		var $objBtnNext = $objTr.find('.'+opts.btnNext);  //下一个按钮对象
		var $objCon = $('.'+opts.classCon, $(this).first());  //滚动器父级对象
		var $objConItem = $objCon.find('li');  //滚动器元素对象
		var numConItem = $objConItem.size();  //滚动器元素数量
		var itemH = $objConItem.first().height() + opts.slight;  //滚动器元素高度
		var itemW = $objConItem.first().width() + opts.slight;  //滚动器元素宽度
		var slideDist;  //动画滑动距离
		var index = 0;  //当前动画元素的索引值
		var indexNext;  //下次动画元素的索引值
		var timer;  //计时器
		var needConItem;  //应有滚动器元素数量
		var group;  //滚动元素应有组数
		switch (opts.effect) {
			case 'scrollY' :
				//公式：应有元素数量 = 展现数量 + 滚动数量 * (分组数 - 1)
				slideDist = itemH;
				group = Math.ceil((numConItem - opts.show) / opts.step + 1);
				needConItem = opts.show + opts.step * (group - 1);
				break;
			case 'scrollX' :
				//公式：应有元素数量 = 展现数量 + 滚动数量 * (分组数 - 1)
				slideDist = itemW;
				group = Math.ceil((numConItem - opts.show) / opts.step + 1);
				needConItem = opts.show + opts.step * (group - 1);
				//调整布局，设置滚动器最大宽度
				$objCon.css({'width':needConItem*slideDist+'px'});
				break;
			case 'scrollLoopY' :
				slideDist = itemH;
				group = Math.ceil(numConItem / opts.step);
				needConItem = group * opts.step;
				//补齐缺少项，保证连续循环一致
				for (var i = 0; i < needConItem - numConItem; i++) {
					$objCon.append('<li><div style="height:'+slideDist+'px;">&nbsp;</div></li>');
				}
				$objCon.append($objCon.html());  //复制滚动器元素
			 	break;
			case 'scrollLoopX' :
				slideDist = itemW;
				group = Math.ceil(numConItem / opts.step);
				needConItem = group * opts.step;
				//补齐缺少项，保证连续循环一致
				for (var i = 0; i < needConItem - numConItem; i++) {
					$objCon.append('<li><div style="height:'+slideDist+'px;">&nbsp;</div></li>');
				}
				$objCon.append($objCon.html());  //复制滚动器元素
				//调整布局，设置滚动器最大宽度
				$objCon.css({'width':needConItem*slideDist*2+'px'});
			 	break;
			case 'fade' :
				group = numConItem;
				needConItem = group;
				$objCon.find('li:first').css({'z-index':'20'}).siblings().css({'z-index':'10','display':'none'});
			 	break;
		}
		//移除多余的触发器
		$objTr.find('li:gt('+(group-1)+')').remove();

		var plugin = this;

		plugin.init = function(){
			//自动执行
			plugin.getAutoPlay();

			//触发器触发
			//1.判断是否自动执行，是则停止
			//2.修正index值
			//3.执行动画
			//4.若是自动执行，则重新开始计时器
			$objTrItem.mouseenter(function(){
				clearInterval(timer);
				indexNext = $(this).index();
				plugin.getPlay();
			}).mouseleave(function(){
				plugin.getAutoPlay();
			});

			//鼠标悬停
			$objCon.mouseenter(function(){
				clearInterval(timer);
			}).mouseleave(function(){
				plugin.getAutoPlay();
			});

			//按钮事件
			$objBtnPrev.bind('click', function(){
				clearInterval(timer);
				plugin.getPrevPlay();
				plugin.getAutoPlay();
			});
			$objBtnNext.bind('click', function(){
				clearInterval(timer);
				plugin.getNextPlay();
				plugin.getAutoPlay();
			});
		};

		/* 自动执行处理 */
		plugin.getAutoPlay = function() {
			if (opts.autoPlay && opts.corotation) {
				timer = setInterval(plugin.getNextPlay, opts.timer);
			} else if (opts.autoPlay && !opts.corotation) {
				timer = setInterval(plugin.getPrevPlay, opts.timer);
			}
		}

		/* 单次动画上翻处理 */
		plugin.getPrevPlay = function() {
			indexNext = index - 1;
			if (indexNext < 0) indexNext = group -1;
			//判断是否为循环执行
			if (!(!opts.loop && indexNext == 0)) {
				plugin.getPlay();
			} else {
				clearInterval(timer);
			}
		}

		/* 单次动画下翻处理 */
		plugin.getNextPlay = function() {
			indexNext = index + 1;
			if (indexNext >= group) indexNext = 0;
			//判断是否为循环执行
			if (!(!opts.loop && indexNext == 0)) {
				plugin.getPlay();
			} else {
				clearInterval(timer);
			}
		}

		/* 单次动画处理 */
		plugin.getPlay = function() {
			plugin.getEffect[opts.effect]();
		}

		/* 插件效果处理 */
		plugin.getEffect = {
			//垂直回转式滚动
			scrollY : function() {
				$objCon.stop(true, true).animate({"top":-indexNext*opts.step*slideDist}, opts.speed);
				index = indexNext;
				plugin.getTrigger();
			},
			//水平回转式滚动
			scrollX : function() {
				$objCon.stop(true, true).animate({"left":-indexNext*opts.step*slideDist}, opts.speed);
				$objCon.parent().parent().find('.des_content').html('<a href="'+$objCon.find('li:eq('+indexNext+')').find('a').attr('href')+'" target="_blank" class="a-white-n">'+$objCon.find('li:eq('+indexNext+')').find('img').attr('alt')+'</a>');
				index = indexNext;
				plugin.getTrigger();
			},
			//垂直循环式滚动
			scrollLoopY : function() {
				if (index == group - 1 && indexNext == 0) {
					$objCon.stop(true, true).animate({"top":-group*opts.step*slideDist}, opts.speed, function(){
						$objCon.css({"top":0});
					});
				} else if (index == 0 && indexNext == group - 1) {
					$objCon.stop(true, true).css({"top":-group*opts.step*slideDist}).animate({"top":-indexNext*opts.step*slideDist}, opts.speed);
				} else {
					$objCon.stop(true, true).animate({"top":-indexNext*opts.step*slideDist}, opts.speed);
				}
				index = indexNext;
				plugin.getTrigger();
			},
			//水平循环式滚动
			scrollLoopX : function() {
				if (index == group - 1 && indexNext == 0) {
					$objCon.stop(true, true).animate({"left":-group*opts.step*slideDist}, opts.speed, function(){
						$objCon.css({"left":0});
					});
				} else if (index == 0 && indexNext == group - 1) {
					$objCon.stop(true, true).css({"left":-group*opts.step*slideDist}).animate({"left":-indexNext*opts.step*slideDist}, opts.speed);
				} else {
					$objCon.stop(true, true).animate({"left":-indexNext*opts.step*slideDist}, opts.speed);
				}
				index = indexNext;
				plugin.getTrigger();
			},
			//渐变式切换
			fade : function() {
				$objCon.find('li:eq('+indexNext+')').css({'z-index':'30'}).stop(true, true).fadeIn(opts.speed).siblings().fadeOut(opts.speed);
				index = indexNext;
				plugin.getTrigger();
			}
		};

		/* 触发器处理 */
		plugin.getTrigger = function() {
			if ($objTrItem.size() > 0) {
				$objTrItem.eq(index).addClass('selected').siblings().removeClass('selected');
			}
		};

		return plugin.init();
	}
})(jQuery);