/**
 * Created by hui on 2016/10/16.
 */

//添加用户
$(function(){
    $('#addBtn').click(function(){
        $.ajax({
            type:'get',
            url:'./index.php?c=User&a=add',
            success:function(data){
                $(data+'<br>').replaceAll('table');
            },
        })
    })
});