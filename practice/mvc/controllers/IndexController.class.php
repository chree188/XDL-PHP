<?php

/**
 * Created by PhpStorm.
 * User: hui
 * Date: 2016/10/16
 * Time: 10:31
 */

//首页的控制器
class IndexController extends Controller
{
    public function index()
    {
        $this->display('Index/index.html');
    }
}