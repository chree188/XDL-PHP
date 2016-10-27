<?php
class BestViewModel extends ViewModel{
    public $viewFields = array(
        'Best' => array('id','uid','cid','aid','status,article_uid'),
        'Comment' => array('comment_uid','time','comment','_on'=>'Best.cid=Comment.id'),
        'User' => array('point','exp','username','face','_on'=>'Best.uid=User.id')
    );
}