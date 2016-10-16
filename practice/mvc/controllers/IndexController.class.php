<?php

/**
 * Created by PhpStorm.
 * User: hui
 * Date: 2016/10/16
 * Time: 10:31
 */

//首页的控制器
class IndexController
{
    public function index()
    {
        global $smarty;
        $smarty->display('Index/index.html');
    }
}