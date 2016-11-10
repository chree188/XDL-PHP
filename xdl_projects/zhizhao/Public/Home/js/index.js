/*前台首页JS*/	
$(function(){
		$('.bannerBox').hy_slide({
			effect : 'scrollX',  //动画执行效果，可以是：scrollY(默认), scrollX, fade, scrollLoopX, scrollLoopY
			autoPlay : true,  //自动执行，true(默认) 或 false
			corotation : true,  //正转或反转，由下到上、由右到到左为正转
			speed : 1000,  //动画速度，可以是：normal(默认), fast, slow 或 数值
			timer : 3000,  //执行间隔，默认1000毫秒
			show : 1,  //展现量，默认展示1个
			step : 1,  //执行步数，默认执行1步
			classTr : 'triggerBox',	//父级出发器
			btnPrev : 'triggerbtn1',  //上一个按钮class
			btnNext : 'triggerbtn2',  //下一个按钮class
			classCon : 'hySlideContent',  //滚动器父级class
			loop : true,  //是否循环执行动画，默认true
			slight : 0 //项目微调，单位px
		});
		$('.bannerBox').hover(function(){
			$('.bannerBox').find('.triggerbtn1, .triggerbtn2').animate({opacity:1.0});
		}, function(){
			$('.bannerBox').find('.triggerbtn1, .triggerbtn2').animate({opacity:0.5});
		});
		$('.recommendBox').tabs({
			togger : '.recommendTitle li',  //触发器class
			toggerFocus : 'currentRec',  //触发器焦点class
			tabs : '.recommendCon li',  //选项卡class，支持多选项卡操作，选项卡间用",'分隔
			toggerMode : 'mouseenter',  //触发模式，默认为click，可以填入jQuery事件名称
			defaultTabs : '0'  //默认开启选项卡，默认开启第一个
		});
});
