<?php
class AskViewModel extends ViewModel {
//模型包含的字段 $viewFields
    public $viewFields = array(
        'Ask' => array('id','sort_id','uid','ask_name','content','add_time','click_number','comment_num','reward','solve'),
        'Ask_sort' => array('sort_name','_on'=>'Ask.sort_id=Ask_sort.id'),
        'User' => array('point','exp','username','face','_on'=>'Ask.uid=User.id')
    );
}