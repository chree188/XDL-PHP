$(function(){
    $('li.dropdown').dropDown();
    $('td .dropdown').dropDown();
    $('#j-panel a').clarity();
    $('#j-gotop').goTop();
    $('.tab').tabToggle();//tab切换
    $('.fold-wrap').foldToggle();//折叠
    $('.mes-box').mesBox();//消息框,点击X关闭
    //$('.flag').tipBox(); //提示框，点击flag红色小旗弹出，点击空白处关闭
    $('.money-pattern').moneyValidate();//验证金额类型
    //全选
    $('.select-all').selectAll($('.order-hd input:checkbox'));
    $('.select-all').selectAll($('.product-info input:checkbox'));
    $('.select-all').selectAll($('.product-list input:checkbox'));


  
})