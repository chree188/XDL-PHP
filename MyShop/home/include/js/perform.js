$(function(){
    $('li.dropdown').dropDown();
    $('td .dropdown').dropDown();
    $('#j-panel a').clarity();
    $('#j-gotop').goTop();
    $('.tab').tabToggle();//tab�л�
    $('.fold-wrap').foldToggle();//�۵�
    $('.mes-box').mesBox();//��Ϣ��,���X�ر�
    //$('.flag').tipBox(); //��ʾ�򣬵��flag��ɫС�쵯��������հ״��ر�
    $('.money-pattern').moneyValidate();//��֤�������
    //ȫѡ
    $('.select-all').selectAll($('.order-hd input:checkbox'));
    $('.select-all').selectAll($('.product-info input:checkbox'));
    $('.select-all').selectAll($('.product-list input:checkbox'));


  
})