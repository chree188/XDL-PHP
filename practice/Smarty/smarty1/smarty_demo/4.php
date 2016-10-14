<?php
/**
 * Created by PhpStorm.
 * User: hui
 * Date: 2016/10/12
 * Time: 20:43
 */
header("content-type:text/html;charset=utf-8");

require './init.php';

//分配变量
$smarty->assign('title','模板中读取变量');

//bool
$smarty->assign('b1',true);
$smarty->assign('b2',false);

//数组
$smarty->assign('arr',['小艳艳','小静静','小红红','小达达','老王']);
$smarty->assign('list',['name'=>'大静静','age'=>18,'sex'=>'女']);

//对象
$smarty->assign('obj',new User());

class User
{
    public $name = '小A';
    public function getInfo(){
        return $this->name;
    }
}

//加载模板
$smarty->display('./4.html');