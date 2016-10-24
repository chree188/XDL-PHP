// JavaScript Document
var validate = {
	usernameLogin : false,
	pwdLogin : false,
	usernameReg : false,
	emailReg : false,
	pwdReg : false,
	repwdReg : false,
	verifyLogin : false,
	verifyReg : false
};
$(function(){
	//登录表单验证
	login = $('form[name=login]');
	login.submit(function(){
		var isOk = validate.usernameLogin && validate.pwdLogin && validate.verifyLogin;
		if(isOk) {
			return true;	
		}
		$('input[name=username]',login).trigger('blur');
		$('input[name=password]',login).trigger('blur');
		$('input[name=verify]',login).trigger('blur');
		return false;
	});
	//验证用户名
	$('input[name=username]',login).blur(function(){
		var username = $(this).val();
		var span = $(this).next();
		if(username == ''){
			msg = '用户名不能为空';
			span.html(msg).removeClass('success').addClass('error');
			validate.usernameLogin = false;
			return;
		}
		$.post(CONTROL + 'checkUserName', {username : username}, function(status){
			if(status){
				msg = '';
				span.html(msg).removeClass('error').addClass('success');
				validate.usernameLogin = true;
				return;
			}else{
				msg = '用户名不存在';
				span.html(msg).removeClass('success').addClass('error');
				validate.usernameLogin = false;
				return;
			}
		}, 'json');
	}).keyup(function(){
		$(this).triggerHandler('blur');
	}).focus(function(){
		$(this).triggerHandler('blur');	
	});
	//验证密码
	$('input[name=password]',login).blur(function(){
		var password = $(this).val();
		var span = $(this).next();
		if(password == ''){
			msg = '密码不能为空';
			span.html(msg).removeClass('success').addClass('error');
			validate.pwdLogin = false;
			return;
		}
		msg = '';
		span.html(msg).removeClass('error').addClass('success');
		validate.pwdLogin = true;
		return;
	}).keyup(function(){
		$(this).triggerHandler('blur');
	}).focus(function(){
		$(this).triggerHandler('blur');	
	});
	//验证验证码
	$('input[name=verify]',login).blur(function(){
		var verify = $(this).val();
		span = $(this).parents().find('.msg');
		if(verify == ''){
			msg = '验证码不能为空';
			span.html(msg).removeClass('success').addClass('error');
			validate.verifyLogin = false;
			return;	
		}
		msg = '&nbsp;';
		span.html(msg).removeClass('error').addClass('success');
		validate.verifyLogin = true;
		return;
	}).keyup(function(){
		$(this).triggerHandler('blur');
	}).focus(function(){
		$(this).triggerHandler('blur');	
	});
	//注册表单验证
	register = $('form[name=register]');
	register.submit(function(){
		var isOk = validate.usernameReg && validate.emailReg && validate.pwdReg && validate.repwdReg && validate.verifyReg;
		if(isOk){
			return true;	
		}
		$('input[name=username]',register).trigger('blur');
		$('input[name=password]',register).trigger('blur');
        $('input[name=email]',register).trigger('blur');
		$('input[name=repassword]',register).trigger('blur');
		$('input[name=verify]',register).trigger('blur');
		return false;
	});
	//验证用户名
	$('input[name=username]',register).blur(function(){
		var username = $(this).val();
		var span  = $(this).next();
		if(username == ''){
			msg = '用户名不能为空';
			span.html(msg).removeClass('success').addClass('error');
			validate.usernameReg = false;
			return;	
		}
		if( !/^[\S]{2,14}$/g.test(username) ){
			msg = '昵称必须是2-14个字符';
			span.html(msg).removeClass('success').addClass('error');
			validate.usernameReg = false;
			return;
		}
		$.post( CONTROL + 'checkUserName', {username : username}, function(status){
			if(status){
				msg = '用户名已经存在';
				span.html(msg).removeClass('success').addClass('error');
				validate.usernameReg = false;	
				return;
			}else{
				msg = '';
				span.html(msg).removeClass('error').addClass('success');
				validate.usernameReg = true;
				return;
			}
		}, 'json');
	}).keyup(function(){
		$(this).triggerHandler('blur');	
	}).focus(function(){
		$(this).triggerHandler('blur');
	});
	//验证邮箱
	$('input[name=email]',register).blur(function(){
		var email = $(this).val();
		var span = $(this).next();
		if(email == ''){
			msg = '邮箱不能为空';
			span.html(msg).removeClass('success').addClass('error');
			validate.emailReg = false;
			return;	
		}
		if( !/^\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*/g.test(email) ){
			msg = '邮箱格式不对';	
			span.html(msg).removeClass('success').addClass('error');
			validate.emailReg = false;
			return;
		}
		msg = '';
		span.html(msg).removeClass('error').addClass('success');
		validate.emailReg = true;
		return;
		
	}).keyup(function(){
		$(this).triggerHandler('blur');	
	}).focus(function(){
		$(this).triggerHandler('blur');
	});
	
	//验证密码
	$('input[name=password]',register).blur(function(){
		var password = $(this).val();
		var span = $(this).next();
		if(password == ''){
			msg = '密码不能为空';
			span.html(msg).removeClass('success').addClass('error');
			validate.pwdReg = false;
			return;	
		}else if( !/^\w{6,20}$/g.test(password) ){
			msg = '密码必须由6-20个字母，数字，下划线组成';
			span.html(msg).removeClass('success').addClass('error');
			validate.pwdReg = false;
			return;
		}else{
			msg = '';
			span.html(msg).removeClass('error').addClass('success');
			validate.pwdReg = true;
			return;	
		}
	}).keyup(function(){
		$(this).triggerHandler('blur');	
	}).focus(function(){
		$(this).triggerHandler('blur');	
	});
	//验证重复密码
	$('input[name=repassword]',register).blur(function(){
		var repassword = $(this).val();
		var span = $(this).next();
		if(repassword == ''){
			msg = '确认密码不能为空';
			span.html(msg).removeClass('success').addClass('error');
			validate.repwdReg = false;
			return;	
		}else if(repassword != $('input[name=password]',register).val()){
			msg = '确认密码前后不一致';
			span.html(msg).removeClass('success').addClass('error');
			validate.repwdReg = false;
			return;			
		}else {
			msg = '';
			span.html(msg).removeClass('error').addClass('success');
			validate.repwdReg = true;
			return;	
		}
	}).keyup(function(){
		$(this).triggerHandler('blur');	
	}).focus(function(){
		$(this).triggerHandler('blur');	
	});
	//验证验证码
	$('input[name=verify]',register).blur(function(){
		var verify = $(this).val();
		span = $(this).parents().find('.msg');
		if(verify == ''){
			msg = '验证码不能为空';
			span.html(msg).removeClass('success').addClass('error');
			validate.verifyReg = false;
			return;	
		}
		msg = '&nbsp;';
		span.html(msg).removeClass('error').addClass('success');
		validate.verifyReg = true;
		return;
	}).keyup(function(){
		$(this).triggerHandler('blur');
	}).focus(function(){
		$(this).triggerHandler('blur');	
	});
	//改变文本框 得到焦点和失去焦点的时候边框的颜色
    $('.text1').focus(function(){
		$(this).css({borderColor:'#13a4fe'});
	}).blur(function(){
		$(this).css({borderColor:'#CCC'});
	});
	//改变登录注册按钮 鼠标经过或离开的透明度
	$('.sub1').hover(function(){
		$(this).animate({opacity:0.8});
	},function(){
		$(this).animate({opacity:1.0});	
	});	
});