// JavaScript Document
/*前台公共JS*/
$(function(){
	$('.recommendBox').tabs({
		togger : '.recommendTitle li',  //触发器class
		toggerFocus : 'currentRec',  //触发器焦点class
		tabs : '.recommendCon li',  //选项卡class，支持多选项卡操作，选项卡间用",'分隔
		toggerMode : 'mouseenter',  //触发模式，默认为click，可以填入jQuery事件名称
		defaultTabs : '0'  //默认开启选项卡，默认开启第一个
	});
	//textarea自动增长
	$('.replyTexCon').autogrow({
			minHeight: 12,
            maxHeight: 1000
	});
	//textarea自动增长
	$('.answerTextCon').autogrow({
			minHeight: 12,
            maxHeight: 1000
	});
	//弹出回复框
	var answerBtn = $('.commentCon').find('.answer_btn');
	answerBtn.each(function(i){
		$(this).click(function(){
			$(this).parents('li').find('.answerBox').removeClass('none').find('.answer_cancel').click(function(){
				$(this).parents('.answerBox').addClass('none');	
			});
			var Index = answerBtn.index(this);
			$('.commentCon').find('.answerBox').not($('.commentCon').find('.answerBox').eq(Index)).addClass('none');
			var answer_sub = $(this).parents('.textBox').find('.answer_sub');
			var answerTextCon = $(this).parents('.textBox').find('.answerTextCon');
			var commentSonForm = $(this).parents('.textBox').find('form[name=commentSon]');
			answer_sub.click(function(){
				if(answerTextCon.val() ==''){
					return false;	
				}
				commentSonForm.submit();
			});
		});
	});

	//顶级评论JS
	var reply_sub = $('#reply_sub');
	var replyTexCon = $('.replyTexCon');
	var commentCon = $('.commentCon').find('ul');
	reply_sub.click(function(){
		//如果没有登录 提示
		if(!UserId){
			//调用消息提示插件
			jError('您还未登录',{
				VerticalPosition : 'center',
				HorizontalPosition : 'center'
			});
			return false;	
		}
		//如果还未输入内容 直接返回 不提交
		if(replyTexCon.val() == ''){
			return false;
		}
		if(replyTexCon.val() == '我有更好的答案...'){
			return false;
		}
		$('#commentParent').submit();
	});
});