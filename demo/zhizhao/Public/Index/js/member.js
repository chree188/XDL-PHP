// JavaScript Document
$(function(){
	/*用户信息设置 tab选项卡*/
	$('.setup_tab').tabs({
		togger : '.setup_tab_title li',  //触发器class
		toggerFocus : 'current',  //触发器焦点class
		tabs : '.setup_tab_con li',  //选项卡class，支持多选项卡操作，选项卡间用",'分隔
		toggerMode : 'click',  //触发模式，默认为click，可以填入jQuery事件名称
		defaultTabs : '0'  //默认开启选项卡，默认开启第一个
	});
	
	//修改用户名 弹出框
	$( '.modifyName' ).click( function () {
		var obj = $( '#popName' );
		dialog( obj );
		return false;
	} );
	//修改签名
	$( '.modifyInt' ).click( function () {
		var obj = $( '#popintr' );
		dialog( obj );
		return false;
	} );
	
	//关闭弹出框
	$( '.close-window' ).click( function () {
		$( this ).parent().parent().fadeOut('fast');
		$( '#all' ).css( {
			opacity : 1.0,
			filter : 'Alpha(Opacity = 100)',
		} );
		return false;
	} );
	
	//头像上传uploadify插件
	$('#face').uploadify({
		swf : STATIC + '/Uploadify/uploadify.swf', //引入uploadify核心FLASH文件
		uploader : uploadUrl, //PHP处理脚本地址
		width : 120, //上传按钮宽度
		height : 30, //上传按钮高度
		buttonImage : STATIC + '/Uploadify/browse-btn.png', //上传按钮背景图地址
		fileTypeDesc : 'Images File', //选择文件提示文字  
		fileTypeExts : '*.jpeg; *.jpg; *.png; *.gif', //允许选择的文件类型
		formData : {'session_id' : sid},
		//上传成功后的回调函数
		onUploadSuccess : function(file, data, response){
			eval('var data = ' +data); //把PHP端返回的JSON字符串转换成对象
			if(data.status){
				imgSrc = UPLOAD +'/Face/' + data.path;
				//imgSrc = '/Uploads/Face/' + data.path;
				$('#faceImg').attr('src',imgSrc);
				$('input[name=facePath]').val(imgSrc);	
			}else{
				alert(data.msg);
			}
		}
		
	});
	
});
/**
 * 弹出框 居中函数
 */
function dialog (obj) {
	obj.css( {
		left : ( $( window ).width() - obj.width() ) / 2,
		top : $( document ).scrollTop() + ( $( window ).height() - obj.height() ) / 2
	} ).fadeIn();

	$( '#all' ).css( {
		opacity : 0.5,
    	filter : 'Alpha(Opacity = 50)',
	} );
}